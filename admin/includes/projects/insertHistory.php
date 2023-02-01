<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];

// Validation de l'étape 2 : Descriptions
if (isset($_POST['text_fr'])) {

	if (empty($_POST['text_fr'])) {
		$_POST['text_fr'] = NULL;
	}
	if (empty($_POST['text_de'])) {
		$_POST['text_de'] = NULL;
	}

	if (substr($_POST['text_fr'], 0, 9) == "&lt;p&gt;") {
		$_POST['text_fr'] = substr($_POST['text_fr'], 9, -10);
	}
	if (substr($_POST['text_de'], 0, 9) == "&lt;p&gt;") {
		$_POST['text_de'] = substr($_POST['text_de'], 9, -10);
	}

	$_POST['text_fr'] = preg_replace("(\<p\>(.+?)\<\/p>)is", '$1', $_POST['text_fr']);
	$_POST['text_de'] = preg_replace("(\<p\>(.+?)\<\/p>)is", '$1', $_POST['text_de']);

	$queryHistorique = "UPDATE tbl_projects_history SET desc_fr=?, desc_de=? WHERE PKNoProjectHistory=?";
	$arrayPrepare = array(securise($_POST['text_fr']), securise($_POST['text_de']), $_POST['idHist']);

	$sth = $bdd->prepare($queryHistorique);
	$sth->execute($arrayPrepare);
} else {

	// Validation de l'étape 1 : Principal
	$_POST = array_secured($_POST);

	if ($_POST['periode'] == "NULL") {
		$_POST['periode'] = NULL;
	}
	if ($_POST['salle'] == "NULL") {
		$_POST['salle'] = NULL;
	}

	// Mises a jour des informations relatives a l'historique en cours
	if ($_POST['type'] == "upd") {
		$queryHistorique = "UPDATE tbl_projects_history SET FKNoPeriode=?, year=?, salle=? WHERE PKNoProjectHistory=?";
		$arrayPrepare = array($_POST['periode'], $_POST['year'], $_POST['salle'], $_POST['idHist']);
	} else {
		$queryHistorique = "INSERT INTO tbl_projects_history VALUES(NULL, ?, ?, ?, NULL, NULL, ?, NULL, NULL)";
		$arrayPrepare = array($_POST['idProj'], $_POST['periode'], $_POST['year'], $_POST['salle']);
	}

	$sth = $bdd->prepare($queryHistorique);
	$sth->execute($arrayPrepare);

	if ($_POST['type'] != "upd") {
		echo $bdd->lastInsertId();
		$_POST['idHist'] = $bdd->lastInsertId();
	}


	// Contient les nouveaux professeurs choisis
	$a_teachers = explode(',', str_replace('-', '', substr($_POST['teachers'], 0, -1)));
	$a_teachers_old = explode(',', str_replace('-', '', substr($_POST['old_teachers'], 0, -1)));

	// Contient les nouveaux élèves choisis
	$a_students = explode(',', str_replace('-', '', substr($_POST['students'], 0, -1)));
	$a_students_old = explode(',', str_replace('-', '', substr($_POST['old_students'], 0, -1)));

	// Traitement des professeurs ------------------------------------------------------
	// Suppression de tous les professeurs anciennement choisis
	if (count($a_teachers) > 0 && serialize($a_teachers) != serialize($a_teachers_old)) {
		$bdd->exec("DELETE FROM tbl_history_teachers WHERE FKNoHistory=" . $_POST['idHist']);

		// Ajout de tous les nouveaux professeurs choisis
		$query_teachers = "INSERT INTO tbl_history_teachers VALUES ";
		foreach ($a_teachers as $teach) {
			$query_teachers .= "(" . $teach . ", " . $_POST['idHist'] . "),";
		}
		$query_teachers = substr($query_teachers, 0, -1);
		$bdd->exec($query_teachers);
	}


	// Traitement des élèves -----------------------------------------------------------
	// Suppression de tous les professeurs anciennement choisis
	if (count($a_students) > 0 && serialize($a_students) != serialize($a_students_old)) {
		$bdd->exec("DELETE FROM tbl_history_students WHERE FKNoHistory=" . $_POST['idHist']);

		// Ajout de tous les nouveaux professeurs choisis
		$query_students = "INSERT INTO tbl_history_students VALUES ";
		foreach ($a_students as $stu) {
			$query_students .= "(" . $stu . ", " . $_POST['idHist'] . "),";
		}
		$query_students = substr($query_students, 0, -1);
		$bdd->exec($query_students);
	}

	// Récupère la profession qui a travaillé sur le projet la période en cours
	$get_profession = $bdd->query("
	SELECT tbl_students.FKNoProfession as prof FROM tbl_projects_history
	LEFT JOIN tbl_history_students ON FKNoHistory=PKNoProjectHistory
	LEFT JOIN tbl_students ON FKNoStudent=PKNoStudent
	WHERE PKNoStudent=" . $a_students[0]);
	$profession = $get_profession->fetch();

	$bdd->exec("UPDATE tbl_projects_history SET FKNoProfession=" . $profession['prof'] . " WHERE PKNoProjectHistory=" . getLastId("tbl_projects_history"));
}