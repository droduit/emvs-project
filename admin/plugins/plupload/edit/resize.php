<?php
##############################################
# Image resize class
# 29.09.2012
# Format supportés : PNG, JPG, GIF, WBMP
/*############################################
Exemple :
$thumb=new thumbnail("monfichier.jpg");	// Instantiation du fichier à redimensionner
$thumb->setWidth(100);					// Définition de la largeur de sortie
$thumb->setHeight(300);					// Définition de la hauteur de sortie
$thumb->setAutoSize(200);				// Donne la dimension renseignée à la composante la plus adaptée
$thumb->setQuality(75);					// [Optionnel] Qualité pour les JPG (0 - 100), par defaut = 100
$thumb->save("uploads/");				// Enregistrement de la miniature
*/############################################

class thumbnail
{
	var $img;
	// [name_src]			=>		Nom du fichier source
	// [name_dest]			=>		Nom de la miniature générée
	// [format]				=>		Format (extention) du fichier source
	// [src]				=>		
	// [dest]				=>		
	// [width_src]			=>		Largeur du fichier source
	// [height_src]			=>		Hauteur du fichier source
	// [height_dest]		=>		Hauteur de la miniature générée
	// [width_dest]			=>		Largeur de la minitaure générée
	// [quality]			=>		Qualité de la miniature (Seulement JPEG et PNG)
	// [directory_dest]		=>		Répertoire de destination de la miniature
	// [directory_src]		=>		Répertoire du fichier source
	// [orientation]		=>		Orientation de l'image (1 = portrait, 2 = paysage)
	
	function thumbnail($imgfile) {
		// Récupération du répertoire du fichier source
		$this->img["directory_src"] = str_replace(strrchr($imgfile, "/"),'',$imgfile);
		if(substr($this->img["directory_src"], -1)!="/") $this->img["directory_src"].="/";
		
		// Récupération du nom du fichier source
		$this->img["name_src"]=$imgfile;
		$this->img["name_src"]=str_replace($this->getDirectorySrc(), '', $this->img["name_src"]);
		
		// Récupération du format du fichier source
		$this->img["format"]=$this->getFormat();
		$this->img["format"]=strtoupper($this->img["format"]);
		
		if ($this->img["format"]=="JPG" || $this->img["format"]=="JPEG") { //JPEG
			$this->img["format"]="JPG";
			$this->img["src"] = ImageCreateFromJPEG ($imgfile);
		} elseif ($this->img["format"]=="PNG") { //PNG
			$this->img["format"]="PNG";
			$this->img["src"] = ImageCreateFromPNG ($imgfile);
		} elseif ($this->img["format"]=="GIF") { //GIF
			$this->img["format"]="GIF";
			$this->img["src"] = ImageCreateFromGIF ($imgfile);
		} elseif ($this->img["format"]=="WBMP") { //WBMP
			$this->img["format"]="WBMP";
			$this->img["src"] = ImageCreateFromWBMP ($imgfile);
		} else { //DEFAULT
			echo 'Format non supporte';
			exit();
		}
		@$this->img["width_src"] = imagesx($this->img["src"]);
		@$this->img["height_src"] = imagesy($this->img["src"]);
		
		// On définit si l'image est au format paysage ou portrait
		if($this->img["width_src"]<=$this->img["height_src"]) {
			$this->img['orientation'] = 1; // Portrait
		} else {
			$this->img['orientation']  = 2; // Paysage
		}
		
		
		// Qualité par défaut pour les JPG et PNG
		$this->setQuality(100);
	}
	
	function setHeight($size=100) {
		// Hauteur
    	$this->img["height_dest"]=$size;
    	@$this->img["width_dest"] = ($this->img["height_dest"]/$this->img["height_src"])*$this->img["width_src"];
	}

	function setWidth($size=100) {
		// Largeur
		$this->img["width_dest"]=$size;
    	@$this->img["height_dest"] = ($this->img["width_dest"]/$this->img["width_src"])*$this->img["height_src"];
	}

	function setAutoSize($size=100) {
		if ($this->img['orientation']==2) { // Si l'image est au format paysage
    		$this->img["width_dest"]=$size;
    		@$this->img["height_dest"] = ($this->img["width_dest"]/$this->img["width_src"])*$this->img["height_src"];
			
			// Si l'image source est plus petite que la grandeur de minitaure spécifiée, on garde la taille source
			if($this->img["width_src"]<$size) {
				$this->img["width_dest"] = $this->img["width_src"];
				$this->img["height_dest"] = $this->img["height_src"];
			}
		} else { // Si l'image est au format portrait
	    	$this->img["height_dest"]=$size;
    		@$this->img["width_dest"] = ($this->img["height_dest"]/$this->img["height_src"])*$this->img["width_src"];
			
			// Si l'image source est plus petite que la grandeur de minitaure spécifiée, on garde la taille source
			if($this->img["height_src"]<$size) {
				$this->img["width_dest"] = $this->img["width_src"];
				$this->img["height_dest"] = $this->img["height_src"];
			}
 		}
	}

	/**
	* @param $quality Qualité de l'image (Uniquement valable pour les JPG)
	*/
	function setQuality($quality=100) {
		switch($this->getFormat()) {
			case 'png':
				// Pour les PNG : Qualité (compression) 0-9, 0 etant la meileur qualité
				$this->img["quality"] = 9-number_format($quality*9/100,0);
			break;	
			case 'jpg': case 'jpeg':
				// Pour les JPEG : Qualité 0-100, 100 etant la meilleur qualité
				$this->img["quality"] = $quality;
			break;
		} 
	}

	/**
	* @param $directory Répertoire dans lequel on veux enregistrer la miniature (En partant depuis le repertoire de l'image source).
	* 				   Si le paramètre n'est pas renseigné, l'image est enregistrée dans le meme répertoire que l'image source.
	* @param $name_dest Nom du fichier de sortie
	* Enregistrement de la miniature
	*/
	function save($directory="", $name_dest="") {
		
		if(substr($directory, -1)!="/") $directory.="/"; // Si le dernier caractère du répertoire renseigné n'est pas le / on l'ajoute
		$this->img["directory_dest"] = $directory; // On stoque le répertoire de destination
		
		// Si le parametre $name_dest est renseigné
		if(empty($name_dest)) { // Si on ne passe pas le nom en paramètre -> On génère un nom
			$name_dest=$this->getDirectorySrc().$this->img["directory_dest"].$this->img["name_src"];
		} else {
			$name_dest=$this->getDirectorySrc().$this->img["directory_dest"].$name_dest;
		}
		$name_dest = trim($name_dest);
		
		$this->img["dest"] = ImageCreateTrueColor($this->img["width_dest"],$this->img["height_dest"]);

		// Si c'est une PNG, on garde la transparence
		if($this->img["format"]=="PNG") {
			imagealphablending($this->img["dest"],false);
			imagesavealpha($this->img["dest"],true);	
		}
		
    	@imagecopyresampled ($this->img["dest"], $this->img["src"], 0, 0, 0, 0, $this->img["width_dest"], $this->img["height_dest"], $this->img["width_src"], $this->img["height_src"]);
		
		// Enregistrement des images selon leur format
		if($this->img["format"]=="JPG" || $this->img["format"]=="JPEG") {	//--- JPEG
			imagejpeg($this->img["dest"],$name_dest,$this->img["quality"]);
		} elseif ($this->img["format"]=="PNG") {	//--- PNG
			imagepng($this->img["dest"],$name_dest,$this->img["quality"]);
		} elseif ($this->img["format"]=="GIF") {	//--- GIF
			imagegif($this->img["dest"],$name_dest);
		} elseif ($this->img["format"]=="WBMP") { 	//--- WBMP
			imagewbmp($this->img["dest"],$name_dest);
		}
		
		// On libère la mémoire
		imagedestroy($this->img['src']);
	}
	
	/**
	* @return Nom de fichier unique en CRC32
	*/
	function generateFilename() {
		$extension = $this->getFormat();
		
		if(empty($name)) {
			$name = $name."_".date('YmdHis');
		} else {
			$name = date('YmdHis');	
		}
		$this->img["name_dest"] = abs(crc32($name)).".".$extension;
		return $this->img["name_dest"];
	}
	
	/**
	* @return Nom de sortie de la miniature
	*/
	function getFilename() {
		return $this->img["name_dest"];	
	}
	
	/**
	* @param $file Fichier concerné
	* @return Extension du fichier
	*/
	function getFormat($file="") {
		if(empty($file)) {
			$file = $this->img["name_src"];
		}
		return ereg_replace(".*\.(.*)$","\\1",$file);
	}
	
	/**
	* @return Répertoire source du fichier
	*/
	function getDirectorySrc() {
		return $this->img["directory_src"];
	}
	
	/**
	* @return Répertoire de destination du fichier
	*/
	function getDirectoryDest() {
		return $this->img["directory_dest"];	
	}
	
	/**
	* @return Tableau [0]=Largeur image source - [1]=Hauteur image source
	*/
	function getImgSize() {
		return array($this->img["width_src"]	, $this->img["height_src"]);
	}
}
?>