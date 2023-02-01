<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];
$_POST = array_secured($_POST);

$key = sha1('--.' . $_POST['pass'] . '.--');
$pass = sha1(md5($_POST['id'] . '--..--' . $_POST['email'] . $key));

// Mise a jour des informations 
$arrayValues = array(
	'f1' => $_POST['email'],
	'f2' => $pass,
	'f3' => $key
);

try {
	$req = $bdd->prepare("INSERT INTO admin_login VALUES(NULL,:f1,:f2,:f3)");

	if ($req->execute($arrayValues) == true) {
		echo i("Informations enregistrées");
	} else {
		echo "Error : " . $req->errorCode();
	}
} catch (Exception $e) {
	echo i("Erreur") . " : " . $e->getMessage();
}