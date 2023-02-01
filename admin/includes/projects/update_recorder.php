<?php
require_once("../../conf/common.php");
$_SESSION['language']=$_POST['language'];
	
$_POST = array_secured($_POST);

// Mise a jour des informations du projet
if (isset($_POST['title_fr'], $_POST['title_de'])) {

	try {
		
		$req = $bdd->prepare("
		UPDATE tbl_projects SET
		title_fr = :f1 ,
		title_de = :f2
		WHERE PKNoProject = :f7");
		
		if ($req->execute(
		array(
			'f1' => $_POST['title_fr'],
			'f2' => $_POST['title_de'],
			'f7' => $_POST['id']
		)) == true) {
			echo "true";
		} else {
			echo $req->errorCode();
		}
	} catch(Exception $e) {
		echo i("Erreur")." : ".$e->getMessage();
	}	
}