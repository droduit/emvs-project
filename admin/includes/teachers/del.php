<?php
if (isset($_POST['id'])) {
	require_once("../../conf/mysql.php");

	$query = $bdd->prepare('DELETE FROM tbl_teachers WHERE PKNoTeacher=?');
	$query->bindParam(1, $_POST['id'], PDO::PARAM_INT);
	if ($query->execute()) {
		// Requete OK
		echo "true";
	} else {
		// Requete not OK
		echo "false";
	}
}