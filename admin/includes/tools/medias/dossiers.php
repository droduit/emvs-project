<?php
require_once("../../../conf/mysql.php");
$getDossiers = $bdd->query("SELECT * FROM tbl_media_dossiers ORDER BY Nom DESC, PKNoMediaDossier DESC");
?>

<div class="table-wrap">
    <div class="table-wrap">
        <div class="table">
            <table class="projects">
                <thead>
                    <tr class="even">
                        <th>Dossiers</th>
                        <th width="60" style="text-align:center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$titre = "";
					while ($dir = $getDossiers->fetch()) {

						if (strpos($dir['Nom'], '[') != false) {
							if ($titre != str_replace(strstr($dir['Nom'], '['), '', $dir['Nom'])) {
								$titre = str_replace(strstr($dir['Nom'], '['), '', $dir['Nom']);
					?>
                    <tr titre="<?= $titre; ?>">
                        <td colspan="2" style="background:#9CF; font-weight:bold"><?= $titre; ?></td>
                    </tr>
                    <?php
							}
						}
						?>
                    <tr pk="<?= $dir['PKNoMediaDossier']; ?>" nom="<?= $dir['Nom']; ?>" titre="<?= $titre; ?>">
                        <td>---- <?= str_replace(']', '', str_replace('[', '', strstr($dir['Nom'], '['))); ?></td>
                        <td>
                            <div style="height: 3px;">&nbsp;</div>
                            <div style="width:56px; margin-left: 5px" class="actionbar">
                                <a pk="<?= $dir['PKNoMediaDossier']; ?>" style="cursor: pointer"
                                    class="action edit"><span>Editer</span></a>
                                <a style="cursor: pointer" class="action delete"><span>Suppr.</span></a>
                            </div>
                        </td>
                    </tr>
                    <?php
					} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="dialog-confirm" title="Confirmer la suppression" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
    <p><b>Ce dossier va être éffacé.</b></p><br>Voulez-vous poursuivre ?</p>
</div>

<script>
$(function() {
    $('.add').live('click', function() {
        openWindow('includes/tools/medias/addDossier.php', '', 550, 'Ajouter un dossier');
    });

    $("a.action.edit").click(function() {
        openWindow('includes/tools/medias/addDossier.php', 'pk=' + $(this).attr("pk") + "&name=" + $(
            this).parent().parent().parent().attr("nom"), 550, 'Editer un dossier');
    });

    // Suppression d'une salle
    $("a.action.delete").live('click', function() {
        var idProj = $(this).parent().parent().parent().attr("pk");
        var thisTitre = $(this).parent().parent().parent().attr("titre");
        $('table.projects tr[pk]').css("background", "");
        $('table.projects tr[pk="' + idProj + '"]').css("background", "#FDBD84");

        $("#dialog-confirm").dialog({
            resizable: false,
            height: 150,
            modal: false,
            buttons: {
                "Supprimer": function() {
                    $(this).dialog("close");
                    $.post('includes/tools/medias/addDossier.php', {
                        id: idProj,
                        action: "del",
                        language: "<?= $_SESSION['language'] ?? "fr" ?>"
                    }, function(respons) {
                        $('table.projects tr[pk="' + idProj + '"]').effect(
                            "explode", "fast");
                    });
                },
                "Annuler": function() {
                    $(this).dialog("close");
                    $('table.projects tr[pk="' + idProj + '"]').css("background", "");
                }
            },
            close: function(event, ui) {
                $('table.projects tr[pk="' + idProj + '"]').css("background", "");
            }
        });
    });
});
</script>