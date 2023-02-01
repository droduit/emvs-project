<?php
function stripslashes_recursive($input) {
	if (is_array($input)) {
		return array_map(__FUNCTION__, $input);
	} else {
		return stripslashes($input);
	}
}

function clean_recursive($input) {
	if (is_array($input)) {
		return array_map(__FUNCTION__, $input);
	} else {
		return str_replace('-', ' ', $input);
	}
}

$post = str_replace(array('###n###', '###r###'), array("\n", "\r"), 	$_POST['post']);

$data = unserialize($post);

$data = stripslashes_recursive($data);

$title_fr = clean_recursive($data['title_fr']);
$title_de = $data['title_de'];
$prof = $data['prof'];
$student = $data['student'];
$teacher = $data['teacher'];
$salle = $data['salle'];
$desc_fr = $data['desc_fr'];
$desc_de = $data['desc_de'];
$img = $data['img'];

$keys = array_keys($title_fr);

print_r($data);