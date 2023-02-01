<?php session_start();
require_once('conf/common.php');

if (!$_SESSION['language']) {
	$_SESSION['language'] = "fr";
}
if (isset($_COOKIE['language'])) {
	$_SESSION['language'] = $_COOKIE['language'];
}

if (isset($_GET['logout'])) {
	unset($_SESSION['login']);
}
if (isset($_GET['sess_id'])) {
	$_SESSION['login'] = $_GET['sess_id'];
	expulse_if_not_logged($_SESSION['login']);
}
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>EMVs-Projects [Admin]</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">

        <link rel="icon" type="image/png" href="img/favicon.png" />
        <link rel="stylesheet" href="design/reset.css" type="text/css">
        <link rel="stylesheet" href="design/grid.css" type="text/css">
        <link rel="stylesheet" href="design/style.css" type="text/css">
        <link rel="stylesheet" href="design/dark-hive/jquery-ui-1.8.17.custom.css" type="text/css">
        <link rel="stylesheet" href="design/window/design.css" type="text/css">
        <link rel="stylesheet" href="design/tipsy.css" type="text/css">



        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.tipsy.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.18.full.min.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
        <script type="text/javascript" src="js/jquery.corner.js"></script>
        <script type="text/javascript" src="js/common.js"></script>
        <script type="text/javascript" src="js/js.js"></script>
        <script type="text/javascript" src="js/custom.window.js"></script>

        <script>
        $(function() {
            // Sur le clique de l'onglet du menu "PDF Gen'"
            $(".pdfGen").click(function() {
                $("#theater").fadeIn("slow");
                $('#theater').unbind('click');
                $('.closeWindow').bind('click', function() {
                    $("#theater").fadeOut("slow");
                });

                openWindow('includes/pdfGenerator.php',
                    'running=1&language=<?= $_SESSION['language'] ?>', 550, 'PDF Generator')
                return false;
            });
        });
        </script>

    </head>

    <body>
        <div id="main" class="container_12">
            <?php
		if (is_logged($_SESSION['login'] ?? null)) { ?>
            <div id="header">
                <div class="grid_3">
                    <a href="#" id="logo" class="float_left">Admin Labo-EMVs</a>
                    <a href="?p=statistiques~visiteurs">
                        <div class="stat" style="background: url(img/icons/icon_statistics.png) no-repeat top center;"
                            title="Statistiques"></div>
                    </a>
                    <a href="?p=config">
                        <div class="stat"
                            style="background: url(img/icons/icon_settings.png) no-repeat top center; margin-left: 164px"
                            title="Configuration"></div>
                    </a>
                </div>

                <div class="grid_4 push_5" style="display: none">
                    <div id="search">
                        <input placeholder="<?= i("Recherche..."); ?>" id="searchinput" name="search" type="text">
                        <input id="searchbutton" name="search" type="submit">
                    </div>
                </div>
            </div>

            <div class="clear"></div>

            <div id="userbar">
                <div id="profile" style="border-radius: 5px 0 0 5px;">
                    <div id="avatar">
                        <img src="img/avatar4.jpg" alt="Avatar" height="44">
                    </div>
                    <div id="profileinfo">
                        <h3 id="username"></h3>
                        <span id="subline" onClick="window.location='?profil'"
                            style="cursor:pointer"><?= get_ip(); ?></span>
                        <div class="clear"></div>
                        <a href="?p=users" class="profilebutton">Admin</a>
                    </div>
                </div>

                <ul id="navigation">
                    <?php
					$nav = array(
						array(
							i("Outils"), "?p=tools", "icon_tools",
							array(
								array(i("Base de donnée"), "?p=tools&o=db"),
								// array(i("Configuration"), "?p=tools&o=config"),
								array(i("Gestion des salles"), "?p=config&o=roomsOrder"),
								array(i("Médias"), "?p=tools&o=medias"),
								array(i("Traductions"), "?p=config&o=translation"),
							)
						),
						array("PDF Gen'", "#", "icon_pdf pdfGen", array(
							array(i("Configuration"), "?p=pdfGenerator~config")
						)),
						array(i("Apprentis"), "?p=student_list", "icon_users", array()),
						array(i("Enseignants"), "?p=teacher_list", "icon_users", array()),
						array(i("Projets"), "?p=project_list", "icon_article", array()),
						array("Logout", "?logout", "icon_power", array())
					);
					?>

                    <?php
					foreach ($nav as $n) { ?>

                    <li>
                        <a href="<?= $n[1]; ?>" class="<?= $n[2]; ?>"><?= $n[0]; ?></a>

                        <?php
							// Affichage d'un sous menu s'il y en a un ou plusieurs
							if (is_array($n[3]) && count($n[3]) > 0) { ?>
                        <ul>
                            <?php foreach ($n[3] as $sn) { ?>
                            <li><a href="<?= $sn[1]; ?>"><?= $sn[0]; ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php
							} ?>

                    </li>
                    <?php
					} ?>

                </ul>
            </div>

            <div class="clear"></div>
            <?php } ?>

            <div id="body">
                <?php
			if (!is_logged($_SESSION['login'] ?? null)) {
				include_exists("login.php", "La zone d'administration est indisponible");
			} else {
				$home = "includes/project_list.php";
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
			}
			?>
                <div class="clear"></div>
            </div>

        </div>

        <?php $bdd = null ?>

    </body>

</html>