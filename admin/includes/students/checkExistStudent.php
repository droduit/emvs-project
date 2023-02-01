<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];
$_POST = array_secured($_POST);

// On vérifie si un élève du meme nom et du meme prenom existe déjà
$checkStudent = $bdd->query("SELECT *
							FROM tbl_students
							LEFT JOIN tbl_professions ON PKNoProfession = FKNoProfession
							WHERE concat( name, ' ', firstname ) = '" . $_POST['name'] . " " . $_POST['firstname'] . "'
							OR concat( name, ' ', firstname ) = '" . $_POST['firstname'] . " " . $_POST['name'] . "'
							LIMIT 1");

if ($checkStudent->rowCount() > 0) {
	$stu = $checkStudent->fetch();
	$existsStudent = "#name=" . $stu['name'] . "#firstname=" . $stu['firstname'] . "#profession=" . $stu['name_' . $_SESSION['language']];
} else {
	$existsStudent = "false";
}
echo $existsStudent;