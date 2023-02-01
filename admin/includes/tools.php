<?php
global $bdd;
global $language_list;

if (!isset($_GET['o'])) {
	$o = "db";
} else {
	// Si la variable o existe
	$o = addslashes(str_replace("'", "", $_GET['o']));
}

if (file_exists('includes/tools/' . $o . '.php')) {
	include_once('tools/' . $o . '.php');
} else {
	include_once('tools/db.php');
}