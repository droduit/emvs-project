<?php
require_once("conf.php");

//===========================================================================================
//#DESCRIPTION---------------------- FONCTION ENVOI D'IMAGES --------------------------------
//===========================================================================================
function ImagesDirectories($selection = "", $event_click = "") {
	// Retourne tous les répertoires d'images
	global $bdd;

	$query = $bdd->query("SELECT * FROM tbl_media_dossiers ORDER BY PKNoMediaDossier DESC");


	while ($dir = $query->fetch()) {
		$content .= '<div class="dossier" onclick="loadInto(\'imageArea\', \'includes/imageLoader/imgFromDirectory.php\', \'id_directory=' . $dir['PKNoMediaDossier'] . '&selection=' . $selection . '&event_click=' . addslashes($event_click) . '\');">' . $dir['Nom'] . '</div>';
	}
	echo $content;
}
function ImagesFromDirectory($Directory, $selection = "", $event_click = "", $loader = 1, $sous_jacent = 1) {
	// Affiche les images du répertoire virtuel spécifié
	global $bdd, $images_dir;

	// Sélection de toutes les images du dossier choisi
	$query = $bdd->query("SELECT * FROM tbl_media_images WHERE FKNoMediaDossier='" . $Directory . "' ORDER BY date DESC, PKNoMediaImage DESC");

	// On autorise ou non l'affichage du bouton d'upload
	if ($loader == 1) {
		$content = doUploadForm($Directory, $selection, $event_click);
	}

	$content .= '<div class="images">';

	// S'il n'y a pas d'image uploadé dans ce dossier
	if ($query->rowCount() < 1) {
		$content .= "<div align='center' class=\"noImage\">" . i("Aucun fichier chargé") . "</div>";
	}

	// Affichage des images
	while ($image = $query->fetch()) {

		$class = "coveredImg";

		// Si le numero de la sélection correspond a l'ID de l'image en cours => Selectionne
		if ($selection == $image['PKNoMediaImage']) {
			$class .= " selected";
		}

		// S'il y a plus que 12 images a afficher, les trois colonnes d'images seront trop grandes pour la zone, on leur ajoute donc une class qui les affichent plus petites
		if ($query->rowCount() > 12) {
			$class .= " _16";
		}

		$content .= '<div class="wrapCovImg">' .
			'<div class="' . $class . ' wrapwrap" PK="' . $image['PKNoMediaImage'] . '" url="' . $image['URL'] . '" style="background:url(' . $images_dir . '270/' . $image['URL'] . ') 50% 50% no-repeat; background-size: cover" onclick="' . $event_click . '"></div>' .
			'<div class="delFile">X</div></div>';
	}

	$content .= '</div>';

	$content .= '<div style="clear:both"></div>';

	// On autorise ou non l'affichage de la navigation pour choisir des images dans d'autres dossier
	if ($sous_jacent == 1) {
		$content .= '<div class="AreaBackToDirectories">';
		$content .= '<div class="backToDirectories" onclick="loadInto(\'imageArea\', \'includes/imageLoader/imgDirectories.php\', \'selection=' . $selection . '&event_click=' . addslashes($event_click) . '\');">&laquo; ' . i("Tous les dossiers") . '</div>';
		$content .= '</div>';
	}

	// On créer la fenetre de suppression cachée 
	$content .=	'<div id="dialog-file-confirm" title="' . i("Confirmer la suppression") . '" style="display:none">' .
		'<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><p><b>' . i("Ce fichier va être éffacé") . '.</b></p><br>' . i("Voulez-vous poursuivre") . ' ?</p>' .
		'</div>';

	echo $content;
}

function doUploadForm($virtual_directory, $selection = "", $event_click = "") {
	// Affiche le bouton de chargement d'images
	$texte = i("Charger une image");
	$extentions = "jpg,gif,png";
	$filter_title = i("Images");

	echo '<div class="ArealoadUploadForm">';
	echo '<div class="btloadUploadForm" onclick="openWindow(\'includes/imageLoader/index.php\',\'FKNoDossier=' . $virtual_directory . '&selection=' . $selection . '&event_click=' . addslashes($event_click) . '&list_ext=' . $extentions . '&filter_title=' . $filter_title . '\',\'\',\'Image loader\');">' . $texte . '</div>';
	echo '</div>';
}
function getImgDirectory($subject) {
	// Controle des dossiers d'images : un dossier par année pour les images de chaque type différent (eleves, projets...), si le dossier n'existe pas, on le créé
	// Retourne le dossier créé ou déjà existant

	global $bdd;

	// Sélection des dossier ou le nom comporte l'année en cours (sous forme 2012 ou 12)
	$queryCheckDir = "SELECT * FROM tbl_media_dossiers WHERE Nom like '%" . $subject . "%' AND (Nom like '%" . date('Y') . "%' or Nom like '%" . substr(date('Y'), -2) . "%')";
	$get_dir = $bdd->query($queryCheckDir);

	// Si on ne trouve pas de nom de dossier qui comportent l'année en cours - Création  
	if ($get_dir->rowCount() < 1) {
		$bdd->exec("INSERT INTO tbl_media_dossiers VALUES(NULL, '" . $subject . " [" . date('Y') . "]')");
		$get_dir = $bdd->query($queryCheckDir);

?><script>
$(function() {
    notify(
        '<?= "<p><b>" . i("Nouveau dossier d\'image") . "</b></p><br> " . $subject . " [" . date('Y') . "]"; ?>');
});
</script><?php
				}

				// Tableau contenant les informations soit sur le dossier qui existait déjà soit sur celui qui a été créé
				$dir = $get_dir->fetch();

				// Si l'année actuelle n'est pas celle de la création du projet on prend le premier identifiant
				$dirNo = $dir['PKNoMediaDossier'];

				return $dirNo;
			}
			function getImg($id) {
				// Passer l'ID d'une image et la fonction renvoye l'URL de celle-ci
				global $bdd, $images_dir;
				$get_img = $bdd->query("SELECT URL FROM tbl_media_images WHERE PKNoMediaImage=" . $id);
				$img = $get_img->fetch();
				return $images_dir . $img['URL'];
			}
//===========================================================================================