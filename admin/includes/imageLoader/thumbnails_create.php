<?php
require_once('conf.php');

@set_time_limit(30 * 60);

$grandeurs_img = array_reverse($grandeurs_img);
$directory_src = $_POST['dossier'];

$fileName = explode(',', $_POST['arrayImage']);

// Si on a au moins un fichier a redimensionner
if (count($fileName)>0) {
	// =========================================================================
	// =================== Génération des miniatures de l'image ================
	// =========================================================================
	require_once("../../plugins/plupload/edit/resize.php"); // Redimensionnement physique

	$img = array();

	// On passe en revue un fichié après l'autre
	foreach ($fileName as $file) {
		
		$position = 0;
		
		// On génère plusieurs miniatures pour l'image en cours
		foreach ($grandeurs_img as $gr_i) { 
			// Pour la première taille généré, le dossier source sera celui de l'image original
			if ($position!=0) {
				$img['directory_src'] = $directory_src.$grandeurs_img[$position-1]."/";
				$img['directory_dest'] =  "../".$gr_i;
			} else {
				$img['directory_src'] = $directory_src;
				$img['directory_dest'] = $gr_i;
			}
			
			// Génération de la miniature
			$thumb=new thumbnail($img['directory_src'].$file);	
			$thumb->setAutoSize($gr_i);
			$thumb->save($img['directory_dest']);
			
			$position++;
		}
	
	}	
		
} else {
	echo '<h3>Aucune image pour le moment</h3>';	
}