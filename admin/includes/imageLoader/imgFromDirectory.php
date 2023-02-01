<?php
require_once("../../conf/common.php");
$_SESSION['language']=$_POST['language'];

ImagesFromDirectory($_POST['id_directory'], $_POST['selection'], $_POST['event_click']);