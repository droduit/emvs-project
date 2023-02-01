<?php
if (isset($_POST['id'])) {
	require_once("../../conf/mysql.php");
	require('../imageLoader/conf.php');
	
	if ($_POST['type']=="del") {
		// Suppression des fichiers liés
		$get_files = $bdd->query("SELECT source FROM tbl_history_documents WHERE FKNoProject=".$_POST['id']);
		while ($file = $get_files->fetch()) {
			$files = str_replace('photo/','doc/',$upload_dir).$file['source'];
			if (file_exists($files)) { unlink($files); }	
		}
	
		$query = $bdd->prepare('DELETE FROM tbl_projects WHERE PKNoProject=?');
		$query->bindParam(1, $_POST['id'], PDO::PARAM_INT);
		
		
		$qrcode = '../../../media/qrcode/projects_detail_'.$_POST['id'].'.png';
		if (file_exists($qrcode)) {
			unlink($qrcode);	
		}
		
		if ($query->execute()) {
		// Requete OK
			echo "true";
		} else {
		// Requete not OK
			echo "false";
		}
	} else {
		$res_arch = 1;
		if ($_POST['action']=="1") { 
			$res_arch = "NULL";
		}
		$bdd->exec("UPDATE tbl_projects SET archive=".$res_arch." WHERE PKNoProject=".$_POST['id']);
		echo "true";	
	}
}