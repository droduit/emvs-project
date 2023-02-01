<?php
ini_set('memory_limit', '3000M');
set_time_limit(9000);
require_once('includes/imageLoader/conf.php');
$bdd = getConnexion();
?>

<style>
.btTitle {
    background: rgba(0, 0, 0, 0.5);
    border-radius: 6px 6px 6px 6px;
    color: white;
    padding: 3px 9px 4px;
    position: absolute;
    right: 10px;
    top: 9px;
    cursor: pointer;
    text-decoration: none;
    font-size: 12px;
}

.btTitle:hover {
    background: rgba(0, 0, 0, 0.8);
}
</style>

<div class="block large">
    <div class="titlebar">
        <h3><?= i("Gestion des médias"); ?></h3>
        <a class="btTitle" data-rel="dossiers"><?= i("Dossiers") ?></a>
    </div>
    <div class="block_cont">

        <div class="panelScrollable">
            <button class="otherDisplay" opt="0"><?= i("Afficher la sélection"); ?></button><br />
            <button class="moveSlct"><?= i("Déplacer la sélection"); ?></button><br />
            <button class="supprimer"><?= i("Supprimer la sélection"); ?></button>
        </div>

        <div id="imageArea">
            <?php
			global $images_dir;

			$type = "img";
			$queryTxt = ($type == "img") ?
				"SELECT * FROM tbl_media_images LEFT JOIN tbl_media_dossiers ON FKNoMediaDossier = PKNoMediaDossier ORDER BY FKNoMediaDossier DESC, date DESC, PKNoMediaImage DESC" :
				"SELECT * FROM tbl_history_documents";

			$query = $bdd->query($queryTxt);

			$content = ($type == "img") ? '<div class="images">' : '<div class="documents">';

			$tmpDir = "";
			$idx = 0;

			// Affichage des images
			while ($image = $query->fetch()) {

				if ($type == "img") {

					if ($tmpDir != $image['FKNoMediaDossier']) {
						if ($idx > 0) {
							$content .= '</div>';
						}
						$content .= '<div class="directory" pk="' . $image['FKNoMediaDossier'] . '">';
						$content .= '<div class="titleDirectory">' . $image['Nom'] . "</div>";
						$tmpDir = $image['FKNoMediaDossier'];
					}

					$content .=  '<div class="wrapCovImg">' .
						'<div class="wrapwrap coveredImg"' .
						'PK="' . $image['PKNoMediaImage'] . '"' .
						'url="' . $image['URL'] . '"' .
						'style="background:url(' . $images_dir . '270/' . $image['URL'] . ') 50% 50% no-repeat; background-size: cover;"></div>' .
						'<div class="delFile"><input type="checkbox" name="del" id="check' . $image['PKNoMediaImage'] . '" /></div>' .
						'</div>';
				} else {
					$content .= '<div class="document wrapwrap" url="' . $image['source'] . '">' .
						'<span onclick="window.location=\'' . str_replace('photo/', 'doc/', $images_dir) . $image['source'] . '\'">' . str_replace(strrchr($image['source'], '.'), '', $image['nom']) . '</span>' .
						'<div class="delFile">X</div>' .
						'<div class="editFile" onclick="openWindow(\'includes/imageLoader/updDocument.php\', \'idDoc=' . $image['PKNoProjectDocument'] . '&language=' . $_SESSION['language'] . '&idHist=' . $Directory . '\', \'400\', \'' . i("Edition des fichiers liés") . '\')">' . i("Editer") . '</div>' .
						'<div class="ext">' . strrchr($image['source'], '.') . '</div>' .
						'<div class="size">' . $image['size'] . '</div>' .
						'<div style="clear:both"></div>' .
						'</div>';
				}

				$idx++;
			}

			$content .= '</div>';

			$content .= '<div style="clear:both"></div>';

			// On créer la fenetre de suppression cachée
			$content .=	'<div id="dialog-file-confirm" title="' . i("Confirmer la suppression") . '" style="display:none">' .
				'<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><p><b>' . i("Ce(s) fichier(s) vont être éffacés") . '.</b></p><br>' . i("Voulez-vous poursuivre") . ' ?</p>' .
				'</div>';

			echo $content;
			?>
        </div>


        <div style="clear:both"></div>
    </div>
</div>

<script>
$(function() {
    $('input[type="checkbox"][name="del"]').removeAttr("checked");
    $(".delFile").die("click");

    $('.wrapCovImg').click(function() {
        var elm = $(this);
        var obj = $(this).find('input[type="checkbox"][name="del"]');
        obj.is(":checked") ? obj.removeAttr("checked") : obj.attr("checked", "checked");
        obj.is(":checked") ? elm.addClass("slct") : elm.removeClass("slct");

        var nbSlct = $('input[type="checkbox"][name="del"]:checked').size();
        if (nbSlct > 0) {
            $('.panelScrollable').fadeIn("medium");
        } else {
            $('.panelScrollable').fadeOut("medium");
            if ($('.otherDisplay').attr("opt") == "1") {
                $('.otherDisplay').trigger("click");
            }
        }

    });

    $('input[type="checkbox"][name="del"]').click(function() {
        $(this).parent().parent().trigger("click");
    });

    $('.otherDisplay').click(function() {
        var bt = $(this);
        bt.attr("opt") == "0" ?
            $('.wrapCovImg:not(".slct")').css("display", "none") : $('.wrapCovImg').css("display", "");

        $('.directory').each(function() {
            if ($(this).find('.wrapCovImg.slct').size() < 1) {
                bt.attr("opt") == "0" ? $(this).fadeOut("fast") : $(this).fadeIn("fast");
            } else {
                $(this).fadeIn("fast");
            }
        });

        bt.attr("opt") == "0" ?
            bt.html("<?= i("Afficher tous"); ?>") : bt.html("<?= i("Afficher la sélection"); ?>");

        // 0 = Affichage des sélections, 1 = Affichage de toutes les vignettes
        bt.attr("opt") == "1" ? bt.attr("opt", "0") : bt.attr("opt", "1");
    });

    $('.supprimer').click(function() {
        var ids = "";
        $('.wrapCovImg.slct').each(function() {
            ids += $(this).find(".wrapwrap").attr("url") + ",";
        });

        $("#dialog-file-confirm").dialog({
            resizable: false,
            height: 150,
            modal: true,
            buttons: {
                "Confirmer": function() {
                    $(this).dialog("close");
                    $.post('includes/tools/medias/del.php', {
                        filenames: ids
                    }, function(respons) {
                        $('.panelScrollable').fadeOut("medium");
                        $('.wrapCovImg.slct').each(function() {
                            $(this).effect("explode", "fast");
                        });
                    });
                },
                "Annuler": function() {
                    $(this).dialog("close");
                }
            }
        });
    });

    $('.moveSlct').click(function() {
        var ids = "";
        $('.wrapCovImg.slct').each(function() {
            ids += $(this).find(".wrapwrap").attr("PK") + ",";
        });
        openWindow('includes/tools/medias/moveFiles.php', 'selection=' + ids, 550,
            '<?= i("Déplacer la sélection"); ?>');
    });

    $('.btTitle[data-rel="dossiers"]').click(function() {
        $.post('includes/tools/medias/dossiers.php', {

        }, function(html) {
            $('.block_cont').html(html);
            $('.btTitle').after(
                '<a class="toggle show tipsys add" style="cursor:pointer" original-title="<?= i("Nouveau"); ?>"></a>'
                ).remove();
        });
    });

});
</script>

<style>
.images {
    max-height: none;
}

.coveredImg {
    border: 1px solid #DDDDDD;
    border-radius: 6px 6px 6px 6px;
    height: 98px;
    width: 109px;
}

.coveredImg:hover {
    border: 1px solid #000;
    transform: none;
}

.wrapCovImg .delFile {
    padding: 2px 3px;
}

.wrapCovImg {
    transition: all 0.3s linear;
}

.wrapCovImg.slct {
    opacity: 0.5;
}

.panelScrollable {
    position: fixed;
    margin-left: -178px;
    padding: 5px;
    border-radius: 8px 0px 0px 8px;
    background: rgba(255, 255, 255, 0.4);
    display: none;
}

.panelScrollable button {
    width: 157px
}

.directory {
    border-radius: 8px;
    background: #9CF;
    padding-bottom: 4px;
    margin-bottom: 8px;
}

.titleDirectory {
    font-size: 10pt;
    font-weight: bold;
    color: black;
    margin-bottom: 6px;
    background: #eff;
    padding: 6px;
    border: 1px solid #9cf;
    border-bottom: none;
    border-radius: 5px;
}
</style>

<script>
$(function() {
    $(".export").click(function() {
        $.post('includes/tools/medias/export.php', {

        }, function(html) {
            window.location = '../includes/dlFile.php?file=media/dump/' + html;
        });
    });
});
</script>