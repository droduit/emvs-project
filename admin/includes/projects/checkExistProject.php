<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];
$_POST = array_secured($_POST);

// On vérifie si un élève du meme nom et du meme prenom existe déjà
$checkStudent = $bdd->query("SELECT *
							FROM tbl_projects
							WHERE substring(title_fr,1,10) like '" . substr($_POST['title_fr'], 0, 10) . "%' OR substring(title_de,1,10) like '" . substr($_POST['title_de'], 0, 10) . "%' LIMIT 1");

if ($checkStudent->rowCount() > 0) {
	$stu = $checkStudent->fetch();
	$existsStudent = "#name=" . stripslashes($stu['title_' . $_SESSION['language']]) . "#id=" . $stu['PKNoProject'];
} else {
	$existsStudent = "false";
}
echo $existsStudent;