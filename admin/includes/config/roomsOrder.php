<?php
if (isset($_POST['action'])) {

	require_once("../../conf/common.php");
	$_SESSION['language'] = $_POST['language'];

	switch ($_POST['action']) {

		case 'order':
			// On décode la chaine passée en URL
			parse_str($_POST['order'], $order);

			if (is_array($order['pos'])) {
				// On parcours chaque élément du tableau
				foreach ($order['pos'] as $key => $value) {
					$query = sprintf('update `tbl_rooms` set `ordre`=%d where `PKNoRoom`=%d', ($key + 1), $value);
					$bdd->exec($query);
				}
			}
			break;

		case 'del':
			$delete = $bdd->prepare('DELETE FROM tbl_rooms WHERE PKNoRoom=?');
			$delete->bindParam(1, $_POST['id'], PDO::PARAM_INT);
			$delete->execute();
			echo "true";
			break;
	}
} else { ?>

<div class="newRoom" style="display:none"></div>
<div class="updRoom" style="display:none"></div>

<div class="block large">
    <div class="titlebar">
        <h3><?= i("Gestion des salles"); ?></h3>
        <a class="toggle show tipsys add" style="cursor:pointer" title="<?= i("Ajouter"); ?>">&nbsp;</a>
    </div>
    <div class="block_cont">

        <?php
			$get_rooms = $bdd->query("SELECT * FROM tbl_rooms ORDER BY ordre"); ?>
        <div class="table-wrap">
            <div class="table">
                <table class="projects">
                    <thead>
                        <tr>
                            <th width="70" style="text-align:center"><?= i("Ordre"); ?></th>
                            <th width="740"><?= i("Salles"); ?> (<span
                                    class="nbRow"><?= $get_rooms->rowCount(); ?></span>)</th>
                            <th width="60" style="text-align:center"><?= i("Actions"); ?></th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
							$projI = 0;
							while ($room = $get_rooms->fetch()) {
								$projI++; ?>
                        <tr id="pos_<?= $room['PKNoRoom']; ?>" class="<?php if ($projI % 2 == 0) {
																					echo 'even';
																				} else {
																					echo 'odd';
																				} ?>" style="cursor: default" projectid="<?= $room['PKNoRoom']; ?>">
                            <td align="center" class="order"
                                style="background: #A8D3FF; border-bottom: 1px solid #a8d3ff; cursor: move" width="70">
                                <?= $room['ordre']; ?></td>
                            <td style="cursor: move" width="740"><?php if (is_numeric(substr($room['salle'], 0, 3))) {
																				echo $room['salle'];
																			} else {
																				echo i($room['salle']);
																			} ?></td>

                            <td width="60">
                                <div style="height: 3px;">&nbsp;</div>
                                <div class="actionbar" style="width:56px; margin-left: 5px">
                                    <a class="action edit" style="cursor: pointer"
                                        idSalle="<?= $room['PKNoRoom']; ?>"><span><?= i("Editer"); ?></span></a>
                                    <a class="action delete"
                                        style="cursor: pointer"><span><?= i("Suppr."); ?></span></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
</div>

<div id="dialog-confirm" title="<?= i("Confirmer la suppression"); ?>" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
    <p><b><?= i("Cette salle va être éffacé."); ?></b></p><br><?= i("Voulez-vous poursuivre ?"); ?></p>
</div>


<script>
$(function() {

    $(".add").click(function() {
        openWindow('includes/config/addRoom.php', 'language=<?= $_SESSION['language']; ?>', 500,
            '<?= i("Ajout d\'une salle"); ?>');
    });

    $(".tipsys").tipsy({
        gravity: "e",
        fade: true
    });

    var fixHelper = function(e, ui) {
        ui.children().each(function() {
            $(this).width($(this).width());
        });
        return ui;
    };

    var order = "";
    $("table.projects tbody").sortable({
        placeholder: "ui-state-highlight",

        update: function(event, ui) {
            order = $('table.projects tbody').sortable('serialize'); // On sérialise les données

            // Enregistrement de l'ordre dans la table
            $.post('includes/config/roomsOrder.php', {
                action: "order",
                order: order,
                language: "<?= $_SESSION['language']; ?>"
            }, function(html) {});

            // Mise à jour de l'ordre
            var i = 0;
            $('table.projects tbody tr[projectid]').each(function() {
                i++;
                $(this).find("td.order").html(i);
            });
            $('table.projects tbody tr[projectid]').removeClass("odd").removeClass("even");
            $('table.projects tbody tr[projectid]:odd').addClass("even");
            $('table.projects tbody tr[projectid]:even').addClass("odd");
        }
    }).disableSelection();


    $("a.action.edit").click(function() {
        $(".newRoom").slideUp("fast");
        $.post('includes/config/addRoom.php', {
            id: $(this).attr("idSalle"),
            language: "<?= $_SESSION['language']; ?>"
        }, function(html) {
            $(".updRoom").html(html).slideDown("slow");
        });
    });

    // Suppression d'une salle
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
                    $.post('includes/config/roomsOrder.php', {
                        id: idProj,
                        action: "del",
                        language: "<?= $_SESSION['language']; ?>"
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
                                "<?= i("Erreur lors de l'execution de la requete"); ?>"
                            );
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

<?php
} ?>