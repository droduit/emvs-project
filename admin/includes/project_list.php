<?php
global $bdd;
$pageName = "projects";
?>

<?php if (isset($_GET['maj'])) { ?>
<div class="success grid_12">
    <h3><?= i("Projet mis à jour"); ?></h3>
    <a class="hide_btn" href="#">&nbsp;</a>
</div>
<div class="clear"></div>
<?php } ?>

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


<?php if (!is_chrome() && !is_ie()) { ?>
<div class="newProject" style="display:none"><?php include_once("projects/add.php"); ?></div>
<?php } ?>


<div class="block small affichage">
    <div class="titlebar">
        <h3><?= i("Affichage"); ?></h3>
    </div>
    <div class="block_cont">

        <div style="float:left; width: 167px; margin-right: 15px; padding: 5px">

            <div class="title_param"><?= i("Année"); ?></div>
            <div class="parameters">
                <label for="itemALL_y">
                    <div class="labeled selected">
                        <input type="radio" checked="checked" id="itemALL_y" name="year" value="all" />
                        <?= i("Toutes"); ?>
                    </div>
                </label>

                <?php
				$get_years = $bdd->query("SELECT year FROM tbl_projects_history GROUP BY year ORDER BY year DESC LIMIT 8");
				while ($year = $get_years->fetch()) {
				?>
                <label for="item<?= $year['year']; ?>">
                    <div class="labeled ">
                        <input type="radio" id="item<?= $year['year']; ?>" name="year" value="<?= $year['year']; ?>" />
                        <?= $year['year']; ?>
                    </div>
                </label>
                <?php
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
				$get_tri = array(i("Ascendant") => "ASC", i("Descendant") => "DESC");
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


            <div class="title_param"><?= i("Archivage"); ?></div>
            <div class="parameters">
                <?php
				$get_arch = array(i("Masquer") => "no", i("Afficher") => "yes");
				$archN = 0;
				foreach ($get_arch as $arch => $labelA) {
					$archN++;
				?>
                <label for="item<?= $arch; ?>">
                    <div class="labeled <?php if ($archN == 1) {
												echo 'selected';
											} ?>">
                        <input type="radio" <?php if ($archN == 1) { ?> checked="checked" <?php } ?>
                            id="item<?= $arch; ?>" name="arch" value="<?= $labelA; ?>" />
                        <?= $arch; ?>
                    </div>
                </label>
                <?php
				}
				?>
            </div>

            <div class="title_param"><?= i("Chercher"); ?></div>
            <div class="parameters">
                <input type="text" placeholder="<?= i("Titre du projet"); ?>"
                    style="border:1px solid #ddd; padding: 2px 3px; border-radius: 4px; width: 159px; font-size: 9pt"
                    id="search_i" />
            </div>
        </div>

        <div style="clear:both"></div>


    </div>
</div>

<?php if (is_chrome() || is_ie()) { ?>
<div class="newProject" style="display:none"><?php include_once("projects/add.php"); ?></div>
<?php } ?>

<div class="block medium">
    <div class="titlebar">
        <h3><?= i("Liste des projets"); ?></h3>
        <a style="cursor:pointer" class="toggle show tipsys addProject" title="<?= i("Nouveau"); ?>">&nbsp;</a>
    </div>
    <div class="block_cont">

        <div id="projectlist"><?php include_once("projects/list.php"); ?></div>

    </div>
</div>



<div id="dialog-confirm" title="<?= i("Confirmer la suppression"); ?>" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
    <p><b><?= i("Ce projet va être éffacé."); ?></b></p><br><?= i("Voulez-vous poursuivre ?"); ?></p>
</div>

<div id="dialog-confirm-archivage" title="<?= i("Confirmer"); ?>" style="display:none">
    <p><span class="ui-icon ui-icon-locked" style="float:left; margin:0 7px 20px 0;"></span>
    <p><b class="message"><?= i("Ce projet va être archivé."); ?></b></p><br><?= i("Voulez-vous poursuivre ?"); ?></p>
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
        fade: true,
        opacity: 1
    });
    setTimeout(function() {
        $(".tipsys").tipsy("show");
    }, 150);
    setTimeout(function() {
        $(".tipsys").tipsy("hide");
    }, 2500);

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

    // Ajout d'un nouveau projet
    $('.addProject').click(function() {
        $(".newProject").slideDown("fast");
        $('input[name="title_fr"]').focus();
    });

    // Sélectionne automatiquement les enregistrements générés l'année en cours s'il y en a
    if ($('input[name="year"][id="item<?= date('Y'); ?>"]').size() > 0) {
        $("#projectlist").css("display", "none");
        $('input[name="year"][id="item<?= date('Y'); ?>"]').trigger("click");
        $('input[name="year"][id="item<?= date('Y'); ?>"]').parent().parent().parent().find(".labeled")
            .removeClass("selected");
        $('input[name="year"][id="item<?= date('Y'); ?>"]').parent().addClass("selected");

        $.post('includes/projects/list.php', {
            year: "<?= date('Y'); ?>",
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

    $('.parameters input[type="radio"]').bind("click focus", function() {
        $(this).parent().parent().parent().find(".labeled").removeClass("selected");
        $(this).parent().addClass("selected");

        $('.tipsy').remove();

        var year_v = $('input[name="year"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();
        var tri_v = $('input[name="tri"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();
        var prof_v = $('input[name="prof"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();
        var arch_v = $('input[name="arch"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();

        $.post('includes/projects/list.php', {
            year: year_v,
            tri: tri_v,
            profession: prof_v,
            archive: arch_v,
            key: $("#search_i").val(),
            language: "<?= language; ?>"
        }, function(respons) {
            $("#projectlist").html(respons);
        });

    });

    $("#search_i").keyup(function() {
        var year_v = "all";
        var tri_v = $('input[name="tri"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();
        var prof_v = $('input[name="prof"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();
        var arch_v = $('input[name="arch"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();

        $.post('includes/projects/list.php', {
            year: year_v,
            tri: tri_v,
            profession: prof_v,
            archive: arch_v,
            key: $(this).val(),
            language: "<?= language; ?>"
        }, function(respons) {
            $("#projectlist").html(respons);
            // Recherche dans toutes les années
            $('input[name="year"][id="itemALL_y"]').trigger("click");
        });
    });

    // Suppression d'un projet
    $("a.action.delete").live('click', function() {
        var idProj = $(this).parent().parent().parent().attr("projectid");
        $('table.projects tr[projectid]').css("background", "");
        $('table.projects tr[projectid="' + idProj + '"]').css("background", "#FDBD84");

        $("#dialog-confirm").dialog({
            resizable: false,
            height: 150,
            modal: false,
            buttons: {
                "<?= i("Supprimer"); ?>": function() {
                    $(this).dialog("close");
                    $.post('includes/projects/del_and_archive.php', {
                        id: idProj,
                        type: "del"
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

    // Archivage d'un projet
    $("a.action.archive").live('click', function() {
        var idProj = $(this).parent().parent().parent().attr("projectid");
        $('table.projects tr[projectid]').css("background", "");
        $('table.projects tr[projectid="' + idProj + '"]').css("background", "#A4D1FF");

        var rest_arch = 0;
        if ($(this).hasClass("restaurer")) {
            $("#dialog-confirm-archivage .message").html("<?= i("Ce projet va être restauré."); ?>");
            rest_arch = 1;
        }

        $("#dialog-confirm-archivage").dialog({
            resizable: false,
            height: 150,
            modal: false,
            buttons: {
                "<?= i("Confirmer"); ?>": function() {
                    $(this).dialog("close");
                    $.post('includes/projects/del_and_archive.php', {
                        id: idProj,
                        type: "arch",
                        action: rest_arch
                    }, function(respons) {
                        if (respons == "true") {
                            $('table.projects tr[projectid="' + idProj + '"]')
                                .fadeOut("fast");
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