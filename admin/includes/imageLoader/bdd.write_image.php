<?php
require_once("../../conf/common.php");
$_SESSION['language']=$_POST['language'];

$fileName = explode(',',$_POST['arrayImage']);

if ($_POST['FKNoMediaDossier']=="NULL") { $dossier = "NULL"; } else { $dossier = $_POST['FKNoMediaDossier']; }
$arrayValues = array(
	'f1' => $dossier
);

// =========================================================================
// =================== Inscription dans la base de donnée ==================
// =========================================================================

if ($_POST['type']=="doc") {
	// Inscription des documents
	$names = explode(',',$_POST['nom']);
	$idoc=0;
	foreach ($fileName as $fn) {
		$ext = strstr($fn, '.');
		$name = securise(substr($names[$idoc],0, strpos($names[$idoc],'.')));
		$source = filter($name).$ext;
		
		// Renommage physique du fichier
		rename('../../../media/doc/'.$fn, '../../../media/doc/'.$source);
		
		$size = format_bytes(filesize("../../".str_replace('photo','doc',$images_dir).$source));
		
		$prep = $bdd->prepare("INSERT INTO tbl_history_documents VALUES(
			NULL,?,?,?,?,NULL,?,?
		)");
		
		$prep->execute(array(
			$source,
			$name,
			$ext,
			$size,
			$_POST['FKNoMediaDossier'],
			$_POST['id']
		));
			
		$idoc++;
	}
} else {
	// Inscription des images
	foreach ($fileName as $fn) {
		echo $fn;
		
		$exist = $bdd->query("SELECT * FROM tbl_media_images WHERE URL='".$fn."'");
		if ($exist->rowCount()<1) {		
				try {
					$req = $bdd->prepare("INSERT INTO tbl_media_images VALUES(NULL, '".$fn."', now(), :f1)");
					
					if ($req->execute($arrayValues) == true) {
						echo ' - Ok';
					} else {
						echo " - Error : ".$req->errorCode();
					}
				} catch(Exception $e) {
					echo " - ".i("Erreur")." : ".$e->getMessage();
				}	
				
		} else {
			echo ' - Existe deja';	
		}
		
		echo "\n";
	}
}