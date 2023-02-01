<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];

$_POST['key'] = addslashes($_POST['key']);
$preg_key = preg_replace('#\s{2,}#', ' ', $_POST['key']);

$queryTxt = "
	SELECT * FROM tbl_students 
	LEFT JOIN tbl_professions ON FKNoProfession=PKNoProfession
	WHERE ( CONCAT(name, ' ', firstname) like '%" . $preg_key . "%' OR CONCAT(firstname, ' ', name) like '%" . $preg_key . "%' )
	ORDER BY firstname, name
	LIMIT 8
	";

$query = $bdd->query($queryTxt);

$res = 0;
if ($query->rowCount() > 0 && strlen($preg_key) > 0) {
	$st_list = '<button type="button" class="student_bt void" idxStu="0000" style="background: #C5C5E2;">' . i("Ajouter un élève") . '<img src="img/icons/icon_plus.png" width="14px" style="margin-left:6px;"></button>';

	while ($student = $query->fetch()) {
		$res++;
		$st_list .= '<input type="button" class="student_bt" value="' . $student['firstname'] . ' ' . $student['name'] . '" idxStu="' . $res . '" PK="' . $student['PKNoStudent'] . '" />';
	}
} else {
	$st_list = '<button type="button" class="student_bt void" idxStu="1" style="background: #C5C5E2;">' . i("Ajouter un élève") . '<img src="img/icons/icon_plus.png" width="14px" style="margin-left:6px;"></button>';
}

echo $query->rowCount() . "###finTotal" . $st_list;