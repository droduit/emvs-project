<?php
	require_once("../../conf/mysql.php");
	require('../imageLoader/conf.php');

	// Suppression des fichiers liés
	$get_files = $bdd->query("SELECT source FROM tbl_history_documents WHERE FKNoProjectHistory=".$_POST['id']);
	while ($file = $get_files->fetch()) {
		$files = str_replace('photo/','doc/',$upload_dir).$file['source'];
		if (file_exists($files)) { unlink($files); }	
	}
	
	// Suppression de l'enregistrement
	$query = $bdd->prepare('DELETE FROM tbl_projects_history WHERE PKNoProjectHistory=?');
	$query->bindParam(1, $_POST['id'], PDO::PARAM_INT);
	
	if ($query->execute()) {
	// Requete OK
		echo "true";
	} else {
	// Requete not OK
		echo "false";
	}