<?php session_start();
require_once('../admin/conf/mysql.php');
require_once('conf/global.php');
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
        <title>StudentZone :: EMVs-Projects</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">

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
                    'running=1&language=<?= $_SESSION['language']; ?>', 550, 'PDF Generator')
                return false;
            });
        });
        </script>

    </head>

    <body>
        <div id="main" class="container_12">
            <?php
		if (isset($_SESSION['login']) && is_logged($_SESSION['login'])) {
			$get_student_login = $bdd->query("SELECT * FROM students_login WHERE PKNoMembre='" . getID($_SESSION['login']) . "'");
			$stu_login = $get_student_login->fetch();

			$get_student = $bdd->query("SELECT * FROM tbl_students WHERE email='" . $stu_login['email'] . "'");
			$stu = $get_student->fetch();
		?>
            <div id="header">
                <div class="grid_3"><a id="logo" class="float_left">StudentZone</a></div>

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
                        <?php if (!empty($stu['FKNoMediaImage'])) { ?>
                        <div
                            style="background:url(../media/photo/<?= getImg($stu['FKNoMediaImage']); ?>) no-repeat 50% 50%; background-size: cover; height: 44px; width: 44px;">
                        </div>
                        <?php } else { ?>
                        <img src="img/avatar.jpg" height="44" />
                        <?php } ?>
                    </div>
                    <div id="profileinfo">
                        <h3 id="username"></h3>
                        <span id="subline"><?= ($stu['firstname'] ?? "") . " " . ($stu['name'] ?? "") ?></span>
                        <div class="clear"></div>
                        <a href="?profil" class="profilebutton">Paramètres</a>
                    </div>
                </div>

                <ul id="navigation">
                    <?php
					$nav = array(
						array(
							i("Config"), "?p=config", "icon_settings",
							array(
								array(i("Général"), "?p=config"),
								array(i("Gestion des salles"), "?p=config&o=roomsOrder"),
								array(i("Traductions"), "?p=config&o=translation")
							)
						),
						array("PDF Gen'", "#", "icon_pdf pdfGen", array()),
						array(i("Apprentis"), "?p=student_list", "icon_users", array()),
						array(i("Enseignants"), "?p=teacher_list", "icon_users", array()),
						array(i("Projets"), "?p=project_list", "icon_article", array()),
						array("Logout", "?logout", "icon_power", array())
					);

					$nav = array(
						array(i("Profil"), "?p=students~edit", "icon_article", array()),
						array("Logout", "?logout", "icon_power", array())
					);
					?>

                    <?php
					foreach ($nav as $n) { ?>

                    <li>
                        <a href="<?= $n[1]; ?>" class="<?= $n[2]; ?>"><?= $n[0]; ?></a>

                        <?php
							// Affichage d'un sous menu s'il y en a un ou plusieurs
							if (is_array($n[3])) {
								if (count($n[3]) > 0) { ?>
                        <ul>
                            <?php foreach ($n[3] as $sn) { ?>
                            <li><a href="<?= $sn[1]; ?>"><?= $sn[0]; ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php
								}
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
			if (!isset($_SESSION['login']) || !is_logged($_SESSION['login'])) {
				include_exists("login.php", "La zone d'administration est indisponible");
			} else {
				$home = "profile.php";
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

        <?php $bdd = null; ?>

    </body>

</html>