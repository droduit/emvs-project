<?php
require_once('../../../conf/mysql.php');

$_SESSION['language'] = $_POST['language'];

class db_export {
	private $bdd;
	public $tables;
	public $db_name;

	function __construct($bdd, $db_name = "") {
		$this->bdd = $bdd;
		$this->db_name = $db_name;
	}
	function setTableList($ordre = "") {
		if (is_array($ordre)) {
			foreach ($ordre as $num => $sorter_t) {
				$this->tables[$num] = $sorter_t;
			}
		}
	}
	function getTablesList($ordre = "") {
		if (!is_array($this->tables)) {
			$listeTables = $this->bdd->query("show tables");
			while ($table = $listeTables->fetch()) {
				$this->tables[] = $table[0];
			}
		}
		return $this->tables;
	}
	function getTableStructure($table) {
		$creations .= "-- -----------------------------\n";
		$creations .= "-- Structure de la table " . $table . "\n";
		$creations .= "-- -----------------------------\n";
		$listeCreationsTables = $this->bdd->query("show create table " . $table);
		while ($creationTable = $listeCreationsTables->fetch()) {
			$creations .= $creationTable[1] . ";\n\n";
		}
		return $creations;
	}
	function getAllTablesStructure() {
		foreach ($this->tables as $t) {
			$struct .= $this->getTableStructure($t);
		}
		return $struct;
	}

	function getTableValues($table) {
		$donnees = $this->bdd->query("SELECT * FROM " . $table);
		$insertions .= "-- -----------------------------\n";
		$insertions .= "-- Contenu de la table " . $table . "\n";
		$insertions .= "-- -----------------------------\n";

		$textfields = array("VAR_STRING", "BLOB", "DATETIME");
		while ($nuplet = $donnees->fetch()) {
			$insertions .= "INSERT INTO " . $table . " VALUES(";
			for ($i = 0; $i < $donnees->columnCount(); $i++) {
				$meta = $donnees->getColumnMeta($i);

				$is_null = (trim($nuplet[$i]) == "" || strtolower(trim($nuplet[$i])) == "null") ? true : false;
				$is_textfield = (in_array($meta["native_type"], $textfields) && !$is_null) ? true : false;



				if ($i != 0) $insertions .=  ", ";
				if ($is_textfield) $insertions .=  "'";
				$insertions .= ($is_null) ? "NULL" : addslashes($nuplet[$i]);
				if ($is_textfield) $insertions .=  "'";
			}
			$insertions .=  ");\n";
		}
		$insertions .= "\n";
		return $insertions;
	}
	function getAllTablesValues() {
		foreach ($this->tables as $t) {
			$struct .= $this->getTableValues($t);
		}
		return $struct;
	}

	function export($save_to_file = false) {
		$sql  = "-- ----------------------\n";
		$sql .= "-- dump de la base au " . date("d-M-Y") . "\n";
		$sql .= "-- ----------------------\n\n\n";
		foreach ($this->tables as $t) {
			$sql .= $this->getTableStructure($t);
			$sql .= $this->getTableValues($t);
		}

		if ($save_to_file) {
			$save_to_file .= (substr($save_to_file, -1) != "/")  ? "/" : "";
			if (!is_dir($save_to_file)) {
				mkdir($save_to_file, 0757);
			}

			$fileName = $this->db_name . "_" . date('Ymd') . ".sql";
			$fichierDump = fopen($save_to_file . $fileName, "wb");
			fwrite($fichierDump, $sql);
			fclose($fichierDump);
			echo $fileName;
		} else {
			return $sql;
		}
	}
}

$export = new db_export($bdd, $db_name);
$export->setTableList(
	array(
		0 => "admin_login",
		1 => "tbl_translations",
		2 => "admin_config",
		3 => "tbl_professions",
		4 => "tbl_projects",
		5 => "tbl_rooms",
		6 => "tbl_projects_period",
		7 => "tbl_media_dossiers",
		8 => "tbl_media_images",
		9 => "tbl_students",
		10 => "tbl_teachers",
		11 => "tbl_projects_history",
		12 => "tbl_history_teachers",
		13 => "tbl_history_students",
		14 => "tbl_history_documents",
		15 => "students_login",
		16 => "tbl_visiteurs"
	)
);

$export->export('../../../../media/dump/');