<?php
class DBTools {
	var $bdd;

	function __construct($bdd) {
		$this->bdd['statement'] = $bdd;
	}

	function getTables() {
		$getTables = $this->bdd['statement']->query("SHOW TABLES");
		while ($table = $getTables->fetch()) {
			$res[] = $table[0];
		}
		return $res;
	}

	function getFields($table) {
		$getFields = $this->bdd['statement']->query("DESCRIBE " . $table);
		$i = 0;
		while ($field = $getFields->fetch()) {
			$res[$i]['field'] = $field['Field'];
			$res[$i]['type'] = $field['Type'];
			$res[$i]['null'] = $field['Null'];
			$res[$i]['key'] = $field['Key'];
			$res[$i]['default'] = $field['Default'];
			if (empty($field['Default'])) {
				$res[$i]['default'] = "NULL";
			}
			$res[$i]['extra'] = $field['Extra'];
			$i++;
		}
		return $res;
	}

	function getDataFromTable($table) {
		$getData = $this->bdd['statement']->query("SELECT * FROM " . $table);
		$i = 0;
		while ($data = $getData->fetch()) {
			$i++;
			foreach ($this->getFields($table) as $field) {
				$res[$i][$field['field']] = $data[$field['field']];
			}
		}

		if (count($res) < 1) {
			$res[0][$field['field']] = "";
		}

		return $res;
	}
}