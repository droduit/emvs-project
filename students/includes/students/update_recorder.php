<?php
require_once('../../../admin/conf/mysql.php');
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];
$_POST = array_secured($_POST);

if ($_POST['yearEntree'] == "NULL") {
	$_POST['yearEntree'] = NULL;
}
if ($_POST['yearSortie'] == "NULL") {
	$_POST['yearSortie'] = NULL;
}

$get_student_login = $bdd->query("SELECT * FROM students_login WHERE PKNoMembre='" . getID($_POST['login']) . "'");
$stu_login = $get_student_login->fetch();

$get_student = $bdd->query("SELECT * FROM tbl_students LEFT JOIN tbl_professions ON FKNoProfession=PKNoProfession WHERE email='" . $stu_login['email'] . "'");
$stu = $get_student->fetch();

$arrayValues = array(
	'f1' => $_POST['name'],
	'f2' => $_POST['firstname'],
	'f3' => $_POST['yearEntree'],
	'f4' => $_POST['yearSortie'],
	'f5' => $_POST['profession'],
	'f10' => $stu['PKNoStudent']
);

$query = "UPDATE tbl_students SET name = :f1 , firstname = :f2 , YearEntree = :f3 , YearSortie = :f4 , FKNoProfession = :f5 WHERE PKNoStudent = :f10";


// Mise a jour des informations du projet
if (isset($_POST['name'], $_POST['firstname'], $_POST['profession'])) {
	try {
		$req = $bdd->prepare($query);

		if ($req->execute($arrayValues) == true) {
			echo "MAJ" . $stu['PKNoStudent'];
		} else {
			echo "Error : " . $req->errorCode();
		}
	} catch (Exception $e) {
		echo "Error : " . $e->getMessage();
	}
}