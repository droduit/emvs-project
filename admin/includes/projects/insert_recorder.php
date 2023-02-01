<?php
require_once("../../conf/common.php");
$_SESSION['language']=$_POST['language'];

// Mise a jour des informations du projet
if (isset($_POST['title_fr'], $_POST['title_de'])) {

	try {
		
		$req = $bdd->prepare("INSERT INTO tbl_projects VALUES(NULL,?,?,NULL)");
		
		if ($req->execute(
		array(
			addslashes($_POST['title_fr']),
			addslashes($_POST['title_de'])
		)) == true) {
			
			// Génération d'un qrcode
			include "../../plugins/qrcode/qrlib.php";  
			$PNG_TEMP_DIR = "../../../media/qrcode/";
			$filename = $PNG_TEMP_DIR.'projects_detail_'.getLastId("tbl_projects").'.png';
			QRcode::png('http://labo-emvs.ch/?p=projects&id='.getLastId("tbl_projects"), $filename, "H", 2, 2); 
			  
			 echo getLastId("tbl_projects");
		} else {
			echo "Error : ".$req->errorCode();
		}
	} catch(Exception $e) {
		echo "Error : ".$e->getMessage();
	}	
}