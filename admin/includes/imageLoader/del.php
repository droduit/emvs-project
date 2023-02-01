<?php
if (isset($_POST['filename'])) {
	require_once("../../conf/mysql.php");
	require_once('conf.php');
	
	// --- Suppresion dans la base de donnée
	if ($_POST['filetype']=="img") {
		$queryTxt = "DELETE FROM tbl_media_images WHERE URL=?";
	} else {
		$queryTxt = "DELETE FROM tbl_history_documents WHERE source=?";	
	}
	$query = $bdd->prepare($queryTxt);

	
	$query->bindParam(1, $_POST['filename'], PDO::PARAM_INT);
	
	if ($query->execute()) {
		$ret1 = true;
	} else {
		$ret1 = false;
	}
	
	if ($_POST['filetype']=="img") {
		// Suppression image original
		unlink($upload_dir."/".$_POST['filename']);
		
		// Suppression des miniatures
		foreach ($grandeurs_img as $gi) {
			if (unlink($upload_dir.$gi."/".$_POST['filename'])) { $ret2 = true; }
		}
	} else {
		unlink(str_replace('photo/','doc/',$upload_dir).$_POST['filename']);	
	}	
	

	
	// --- Retour
	if ($ret1) {
		echo "true";
	} else {
		echo "false";	
	}
	
	
}