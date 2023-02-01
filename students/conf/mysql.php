<?php
//=========================================================================================
//------------Configuration des paramètres de connexion a la base de donnée----------------
//=========================================================================================
function getConnexion() {
	global $bdd;
	if ($bdd == null) {
		$bdd = new PDO('mysql:host=localhost;dbname=emvs_projects', 'root', '');

		$bdd->exec("SET NAMES 'utf8'");
		$bdd->exec('SET character_set_connection=utf8');
		$bdd->exec('SET character_set_client=utf8');
		$bdd->exec('SET character_set_results=utf8');
	}
	return $bdd;
}
// Connexion a la base de donnée
$bdd = getConnexion();