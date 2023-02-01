<?php
require( "../admin/plugins/ziplib/zip.lib.php" ) ; // librairie ZIP
require('../conf/common.php');

$zip = new zipfile () ; //on crée une instance zip

// liste des fichiers à compresser
$get_files = $bdd->query("SELECT * FROM tbl_history_documents WHERE FKNoProjectHistory=".$_POST['idHist']);
while ($file = $get_files->fetch()) {
	$files[] = '../media/doc/'.$file['source'];
}

$i = 0 ;
while ( count( $files ) > $i )   {

	$fo = fopen($files[$i],'r') ; //on ouvre le fichier
	$contenu = fread($fo, filesize($files[$i])) ; //on enregistre le contenu
	fclose($fo) ; //on ferme fichier
	
	$zip->addfile($contenu, str_replace('../media/doc/', '',$files[$i])) ; //on ajoute le fichier
	$i++; //on incrémente i

}

$archive = $zip->file() ; // on associe l'archive

/*
// on enregistre l'archive dans un fichier
$open = fopen( '../../../media/pdf/posters.zip' , "wb");
fwrite($open, $archive);
fclose($open);
*/

// code à insérer à la place des 3lignes ( fopen, fwrite, fclose )
header('Content-Type: application/x-zip') ; //on détermine les en-tête
header('Content-Disposition: inline; filename=monfichier.zip') ;

echo $archive;