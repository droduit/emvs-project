<?php
require_once('../../plugins/tcpdf/config/lang/fra.php');
require_once('../../plugins/tcpdf/tcpdf.php');


class Poster extends TCPDF {

	public $title_fr, $title_de, $banner, $stu, $teach, $room, $desc_fr, $desc_de, $img_p, $id;

	var $y_start_content;
	var $x_col1;
	var $w_col1;
	var $fontsize_col1;
	var $x_col2;
	var $w_col2;
	var $margin_right_col2;
	var $x_image;
	var $w_image;
	var $h_image;
	var $k_image;
	var $border;
	var $w_page;
	var	$h_page;
	var $space_after_desc_de;
	var $space_after_desc_fr;
	var $fontsize_desc;
	var $existImg;
	var $imgSize;
	var $QRCode_color;
	var $QRCode_background;
	var $profession;
	var $title_color;
	var $accentuations;

	// Définition des propriétés utiles a la création du Document, Paramètres propres au PDF
	function setProperties() {
		// Informations sur le document
		$this->SetCreator(PDF_CREATOR);
		$this->SetAuthor('EMVs Project');
		$this->SetTitle('Poster EMVs');
		$this->SetSubject('Poster');
		$this->SetKeywords('PDF, Poster, EMVs, Projects');

		// Police du Header et Footer
		$this->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// Définition des marges LEFT TOP RIGHT
		$this->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);

		$this->SetFooterMargin(PDF_MARGIN_FOOTER);

		// Sauts de page automatiques
		$this->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

		// Définition du facteur d'échelle pour les images
		$this->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// Langue
		$this->setLanguageArray($l);

		// Police du document
		$this->SetFont('verdana', '', 22);

		// Affichage adapté a la taille de l'ecran (ou du programme affichant le PDF) lors de l'ouverture du PDF
		$this->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
	}

	// Ajout d'une page
	function addPoster() {
		$this->w_page = 558.8; // Largeur
		$this->h_page = 400; // Hauteur
		$this->AddPage('L', array($this->w_page, $this->h_page));
	}

	// Initialisation et formatages des valeurs utiles a la création du contenu, données spécifique au contenu.
	function init($id, $title_fr, $title_de, $prof, $stu, $teach, $room, $desc_fr, $desc_de, $img_p) {
		// Pour l'accentuation, on définit les paramêtres locaux (FR)
		setlocale(LC_ALL, 'fr_FR');

		// Nom de fichier des bannières d'en-tête
		$banner_src = array('auto.svg', 'electro.svg', 'info.svg');
		// Couleur du QRCode
		$this->QRCode_color = array(array(239, 58, 61), array(0, 128, 0), array(76, 98, 173));
		// Couleur d'arrière plan du QRCode
		$this->QRCode_background = array(array(255, 229, 229), array(236, 255, 223), array(235, 240, 255));
		// Couleur du titre du projet
		$this->title_color = array('red', 'green', 'navy');

		// Définis les caractères accentués à remplacer pour la mise en Majuscule ou en minuscule
		$this->accentuations = array(
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

		$this->id = $id; // Clé primaire du projet
		$this->profession = $prof;
		$this->title_fr = $title_fr; // Titre du projet (Fr)
		$this->title_de = $title_de;
		$this->banner = '../../../media/pdf/img/' . $banner_src[$this->profession - 1];
		$this->stu = $stu;
		$this->teach = $teach;
		$this->room = $this->fullUpper($room);
		$this->desc_fr = html_entity_decode($desc_fr);
		if (strlen($this->desc_fr) < 1) {
			$this->desc_fr = " ";
		}
		$this->desc_de = html_entity_decode($desc_de);
		if (strlen($this->desc_de) < 1) {
			$this->desc_de = " ";
		}
		$this->existImg = false;

		if (!empty($img_p)) {
			$this->img_p = "../../../media/photo/" . $img_p;
		} else {
			$this->img_p = "../../../media/photo/no_img.jpg";
		}

		// Va chercher l'image dans tous les dossiers.
		// Si elle n'existe pas dans le dossier contenant l'image original, on prend celle de 400px de largeur,
		// sinon, celle de 270px, si aucune n'existe, on prend l'image no_img.jpg
		if (!file_exists($this->img_p)) {
			$this->existImg = false;
			$this->img_p = str_replace('photo/', 'photo/400/', $this->img_p);

			if (!file_exists($this->img_p)) {
				$this->existImg = false;

				$this->img_p = str_replace('photo/400/', 'photo/270/', $this->img_p);

				if (!file_exists($this->img_p)) {
					$this->existImg = false;
					$this->img_p = "../../../media/photo/no_img.jpg";
				} else {
					$this->existImg = true;
				}
			} else {
				$this->existImg = true;
			}
		} else {
			$this->existImg = true;
		}


		$this->setElementPosition();
	}

	function fullUpper($string) {
		return strtr(strtoupper($string), $this->accentuations);
	}

	function fullLower($string) {
		return strtr(strtolower($string), array_flip($this->accentuations));
	}

	function setElementPosition() {
		// Tous le contenu ----------------------------
		$this->y_start_content = 75; // Marge du contenu en dessous de la banniere (Informaticien, Automaticien, Electronicien)
		$this->border = 0; // Bordure des cellules

		// -- 1ère colonne ----------------------------
		$this->x_col1 = 15;	// Marge gauche
		$this->w_col1 = 74; // Largeur
		$this->fontsize_col1 = 24; // Taille de police

		// -- 2eme colonne ----------------------------
		$this->x_col2 = $this->x_col1 + $this->w_col1 + 3; // Marge gauche
		$this->w_col2 = 191; // Largeur
		$this->margin_right_col2 = 30; // Marge droite
		$this->space_after_desc_fr = 12; // Espace après la description fr
		$this->space_after_desc_de = 25; // Espace après la description de
		$this->fontsize_desc = 22;

		// -- Image du projet -------------------------
		$this->x_image = $this->x_col2 + $this->w_col2 + $this->margin_right_col2; // Position de l'image sur l'axe des x
		$this->w_image = 800; // Largeur de l'image


		// Proportions de l'images
		// [0] = largeur , [1] = hauteur
		$this->imgSize = getimagesize($this->img_p);

		// On récupère la hauteur que va faire l'image
		$this->k_image = $this->w_image / $this->imgSize[0]; // 230/largeur original
		$this->h_image = $this->imgSize[1] * $this->k_image; // hauteur original*facteur


		if ($this->h_image > 1014) {
			$this->h_image = 1014;

			$this->k_image = $this->h_image / $this->imgSize[1];
			if (($this->k_image * $this->imgSize[0]) > 800) {
				$this->w_image = 800;
			} else {
				$this->w_image = 0;
			}
		}
		// -------------------------------------------------------------------------------------------------------------------
		// -------------------------------------------------------------------------------------------------------------------	
	}

	function Header() {
		$this->ImageSVG($this->banner, $x = $this->x_col1, $y = 15, $w = '', $h = 48, '', '', '', 0, false);
		$this->y_start_content = 80;

		$this->setPageMark();
	}

	function Footer() {
	}

	function upperNameOnly($name) {
		// Si il y a qu'un seul nom
		if (strpos($name, ',') === false) {
			$prenom = $this->mb_ucfirst(substr($name, 0, strpos($name, ' '))); // Prénom formaté
			$nom = $this->fullUpper(substr($name, strpos($name, ' ') + 1, strlen($name))); // Nom formaté

			$name = $prenom . " " . $nom;
		}
		// Si il y a une suite de plusieurs noms
		else {
			// On fait un tableau avec chaque noms
			$all_teachers = explode(',', $name);
			$name = "";
			//On parcours le tableau des noms
			foreach ($all_teachers as $t) {
				$prenom = $this->mb_ucfirst(substr($t, 0, strpos($t, ' '))); // Prénom Formaté
				$nom = $this->fullUpper(substr($t, strpos($t, ' ') + 1, strlen($t))); // Nom Formaté

				$name .=  $prenom . " " . $nom . ", ";
			}
			$name = substr($name, 0, -2); // Suppression de la derniere virgule
		}
		return $name;
	}

	// Met la première lettre en majuscule et le reste en minuscule avec gestion de l'accentuation
	function mb_ucfirst($str) {
		$first_letter = $this->fullUpper(substr($str, 0, 1)); // La premiere lettre
		$str_end = substr($str, 1, strlen($str));

		$str = $first_letter . $str_end; // Combinaison des deux

		return $str;
	}

	// Description --------------------------
	function Content() {
		$title = $this->title_fr;
		// si le titre en francais est différent de celui en allemand (et si le titre allemand n'est pas vide), on affiche les deux
		if ($this->title_fr != $this->title_de && !empty($this->title_de)) {
			$title .= " / " . $this->title_de;
		}

		// ---------------------------------------------- Formattage des ElEVES ---------------------------
		// ---------------------------------------- Mise en majuscule des nom de famille ------------------
		$this->stu = $this->upperNameOnly($this->stu);

		// ---------------------------------------------- Formattage des ENSEIGNANTS ---------------------------
		// ---------------------------------------- Mise en majuscule des nom de famille ------------------
		$this->teach = $this->upperNameOnly($this->teach);

		// Contient la longeur de l'ensemble des descriptions
		$lengthDesc = strlen($this->desc_fr . $this->desc_de);

		// Définition de la taille de la police de caractère par rapport a la longeur des descriptions
		if ($lengthDesc <= 985) {
			$desc_size = 77;
		} else {
			$desc_size = 51;
			if ($lengthDesc > 990 && $lengthDesc <= 1090) {
				$desc_size = 76;
			}
			if ($lengthDesc > 1090 && $lengthDesc <= 1190) {
				$desc_size = 73;
			}
			if ($lengthDesc > 1190 && $lengthDesc <= 1290) {
				$desc_size = 71;
			}
			if ($lengthDesc > 1290 && $lengthDesc <= 1350) {
				$desc_size = 69;
			}
			if ($lengthDesc > 1350 && $lengthDesc <= 1450) {
				$desc_size = 66;
			}
			if ($lengthDesc > 1450 && $lengthDesc <= 1530) {
				$desc_size = 65;
			}
			if ($lengthDesc > 1530 && $lengthDesc <= 1630) {
				$desc_size = 64;
			}
			if ($lengthDesc > 1630 && $lengthDesc <= 1730) {
				$desc_size = 62;
			}
			if ($lengthDesc > 1730 && $lengthDesc <= 1830) {
				$desc_size = 61;
			}
			if ($lengthDesc > 1830 && $lengthDesc <= 1930) {
				$desc_size = 60;
			}
			if ($lengthDesc > 1930 && $lengthDesc <= 2030) {
				$desc_size = 58;
			}
			if ($lengthDesc > 2030 && $lengthDesc <= 2130) {
				$desc_size = 56;
			}
			if ($lengthDesc > 2130 && $lengthDesc <= 2230) {
				$desc_size = 55;
			}
			if ($lengthDesc > 2230 && $lengthDesc <= 2330) {
				$desc_size = 54;
			}
			if ($lengthDesc > 2330 && $lengthDesc <= 2430) {
				$desc_size = 53;
			}
			if ($lengthDesc > 2430 && $lengthDesc <= 2530) {
				$desc_size = 52;
			}
		}
		$desc_size .= "px";

		// Image
		$img = '"' . $this->img_p . '"';


		// Si la hauteur de l'image arrive jusqu'au QRCode, on l'aligne a droite, sinon au centre
		if ($this->h_image >= 950) {
			$alignement = 'style="text-align: right"';
		} else {
			$alignement = 'style="text-align: center"';
		}
		// Largeur d'image
		$this->w_image = '"' . $this->w_image . '"';
		// Si la hauteur de l'image est supérieur a 0px on l'ecrit en dur dans la balise img, sinon on ne prend en compte que la largeur pour garder les proportions
		if ($this->h_image > 0) {
			$this->h_image = 'height="' . $this->h_image . '"';
		} else {
			$this->h_image = "";
		}

		// Couleur du titre
		$title_color = $this->title_color[$this->profession - 1];

		// Contenu
		$html = <<<EOF
	<style>
		h1 {
			font-family: arial, sans-serif;
			font-size: 22pt;
			font-weight: normal;
		}
		.title {
			color: $title_color;
			font-family:arial, sans-serif;
			font-size: 48pt;	
			text-align: center;
			line-height: 2em;
			font-weight: bold;
		}

		table.test td {
			vertical-align:middle;
		}
		.desc, .other {
			font-family:arial, sans-serif;
			text-align:justify
		}
	</style>

	<div class="title"> $title </div>
	
	<table class="test">
	<tr>
	
		<td width="20"></td>
		
		<td width="944">
			
			<table class="test">
			<tr>
				<td width="250" cellspacing="155px"><h1>Description /<br><i>Beschreibung</i></h1></td>
				<td width="690" style="font-size: $desc_size"><div class="desc">$this->desc_fr </div> <div class="desc"><i>$this->desc_de </i></div><br></td>
			</tr>
			<tr>
				<td><h1>Responsable /<br><i>Verantwortlicher</i></h1></td>
				<td><p><div class="other">$this->teach</div></p></td>
			</tr>
			<tr>
				<td><h1>Apprenant /<br><i>Lehrlinge</i></h1></td>
				<td><p><div class="other" style="padding-top:25px">$this->stu </div></p></td>
			</tr>
			<tr>
				<td><h1>Salle /<br><i>Zimmer</i></h1></td>
				<td><div class="other">$this->room </div></td>
			</tr>
			</table>
		</td>
		
		<td width="60"></td>
		
		<td width="820" $alignement >
	
			<table>
				<tr><td $alignement ><img src=$img border="0" $this->h_image width=$this->w_image align="middle" /> </td></tr>
			</table>
			
		</td>
	
	</tr>
	</table>
EOF;

		$this->SetY(62);
		$this->SetX($this->x_col1 + 25);
		$this->writeHTML($html, true, false, true, false, '');
	}



	function QRCode() {
		// Style du QRCode
		$style = array(
			'border' => false,
			'padding' => 0,
			'fgcolor' => $this->QRCode_color[$this->profession - 1],
			'bgcolor' => $this->QRCode_background[$this->profession - 1]
		);

		// QRCode
		$this->rect($x = $this->w_page - 53 - 23.4, $y = $this->h_page - 71, $w = 53, $h = 53, 'F', null, array(255, 255, 255));
		$this->write2DBarcode('http://ep.labo-emvs.ch/?p=projects&id=' . $this->id, 'QRCODE,H', $x = $this->w_page - 50 - 23.4, $y = $this->h_page - 68, $w = 50, $h = 50, $style, 'N');
	}

	// ---------------------------------------------------------
}
// ==================================================================================================================================================================
// ==================================================================================================================================================================
// ==================================================================================================================================================================

// Supprime tous les slashes d'echappement des caractères
function stripslashes_recursive($input) {
	if (is_array($input)) {
		return array_map(__FUNCTION__, $input);
	} else {
		return stripslashes($input);
	}
}

// Remplacement des caractères de retour de chariot
$post = str_replace(array('###n###', '###r###'), array("\n", "\r"), 	$_POST['post']);

// Création d'un tableau a partir de la sérialisation
$data = unserialize($post);

// Suppression d'es slashes d'échappement
$data = stripslashes_recursive($data);


$title_fr = stripslashes_recursive($data['title_fr']);	// Titre FR
$title_de = stripslashes_recursive($data['title_de']);	// Titre DE
$prof = $data['prof'];			// ID de la Profession
$student = $data['student'];	// Apprentis (prenom2 nom2,prenom2 nom2)
$teacher = $data['teacher'];	// Professeurs (prenom2 nom2,prenom2 nom2)
$salle = $data['salle'];		// Salle
$desc_fr = stripslashes_recursive($data['desc_fr']);	// Description FR
$desc_de = stripslashes_recursive($data['desc_de']);	// Description DE
$img = $data['img'];			// Images de projets

$keys = array_keys($title_fr); // Contient un tableau avec les identifiants de projets



// Génération d'un PDF par projet
if ($data['multiPages'] == 0) {
	$i = 0;
	foreach ($keys as $id) {
		$pdf[$i] = new Poster('L', 'mm', array(558.8, 400), true, 'UTF-8', false);

		// Initialisation des valeurs
		$pdf[$i]->init($id, $title_fr[$id], $title_de[$id], $prof[$id], $student[$id], $teacher[$id], $salle[$id], $desc_fr[$id], $desc_de[$id], $img[$id]);

		// Création du document PDF
		$pdf[$i]->setProperties();
		$pdf[$i]->addPoster();

		// Contenu
		$pdf[$i]->Content();
		if ($data['showQR'] == 1) {
			$pdf[$i]->QRCode();
		}

		// Enregistrement du PDF
		$pdf[$i]->Output("../../../media/pdf/poster_" . $id . ".pdf", 'F');

		$i++;
	}
} else {
	// Création d'UN seul PDF avec plusieurs pages
	$pdf = new Poster('L', 'mm', array(558.8, 400), true, 'UTF-8', false);
	foreach ($keys as $id) {

		// Initialisation des valeurs
		$pdf->init($id, $title_fr[$id], $title_de[$id], $prof[$id], $student[$id], $teacher[$id], $salle[$id], $desc_fr[$id], $desc_de[$id], $img[$id]);

		// Création du document PDF
		$pdf->setProperties();
		$pdf->addPoster();

		// Contenu
		$pdf->Content();
		if ($data['showQR'] == 1) {
			$pdf->QRCode();
		}
	}
	// Enregistrement du PDF
	$pdf->Output("../../../media/pdf/posters.pdf", 'F');
}
// ==================================================================================================================================================================
// ==================================================================================================================================================================
// ==================================================================================================================================================================