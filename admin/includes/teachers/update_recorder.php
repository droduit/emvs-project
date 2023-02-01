<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];
$_POST = array_secured($_POST);

$arrayValues = array(
	'f1' => $_POST['name'],
	'f2' => $_POST['firstname'],
	'f3' => $_POST['mail']
);

if (isset($_POST['id'])) {
	$arrayValues['f10'] = $_POST['id'];
	$query = "UPDATE tbl_teachers SET name = :f1 , firstname = :f2 , email = :f3 WHERE PKNoTeacher = :f10";
} else {
	$query = "INSERT INTO tbl_teachers VALUES(NULL, :f1, :f2, :f3, NULL)";
}

// Mise a jour des informations du projet
if (isset($_POST['name'], $_POST['firstname'])) {

	try {
		$req = $bdd->prepare($query);

		if ($req->execute($arrayValues) == true) {

			// Sélection du dernier ID enregistré pour les élèves
			$get_last_id = $bdd->query("SELECT MAX(PKNoTeacher) as max FROM tbl_teachers");
			$last_id = $get_last_id->fetch();
			$id = $last_id['max'];
			echo $id;
		} else {
			echo "Error : " . $req->errorCode();
		}
	} catch (Exception $e) {
		echo "Error : " . $e->getMessage();
	}
}