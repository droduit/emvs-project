<?php
session_start();
require_once("conf/common.php");
ini_set('memory_limit', '600M');

if (isset($_POST['idHist']) || isset($_POST['idProj'])) {
	if (isset($_POST['idProj'])) {
		$id = $_POST['idProj'];
		$field = "FKNoProject";
	} else {
		$id = $_POST['idHist'];
		$field = "FKNoProjectHistory";
	}

	require_once("admin/plugins/ziplib/zip.lib.php");

	$zip = new zipfile();

	// liste des fichiers à compresser
	$get_files = $bdd->query(
		"SELECT * FROM tbl_history_documents
		INNER JOIN tbl_projects_history ON PKNoProjectHistory=FKNoProjectHistory
		WHERE tbl_history_documents." . $field . "=" . $id
	);
	while ($file = $get_files->fetch()) {
		$files[] = 'media/doc/' . $file['source'];
		$dir[] = $file['year'];
		$periode[] = $file['FKNoPeriode'] != null ? " - " . $file['FKNoPeriode'] : "";
	}

	$i = 0;
	while (count($files) > $i) {
		$fo = fopen($files[$i], 'r');
		$contenu = fread($fo, filesize($files[$i]));
		fclose($fo);

		$zip->addfile($contenu, $dir[$i] . $periode[$i] . "/" . str_replace('media/doc/', '', $files[$i]));
		$i++;
	}

	$archive = $zip->file(); // on associe l'archive

	// code à insérer à la place des 3lignes ( fopen, fwrite, fclose )
	header('Content-Type: application/x-zip'); //on détermine les en-tête
	header('Content-Disposition: inline; filename=sources_' . $id . '.zip');

	echo $archive;
}

$navigator = "Autre";
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false) {
	$navigator = "Firefox";
}
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false) {
	$navigator = "Internet";
}
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false) {
	$navigator = "Opera";
}
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false) {
	$navigator = "Chrome";
}
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') === false) {
	$navigator = "Safari";
}

$pc = detectMobile() ?  "0" : "1";

$existVisiteur = $bdd->query("SELECT * FROM tbl_visiteurs WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "'");
if ($existVisiteur->rowCount() < 1) {
	$bdd->exec("INSERT INTO tbl_visiteurs VALUES (NULL, '" . $_SERVER['REMOTE_ADDR'] . "', '" . $navigator . "', '" . getOS($_SERVER['HTTP_USER_AGENT']) . "', '" . $pc . "', '" . date('Y-m-d H:i:s') . "')");
} else {
	$bdd->exec("UPDATE tbl_visiteurs SET last_visit='" . date('Y-m-d H:i:s') . "' WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "'");
}

if (!$_SESSION['language'] || !isset($_SESSION['language'])) {
	$_SESSION['language'] = "fr";
}
if (isset($_COOKIE['language'])) {
	$_SESSION['language'] = $_COOKIE['language'];
}
?>
<!DOCTYPE HTML>
<html lang="fr">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>EP :: EMVs Projects</title>

        <link rel="icon" type="image/png" href="img/favicon.png" />
        <link rel="stylesheet" type="text/css" href="design/print.css" media="print">
        <link rel="stylesheet" type="text/css" href="design/screen.css" media="screen">
        <link rel="stylesheet" type="text/css" href="design/website.css" media="screen">
        <link rel="stylesheet" href="admin/design/tipsy.css" type="text/css">


        <script type="text/javascript" src="js/jquery-1.js"></script>
        <script type="text/javascript" src="admin/js/common.js"></script>
        <script type="text/javascript" src="admin/js/jquery.tipsy.js"></script>
        <script type="text/javascript" src="js/common.js"></script>

        <script>
        $(function() {
            $('.logoEMVs,#flags a').tipsy({
                gravity: "n",
                opacity: 0.7
            });
        });
        </script>

        <?php
	$key_lang = array_keys($language_list);
	if (isset($_GET['lang']) && in_array($_GET['lang'], $key_lang)) {
		$_SESSION['language'] = $_GET['lang'];
		refresh(0, substr($_SERVER['REQUEST_URI'], 0, -8));
	}
	?>
    </head>

    <body>
        <div id="theater">
            <div class="indications"><?= i("Cliquez n'importe où pour retourner à la page"); ?></div>
        </div>

        <div id="header">
            <div class="container">
                <a id="logo" href="index.php"><img src="img/logo.png" alt="EMVs Projects"></a>
                <div id="menu">
                    <ul>
                        <?php
					$nav = array(
						array(i('Accueil'), '?p=home'),
						array(i('Projets'), '?p=projects'),
						array(i('Apprentis'), '?p=students'),
						array(i('Enseignants'), '?p=teachers')
					);

					$i = 0;
					foreach ($nav as $n) { ?>
                        <li <?php if ($i == 0) { ?>class="first" <?php } ?>><a href="<?= $n[1]; ?>"><?= $n[0]; ?></a>
                        </li>
                        <?php $i++;
					} ?>
                    </ul>
                </div>

                <div id="flags">
                    <ul>
                        <?php
					// Si on a deja des variables d'URL, on va utiliser & sinon ?
					$delim = strpos($_SERVER['REQUEST_URI'], '?') != false ? "&" : "?";
					foreach ($language_list as $langlst => $label) {	?>
                        <li <?php if ($langlst == $_SESSION['language']) { ?>class="current" <?php } ?>>
                            <a href="<?= $_SERVER['REQUEST_URI'] . $delim . 'lang=' . $langlst ?>"
                                title="<?= fullUpper($langlst) ?>">
                                <img src="img/<?= strtolower($langlst) . '_' . strtoupper($langlst) ?>.png"
                                    alt="<?= $langlst ?>">
                            </a>
                        </li>
                        <?php
					}
					?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="wrapper">
                <div class="container">
                    <div class="showcase span-22 prefix-1 suffix-1 last">
                        <?php
					$home = "includes/home.php";
					if (!isset($_GET['p'])) {
						if (isset($_GET['logout'])) {
							include_exists("blank", "Rechargement dans 2 secondes", "Déconnexion");
							refresh(2000, "?success");
						} else {
							if (!isset($_GET['profil'])) {
								include_exists($home, "La page d'accueil n'existe pas, veuillez la créer...");
							} else {
								include_exists("profile.php", "Profil indisponible");
							}
						}
					} else {
						$page = "includes/" . str_replace('~', '/', $_GET['p']) . ".php";
						include_exists($page);
					}
					?>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer">
            <div class="container">
                <div class="copyright span-6 prefix-1">
                    <p class="caps top"><a href="index.php" class="logo">EMVs</a>
                        Copyright © 2012<br>
                        All rights reserved<br>
                    </p>
                </div>
                <div class="span-16 sufix-1 last">
                    <p class="right top">
                        <a href="http://www.emvs.ch/"><img class="logoEMVs" src="img/logo_emvs.png"
                                alt="EMVs - Ecole des métiers du Valais" title="Rejoindre le site EMVs"></a>
                    </p>
                </div>
            </div>
        </div>


    </body>

</html>