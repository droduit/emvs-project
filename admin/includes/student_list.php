<?php
global $bdd;
$pageName = "students";

// Génére l'adresse mail par rapport au nom/prénom
function mailGenerate($prenom, $nom) {
	$email = "";
	$mail = explode('|', get_parm('email_student'));

	// Si le nom est en 1ere position
	if (strpos($mail[0], 'nom') != false) {
		$arg[0] = "nom";
		$arg[1] = "prenom";
		$slct[0] = $nom;
		$slct[1] = $prenom;
	} else { // Sinon, c'est le prenom qui est en premiere position
		$arg[0] = "prenom";
		$arg[1] = "nom";
		$slct[0] = $prenom;
		$slct[1] = $nom;
	}

	// Si la premiere position n'est pas gardée en entier
	if (str_replace('[' . $arg[0] . ']=', '', $mail[0]) != "*") {
		$email .= substr($slct[0], 0, str_replace('[' . $arg[0] . ']=', '', $mail[0]));
	} else {
		$email .= $slct[0];
	}

	// Deuxieme position = séparateur
	$email .= $mail[1];

	// Si la troisieme position n'est pas gardée en entier
	if (str_replace('[' . $arg[1] . ']=', '', $mail[2]) != "*") {
		$email .= substr($slct[1], 0, str_replace('[' . $arg[1] . ']=', '', $mail[2]));
	} else {
		$email .= $slct[1];
	}

	// Terminaison de l'email
	$email .= "@" . $mail[3];
	$email = fullLower(trim($email));

	return $email;
}


// Importation du fichier
if (isset($_FILES['file_import']['tmp_name'])) {
	if (is_uploaded_file($_FILES['file_import']['tmp_name'])) {
		$filename = $_FILES['file_import']['tmp_name'];
		$handle = fopen($filename, "r");
		$content = fread($handle, filesize($filename));
		$content = explode("\n", $content);

		foreach ($content as $c) {
			if (!empty($c)) {
				$lignes[] = explode(';', utf8_encode($c));
			}
		}

		$job = array();
		$getProfession = $bdd->query("SELECT * FROM tbl_professions");
		while ($prof = $getProfession->fetch()) {
			$job[$prof['PKNoProfession']] = $prof['name_' . $_SESSION['language']];
		}

		// Enregistrement dans la base de donnée
		$mail = explode('|', get_parm('email_student'));
		$sql = "INSERT INTO tbl_students VALUES";
		$html = "<table align=\"center\" class=\"import_result aide\" style=\"margin:15px auto\"><tr><th>" . i("Nom") . "</th><th>" . i("Prénom") . "</th>" . " <th>" . i("E-mail") . "</th> <th>" . i("Entrée") . "</th> <th>" . i("Sortie") . "</th> <th>" . i("Profession") . "</th><th>" . i("Statut") . "</th></tr>";
		foreach ($lignes as $l) {
			if (empty($l[0])) {
				$nom = "NULL";
			} else {
				$nom = "'" . addslashes(trim($l[0])) . "'";
			}
			if (empty($l[1])) {
				$prenom = "NULL";
			} else {
				$prenom = "'" . addslashes(trim($l[1])) . "'";
			}
			if (empty($l[2])) {
				$email = "NULL";
			} else {
				if ($l[2] == "#") {
					// Construction de l'adresse mail
					$email = "'" . mailGenerate(substr(no_accent($prenom), 1, -1), substr(no_accent($nom), 1, -1)) . "'";
				} else {
					$email = "'" . addslashes(trim($l[2])) . "'";
				}
			}
			if (empty($l[3])) {
				$entree = "NULL";
			} else {
				$entree = addslashes(trim($l[3]));
			}
			if (empty($l[4])) {
				$sortie = "NULL";
			} else {
				$sortie = addslashes(trim($l[4]));
			}

			// Controle que l'eleve n'existe pas deja
			$getExist = $bdd->query("SELECT * FROM tbl_students WHERE firstname like '" . substr($prenom, 1, -1) . "%' AND name like '" . substr($nom, 1, -1) . "%' ");

			if (isset($_POST['accept_doublon'])) {
				if ($getExist->rowCount() > 0) {
					$tdStatut = i("Deja existant");
					$status = 1;
				} else {
					$sql .= "(NULL, " . $nom . ", " . $prenom . ", " . $email . ", " . $entree . ", " . $sortie . ", NULL, " . intval($l[5]) . "),";
					$tdStatut = i("Ajouté");
					$status = 0;
				}
			} else {
				$sql .= "(NULL, " . $nom . ", " . $prenom . ", " . $email . ", " . $entree . ", " . $sortie . ", NULL, " . intval($l[5]) . "),";
				$tdStatut =	i("Ajouté");
				$status = 0;
			}

			$html .= "
		<tr class=\"_" . $status . "\">
			<td>" . substr($nom, 1, -1) . "</td><td>" . substr($prenom, 1, -1) . "</td><td>" . substr($email, 1, -1) . "</td><td>" . $entree . "</td><td>" . $sortie . "</td><td>" . $job[intval($l[5])] . "</td><td class=\"status\">" . $tdStatut . "</td>
		</tr>
		";
		}
		$sql = substr($sql, 0, -1);
		$html .= "</table>";

		$bdd->exec($sql);
?>

<textarea id="html" style="display:none"><?= $html; ?></textarea>
<div class="success grid_12">
    <h3><?= i("Importation terminée avec succès"); ?></h3>
    <a class="hide_btn" href="#">&nbsp;</a>
</div>
<div class="clear"></div>

<script>
$(function() {
    openWindow('includes/students/import.php', 'language=<?= $_SESSION['language']; ?>', 650,
        '<?= i("Résultat"); ?>');

    setTimeout(function() {
        $("#window .container").html($("#html").val());
    }, 500);
});
</script>
<?php
	}
}
?>

<style>
.aide td {
    padding: 4px 8px;
    border: 1px solid black;
}

.aide th {
    padding-bottom: 6px;
    border-bottom: 2px solid black;
}

.aide td.res {
    border-left: 2px solid black;
    border-right: 2px solid black;
    background: #CEE7FF;
}

td.status {
    border-left: 2px solid black;
    text-align: center;
}

tr._0 td.status {
    background: #6C6;
}

tr._1 td.status {
    background: #FF9;
}
</style>

<style>
.container_12 .small {
    width: 200px;
}

.container_12 .medium {
    width: 740px;
}
</style>

<?php
if (!is_chrome()) { ?>
<style>
.container_12 .small {
    position: fixed;
}
</style>
<?php
}
?>

<!--[if gte IE 5.5]>
<![if lt IE 10]>
<style type="text/css">
.container_12 .small {
    position: relative;
}
</style>
<![endif]>
<![endif]-->

<div class="block small">
    <div class="titlebar">
        <h3><?= i("Affichage"); ?></h3>
    </div>
    <div class="block_cont">

        <div style="float:left; width: 167px; margin-right: 15px; padding: 5px">

            <div class="title_param"><?= i("Année début formation"); ?></div>
            <div class="parameters">
                <label for="itemALL_y">
                    <div class="labeled selected">
                        <input type="radio" id="itemALL_y" name="year" value="all" />
                        <?= i("Toutes"); ?>
                    </div>
                </label>

                <?php
				$get_years = $bdd->query("SELECT yearEntree as year FROM tbl_students WHERE yearEntree IS NOT NULL GROUP BY yearEntree ORDER BY yearEntree DESC LIMIT 8");

				if ($get_years->rowCount() > 0) {
					while ($year = $get_years->fetch()) {
				?>
                <label for="item<?= $year['year']; ?>">
                    <div class="labeled ">
                        <input <?php if ((date('Y') - 3) == $year['year']) { ?>checked="checked" <?php } ?> type="radio"
                            id="item<?= $year['year']; ?>" name="year" value="<?= $year['year']; ?>" />
                        <?= $year['year']; ?>
                    </div>
                </label>
                <?php
					}
				}
				?>
            </div>

            <div class="title_param"><?= i("Profession"); ?></div>
            <div class="parameters">
                <label for="itemALL_p">
                    <div class="labeled selected">
                        <input type="radio" checked="checked" id="itemALL_p" name="prof" value="all" />
                        <?= i("Toutes"); ?>
                    </div>
                </label>
                <?php
				$get_profession = $bdd->query("SELECT PKNoProfession, name_" . language . " FROM tbl_professions ORDER BY name_" . language . " ASC");
				while ($profession = $get_profession->fetch()) {
				?>
                <label for="item<?= $profession['name_' . language]; ?>">
                    <div class="labeled">
                        <input type="radio" id="item<?= $profession['name_' . language]; ?>" name="prof"
                            value="<?= $profession['PKNoProfession']; ?>" />
                        <?= $profession['name_' . language]; ?>
                    </div>
                </label>
                <?php
				}
				?>
            </div>


            <div class="title_param"><?= i("Tri"); ?></div>
            <div class="parameters">
                <?php
				$get_tri = array(
					i("Ascendant") => "ASC",
					i("Descendant") => "DESC"
				);
				$triN = 0;
				foreach ($get_tri as $tri => $label) {
					$triN++;
				?>
                <label for="item<?= $tri; ?>">
                    <div class="labeled <?php if ($triN == 1) {
												echo 'selected';
											} ?>">
                        <input type="radio" <?php if ($triN == 1) { ?> checked="checked" <?php } ?>
                            id="item<?= $tri; ?>" name="tri" value="<?= $label; ?>" />
                        <?= $tri; ?>
                    </div>
                </label>
                <?php
				}
				?>
            </div>

            <div class="title_param"><?= i("Chercher"); ?></div>
            <div class="parameters">
                <input type="text" placeholder="<?= i("Nom/Prénom de l'élève"); ?>" autocomplete="off"
                    style="border:1px solid #ddd; padding: 2px 3px; border-radius: 4px; width: 159px; font-size: 9pt"
                    id="search_i" />
            </div>
        </div>

        <div style="clear:both"></div>
    </div>
</div>


<div class="block medium">
    <div class="titlebar">
        <h3><?= i("Liste des élèves"); ?></h3>
        <a href="?p=<?= $pageName; ?>~add" class="toggle show tipsys" title="<?= i("Nouveau"); ?>">&nbsp;</a>

        <a onclick="openWindow('includes/students/import.php','language=<?= $_SESSION['language']; ?>',500,'<?= i("Importer"); ?>');"
            class="toggle import tipsys" title="<?= i("Importer"); ?>" style="right:35px; top:11px">&nbsp;</a>
    </div>
    <div class="block_cont">

        <div id="projectlist"><?php include_once($pageName . "/list.php"); ?></div>

    </div>
</div>



<div id="dialog-confirm" title="<?= i("Confirmer la suppression"); ?>" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
    <p><b><?= i("Cet élève va être éffacé."); ?></b></p><br><?= i("Voulez-vous poursuivre ?"); ?></p>
</div>

<script>
$(function() {
    // Comme le panneau pour le filtrage est en position fixe, s'il est trop grand
    // on ne voit plus la fin au bout d'un moment, il faut donc le redimensionner par rapport a la taille de l'ecran
    resizePanel();
    $(window).resize(function() {
        resizePanel();
    });

    $("#search_i").focus();
    $(".tipsys").tipsy({
        gravity: "s",
        fade: true
    });


    if ((document.body.clientWidth) < 1250) {
        gravite = "s";
    } else {
        gravite = "e";
    }
    $('tr[projectid]').tipsy({
        gravity: gravite,
        html: true,
        live: true,
        opacity: 1
    });

    // Sélectionne automatiquement les enregistrements générés l'année en cours s'il y en a
    if ($('input[name="year"][id="item<?= date('Y') - 3; ?>"]').size() > 0) {
        $("#projectlist").css("display", "none");
        $('input[name="year"][id="item<?= date('Y') - 3; ?>"]').trigger("click");
        $('input[name="year"][id="item<?= date('Y') - 3; ?>"]').parent().parent().parent().find(".labeled")
            .removeClass("selected");
        $('input[name="year"][id="item<?= date('Y') - 3; ?>"]').parent().addClass("selected");

        $.post('includes/<?= $pageName; ?>/list.php', {
            year: "<?= date('Y') - 3; ?>",
            tri: "ASC",
            profession: "all",
            archive: "0",
            key: "",
            language: "<?= language; ?>"
        }, function(respons) {
            $("#projectlist").html(respons);
            $("#projectlist").slideDown("medium");
        });
    }

    $('.parameters input[type="radio"]').click(function() {
        $(this).parent().parent().parent().find(".labeled").removeClass("selected");
        $(this).parent().addClass("selected");

        var year_v = $('input[name="year"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();
        var tri_v = $('input[name="tri"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();
        var prof_v = $('input[name="prof"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();

        $.post('includes/<?= $pageName; ?>/list.php', {
            year: year_v,
            tri: tri_v,
            profession: prof_v,
            key: $("#search_i").val(),
            language: "<?= language; ?>"
        }, function(respons) {
            $("#projectlist").html(respons);
        });
    });

    $("#search_i").keyup(function() {
        $('input[name="year"][value="all"]').trigger("click");
        $('input[name="prof"][value="all"]').trigger("click");

        var year_v = $('input[name="year"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();
        var tri_v = $('input[name="tri"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();
        var prof_v = $('input[name="prof"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();

        $.post('includes/<?= $pageName; ?>/list.php', {
            year: year_v,
            tri: tri_v,
            profession: prof_v,
            key: $(this).val(),
            language: "<?= language; ?>"
        }, function(respons) {
            $("#projectlist").html(respons);
            // Recherche dans toutes les années
            $('input[name="year"][id="itemALL_y"]').trigger("click");
        });
    });

    $("a.action.delete").live('click', function() {
        var idProj = $(this).parent().parent().parent().attr("projectid");
        $('table.projects tr[projectid]').css("background", "");
        $('table.projects tr[projectid="' + idProj + '"]').css("background", "#FDBD84");

        $("#dialog-confirm").dialog({
            resizable: false,
            height: 150,
            modal: false,
            buttons: {
                "<?= i("Confirmer"); ?>": function() {
                    $(this).dialog("close");
                    $.post('includes/<?= $pageName; ?>/del.php', {
                        id: idProj
                    }, function(respons) {
                        if (respons == "true") {
                            $('table.projects tr[projectid="' + idProj + '"]')
                                .effect("explode", "fast");
                            setTimeout(function() {
                                $('input[name="year"][checked]').trigger(
                                    "click");
                            }, 250);
                        } else {
                            alert(
                                "<?= i("Erreur lors de l'execution de la requete"); ?>");
                        }
                    });
                },
                "<?= i("Annuler"); ?>": function() {
                    $(this).dialog("close");
                    $('table.projects tr[projectid="' + idProj + '"]').css("background",
                    "");
                }
            },
            close: function(event, ui) {
                $('table.projects tr[projectid="' + idProj + '"]').css("background", "");
            }
        });
    });
});

function resizePanel() {
    // Comme le panneau pour le filtrage est en position fixe, s'il est trop grand
    // on ne voit plus la fin au bout d'un moment, il faut donc le redimensionner par rapport a la taille de l'ecran
    if (window.innerHeight - replaceAll($(".container_12 .small .block_cont").css("height"), 'px', '') < 225) {
        var taille = window.innerHeight - 225;
        $(".container_12 .small .block_cont").css({
            overflowY: "auto",
            overflowX: "hidden"
        });
        $(".container_12 .small .block_cont").animate({
            height: taille + "px"
        }, 400);
        $(".container_12 .small").animate({
            width: "210px"
        }, 400);
        $(".container_12 .medium").animate({
            width: "730px"
        }, 400);
        setTimeout(function() {
            $("#projectlist .rewrap").css("width", "708px");
        }, 100);
    } else {
        $(".container_12 .small .block_cont").css("height", "");
        $(".container_12 .small").animate({
            width: "200px"
        }, 400);
        $(".container_12 .medium").animate({
            width: "740px"
        }, 400);
        $("#projectlist .rewrap").css("width", "718px");
    }
    // ------------------------------------------------------------------------	
}
</script>