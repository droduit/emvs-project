<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];


$idProjet = intval($_POST['idProj']);

if (isset($_POST['idHist'])) {

	$idHistory = intval($_POST['idHist']);
	// Sélection des données pour cet entrée de l'historique
	$get_data = $bdd->query("
		SELECT * FROM tbl_projects_history
		LEFT JOIN tbl_projects_period ON FKNoPeriode=PKNoProjectPeriod
		WHERE PKNoProjectHistory=" . $idHistory);
	$data = $get_data->fetch();
}
?>

<script type="text/javascript">
$(document).ready(function(e) {

    $('textarea.tinymce').tinymce({
        script_url: 'plugins/tiny_mce/jscripts/tiny_mce.js',
        theme: "advanced",
        plugins: "autolink,lists,style,save,advhr,advimage,advlink,iespell,inlinepopups,contextmenu",

        theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,bullist,numlist,outdent,indent,|,link,unlink,|,undo,redo,|,code",
        theme_advanced_buttons2: "justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,|,sub,sup,|,charmap",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "center",
        theme_advanced_statusbar_location: false,
        theme_advanced_resizing: true,

        content_css: "plugins/tiny_mce/css/content.css",
        template_external_list_url: "lists/template_list.js",
        external_link_list_url: "lists/link_list.js",
        external_image_list_url: "lists/image_list.js",
        media_external_list_url: "lists/media_list.js",
        height: "200",
        auto_focus: "elm1",
        template_replace_values: {
            username: "Dominique",
            staffid: "991234"
        }
    });

    setInterval(function() {
        $("#elm1_toolbar3,#elm2_toolbar3").hide();
    }, 300);
});
</script>
<!-- /TinyMCE -->

<fieldset>
    <p>
    <div
        style="background: #C93; text-transform:uppercase; padding: 6px 10px; color: #402000; border-radius: 5px 5px 0px 0px">
        <?= i("important"); ?></div>
    <div
        style="border: 2px solid #c93; border-top: none; border-radius: 0px 0px 5px 5px; padding: 8px; line-height:1.25em;">
        <?= i("Copiez tout d'abord votre texte dans le champ suivant pour que tous les tags invisibles soient supprimés. Sélectionnez-le et copiez-le. Vous pouvez maintenant le coller dans les champs de description."); ?>
        <textarea style="min-width:640px; max-width:640px; max-height: 100px; margin-top: 6px" id="correct"></textarea>
    </div>
    </p>
</fieldset>

<fieldset>
    <legend align="top"><?= i("Description") . " FR"; ?></legend>

    <p style="margin-top:6px">
        <textarea id="elm1" name="elm1" style="width: 100%;" tabindex="1" class="tinymce"><?php if (isset($_POST['idHist'])) {
																								echo stripslashes($data['desc_fr']);
																							} ?></textarea>
    </p>
</fieldset>


<fieldset>
    <legend align="top"><?= i("Description") . " DE"; ?></legend>

    <p style="margin-top:6px">
        <textarea id="elm2" name="elm2" style="width: 100%;" tabindex="2" class="tinymce"><?php if (isset($_POST['idHist'])) {
																								echo stripslashes($data['desc_de']);
																							} ?>

</textarea>
    </p>
</fieldset>

<div class="submitArea">
    <input type="button" id="SubmitAll" value="<?= i("Suivant"); ?>" tabindex="4" />
    <?php if (isset($_POST['idHist'])) { ?> <input type="button" id="finish" value="<?= i("Terminer"); ?>"
        tabindex="5" /> <?php } ?>
</div>

<script>
$(function() {
    $("#SubmitAll, #finish").click(function() {
        clickedElm = $(this); // Garde en mémoire l'élément cliqué

        $.post('includes/projects/insertHistory.php', {
                type: "<?php if (isset($_POST['idHist'])) { ?>upd<?php } else { ?>add<?php } ?>",
                language: "<?= $_SESSION['language']; ?>",

                idProj: "<?= $idProjet; ?>",
                <?php if (isset($_POST['idHist'])) { ?>idHist: "<?= $idHistory; ?>",
                <?php } ?>

                text_fr: $("#elm1").val(),
                text_de: $("#elm2").val()
            },
            function(html) {

                if (clickedElm.attr("id") != "finish") {
                    $('.cadre_submenu .item.media').trigger("click");
                } else {
                    closeTheater();
                }

                $('textarea.tinymce').die();
            });

    });

    $("#correct").bind('keyup keydown', function() {
        $(this).val(replaceAll($(this).val(), '"', ''));
    });
});
</script>