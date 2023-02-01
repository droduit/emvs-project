<?php
require_once('../../plugins/tcpdf/config/lang/fra.php');
require_once('../../plugins/tcpdf/tcpdf.php');

class Liste extends TCPDF {
	
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
		$this->SetTitle('Liste des projets EMVs');
		$this->SetSubject('Liste');
		$this->SetKeywords('PDF, Liste, EMVs, Projects');
		
		// Police du Header et Footer
		$this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// Définition des marges LEFT TOP RIGHT
		$this->SetMargins(9.2, 8, 8);
		
		$this->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// Sauts de page automatiques
		$this->SetAutoPageBreak(TRUE, 8);
		
		// Définition du facteur d'échelle pour les images
		$this->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		
		$this->setCellHeightRatio(1.35);
		
		// Langue
		$this->setLanguageArray($l);
		
		// Affichage adapté a la taille de l'ecran (ou du programme affichant le PDF) lors de l'ouverture du PDF
		$this->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
	}
	
	// Ajout d'une page
	function addPoster() {
		$this->w_page = 297; // Largeur
		$this->h_page = 209.9; // Hauteur
		$this->AddPage('L', array($this->w_page, $this->h_page));	
	}

	// Initialisation et formatages des valeurs utiles a la création du contenu, données spécifique au contenu.
	function init($title_fr, $title_de, $prof, $stu, $teach, $room) {
		// Pour l'accentuation, on définit les paramêtres locaux (FR)
		setlocale(LC_ALL, 'fr_FR');
		// Couleur du QRCode
		$this->QRCode_color = array(array(239,58,61), array(0,128,0), array(76,98,173));
		// Couleur d'arrière plan du QRCode
		$this->QRCode_background = array(array(255,229,229), array(236,255,223), array(235,240,255));
		// Couleur du titre du projet
		$this->title_color = array('red','green','navy');
		
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

		$this->profession = $prof;
		$this->title_fr = $title_fr; // Titre du projet (Fr)
		$this->title_de = $title_de;
		$this->stu = $stu;
		$this->teach = $teach;
		$this->room = $this->fullUpper($room);
		$this->id = array_keys($this->title_fr); // Clés primaire des projets
	}
	
	function fullUpper($string){
		if ( is_array( $string ) ){
			return array_map( $this->fullUpper , $string );
		} else {
			return strtr(strtoupper($string), $this->accentuations);
		}	  
	} 
	
	function fullLower($string){
	 	if ( is_array( $string ) ){
			return array_map( $this->fullLower , $string );
		} else {
			return strtr(strtolower($string), array_flip($this->accentuations));
		}
	}
	
	function Header() { $this->SetXY(0,0); }
	function Footer() { }
	
	function upperNameOnly($name) {
		// Si il y a qu'un seul nom
		if (strpos($name, ',')===false) {
			$prenom = $this->mb_ucfirst(substr( $name,0,strpos($name,' ') ) ); // Prénom formaté
			$nom = $this->fullUpper( substr($name, strpos($name,' ')+1, strlen($name) ) ); // Nom formaté
			
			$name = $prenom." ". $nom ;
		}
		// Si il y a une suite de plusieurs noms
		else {
			// On fait un tableau avec chaque noms
			$all_teachers = explode(',', $name);
			$name = "";
			//On parcours le tableau des noms
			foreach ($all_teachers as $t) {
				$prenom =$this->mb_ucfirst( substr( $t,0,strpos($t,' ') ) ); // Prénom Formaté
				$nom = $this->fullUpper( substr($t, strpos($t,' ')+1, strlen($t) )  ); // Nom Formaté
				
				$name .=  $prenom." ".$nom.", ";	
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
	
	function Content() {
	
	$i=0;
	
	// Styles des lignes
	$style = 'border-top: 1px solid #3366ff;';
	
	
	// Styles des lignes aux extrémités
	$styleD = 'border-right: 1px solid #3c3c3c;';
	$styleG = 'border-left: 1px solid #3c3c3c;';
		
	$idx = array_keys($this->title_fr);
	foreach ($idx as $id) {
		$i++;
		
		// Recupération des professeurs ----------------------------------------------------------------------
		$teach = array();
		foreach ($this->teach[$id] as $t) {
			$teach[] = $this->upperNameOnly($t);
		}
		// Si + que deux prof
		if (count($this->teach[$id])>1) {
			switch(count($this->teach[$id])) {
				case 2 : $teachg[0] =  $teach[0].'<br>'.$teach[1]; break;
				case 3 : $teachg[0] =  $teach[0].'<br>'.$teach[1]."<br>".$teach[2]; break;
				case 4 : $teachg[0] =  $teach[0].'<br>'.$teach[1]."<br>".$teach[2]."<br>".$teach[3]; break;
				case 5 : $teachg[0] =  $teach[0].'<br>'.$teach[1]."<br>".$teach[2]."<br>".$teach[3]."<br>".$teach[4]; break;
			}
		} else {
			$teachg[0] =$teach[0]; 	
		}
		// ----------------------------------------------------------------------------------------------
		
		// Récupération des élèves ----------------------------------------------------------------------
		$stu = array();
		foreach ($this->stu[$id] as $s) {
			$stu[] = $this->upperNameOnly($s);
		}
		// Si + que deux élèves
		if (count($this->stu[$id])>3) {
			switch(count($this->stu[$id])) {
				case 4 : list($stug[0],$stug[1],$stug[2]) =  array($stu[0].'<br>'.$stu[1], $stu[2], $stu[3]); break;
				case 5 : list($stug[0],$stug[1],$stug[2]) =  array($stu[0].'<br>'.$stu[1], $stu[2]."<br>".$stu[3], $stu[4]); break;
				case 6 : list($stug[0],$stug[1],$stug[2]) =  array($stu[0].'<br>'.$stu[1], $stu[2]."<br>".$stu[3], $stu[4]."<br>".$stu[5]); break;
				case 7 : list($stug[0],$stug[1],$stug[2]) =  array($stu[0].'<br>'.$stu[1]."<br>".$stu[2], $stu[3]."<br>".$stu[4], $stu[5]."<br>".$stu[6]); break;
			}
		} else {
			list($stug[0],$stug[1],$stug[2]) = array($stu[0], $stu[1], $stu[2]); 	
		}
		// ----------------------------------------------------------------------------------------------
		
		// Gestion des croix dans les cellules
		list($c1,$c2,$c3) = array("","","");
		
		switch(intval($this->profession[$id])) {
			case 1 : $c1 = "A"; break;
			case 2 : $c2 = "E"; break;
			case 3 : $c3 = "I"; break;
		}
		
		// Couleur de la ligne
		if ($i%2==1) { $color = "#95b3d7"; } else { $color = "#fff"; }
		
		// Pour le dernier : Ferme le tableau par une ligne
		if ($i==count($this->title_fr)) { $style.= 'border-bottom: 1px solid #3c3c3c;'; }
		
		$list .= '<tr bgcolor="'.$color.'" bordercolor="#3366ff">
					<td style="'.$style.$styleG.'" width="6mm" align="center">'.$c1.'</td> <td style="'.$style.'" width="6mm" align="center">'.$c2.'</td> <td style="'.$style.'" width="6mm" align="center">'.$c3.'</td>	
					<td style="'.$style.'" width="2mm"></td>
					<td style="'.$style.'" width="8.1cm">'.$this->title_fr[$id].'</td>	
					<td style="'.$style.'" width="1.9cm" align="center">'.$this->room[$id].'</td>	
					<td style="'.$style.'" width="4cm" align="center">'.$teachg[0].'</td>	
					<td style="'.$style.'" width="4.3cm" align="center">'.$stug[0].'</td>	
					<td style="'.$style.'" width="3.9cm" align="center">'.$stug[1].'</td>	
					<td style="'.$style.$styleD.'" width="3.75cm" align="center">'.$stug[2].'</td>	
				</tr>
				';
	}
	
	$plan = '../../../media/pdf/img/planSalles.png';
	$imgPlan = '<img align="center" src="'.$plan.'" width="790px" >';
	
	$this->setJPEGQuality(100);
		
	$html = <<<EOF
	<style>
		h1 {
			font-family: arial, sans-serif;
			font-size: 20pt;
			font-weight: normal;
		}
		.title {
			color: black;
			font-family:arial, sans-serif;
			font-size: 18pt;	
			text-align: center;
			line-height: 2em;
			font-weight: bold;
			font-style:italic;
		}
		table.test {
			font-size: 10.5pt;
			border: 1px solid #355ddc;
		}
		table.test td {
			vertical-align:middle;
		}
		.desc, .other {
			font-family:arial, sans-serif;
			text-align:justify
		}
		table.test tr.head {
			font-weight: bold;
			
		}
		table.test tr.h1 td {
			border-top: 1px solid #3c3c3c;	
		}
	</style>
	

	<div class="title"> Liste des projets / Projektliste </div>
	<div style="font-size:4pt;line-height:0.5em; color:#3c3c3c">...</div>

	
	<table class="test" cellspacing="0" cellpadding="1" border="0">
	<thead>
		<tr class="head h1" bgcolor="#3366ff" color="white">
			<td width="18mm" colspan="3" align="center" style="$styleG" >Prof.</td>
			<td width="8.3cm" rowspan="2" align="center" valign='middle'><div style="color:#3366ff; font-size: 4pt; line-height:1.9em">.....</div>Projet / Projekt</td>
			<td width="1.9cm" align="center">Salle</td>
			<td width="4cm" align="center">Responsable</td>
            <td width="4.3cm"></td>
			<td width="3.9cm" align="center">Apprenant</td>
            <td width="3.75cm" style="$styleD"></td>
		</tr>
		<tr class="head" bgcolor="#3366ff" color="white">
			<td width="6mm" align="center" style="$styleG">A</td>
			<td width="6mm" align="center">E</td>
            <td width="6mm" align="center">I</td>
            
			<td width="1.9cm" align="center">Zimmer</td>
			<td width="4cm" align="center">Verwantworlicher</td>
            <td width="4.3cm"></td>
			<td width="3.9cm"align="center">Lehrlinge</td>
            <td width="3.75cm" style="$styleD"></td>
		</tr>
	</thead>
	
	<tbody>

		$list	
	
	</tbody>
	</table>
	
	<div align="center">$imgPlan</div>
	
EOF;

	$this->SetY(6);
	$this->SetX(0);
	$this->writeHTML($html, true, false, true, false, '');	

	}
	
}

// ==================================================================================================================================================================
// ==================================================================================================================================================================
// ==================================================================================================================================================================
	
	/* $_POST['post'] = 'a:11:{s:4:"prof";a:5:{i:127;s:1:"3";i:126;s:1:"3";i:128;s:1:"3";i:129;s:1:"3";i:130;s:1:"3";}s:8:"title_fr";a:5:{i:127;s:21:"Internet Authentifier";i:126;s:12:"EMVs-Project";i:128;s:29:"Authentification centralisée";i:129;s:4:"ISpy";i:130;s:30:"Bibot Bluetooth Remote Control";}s:5:"salle";a:5:{i:127;s:0:"";i:126;s:3:"244";i:128;s:3:"244";i:129;s:3:"244";i:130;s:3:"244";}s:7:"teacher";a:5:{i:127;a:1:{i:6;s:12:"Philippe Gay";}i:126;a:1:{i:46;s:14:"Patrick Savioz";}i:128;a:1:{i:6;s:12:"Philippe Gay";}i:129;a:1:{i:6;s:12:"Philippe Gay";}i:130;a:1:{i:46;s:14:"Patrick Savioz";}}s:7:"student";a:5:{i:127;a:1:{i:213;s:14:"Thierry Treyer";}i:126;a:1:{i:212;s:16:"Dominique Roduit";}i:128;a:1:{i:214;s:17:"Estelle Germanier";}i:129;a:1:{i:215;s:21:"Helena Robert-Charrue";}i:130;a:1:{i:216;s:13:"Bastien Alter";}}s:8:"title_de";a:5:{i:127;s:21:"Internet Authentifier";i:126;s:12:"EMVs-Project";i:128;s:32:"Zentralisierte Authentifizierung";i:129;s:4:"ISpy";i:130;s:30:"Bibot Bluetooth Remote Control";}s:7:"doctype";s:1:"2";s:4:"year";s:4:"2012";s:7:"periode";s:3:"all";s:10:"profession";s:3:"all";s:5:"step2";s:0:"";}';   */
	
	
	function stripslashes_recursive( $input ){
		if ( is_array( $input ) ){
			return array_map( __FUNCTION__, $input );
		} else {
			return stripslashes( $input );
		}
	}

	$post = str_replace(array('###n###', '###r###'),array("\n", "\r"), 	$_POST['post'] );
	
	$data = unserialize($post);
	
	$data = stripslashes_recursive($data);

	$title_fr = $data['title_fr'];
	$title_de = $data['title_de'];
	$prof = $data['prof'];
	$student = $data['student'];
	$teacher = $data['teacher'];
	$salle = $data['salle'];
	$desc_fr = $data['desc_fr'];
	$desc_de = $data['desc_de'];
	$img = $data['img'];
	/*
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	*/
	

	
	$pdf = new Liste('L', 'mm', array(297,209.9), true, 'UTF-8', false);
			
	// Initialisation des valeurs
	$pdf->init($title_fr, $title_de, $prof, $student, $teacher, $salle);
	
	// Création du document PDF
	$pdf->setProperties();
	$pdf->addPoster();
	
	// Contenu
	$pdf->Content();
	
	// Enregistrement du PDF
	$pdf->Output("../../../media/pdf/liste.pdf",'F');
	

	
// ==================================================================================================================================================================
// ==================================================================================================================================================================
// ==================================================================================================================================================================