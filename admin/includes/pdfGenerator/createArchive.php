<?php
require( "../../plugins/ziplib/zip.lib.php" ) ; // librairie ZIP
require('../../conf/common.php');

ini_set('memory_limit','500M');

$zip = new zipfile () ; //on crée une instance zip

// liste des fichiers à compresser
$files = getFilesDir('../../../media/pdf/', 1, 'pdf') ;


$i = 0 ;
while ( count( $files ) > $i )   {

	$fo = fopen($files[$i],'r') ; //on ouvre le fichier
	$contenu = fread($fo, filesize($files[$i])) ; //on enregistre le contenu
	fclose($fo) ; //on ferme fichier
	
	$zip->addfile($contenu, str_replace('../../../media/pdf/', '',$files[$i])) ; //on ajoute le fichier
	$i++; //on incrémente i

}

$archive = $zip->file() ; // on associe l'archive

// on enregistre l'archive dans un fichier
$open = fopen( '../../../media/pdf/posters.zip' , "wb");
fwrite($open, $archive);
fclose($open);