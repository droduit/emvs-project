<?php
setlocale(LC_CTYPE, 'fr_FR');

// Inclusion des fichiers requis avec controle de l'existance pour utilisation depuis différent emplacements---------------------------
$require_conf_files = array("mysql.php", "global.php");

foreach (multiInclusion($require_conf_files, "conf/") as $file) {
	require_once($file);
}

// Inclusion du fichier de configuration du chargement d'images
$require_imageLoader_files = array("conf.php");
foreach (multiInclusion($require_imageLoader_files, "includes/imageLoader/") as $file) {
	require_once($file);
}
// ------------------------------------------------------------------------------------------------------------------------------------


function multiInclusion($require_file_list = array(), $dir = "") {
	$niveau = 2; // Nombre de hierarchie de sous-dossier dans lesquels on met a disposition les includes

	$nFile = -2;
	$destOk = "";
	foreach ($require_file_list as $rfl) {
		for ($i = $nFile; $i <= $niveau; $i++) {
			if ($destOk == "") {
				if ($nFile > 0) {
					$dest = str_repeat('../', $nFile);
				} else {
					if ($nFile < 1) {
						$dest = str_repeat("../", abs($nFile)) . "admin/";
					} elseif ($nFile == -1) {
						$dest = "admin/";
					} else {
						$dest = "";
					}
				}
			}

			if ($destOk != "") {
				$dest = $destOk;
			}
			if (file_exists($dest . $dir . $rfl)) {
				$destOk = $dest;
				$fileList[] = $dest . $dir . $rfl;
			}

			$nFile++;
		}
		$nFile = 0;
	}
	return $fileList;
}

//===========================================================================================
//#DESCRIPTION---------------- FONCTIONS QUI CHECK LA CONNEXION -----------------------------
//===========================================================================================
function getNextId() {
	// Retourne la valeur de fin + 1
	global $bdd;

	$maxID = $bdd->query("SELECT MAX(PKNoMembre) as maxi from admin_login");
	$maxID2 = $maxID->fetch();
	$maxID2 = $maxID2['maxi'] + 1;
	$maxID->closeCursor();

	return $maxID;
}

function getID($id_crypte) {
	// Va vérifier si l'ID cryptée passée en paramètre correspond à une ID cryptée de la table membre.
	// Si une occurence est trouvée, l'ID non cryptée est retournée
	global $bdd;

	$id = 0;
	$slctMembres = $bdd->query(
		"SELECT PKNoMembre FROM admin_login
		WHERE SHA1(MD5(CONCAT(PKNoMembre, '--..--', email, '', key_crypte))) = '" . $id_crypte . "'
		ORDER BY PKNoMembre"
	);
	if ($slctMembres->rowCount() > 0) {
		$membre = $slctMembres->fetch();
		$id = $membre['PKNoMembre'];
	}
	$slctMembres->closeCursor();

	return $id;
}
function is_logged($session) {
	// Vérifie si la fonction existe ET si elle est valable.
	// Si les 2 conditions sont rempli, renvoie TRUE, sinon FALSE
	if (isset($_SESSION['login']) && getID($session) != 0) {
		return true;
	} else {
		return false;
	}
}

function expulse_if_not_logged($session) {
	// Force la déconnexion si la session n'est pas valable
	if (!is_logged($session)) {
		echo '<meta http-equiv="refresh" content="0; URL=?deconnexion" />';
	} else {
		return false;
	}
}
//===========================================================================================


//===========================================================================================
//#DESCRIPTION--------- FONCTIONS PERSONNALISEE AVEC DETECTION D'ERREURS --------------------
//===========================================================================================
function securise($variable) {
	// Définit le type de sécurité a appliquer aux données que l'on veux sécuriser
	$securite = addslashes(htmlspecialchars(trim($variable)));
	return $securite;
}
function get_ip() {
	if ($_SERVER['REMOTE_ADDR'] == "::1") {
		$ip = "localhost";
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function include_exists($url, $texte = "Cette page n'existe pas", $title = "Erreur 404") {
	if (file_exists($url)) {
		include_once($url);
	} else {
		echo '
		<h1 class="errorpage_title">' . i($title) . '</h1>
		<h2 class="errorpage_subtitle">' . i($texte) . '</h2>';
	}
}
function refresh($timer, $url) {
	echo '<script>$(function(){setTimeout(function(){ window.location="' . $url . '"; }, ' . $timer . '); });</script>';
}
function array_secured($array) {
	foreach ($array as $key => $value) {
		$secured_array[$key] = securise($value);
	}
	return $secured_array;
}
function getFilesDir($Directory, $path = 0, $exclude = "") {
	$return = [];
	$MyDirectory = opendir($Directory) or die('Erreur');
	while ($Entry = @readdir($MyDirectory)) {
		if (!is_dir($Directory . '/' . $Entry) && $Entry != '.' && $Entry != '..') {

			if ($exclude == "" || $exclude == str_replace('.', '', strstr($Entry, '.'))) {
				if ($path == 1) {
					$Entry = $Directory . $Entry;
				}
				$return[] = $Entry;
			}
		}
	}
	closedir($MyDirectory);
	return $return;
}
function format_bytes($a_bytes) {
	if ($a_bytes < 1024) {
		return $a_bytes . ' o';
	} elseif ($a_bytes < 1048576) {
		return round($a_bytes / 1024, 2) . ' Ko';
	} elseif ($a_bytes < 1073741824) {
		return round($a_bytes / 1048576, 2) . ' Mo';
	} elseif ($a_bytes < 1099511627776) {
		return round($a_bytes / 1073741824, 2) . ' Go';
	} elseif ($a_bytes < 1125899906842624) {
		return round($a_bytes / 1099511627776, 2) . ' To';
	} elseif ($a_bytes < 1152921504606846976) {
		return round($a_bytes / 1125899906842624, 2) . ' Po';
	} elseif ($a_bytes < 1180591620717411303424) {
		return round($a_bytes / 1152921504606846976, 2) . ' Eo';
	} elseif ($a_bytes < 1208925819614629174706176) {
		return round($a_bytes / 1180591620717411303424, 2) . ' Zo';
	} else {
		return round($a_bytes / 1208925819614629174706176, 2) . ' Yo';
	}
}

$accentuations = array(
	"à" => "À",
	"â" => "Â",
	"á" => "Á",
	"ä" => "Ä",
	"ç" => "Ç",
	"é" => "É",
	"è" => "È",
	"ê" => "Ê",
	"ë" => "Ë",
	"ì" => "Ì",
	"í" => "Í",
	"î" => "Î",
	"ï" => "Ï",
	"ó" => "Ó",
	"ò" => "Ò",
	"ô" => "Ô",
	"ö" => "Ö",
	"û" => "Û",
	"ù" => "Ù",
	"ú" => "Ú",
	"ü" => "Ü"
);

function fullUpper($string) {
	global $accentuations;
	return strtr(strtoupper($string), $accentuations);
}

function fullLower($chaine) {
	$chaine = mb_strtolower($chaine, 'UTF-8');
	return $chaine;
}

function no_accent($string) {
	return strtr(
		utf8_decode(fullLower($string)),
		utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'),
		'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'
	);
}

// Nettoyer une chaine pour l'attribuer a un fichier.
function filter($in) {
	$search = array('@[éèêëÊË]@i', '@[àâäÂÄ]@i', '@[îïÎÏ]@i', '@[ûùüÛÜ]@i', '@[ôöÔÖ]@i', '@[ç]@i', '@[ ]@i', '@[^a-zA-Z0-9._]@');
	$replace = array('e', 'a', 'i', 'u', 'o', 'c', '_', '');
	return preg_replace($search, $replace, $in);
}
function is_chrome() {
	return preg_match("/chrome/i", $_SERVER['HTTP_USER_AGENT']);
}
function is_ie() {
	return preg_match("/MSIE/i", $_SERVER['HTTP_USER_AGENT']);
}
//===========================================================================================

//===========================================================================================
//#DESCRIPTION------------ FONCTION OFFICIELLE DE TRADUCTION --------------------------------
//===========================================================================================
function i($word) {
	// Fonction officielle de traduction
	global $language;
	global $fr, $de, $en;
	global $bdd;

	$language = language == "" ? ($_SESSION['language'] ?? "fr") : language;

	// Si c'est une autre langue que le français, on va la traiter, sinon on ne change rien.
	if ($language == "fr") {
		return $word;
	}

	// Sélectionne le mot en langue etrangère
	$sql = "SELECT " . $language . " FROM tbl_translations WHERE fr='" . addslashes($word) . "' ORDER BY PKNoWord DESC LIMIT 1";
	$query = $bdd->query($sql);
	$data = $query->fetch();

	// Si le mot existe
	if ($query->rowCount() > 0) {
		if (!empty($data[$language])) {
			$word = $data[$language];
		} else {
			$word = "[fr]" . $word;
		}
	} else {
		// On va afficher comme quoi le mot n'est pas encore traduit
		$word = "[fr]" . $word;
	}
	return $word;
}
//===========================================================================================


//===========================================================================================
//#DESCRIPTION---------------------- FONCTION ENVOI D'IMAGES --------------------------------
//===========================================================================================
function ImagesDirectories($selection = "", $event_click = "") {
	// Retourne tous les répertoires d'images
	global $bdd;
	global $language;

	if (language == "") {
		$language = !isset($_SESSION['language']) ? "fr" : $_SESSION['language'];
	} else {
		$language = language;
	}
	$query = $bdd->query("SELECT * FROM tbl_media_dossiers ORDER BY PKNoMediaDossier DESC");

	$content = "";
	while ($dir = $query->fetch()) {
		$content .= '<div class="dossier" onclick="loadInto(\'imageArea\', \'includes/imageLoader/imgFromDirectory.php\', \'id_directory=' . $dir['PKNoMediaDossier'] . '&selection=' . $selection . '&event_click=' . addslashes($event_click) . '&language=' . $language . '\');">' . $dir['Nom'] . '</div>';
	}
	echo $content;
}
function ImagesFromDirectory($Directory, $selection = "", $event_click = "", $type = "img", $loader = 1, $sous_jacent = 1) {
	// Affiche les images du répertoire virtuel spécifié
	global $bdd, $images_dir;

	// Sélection de toutes les images du dossier choisi
	$query = $bdd->query(
		$type == "img" ?
			"SELECT * FROM tbl_media_images WHERE FKNoMediaDossier='" . $Directory . "' ORDER BY date DESC, PKNoMediaImage DESC" :
			"SELECT * FROM tbl_history_documents WHERE FKNoProjectHistory=" . $Directory
	);

	// On autorise ou non l'affichage du bouton d'upload
	if ($loader == 1) {
		$content = doUploadForm($Directory, $selection, $type, $event_click);
	}

	$content .= ($type == "img") ? '<div class="images">' : '<div class="documents">';

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

		$content .= $type == "img" ?
			'<div class="wrapCovImg">' .
			'<div class="' . $class . ' wrapwrap"' .
			'PK="' . $image['PKNoMediaImage'] . '"' .
			'url="' . $image['URL'] . '"' .
			'style="background:url(' . $images_dir . '270/' . $image['URL'] . ') 50% 50% no-repeat; background-size: cover"' .
			'onclick="' . $event_click . '"></div>' .

			'<div class="delFile">X</div>' .
			'</div>' :
			'<div class="document wrapwrap" url="' . $image['source'] . '">' .
			'<span onclick="window.location=\'' . str_replace('photo/', 'doc/', $images_dir) . $image['source'] . '\'">' . str_replace(strrchr($image['source'], '.'), '', $image['nom']) . '</span>' .
			'<div class="delFile">X</div>' .
			'<div class="editFile" onclick="openWindow(\'includes/imageLoader/updDocument.php\', \'idDoc=' . $image['PKNoProjectDocument'] . '&language=' . $_SESSION['language'] . '&idHist=' . $Directory . '\', \'400\', \'' . i("Edition des fichiers liés") . '\')">' . i("Editer") . '</div>' .
			'<div class="ext">' . strrchr($image['source'], '.') . '</div>' .
			'<div class="size">' . $image['size'] . '</div>' .
			'<div style="clear:both"></div>' .
			'</div>';
	}

	$content .= '</div>';

	$content .= '<div style="clear:both"></div>';

	// On autorise ou non l'affichage de la navigation pour choisir des images dans d'autres dossier
	if ($type == "img") {
		if ($sous_jacent == 1) {
			$content .= '<div class="AreaBackToDirectories">';
			$content .= '<div class="backToDirectories" onclick="loadInto(\'imageArea\', \'includes/imageLoader/imgDirectories.php\', \'selection=' . $selection . '&event_click=' . addslashes($event_click) . '\');">&laquo; ' . i("Tous les dossiers") . '</div>';
			$content .= '</div>';
		}
	}

	// On créer la fenetre de suppression cachée 
	$content .=	'<div id="dialog-file-confirm" title="' . i("Confirmer la suppression") . '" style="display:none">' .
		'<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><p><b>' . i("Ce fichier va être éffacé") . '.</b></p><br>' . i("Voulez-vous poursuivre") . ' ?</p>' .
		'</div>';

	echo $content;
}

function doUploadForm($virtual_directory, $selection = "", $type = "img", $event_click = "") {

	// Affiche le bouton de chargement d'images
	if ($type == "img") {
		$texte = i("Charger une image");
		$extentions = "jpg,jpeg,gif,png";
		$filter_title = i("Images");
	} else {
		$texte = i("Charger des fichiers");
		$extentions = "*";
		$filter_title = i("Tous type de documents");
	}

	echo '<div class="ArealoadUploadForm">';
	echo '<div class="btloadUploadForm" onclick="openWindow(\'includes/imageLoader/index.php\',\'FKNoDossier=' . $virtual_directory . '&selection=' . $selection . '&event_click=' . addslashes($event_click) . '&list_ext=' . $extentions . '&filter_title=' . $filter_title . '&language=' . $_SESSION['language'] . '\',\'\',\'Image loader\');">' . $texte . '</div>';
	echo '</div>';
}
function getImgDirectory($subject) {
	// Controle des dossiers d'images : un dossier par année pour les images de chaque type différent (eleves, projets...), si le dossier n'existe pas, on le créé
	// Retourne le dossier créé ou déjà existant

	global $bdd;

	// Sélection des dossier ou le nom comporte l'année en cours (sous forme 2012 ou 12)
	$queryCheckDir =
		"SELECT * FROM tbl_media_dossiers
		WHERE Nom like '%" . $subject . "%' AND (Nom like '%" . date('Y') . "%' or Nom like '%" . substr(date('Y'), -2) . "%')";
	$get_dir = $bdd->query($queryCheckDir);

	// Si on ne trouve pas de nom de dossier qui comportent l'année en cours - Création  
	if ($get_dir->rowCount() < 1) {
		$bdd->exec("INSERT INTO tbl_media_dossiers VALUES(NULL, '" . $subject . " [" . date('Y') . "]')");
		$get_dir = $bdd->query($queryCheckDir);

?><script>
$(function() {
    notify(
        '<?= "<p><b>" . i("Nouveau dossier d\'image") . "</b></p><br> " . $subject . " [" . date('Y') . "]" ?>'
        );
});
</script><?php
				}

				// Tableau contenant les informations soit sur le dossier qui existait déjà soit sur celui qui a été créé
				$dir = $get_dir->fetch();

				// Si l'année actuelle n'est pas celle de la création du projet on prend le premier identifiant
				$dirNo = $dir['PKNoMediaDossier'];

				return $dirNo;
			}
			function getImg($id, $size = "270") {
				// Passer l'ID d'une image et la fonction renvoye l'URL de celle-ci
				global $bdd, $images_dir;

				if ($id != "" && $id != null) {
					$get_img = $bdd->query("SELECT URL FROM tbl_media_images WHERE PKNoMediaImage=" . $id);
					$img = $get_img->fetch();
					return getImgFromURL($img['URL'], $size);
				} else {
					return "false";
				}
			}
			function getLastImgProject($idProj, $type = "last") {
				global $bdd;
				$order = ($type == "last") ? "DESC" : "ASC";
				$get_img = $bdd->query("SELECT URL FROM tbl_projects_history LEFT JOIN tbl_media_images ON FKNoMediaImage=PKNoMediaImage WHERE FKNoProject=" . $idProj . " AND FKNoMediaImage IS NOT NULL ORDER BY year " . $order . ", FKNoPeriode " . $order . " LIMIT 1");

				if ($get_img->rowCount() > 0) {
					$img = $get_img->fetch();
					return $img['URL'];
				} else {
					return null;
				}
			}
			function getImgFromURL($url, $size = 270) {
				global $images_dir;
				return $images_dir . $size . "/" . $url;
			}
			//===========================================================================================

			// ======== Fonctions pour obtenir des informations par rapport aux projets =================
			function getFirstProjectDate($type = "MIN") {
				// Sélection de la date la plus ancienne des projets
				global $bdd;

				$get_first_year = $bdd->query("SELECT " . $type . "(year) as year FROM tbl_projects_history");
				$data_first_year = $get_first_year->fetch();

				return $data_first_year['year'];
			}
			// ==========================================================================================

			function getLastId($table) {
				global $bdd;

				$get_first_field = $bdd->query("SHOW COLUMNS FROM " . $table . " where `Key`='PRI'");
				$first_field = $get_first_field->fetch();

				$get_id = $bdd->query("SELECT max(" . $first_field['Field'] . ") as max FROM " . $table);
				$id = $get_id->fetch();

				return $id['max'];
			}

			function get_parm($name) {
				// Retourne la valeur d'un parametre
				global $bdd;
				$get_parm = $bdd->query("SELECT value FROM admin_config WHERE name='" . $name . "' LIMIT 1");
				$parm = $get_parm->fetch();
				return $parm['value'] ?? "";
			}

			function getProjPeriode() {
				// Retourne la période en cours
				global $periodes_time;
				$perEnCours = 0;
				foreach ($periodes_time as $perT) {
					if (date('m') < $perT[0] || date('m') > $perT[1]) {
						$perEnCours++;
					}
				}
				// Jusque là la periode correspond a l'index dans le tableau, comme il commence à 0, on décalle d'une case
				return $perEnCours + 1;
			}