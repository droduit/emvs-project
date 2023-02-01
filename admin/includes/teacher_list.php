<?php
global $bdd;
$pageName = "teachers";
?>

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


<div class="block small">
    <div class="titlebar">
        <h3><?= i("Affichage"); ?></h3>
    </div>
    <div class="block_cont">

        <div style="float:left; width: 167px; margin-right: 15px; padding: 5px">

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
                <input type="text" placeholder="<?= i("Nom/Prénom du professeur"); ?>"
                    style="border:1px solid #ddd; padding: 2px 3px; border-radius: 4px; width: 159px; font-size: 9pt"
                    id="search_i" />
            </div>
        </div>

        <div style="clear:both"></div>
    </div>
</div>


<div class="block medium">
    <div class="titlebar">
        <h3><?= i("Liste des professeurs"); ?></h3>
        <a href="?p=<?= $pageName; ?>~add" class="toggle show tipsys" title="<?= i("Nouveau"); ?>">&nbsp;</a>
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
        live: true
    });

    $('.parameters input[type="radio"]').click(function() {
        $(this).parent().parent().parent().find(".labeled").removeClass("selected");
        $(this).parent().addClass("selected");

        var tri_v = $('input[name="tri"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();

        $.post('includes/<?= $pageName; ?>/list.php', {
            tri: tri_v,
            key: $("#search_i").val(),
            language: "<?= language; ?>"
        }, function(respons) {
            $("#projectlist").html(respons);
        });
    });

    $("#search_i").keyup(function() {
        var tri_v = $('input[name="tri"]').parent().parent().parent().find(".labeled.selected").find(
            'input[type="radio"]').val();

        $.post('includes/<?= $pageName; ?>/list.php', {
            tri: tri_v,
            key: $(this).val(),
            language: "<?= language; ?>"
        }, function(respons) {
            $("#projectlist").html(respons);
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
</script>