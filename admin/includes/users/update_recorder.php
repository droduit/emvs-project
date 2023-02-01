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
	'f3' => $key,
	'f4' => $_POST['id']
);

try {
	$req = $bdd->prepare("
		UPDATE admin_login SET
		email = :f1 ,
		pass = :f2 ,
		key_crypte = :f3
		WHERE PKNoMembre = :f4");

	if ($req->execute($arrayValues) == true) {
		echo i("Informations enregistrées");
	} else {
		echo "Error : " . $req->errorCode();
	}
} catch (Exception $e) {
	echo i("Erreur") . " : " . $e->getMessage();
}