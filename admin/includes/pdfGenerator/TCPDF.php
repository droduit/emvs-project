<?php

/**
 * @author Dominique Roduit
 */

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

		$this->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
	}

	function addPoster() {
		$this->w_page = 558.8; // Largeur
		$this->h_page = 400; // Hauteur
		$this->AddPage('L', array($this->w_page, $this->h_page));
	}

	function init($id, $title_fr, $title_de, $prof, $stu, $teach, $room, $desc_fr, $desc_de, $img_p) {
		setlocale(LC_ALL, 'fr_FR');

		$banner_src = array('auto.svg', 'electro.svg', 'info.svg');
		$this->QRCode_color = array(array(239, 58, 61), array(0, 128, 0), array(76, 98, 173));
		$this->QRCode_background = array(array(255, 229, 229), array(236, 255, 223), array(235, 240, 255));
		$this->title_color = array('red', 'green', 'navy');

		$this->id = $id; // Clé primaire du projet
		$this->profession = $prof;
		$this->title_fr = $title_fr; // Titre du projet (Fr)
		$this->title_de = $title_de;
		$this->banner = '../../../media/pdf/img/' . $banner_src[$this->profession - 1];
		$this->stu = $stu;
		$this->teach = $teach;
		$this->room = strtoupper($room);
		$this->desc_fr = html_entity_decode($desc_fr);
		$this->desc_de = html_entity_decode($desc_de);

		if ($img_p != "false") {
			$this->img_p = $img_p;
		} else {
			$this->img_p = "no_img.jpg";
		}
		$this->img_p = "../../../media/photo/" . $this->img_p;

		if (!file_exists($this->img_p)) {
			$this->existImg = false;
			$this->img_p = str_replace('photo/', 'photo/400/', $this->img_p);

			if (!file_exists($this->img_p)) {
				$this->existImg = false;

				$this->img_p = str_replace('photo/400/', 'photo/270/', $this->img_p);

				if (!file_exists($this->img_p)) {
					$this->existImg = false;
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


	// Description --------------------------
	function Content() {
		$title = $this->title_fr;
		if ($this->title_fr != $this->title_de) {
			$title .= " / " . $this->title_de;
		}

		if (strpos($this->stu, ',') === false) {
			$this->stu = utf8_decode(ucfirst(substr($this->stu, 0, strpos($this->stu, ' ')))) . " " . mb_strtoupper(utf8_decode(substr($this->stu, strpos($this->stu, ' ') + 1, strlen($this->stu))));
		} else {
			$all_students = explode(',', $this->stu);
			$this->stu = "";
			foreach ($all_students as $s) {
				$this->stu .=  utf8_decode(ucfirst(substr($s, 0, strpos($s, ' ')))) . " " . mb_strtoupper(utf8_decode(substr($s, strpos($s, ' ') + 1, strlen($s)))) . ", ";
			}
			$this->stu = substr($this->stu, 0, -2);
		}

		if (strpos($this->teach, ',') === false) {
			$this->teach = utf8_decode(ucfirst(substr($this->teach, 0, strpos($this->teach, ' ')))) . " " . mb_strtoupper(utf8_decode(substr($this->teach, strpos($this->teach, ' ') + 1, strlen($this->teach))));
		} else {
			$all_teachers = explode(',', $this->teach);
			$this->teach = "";
			foreach ($all_teachers as $t) {
				$this->teach .= utf8_decode(ucfirst(substr($t, 0, strpos($t, ' ')))) . " " . mb_strtoupper(utf8_decode(substr($t, strpos($t, ' ') + 1, strlen($t)))) . ", ";
			}
			$this->teach = substr($this->teach, 0, -2);
		}

		// Length		FontSize
		// 0 à 935		78
		// 990 			77 //  900 - 77
		// 1084			75 // 1000 - 75
		// 1122			73 // 1100 - 73
		// 1255			71 // 1200 - 71

		$lengthDesc = strlen($this->desc_fr . $this->desc_de);

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

		if (file_exists($this->img_p)) {
			$img = '"' . $this->img_p . '"';
		}
		$this->w_image = '"' . $this->w_image . '"';
		if ($this->h_image > 0) {
			$this->h_image = 'height="' . $this->h_image . '"';
		} else {
			$this->h_image = "";
		}

		$title_color = $this->title_color[$this->profession - 1];

		// $this->Image($this->img_p, $x=115, $y=35, $w=25, $h=50, 'JPG', '', '', false, 300, '', false, false, 0, $fitbox='M', false, false);
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
				<td><p><div class="other"> $this->teach </div></p></td>
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
		
		<td width="840" style="text-align:center">
	
			<table>
				<tr><td><img src=$img border="0" $this->h_image width=$this->w_image align="middle" /></td></tr>
			</table>
			
		</td>
	
	</tr>
	</table>
EOF;

		$this->SetY(62);
		$this->SetX($this->x_col1 + 25);
		$this->writeHTML($html, true, false, true, false, '');
		//$this->writeHTML($html, $ln, $fill, $reseth, $cell, $align);
	}



	function QRCode() {
		// new style
		$style = array(
			'border' => false,
			'padding' => 0,
			'fgcolor' => $this->QRCode_color[$this->profession - 1],
			'bgcolor' => $this->QRCode_background[$this->profession - 1]
		);

		// QRCODE
		$this->write2DBarcode('http://labo-emvs.ch/?p=projects&id=' . $this->id, 'QRCODE,H', $x = $this->w_page - 50 - 23.4, $y = $this->h_page - 68, $w = 50, $h = 50, $style, 'N');
	}

	// ---------------------------------------------------------
}



// Valeurs Recues
$description_fr = "Ce projet consiste en la conception d'un simulateur des différents démarrages d'un moteur à courant alternatif. On doit pouvoir choisir sur un écran tactile les différents types de démarrag j gslkdf ghdflkjgsdfhlkg oijh lkjh lkmn lkmn lkn gkdpfj ghsdkghsldfkjh gslkdfhgsdlfk <b>ghdflkjgsdfhlkgsjfgksjfglksfdjh glkdsfjh glskdfjh lkjh j élkj kjh lkjh lkhoih oijh lkjh lkmn lkmn lkn gkdpfj</b>jh gslkdfhgsdlfk ghdflkjgsdfhlkg oijh lkjh lkmn lkmn lkn gkdpfj ghsdkghsldfkjh gslkdfhgsdlfk ghdflkjgsdfhlkgsjfgksjfglksfdjh glkdsfjh glskdfjh lkjh j élkj kjh lkjh lkhoih oijh lkjh lkmn lkmn lkn gkdpfj ghsdkghsldfkjh gslkdfhgsdlfk ghdflkjgsdfhlkg oijh lkjh lkmn lkmn lkn gkdpfj ghsdkghsldfkjh gslkdfhgsdlfkh glskdfjh lkjh j élkj kjh lkjh lkhoih oijh lkjh lkmn lkmn lkn gkdpfj ghsdkghsldfkjh gslkdfhgsdlfk ghdflkjgsdfhlkgghdflkjgsdfhlkg";

$description_de = "Dieses Projekt soll die verschiedenen Startmöglichkeit élkj élkj élkj élkjélkjélkjélkjélkjélkjm-gsdfgsdfg sfgsdfgsdfgkjsdg fksdfjg lksdfjh gldksfjh lkjh lkjh lkjh oljh lkjh lkjh lkjh ipjh jh lkjh lkjh lkj hlkj élkjg fdéélkj élkj éDieses Projekt soll die verschiedenen Startmöglichkeit élkj élkj élkj élkj";

$post = "a:14:{s:8:\"title_fr\";a:1:{i:127;s:21:\"Internet Authentifier\";}s:4:\"prof\";a:1:{i:127;s:1:\"2\";}s:7:\"student\";a:1:{i:127;s:29:\"Thierry Treyer,Jerome Bonnard\";}s:7:\"teacher\";a:1:{i:127;s:12:\"Philippe Gay\";}s:5:\"salle\";a:1:{i:127;s:4:\"hall\";}s:7:\"desc_fr\";a:1:{i:127;s:" . strlen($description_fr) . ":\"" . $description_fr . "\";}s:7:\"desc_de\";a:1:{i:127;s:" . strlen($description_de) . ":\"" . $description_de . "\";}s:8:\"title_de\";a:1:{i:127;s:24:\"Internet Authentifier DE\";}s:3:\"img\";a:1:{i:127;s:5:\"false\";}s:7:\"doctype\";s:1:\"1\";s:4:\"year\";s:4:\"2012\";s:7:\"periode\";s:1:\"3\";s:10:\"profession\";s:3:\"all\";s:5:\"step2\";s:0:\"\";}";

$post = stripslashes(str_replace(array('###n###', '###r###'), array("\n", "\r"), $post));
$data = unserialize($post);

$title_fr = $data['title_fr'];
$title_de = $data['title_de'];
$prof = $data['prof'];
$student = $data['student'];
$teacher = $data['teacher'];
$salle = $data['salle'];
$desc_fr = $data['desc_fr'];
$desc_de = $data['desc_de'];
$img = $data['img'];

$id = 127;


$pdf = new Poster('L', 'mm', array(558.8, 400), true, 'UTF-8', false);

// Initialisation des valeurs
$pdf->init($id, $title_fr[$id], $title_de[$id], $prof[$id], $student[$id], $teacher[$id], $salle[$id], $desc_fr[$id], $desc_de[$id], $img[$id]);

// Création du document PDF
$pdf->setProperties();
$pdf->addPoster();

// Contenu
$pdf->Content();
$pdf->QRCode();

$pdf->Output('example_050.pdf', 'I');