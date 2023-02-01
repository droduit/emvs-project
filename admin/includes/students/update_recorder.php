<?php
require_once("../../conf/common.php");
$_SESSION['language']=$_POST['language'];
$_POST = array_secured($_POST);

if ($_POST['yearEntree']=="NULL") { $_POST['yearEntree']=NULL; }
if ($_POST['yearSortie']=="NULL") { $_POST['yearSortie']=NULL; }


$arrayValues = array(
				'f1' => $_POST['name'],
				'f2' => $_POST['firstname'],
				'f3' => $_POST['mail'],
				'f4' => $_POST['yearEntree'],
				'f5' => $_POST['yearSortie'],
				'f6' => $_POST['profession']
				);
		
if (isset($_POST['id'])) {
	$arrayValues['f10'] = $_POST['id'];
	$query = "UPDATE tbl_students SET name = :f1 , firstname = :f2 , email = :f3, YearEntree = :f4 , YearSortie = :f5 , FKNoProfession = :f6 WHERE PKNoStudent = :f10";
} else {
	$query = "INSERT INTO tbl_students VALUES(NULL, :f1, :f2, :f3, :f4, :f5, NULL, :f6)";
}

// Mise a jour des informations du projet
if (isset($_POST['name'], $_POST['firstname'], $_POST['profession'])) {

	try {
		$req = $bdd->prepare($query);
		
		if ($req->execute($arrayValues) == true) {
			
			// Sélection du dernier ID enregistré pour les élèves
			$get_last_id = $bdd->query("SELECT MAX(PKNoStudent) as max FROM tbl_students");
			$last_id = $get_last_id->fetch();
			$id = $last_id['max'];	
			
			echo $id;
		} else {
			echo "Error : ".$req->errorCode();
		}
	} catch(Exception $e) {
		echo "Error : ".$e->getMessage();
	}	
}