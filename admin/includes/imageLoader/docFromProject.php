<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];

ImagesFromDirectory($_POST['id_directory'], "", "", "doc", 1, 0);