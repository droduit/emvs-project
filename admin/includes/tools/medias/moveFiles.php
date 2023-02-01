<?php
require_once("../../../conf/mysql.php");

if (isset($_POST['dossier'])) {
	$selected = substr($_POST['selection'], 0, -1);
	$selected = explode(',', $selected);

	$where = "";
	foreach ($selected as $s) {
		$where .= "PKNoMediaImage=" . $s . " OR ";
	}
	$sql = "UPDATE tbl_media_images SET FKNoMediaDossier=" . $_POST['dossier'] . " WHERE " . substr($where, 0, -4);

	echo $sql;
	$bdd->exec($sql);
} else { ?>

<div align="center" class="mainWin">
    <div style="margin:6px 0;">Dans quel dossier souhaitez-vous déplacer la sélection</div>
    <select id="dossier">
        <?php
			$getDossiers = $bdd->query("SELECT * FROM tbl_media_dossiers");
			while ($dir = $getDossiers->fetch()) { ?>
        <option value="<?= $dir['PKNoMediaDossier']; ?>"><?= $dir['Nom']; ?></option>
        <?php
			} ?>
    </select>
    <button id="move">Déplacer</button>
</div>

<script>
$(function() {
    $("#move").click(function() {
        $.post('includes/tools/medias/moveFiles.php', {
            selection: "<?= $_POST['selection']; ?>",
            dossier: $("#dossier").val()
        }, function(html) {
            $('.wrapCovImg.slct').each(function() {
                $(this).appendTo('.directory[pk="' + $("#dossier").val() + '"]');
            });

            $(".mainWin").html("La sélection a été déplacée").animate({
                marginTop: "22px"
            }, 600);
            setTimeout(function() {
                closeWindow();
            }, 1100);
        });
    });
});
</script>

<?php
}
?>