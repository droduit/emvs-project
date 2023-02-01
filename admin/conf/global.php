<?php
// Ce document défini les constantes du programme
define("language", $_SESSION['language'] ?? "fr"); // Language par défaut du programme = fr

// Liste des languages implémentés dans le programme
$lang_list_names = [
	"fr" => "Francais",
	"de" => "Deutsch",
	"en" => "English",
	"it" => "Italiano",
	"es" => "Español",
	"du" => "Dutch"
];
$language_list = [];
$query = $bdd->query("SHOW COLUMNS FROM tbl_translations where `Key`!='PRI'");
while ($data = $query->fetch()) {
	$field = $data['Field'];
	$language_list[$field] = $lang_list_names[$field] ?? "";
}

// Intervales des différentes périodes, exemple : la 1ere période de troisieme année va de aout a mi-novembre.
$periodes_time = array(
	array(8, 11),
	array(12, 3),
	array(4, 7)
);