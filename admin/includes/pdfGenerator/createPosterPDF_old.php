<?php
require('../../plugins/fpdf/fpdf.php');
require('../../conf/common.php');

setlocale(LC_ALL, 'fr_FR');

class Poster extends FPDF
{
	public $title_p, $banner, $stu, $teach, $room, $desc_fr, $desc_de, $img_p;
	
	function initializePoster($title_p, $prof, $stu, $teach, $room, $desc_fr, $desc_de, $img_p) {
		$banner_src = array('profA.png', 'profE.png', 'profI.png');
		
		$this->title_p = $title_p;
		$this->banner = '../../../media/pdf/img/'.$banner_src[$prof-1];
		$this->stu = $stu;
		$this->teach = $teach;
		$this->room = $room;
		$this->desc_fr = $desc_fr;
		$this->desc_de = $desc_de;
		if ($img_p!="false") { $this->img_p = $img_p; } else { $this->img_p = "no_img.jpg"; }
		$this->img_p = "../../../media/photo/".$this->img_p;		
	}
	
	// En-tête
	function Header()
	{
		// Logo
		$this->Image($this->banner,10,20,540);
		// Police Arial gras 15
		$this->SetFont('Arial','B',15);
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
}


// Récupération de toutes les données transmises
$_POST['post'] = stripslashes(str_replace(array('###n###', '###r###'),array("\n", "\r"),$_POST['post']));
$data = unserialize($_POST['post']);

$title = $data['title'];
$prof = $data['prof'];
$student = $data['student'];
$teacher = $data['teacher'];
$salle = $data['salle'];
$desc_fr = $data['desc_fr'];
$desc_de = $data['desc_de'];
$img = $data['img'];

$id = 126;

// Instanciation de la classe dérivée
$pdf = new Poster();

$pdf->initializePoster($title[$id], $prof[$id], $student[$id], $teacher[$id], $salle[$id], $desc_fr[$id], $desc_de[$id], $img[$id]);

// Taille : 558.8x400.0 mm
$w_page=558.8;
$h_page=400;
$pdf->AddPage("L", array($w_page,$h_page));
$pdf->AddFont('Verdana','','verdana.php');
$pdf->AddFont('Verdana','I','verdanai.php');

// CONTENU
// -----------------------------------------------------------------------------------------------
$y_start_content = 80;

$x_col1 = 12;
$w_col1 = 74;
$fontsize_col1 = 24; 

$x_col2 = $x_col1+$w_col1+3;
$w_col2 = 191; // 2. 972340426
$margin_right_col2 = 30;

$x_image = $x_col2+$w_col2+$margin_right_col2;
$w_image = 210;

$border = 0;

// Description --------------------------
$pdf->setXY($x_col1,$y_start_content);
$pdf->SetFont('Verdana','',$fontsize_col1);
$pdf->Cell($w_col1,12, utf8_decode('Description /'),$border,2);

$pdf->SetFont('Verdana','I',$fontsize_col1);
$pdf->Cell($w_col1,10, utf8_decode('Beschreibung'),$border,2);

$pdf->SetFont('Verdana','',22);
$pdf->setXY($x_col2,$y_start_content);
$pdf->MultiCell($w_col2, 10, html_entity_decode($desc_fr[$id]),$border);

$pdf->Ln(12);

$pdf->SetFont('Verdana','I',22);
$pdf->setX($x_col2);
$pdf->MultiCell($w_col2, 10, html_entity_decode($desc_de[$id]),$border);


// Responsable --------------------------
$pdf->Ln(25);
$pdf->SetX($x_col1);
$pdf->SetFont('Verdana','',$fontsize_col1);
$pdf->Cell($w_col1,12, utf8_decode('Responsable /'),$border,2);

$pdf->SetFont('Verdana','',26);
$pdf->setXY($x_col2,$pdf->GetY()-6);
$pdf->MultiCell($w_col2, 13,  utf8_decode(substr( $teacher[$id],0,strpos($teacher[$id],' ') ))." ". mb_strtoupper( utf8_decode( substr($teacher[$id], strpos($teacher[$id],' ')+1, strlen($teacher[$id]) ) ) ) ,$border);

$pdf->SetXY($x_col1, $pdf->getY()-7);
$pdf->SetFont('Verdana','I',$fontsize_col1);
$pdf->Cell($w_col1,10, utf8_decode('Verantwortlicher'),$border,2); 



// Apprenant --------------------------
$pdf->Ln(10);
$pdf->SetX($x_col1);
$pdf->SetFont('Verdana','',$fontsize_col1);
$pdf->Cell($w_col1,12, utf8_decode('Apprenant /'),$border,2);

$pdf->SetFont('Verdana','',26);
$pdf->setXY($x_col2,$pdf->GetY()-6);
$pdf->MultiCell($w_col2, 13, utf8_decode( substr($student[$id],0,strpos($student[$id],' ')))." ".mb_strtoupper(utf8_decode(substr($student[$id], strpos($student[$id], ' ')+1, strlen($student[$id])))),$border);

$pdf->SetXY($x_col1, $pdf->getY()-7);
$pdf->SetFont('Verdana','I',$fontsize_col1);
$pdf->Cell($w_col1,10, utf8_decode('Lehrlinge'),$border,2);

// Salle --------------------------
$pdf->Ln(10);
$pdf->SetX($x_col1);
$pdf->SetFont('Verdana','',$fontsize_col1);
$pdf->Cell((40*$w_col1/100),12, utf8_decode('Salle /'),$border,0);

$pdf->SetFont('Verdana','I',$fontsize_col1);
$pdf->Cell((60*$w_col1/100),12, utf8_decode('Zimmer'),$border,0);

$pdf->SetFont('Verdana','',$fontsize_col1);
$pdf->setX($x_col2);
$pdf->MultiCell($w_col2, 13, utf8_decode($salle[$id]),$border);

// Image -----------------------
$pdf->Image("../../../media/photo/".$img[$id], $x_image, $y_start_content, $w_image);

// QRCode ---------------------
$pdf->SetX($x_image);
$pdf->Image("../../../media/qrcode/projects_detail_".$id.".png", $x_image+70, 260, 80);

	
$pdf->Output("../../../media/pdf/poster_".$id.".pdf", "F");