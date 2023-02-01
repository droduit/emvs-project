<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];

$_POST['key'] = addslashes($_POST['key']);
$preg_key = preg_replace('#\s{2,}#', ' ', $_POST['key']);

$queryTxt = "
	SELECT * FROM tbl_teachers
	WHERE ( CONCAT(name, ' ', firstname) like '%" . $preg_key . "%' OR CONCAT(firstname, ' ', name) like '%" . $preg_key . "%' )
	ORDER BY firstname, name
	LIMIT 8
	";

$query = $bdd->query($queryTxt);

$res = 0;
if ($query->rowCount() > 0 && strlen($preg_key) > 0) {
	while ($student = $query->fetch()) {
		$res++;
		$st_list .= '<input type="button" class="teacher_bt" value="' . $student['firstname'] . ' ' . $student['name'] . '" idxStu="' . $res . '" PK="' . $student['PKNoTeacher'] . '" />';
	}
} else {
	$st_list = "";
}

echo $query->rowCount() . "###finTotal" . $st_list;