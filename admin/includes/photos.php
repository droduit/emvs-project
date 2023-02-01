<?php
global $bdd;
$query = $bdd->query("SELECT * FROM admin_login");
$pageName = "users";
?>

<div class="block medium">
    <div class="titlebar">
        <h3><?= "Gestion des administrateurs"; ?></h3>
        <a href="?p=<?= $pageName; ?>~add" class="toggle show tipsys" title="<?= "Nouveau"; ?>">&nbsp;</a>
    </div>
    <div class="block_cont">
        <div class="table-wrap">
            <div class="table">
                <table class="projects">
                    <thead>
                        <tr>
                            <th><?= "Administrateurs"; ?> (<?= $query->rowCount(); ?>)</th>
                            <th width="100"><?= "Cryptage"; ?></th>
                            <th width="60" style="text-align:center"><?= "Actions"; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						while ($data = $query->fetch()) {
							$projI++;
						?>
                        <tr class="<?php if ($projI % 2 == 0) {
											echo 'even';
										} else {
											echo 'odd';
										} ?>" style="cursor: default" projectid="<?= $data['PKNoMembre']; ?>">
                            <td><?= $data['email']; ?></td>
                            <td>SHA1/MD5</td>
                            <td>
                                <div style="height: 3px;">&nbsp;</div>
                                <div class="actionbar" style="width:58px; margin-left: 5px">
                                    <a class="action edit"
                                        href="?p=<?= $pageName; ?>~edit&id=<?= $data['PKNoMembre']; ?>"><span><?= "Editer"; ?></span></a>
                                    <a class="action delete" style="cursor: pointer"><span><?= "Suppr."; ?></span></a>
                                </div>
                            </td>
                        </tr>
                        <?php
						}
						?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div
    style="background: rgba(0,0,0,0.3); box-shadow: inset 1px 1px 2px -1px black; margin-left: 15px; padding: 10px; width:280px; border-radius: 5px; float:left">
    <div style="line-height:2em">
        <?= "Les mots de passes doivent contenir au moins 5 caractères mais il est inutile qu'ils contiennent des caractères spéciaux."; ?>
    </div>
</div>

<div id="dialog-confirm" title="<?= "Confirmer la suppression"; ?>" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
    <p><b><?= "Cet utilisateur va être éffacé."; ?></b></p><br><?= "Voulez-vous poursuivre ?"; ?></p>
</div>

<script>
$(function() {
    $(".tipsys").tipsy({
        gravity: "s",
        fade: true
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
                "<?= "Confirmer"; ?>": function() {
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
                                "<?= "Erreur lors de l'execution de la requete"; ?>");
                        }
                    });
                },
                "<?= "Annuler"; ?>": function() {
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