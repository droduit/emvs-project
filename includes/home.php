<?php
global $bdd;

$lang = ($_SESSION['language'] != "fr" && $_SESSION['language'] != "de") ? "fr" : ($_SESSION['language'] ?? "fr");

if (isset($_POST['next'])) {
	require_once('../conf/common.php');
	$_SESSION['language'] = $_POST['language'];
}
?>

<div class="contenuHome">
    <?php
	$get_projects = $bdd->query(
		"SELECT tbl_projects_history.FKNoMediaImage, PKNoProject, year, PKNoProfession, name_" . $lang . ", title_de, title_fr, desc_fr, desc_de FROM tbl_projects 
	LEFT JOIN tbl_projects_history ON PKNoProject=FKNoProject
	LEFT JOIN tbl_history_students ON FKNoHistory=PKNoProjectHistory
	LEFT JOIN tbl_students ON FKNoStudent=PKNoStudent
	LEFT JOIN tbl_professions ON tbl_students.FKNoProfession=PKNoProfession
	WHERE archive IS NULL
	GROUP BY tbl_projects_history.FKNoMediaImage, PKNoProject, year, PKNoProfession, name_" . $lang . ", title_de, title_fr, desc_fr, desc_de
	ORDER BY year DESC, PKNoProfession, title_" . $lang
	);

	$annee = 0;
	$profession = "";
	$minYear = 0;
	while ($proj = $get_projects->fetch()) {
		// URL de l'image
		$img = (empty($proj['FKNoMediaImage'])) ? "" : str_replace('../', '', getImg($proj['FKNoMediaImage']));

		$display = $proj['year'] == 2012 ? "block" : "none";

		// Création des div d'image
		$img = empty($img) ?
			'<div style="border-radius: 6px; width:180px; height: 100px; line-height: 99px; background: #fff; color: #666"><i>' . i("Pas d'image") . '</i></div>' :
			'<div style="border-radius: 6px; box-shadow: inset 0px 0px 2px 2px #bbb; background:url(' . $img . ') no-repeat 50% 50%; background-color: white; background-size: cover; height: 100px; width: 180px"></div>';

		// Séparation des années
		if ($annee != $proj['year']) {
			echo '<div class="clear"></div>' .
				'<div annee="' . $proj['year'] . '" class="span-22 center last" style="border:1px solid #FFCB97; text-align:center; background: #FFEBD7; padding: 15px 7px; border-radius: 6px; margin-left:-7px; margin-bottom:0px;display:' . $display . '">' .
				'<h1 style="font-family: Verdana, Geneva, sans-serif; margin:0; margin-right: 25px; text-shadow:none">' . i("Projets") . " " . $proj['year'] . '</h1>' .
				'</div>';
		}
		$annee = $proj['year'];

		// Séparation des professions
		if ($profession != $proj['PKNoProfession']) {
			echo '<div class="clear"></div>' .
				'<h2 class="profTitle _' . $proj['PKNoProfession'] . '" annee="' . $proj['year'] . '" style="display:' . $display . '">' . $proj['name_' . $lang] . '</h2>';
		}
		$profession = $proj['PKNoProfession'];

		// Formattage du titre
		$titre = ($proj['title_' . $lang] == "") ? stripslashes($proj['title_fr']) : stripslashes($proj['title_' . $lang]);;

		$lien = "?p=projects&id=" . $proj['PKNoProject'];

		$desc = html_entity_decode($proj['desc_' . (empty($proj['desc_' . $lang]) ? 'fr' : $lang)] ?? "");
		$desc = strip_tags(stripslashes($desc));
		$desc = strpos($desc, '.') ? substr($desc, 0, strpos($desc, '.') + 1) : strip_tags($desc);
		$desc = stripslashes($desc);
		$desc = str_replace('"', '', $desc);
	?>
    <div title="<?= $desc ?>" onclick="window.location='<?= $lien ?>'" annee="<?= $proj['year'] ?>"
        class="projet <?= "_" . $proj['PKNoProfession'] ?>" style="display:<?= $display ?>">
        <a href="<?= $lien ?>">
            <div class="image" align="center" style="margin-bottom: 2px;"><?= $img ?></div>
        </a>
        <div class="titre"
            style="width:180px; height: 22px; overflow:hidden; <?php if (strlen($proj['title_' . $lang]) > 30) { ?>font-size:11px<?php } ?>">
            <?= $titre ?></div>
    </div>
    <?php
		$minYear = $proj['year'];
	} ?>
</div>



<?php if (!isset($_GET['p'])) { ?><div style="position:absolute; top:39%; left: 49%" class="loader"><img
        src="img/ajax-loader.gif" /></div><?php } ?>

<div class="clear"></div>

<div class="void" style="display:none;text-align:center; margin-top: 195px; font-size: 18pt; font-weight: bold">
    <?= i("Aucun projet cette année là"); ?></div>

<style>
.projet {
    padding: 8px 12px;
    float: left;
    margin: 4px 6px;
    margin-left: 0;
    border-radius: 10px;
    background: #eaeaea;
    cursor: pointer;
    font-family: Tahoma, Geneva, sans-serif;
    min-width: 185px;
    max-width: 185px;
    overflow: hidden;
    text-align: center;
    transition: all 0.15s linear;
    -moz-transition: all 0.15s linear;
    border: 1px solid #ddd;
}

.projet:hover {
    background: #d0d0d0;
}

.titre {
    text-shadow: 0px 1px 0px white;
}

.btNav {
    cursor: pointer;
    width: 69px;
    height: 75px;
}

.btNav.next {
    background: url(img/next.png) no-repeat;
}

.btNav.previous {
    background: url(img/previous.png) no-repeat;
}

.btNav.previous:hover {
    background: url(img/previousH.png) no-repeat;
}

.btNav.next:hover {
    background: url(img/nextH.png) no-repeat;
}

.prev {
    position: fixed;
    margin-left: -48px;
    margin-top: 180px;
}

.nex {
    position: fixed;
    margin-left: 930px;
    margin-top: 180px;
}

.tipsy {
    font-size: 9pt;
    font-family: Arial, Helvetica, sans-serif;
    line-height: 1.2em;
}

.profTitle {
    padding-bottom: 8px;
    margin-bottom: 5px
}

.profTitle._1 {
    color: #900;
    border-bottom: 1px dotted #a00;
}

.profTitle._2 {
    color: #090;
    border-bottom: 1px dotted #0a0;
}

.profTitle._3 {
    color: #009;
    border-bottom: 1px dotted #00a;
}
</style>

<script>
$(function() {

    <?php if (!isset($_GET['p'])) { ?>
    $(".contenuHome").css("opacity", 0);
    setTimeout(function() {
        $('.contenuHome,.btNav.previous').animate({
            opacity: 1
        }, 1200).fadeIn(500);
        $('.loader').fadeOut(500);
    }, 500);
    <?php } ?>

    var anneeInit = 2012;
    var annee = anneeInit;
    var anneeMin = 2006;

    $("#content .container").prepend(
        '<div class="prev">' +
        '<div class="btNav previous" title="' + (annee - 1) +
        '" <?php if (!isset($_GET['p'])) { ?>style="display:none"<?php } ?>></div>' +
        '</div>' +
        '<div class="nex">' +
        '<div style="display:none" class="btNav next" title="' + (annee + 1) + '"></div>' +
        '</div>'
    );

    $('.btNav').tipsy({
        gravity: "s",
        live: true
    });

    $('.btNav').live('click', function() {
        elm = $(this);

        if (annee - 1 != anneeMin - 2) {
            if ($(this).hasClass("previous")) {
                annee--;
            } else {
                annee++;
            }
        } else {
            annee = anneeInit;
        }

        $(".showcase").slideUp("medium", function() {
            $("*[annee]").css("display", "none");
            $('*[annee="' + annee.toString() + '"]').css("display", "");

            if ($('*[annee="' + annee.toString() + '"]').size() == 0) {
                $(".void").css("display", "");
            } else {
                $(".void").css("display", "none");
            }

            $('.previous').attr("title", annee - 1);
            if (elm.hasClass('previous')) {
                $('.tipsy .tipsy-inner').html(annee - 1);
            }

            $('.next').attr("title", annee + 1);
            if (elm.hasClass('next')) {
                $('.tipsy .tipsy-inner').html(annee + 1);
            }

            setTimeout(function() {
                $(".showcase").fadeIn("medium");
            }, 50);
        });

        if (annee == anneeInit) {
            $(".next").fadeOut("fast");
        } else {
            $(".next").fadeIn("medium");
        }

        if (annee == anneeMin) {
            $(".previous").fadeOut("fast");
        } else {
            $(".previous").fadeIn("medium");
        }

    });

    var delay;
    var sens = 0;
    $(".projet .image").mouseover(function() {
        sens = 0;
        clearInterval(delay);
        elm = $(this);

        Top = 1;
        changePosition(elm, Top);

        delay = setInterval(function() {
            if (sens == 0) {
                if (Top < 100) {
                    Top = Top + 5;
                } else {
                    sens = 1;
                }
            }
            if (sens == 1) {
                if (Top > 5) {
                    Top = Top - 5;
                } else {
                    sens = 0;
                }
            }
            changePosition(elm, Top);
        }, 70);
    }).mouseout(function() {
        clearInterval(delay);
        $(this).find("div").css("background-position", "50% 50%")
    });
    $(".projet").tipsy({
        gravity: "s",
        html: true,
        opacity: 0.95
    });
});



function changePosition(elm, Top) {
    elm.find("div").css("background-position", "0px " + (Top.toString()) + "%");
}
</script>