<?php
if (isset($_POST['id'])) {
	require_once("../../conf/mysql.php");

	$query = $bdd->prepare('DELETE FROM admin_login WHERE PKNoMembre=?');
	$query->bindParam(1, $_POST['id'], PDO::PARAM_INT);
	if ($query->execute()) {
		// Requete OK
		echo "true";
	} else {
		// Requete not OK
		echo "false";
	}
}