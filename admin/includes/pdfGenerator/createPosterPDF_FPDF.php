<?php
require('../../plugins/fpdf/fpdf.php');
require('../../conf/common.php');

setlocale(LC_ALL, 'fr_FR');

class Poster extends FPDF
{
	public $title_fr, $banner, $stu, $teach, $room, $desc_fr, $desc_de, $img_p, $id;
	
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
	
	function initializePoster($id, $title_fr, $prof, $stu, $teach, $room, $desc_fr, $desc_de, $img_p) {
		$banner_src = array('profA.png', 'profE.png', 'profI.png');
		
		$this->id = $id; // Clé primaire du projet
		$this->title_fr = $title_fr; // Titre du projet (Fr)
		$this->banner = '../../../media/pdf/img/'.$banner_src[$prof-1];
		$this->stu = $stu;
		$this->teach = $teach;
		$this->room = $room;
		$this->desc_fr = html_entity_decode(strip_tags($desc_fr));
		$this->desc_de = html_entity_decode(strip_tags($desc_de));
		
		
		// Si la chaine est en UTF8 on décode les caractères accentués
		if (mb_check_encoding($this->desc_fr, 'UTF-8')) { $this->desc_fr = utf8_decode($this->desc_fr); }
		if (mb_check_encoding($this->desc_de, 'UTF-8')) { $this->desc_de = utf8_decode($this->desc_de); }
	
		
		if (!empty($img_p)) {
			$this->img_p = "../../../media/photo/".$img_p;
		} else {
			$this->img_p = "../../../media/photo/no_img.jpg";
		}
		
		$this->existImg = false;
		
		if (!file_exists($this->img_p)) {
			$this->existImg = false;
			$this->img_p = str_replace('photo/','photo/400/', $this->img_p);
			
			if (!file_exists($this->img_p)) {
				$this->existImg = false;
				
				$this->img_p = str_replace('photo/400/','photo/270/', $this->img_p);	
				
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
		
		var_dump($img_p);
		// -------------------------------------------------------------------------------------------------------------------
		// ------------------------------------- Initialisation des positions ------------------------------------------------
		// -------------------------------------------------------------------------------------------------------------------
		
		// Propriétés du PDF ----------------------------
		$this->w_page = 558.8; // Largeur
		$this->h_page = 400; // Hauteur
		$this->AddPage("L", array($this->w_page,$this->h_page)); // Format Paysage
		$this->AddFont('Verdana','','verdana.php'); // Ajout de la police Arial
		$this->AddFont('Verdana','I','verdanai.php'); // Ajout de la police Arial Italic
		
		// Tous le contenu ----------------------------
		$this->y_start_content = 80; // Marge du contenu en dessous de la banniere (Informaticien, Automaticien, Electronicien)
		$this->border = 0; // Bordure des cellules
		
		// -- 1ère colonne ----------------------------
		$this->x_col1 = 12;	// Marge gauche
		$this->w_col1 = 74; // Largeur
		$this->fontsize_col1 = 24; // Taille de police
		
		// -- 2eme colonne ----------------------------
		$this->x_col2 = $this->x_col1+$this->w_col1+3; // Marge gauche
		$this->w_col2 = 191; // Largeur
		$this->margin_right_col2 = 30; // Marge droite
		$this->space_after_desc_fr = 12; // Espace après la description fr
		$this->space_after_desc_de = 25; // Espace après la description de
		$this->fontsize_desc = 22;
		
		// -- Image du projet -------------------------
		$this->x_image = $this->x_col2+$this->w_col2+$this->margin_right_col2; // Position de l'image sur l'axe des x
		$this->w_image = 230; // Largeur de l'image
		
		// Si les descriptions fr et de prennent plus d'une page il faut élargir la colonne et réduire l'espace !
		if (strlen($this->desc_fr.$this->desc_de)>770) {
			$this->w_col2 += 23; // Largeur
			$this->space_after_desc_de = 15; // Espace après la description de	
			$this->w_image = 220;	
			$this->x_image += 7;
		}
		if (strlen($this->desc_fr.$this->desc_de)>950) {
			$this->w_col2 += 25; // Largeur
			$this->space_after_desc_fr = 8;
			$this->space_after_desc_de = 8; // Espace après la description de	
			$this->x_image += 26;
			$this->fontsize_desc = 21;
			$this->w_image = 202;
			
			if (strlen($this->desc_fr.$this->desc_de)>1050) {
				$this->fontsize_desc = 19;
				
				if (strlen($this->desc_fr.$this->desc_de)>1180) {
					$this->fontsize_desc = 17;
					
					if (strlen($this->desc_fr.$this->desc_de)>1400) {
						$this->fontsize_desc = 15;	
						
						if (strlen($this->desc_fr.$this->desc_de)>1600) {
							$this->fontsize_desc = 13;		
						}	
					}	
				}	
			}
		}
		
		// Si l'image n'existe pas on allonge la description sur toute la largeur
		if (!$this->existImg) {
			$this->w_col2 = $this->w_col2+$this->w_image;
		}
		
		// Proportions de l'images
		// [0] = largeur , [1] = hauteur
		$this->imgSize = getimagesize($this->img_p);
		
		// On récupère la hauteur que va faire l'image
		$this->k_image = $this->w_image/$this->imgSize[0]; // 230/largeur original
		$this->h_image = $this->imgSize[1]*$this->k_image; // hauteur original*facteur
				
		if ($this->h_image>165) {
			$this->h_image = 200;
			
			$this->k_image = $this->h_image/$this->imgSize[1];
			if (($this->k_image*$this->imgSize[0])>230) {
				$this->w_image = 230; 	
			} else {
				$this->w_image = 0; 	
			}
		}
		// -------------------------------------------------------------------------------------------------------------------
		// -------------------------------------------------------------------------------------------------------------------

	}
	
	// En-tête
	function Header()
	{
		// Logo
		$this->Image($this->banner,10,20,540);
		// Décalage à droite
		$this->Cell(80);
		// Titre
		//$this->Cell(30,10, utf8_decode($this->title_p) ,1,0,'C');
		// Saut de ligne
		$this->Ln(20);
	}
	
	// Pied de page
	function Footer()
	{
		// Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		// Police Arial italique 8
		$this->SetFont('Arial','I',8);
	}

	
	// Description --------------------------
	function description() {
		$this->setXY($this->x_col1,$this->y_start_content);
		$this->SetFont('Verdana','',$this->fontsize_col1);
		$this->Cell($this->w_col1,12, utf8_decode('Description /'),$this->border,2);
		
		$this->SetFont('Verdana','I',$fontsize_col1);
		$this->Cell($this->w_col1,10, utf8_decode('Beschreibung'),$this->border,2);
		
		if (strlen($this->desc_fr)>0) {
			$this->SetFont('Verdana','',$this->fontsize_desc);
			$this->setXY($this->x_col2,$this->y_start_content);
			$this->MultiCell($this->w_col2, 10, $this->desc_fr,$this->border);			
			$this->Ln($this->space_after_desc_fr); // Espace entre la description fr et de
		}
		
		if (strlen($this->desc_de)>0) {			
			$this->SetFont('Verdana','I',$this->fontsize_desc);
			$this->setX($this->x_col2);
			$this->MultiCell($this->w_col2, 10, $this->desc_de,$this->border);
			$this->Ln($this->space_after_desc_de); // Espace apres la description de
		}
	}
	
	
	// Responsable --------------------------
	function responsables() {
		$this->SetX($this->x_col1);
		$this->SetFont('Verdana','',$this->fontsize_col1);
		$this->Cell($this->w_col1,12, utf8_decode('Responsable /'),$this->border,2);
		
		$this->SetFont('Verdana','',26);
		$this->setXY($this->x_col2,$this->GetY()-6);
		
		// ça ne va pas !! Dans le cas ou il y a plusieurs personnes toutes les autres viennent en majuscule
		if (strpos($this->teach, ',')===false) {
			$this->teach = utf8_decode( ucfirst( substr( $this->teach,0,strpos($this->teach,' ') ) ) )." ". mb_strtoupper( utf8_decode( substr($this->teach, strpos($this->teach,' ')+1, strlen($this->teach) ) ) ) ;
		} else {
			$all_teachers = explode(',', $this->teach);
			$this->teach = "";
			foreach ($all_teachers as $t) {
				$this->teach .= utf8_decode( ucfirst( substr( $t,0,strpos($t,' ') ) ) )." ". mb_strtoupper( utf8_decode( substr($t, strpos($t,' ')+1, strlen($t) ) ) ).", ";	
			}
			$this->teach = substr($this->teach, 0, -2);
		}
		$this->MultiCell($this->w_col2, 13,  $this->teach,$this->border);
		
		$this->SetXY($this->x_col1, $this->getY()-7);
		$this->SetFont('Verdana','I',$this->fontsize_col1);
		$this->Cell($this->w_col1,10, utf8_decode('Verantwortlicher'),$this->border,2); 
	}
	
	
	
	// Apprenant --------------------------
	function apprentis() {
		$this->Ln(10);
		$this->SetX($this->x_col1);
		$this->SetFont('Verdana','',$this->fontsize_col1);
		$this->Cell($this->w_col1,12, utf8_decode('Apprenant /'),$this->border,2);
		$y_apprentis = $this->GetY();
		
		$this->SetFont('Verdana','',26);
		$this->setXY($this->x_col2,$this->GetY()-6);
				
		if (strpos($this->stu, ',')===false) {
			$this->stu = utf8_decode( ucfirst(  substr( $this->stu,0,strpos($this->stu,' ') ) ) )." ". mb_strtoupper( utf8_decode( substr($this->stu, strpos($this->stu,' ')+1, strlen($this->stu) ) ) ) ;
		} else {
			$all_students = explode(',', $this->stu);
			$this->stu = "";
			foreach ($all_students as $s) {
				$this->stu .=  utf8_decode( ucfirst( substr($s,0,strpos($s,' ') ) ) )." ". mb_strtoupper( utf8_decode( substr($s, strpos($s,' ')+1, strlen($s) ) ) ).", ";	
			}
			$this->stu = substr($this->stu, 0, -2);
		}
		
		
		$this->MultiCell($this->w_col2, 13,$this->stu,$this->border);
		
		$this->SetXY($this->x_col1, $y_apprentis);
		$this->SetFont('Verdana','I',$this->fontsize_col1);
		$this->Cell($this->w_col1,10, utf8_decode('Lehrlinge'),$this->border,2);
	}
	
	// Salle --------------------------
	function salle() {
		$this->Ln(10);
		$this->SetX($this->x_col1);
		$this->SetFont('Verdana','',$this->fontsize_col1);
		$this->Cell((40*$this->w_col1/100),12, utf8_decode('Salle /'),$this->border,0);
		
		$this->SetFont('Verdana','I',$this->fontsize_col1);
		$this->Cell((60*$this->w_col1/100),12, utf8_decode('Zimmer'),$this->border,0);
		
		$this->SetFont('Verdana','',$this->fontsize_col1);
		$this->setX($this->x_col2);
		$this->MultiCell($this->w_col2, 13, utf8_decode($this->room),$this->border);
	}
	
	// Image -----------------------
	function img() { 
		$this->Image($this->img_p, $this->x_image, $this->y_start_content, $this->w_image, $this->h_image);
	}
	
	// QRCode ---------------------
	function qrcode() {
		$this->SetX($this->x_image);
		if (file_exists("../../../media/qrcode/projects_detail_".$this->id.".png")) { 
			$this->Image("../../../media/qrcode/projects_detail_".$this->id.".png", $this->x_image+70, $this->y_start_content+$this->h_image+10, 80);
		}
	}
	
	
}

	// Supprime tous les slashes d'echappement des caractères
	function stripslashes_recursive( $input ){
		if ( is_array( $input ) ){
			return array_map( __FUNCTION__, $input );
		} else {
			return stripslashes( $input );
		}
	}

	// Remplacement des caractères de retour de chariot
	$post = str_replace(array('###n###', '###r###'),array("\n", "\r"), 	$_POST['post']);
	
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

foreach ($keys as $id) {
	// Instanciation de la classe dérivée
	$pdf[$id] = new Poster();
	
	// Initialisation
	$pdf[$id]->initializePoster($id, $title_fr[$id], $prof[$id], $student[$id], $teacher[$id], $salle[$id], $desc_fr[$id], $desc_de[$id], $img[$id]);
	
	// Contenu
	$pdf[$id]->description();
	$pdf[$id]->responsables();
	$pdf[$id]->apprentis();
	if (!empty($salle[$id])) { $pdf[$id]->salle(); }
	$pdf[$id]->img();
	$pdf[$id]->qrcode();
	
	// Sauvegarde
	$pdf[$id]->Output("../../../media/pdf/poster_".$id.".pdf", "F");
}