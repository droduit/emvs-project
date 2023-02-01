<?php
require_once('../../conf/common.php');
$_SESSION['language'] = $_POST['language'];

if (isset($_POST['action'])) {

	switch ($_POST['action']) {
		case 'add':

			$key = array_keys($_POST);
			$languages = array_keys($language_list);
			$i = 0;
			$sql = "INSERT INTO tbl_translations VALUES(NULL,";
			foreach ($_POST as $lang) {
				if (in_array($key[$i], $languages)) {
					$sql .= "'" . addslashes($lang) . "',";
				}

				$i++;
			}
			$sql = substr($sql, 0, -1);
			$sql .= ")";
			$bdd->exec($sql);

			break;
	}
} else {
?>

<form method="POST" action="" class="form" novalidate="novalidate" onsubmit="return add();">

    <table class="translate">
        <?php foreach ($language_list as $lang => $label) { ?>
        <tr>
            <td><b><?= $label; ?></b></td>
            <td><input type="text" name="<?= $lang; ?>" class="input-text2" /></td>
        </tr>
        <?php } ?>

        <tr>
            <td colspan="2" align="right"><input type="submit" class="submit" value="<?= i("Enregistrer"); ?>" /></td>
        </tr>
    </table>
</form>


<style>
.input-text2 {
    border: 1px solid #ccc;
    width: 400px;
}
</style>

<script>
//Enregistrement
function add() {
    $.post('includes/config/addTranslation.php', {
        action: "add",

        <?php
				$i = 0;
				foreach ($language_list as $lang => $label) {
					$i++;
					echo $lang . ": $('input[name=\"" . $lang . "\"]').val(),";
				}
				?>
        language: "<?= $_SESSION['language']; ?>"
    }, function(html) {
        if (html.substring(0, "Error".length) != "Error") {
            openWindow('includes/config/addTranslation.php',
                'idx=<?= $_POST['idx'] + 1; ?>&language=<?= $_SESSION['language']; ?>', 500,
                '<?= i("Nouvelle traduction"); ?>');

            notify("OK");
        } else {
            notify(html);
        }
    });
    return false;
}
</script>
<?php
} ?>