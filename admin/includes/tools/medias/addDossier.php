<?php
require_once("../../../conf/mysql.php");

if (isset($_POST['action']) && $_POST['action'] == "del") {
	if ($bdd->exec("DELETE FROM tbl_media_dossiers WHERE PKNoMediaDossier=" . $_POST['id'])) {
		echo "true";
	} else {
		echo "false";
	}
} else {

	if (isset($_POST['nom'])) {

		if (empty($_POST['pk'])) {
			$bdd->exec("INSERT INTO tbl_media_dossiers VALUES(NULL,'" . stripslashes($_POST['nom']) . "')");
		} else {
			$bdd->exec("UPDATE tbl_media_dossiers SET Nom='" . stripslashes($_POST['nom']) . "' WHERE PKNoMediaDossier=" . $_POST['pk']);
		}
	} else { ?>
<form method="POST" action="" class="form" novalidate="novalidate">
    <table align="center" style="margin:auto">

        <tr>
            <td style="padding-right:16px"><b>Nom</b> </td>
            <td style="padding-bottom:6px"><input type="text" name="nom" id="nom" class="input-text2"
                    value="<?= $_POST['name'] ?? "" ?>" /></td>
        </tr>

        <input type="hidden" id="pk" value="<?= $_POST['pk'] ?? "" ?>" />
        <tr>
            <td colspan="2" align="right"><input type="submit" class="submit" value="Enregistrer" /></td>
        </tr>
    </table>
</form>

<style>
.input-text2 {
    border: 1px solid #ccc;
    width: 300px;
}
</style>

<script>
$(function() {
    $('.form').submit(function() {
        if ($("#nom").val() != "") {
            $.post('includes/tools/medias/addDossier.php', {
                nom: $("#nom").val(),
                pk: $("#pk").val()
            }, function(html) {
                closeWindow();
                $.post('includes/tools/medias/dossiers.php', {}, function(html) {
                    $('.block_cont').html(html);
                });
            });
        }
        return false;
    });
});
</script>
<?php }
} ?>