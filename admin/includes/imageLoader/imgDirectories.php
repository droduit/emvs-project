<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'] ?? "fr";

ImagesDirectories($_POST['selection'], $_POST['event_click']);