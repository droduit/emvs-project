<?php
if (isset($_POST['filenames'])) {
	require_once("../../../conf/mysql.php");
	require_once('../../imageLoader/conf.php');

	$files = substr($_POST['filenames'], 0, -1);
	$files = explode(',', $files);

	foreach ($files as $file) {
		// --- Suppresion dans la base de donnée
		$queryTxt = "DELETE FROM tbl_media_images WHERE URL=?";
		$query = $bdd->prepare($queryTxt);


		$query->bindParam(1, $file, PDO::PARAM_INT);

		$query->execute();
	}

	foreach ($files as $file) {
		// Suppression image original
		unlink("../" . $upload_dir . $file);

		// Suppression des miniatures
		foreach ($grandeurs_img as $gi) {
			if (unlink("../" . $upload_dir . $gi . "/" . $file)) {
				$ret2 = true;
			}
		}
	}
}