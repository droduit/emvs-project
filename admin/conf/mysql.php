<?php
//=========================================================================================
//------------Configuration des paramètres de connexion a la base de donnée----------------
//=========================================================================================
$db_host = "localhost";
$db_name = "emvs_projects";
$db_user = "root";
$db_pass = "";

function getConnexion() {
	global $bdd, $db_host, $db_name, $db_user, $db_pass;
	if ($bdd == null) {
		$bdd = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . '', $db_user, $db_pass);

		$bdd->exec("SET NAMES 'utf8'");
		$bdd->exec('SET character_set_connection=utf8');
		$bdd->exec('SET character_set_client=utf8');
		$bdd->exec('SET character_set_results=utf8');
	}
	return $bdd;
}
// Connexion a la base de donnée
$bdd = getConnexion();