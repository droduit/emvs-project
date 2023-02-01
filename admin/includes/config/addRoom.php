<?php
if (isset($_POST['action'])) {
	require_once('../../conf/common.php');
	$_SESSION['language'] = $_POST['language'];

	switch ($_POST['action']) {
		case 'add':
			if (!empty($_POST['salle']) && !empty($_POST['ordre'])) {
				$bdd->exec("INSERT INTO tbl_rooms VALUES(NULL, '" . addslashes($_POST['salle']) . "', " . intval($_POST['ordre']) . ")");
				echo 'Ok';
			} else {
				echo 'Error';
			}
			break;

		case 'upd':
			$bdd->exec("UPDATE tbl_rooms SET salle='" . addslashes($_POST['salle']) . "', ordre=" . intval($_POST['ordre']) . " WHERE PKNoRoom=" . intval($_POST['id']));
			break;
	}
} else {

	if (!isset($_POST['id'])) {
		require_once('../../conf/common.php');
		$_SESSION['language'] = $_POST['language'];

		$get_last_order = $bdd->query("SELECT MAX(ordre) as orders FROM tbl_rooms");
		$last_order = $get_last_order->fetch();
		$title = "Ajout d'une salle";
		$btText = "Ajouter";
		$action = "add";
?>

<form method="POST" action="" class="form" novalidate="novalidate" onsubmit="return add();">
    <table align="center" style="margin:auto">

        <tr>
            <td style="padding-right:16px"><b><?= i("No ou nom de la salle"); ?></b> </td>
            <td style="padding-bottom:6px"><input type="text" name="salle" id="salle" class="input-text2" /></td>
        </tr>

        <tr>
            <td><b><?= i("Ordre"); ?></b> </td>
            <td style="padding-bottom:6px"><input type="text" name="ordre" id="ordre" class="input-text2"
                    value="<?= ($last_order['orders'] + 1); ?>" /></td>
        </tr>


        <tr>
            <td colspan="2" align="right"><input type="submit" class="submit" value="<?= i("Enregistrer"); ?>" /></td>
        </tr>
    </table>
</form>

<?php
	} else {
		require_once('../../conf/common.php');
		$_SESSION['language'] = $_POST['language'];
		$get_room = $bdd->query("SELECT * FROM tbl_rooms WHERE PKNoRoom=" . $_POST['id']);
		$room = $get_room->fetch();
		$title = "Modification d'une salle";
		$btText = "Modifier";
		$action = "upd";
	?>

<form method="POST" action="" class="form" novalidate="novalidate" onsubmit="return add();">

    <div class="block large">
        <div class="titlebar">
            <h3><?= i($title); ?></h3>
        </div>
        <div class="block_cont" style="position:relative">
            <div class="form_row" style="float:left; margin-right: 42px;">
                <label><?= i("No ou nom de la salle"); ?></label>
                <input maxlength="45" type="text" placeholder="<?= i("No ou nom de la salle"); ?>" value="<?php if (isset($_POST['id'])) {
																														if (is_numeric(substr($room['salle'], 0, 3))) {
																															echo $room['salle'];
																														} else {
																															echo i($room['salle']);
																														}
																													} ?>" id="salle" name="salle" style="width: 655px;"
                    class="input validate[required] tipRight" tabindex="1">
            </div>

            <div class="form_row" style="float:left">
                <label><?= i("Ordre"); ?></label>
                <input maxlength="45" type="text" id="req" value="<?php if (!isset($_POST['id'])) {
																				echo ($last_order['orders'] + 1);
																			} else {
																				echo $room['ordre'];
																			} ?>" name="ordre" style="width: 85px;" class="input validate[required] tipRight" tabindex="2">
            </div>

            <div style="clear:both"></div>
            <div class="form_row" style="position:absolute; float:none; right: 13px; bottom: 10px"><input type="submit"
                    value="<?= i($btText); ?>" class="submit" tabindex="3"></div>

        </div>
    </div>

</form>

<?php
	}
	?>

<style>
.input-text2 {
    border: 1px solid #ccc;
    width: 300px;
}
</style>

<script>
$(function() {
    setTimeout(function() {
        $('input[name="salle"]').focus().select();
    }, 600);
});

//Enregistrement
function add() {
    $.post('includes/config/addRoom.php', {
        action: "<?= $action; ?>",
        salle: $('#salle').val(),
        ordre: $('input[name="ordre"]').val(),
        language: "<?= $_SESSION['language'] ?>"
        <?php if (isset($_POST['id'])) { ?>,
        id: "<?= $_POST['id']; ?>"
        <?php } ?>
    }, function(html) {
        if (html.substring(0, "Error".length) != "Error") {
            window.location = '?p=config&o=roomsOrder';
        } else {
            notify(html);
        }
    });
    return false;
}
</script>
<?php
} ?>