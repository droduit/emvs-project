<?php
global $bdd;
global $language_list;

if (isset($_POST['parm'])) {

	// ---------------- Enregistrement de la langue de l'interface dans un cookie 
	echo '<script>$(function() { set_cookie(\'language\', \'' . $_POST['lang'] . '\', 365); });</script>';
	$_SESSION['language'] = $_POST['lang'];

	// ---------------- Enregistrement de tout les parametres dans la table
	$queryTxt = str_repeat("UPDATE admin_config SET value=? WHERE name=?;", count($_POST['parm']));

	$prepare = $bdd->prepare($queryTxt);


	$parm = $_POST['parm'];
	$key = array_keys($parm);

	foreach ($parm as $name => $value) {

		$valF = "";
		foreach ($value as $val_parm) {
			$valF .= $val_parm . "|";
		}
		$valF = substr($valF, 0, -1);

		$values[] = $valF;
		$values[] = $name;
	}

	$prepare->execute($values);
	//print_r($_POST);
	refresh(0, '?p=config');
} else {

	if (!isset($_GET['o'])) {
		$get_parm_category = $bdd->query("SELECT category FROM admin_config WHERE category!=5 GROUP BY category ORDER BY category ASC");
		$categories = array(i("Eleves"), i("Professeurs"), i("Projets"), i("Global"));
?>

<script>
$(function() {
    $(".form").css("display", "none");
    $(".form").fadeIn("slow");
});
</script>

<form class="form" id="form<?= $cat['category']; ?>" method="post">

    <div class="block small">
        <div class="titlebar">
            <h3><?= i("Administration"); ?></h3>
        </div>
        <div class="block_cont">

            <div class="form_row">
                <label><?= i("Langue de l'interface"); ?></label>
                <select name="lang" style="padding: 6px 10px; width:99%; border: 1px solid #8E9BAC; border-radius: 5px">
                    <?php foreach ($language_list as $lang => $label) { ?>
                    <option <?php if ($_SESSION['language'] == $lang) {
											echo 'selected="selected"';
										} ?> value="<?= $lang; ?>"><?= $label; ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>
    </div>

    <?php
			while ($cat = $get_parm_category->fetch()) {
				$get_parm = $bdd->query("SELECT * FROM admin_config WHERE category=" . $cat['category'] . " ORDER BY name");
			?>
    <div class="block small">
        <div class="titlebar">
            <h3><?= $categories[$cat['category'] - 1]; ?></h3>
        </div>
        <div class="block_cont">

            <?php
						while ($parm = $get_parm->fetch()) {
							$parm_no = explode('|', $parm['value']);
						?>

            <div class="form_row">
                <label><?= $parm['description']; ?></label>
                <input type="text" value="<?= $parm_no[0]; ?>" style="width:85px;text-align:center"
                    name="parm[<?= $parm['name']; ?>][0]" />
                <input type="text" value="<?= $parm_no[1]; ?>" style="width:12px;text-align:center"
                    name="parm[<?= $parm['name']; ?>][1]" />
                <input type="text" value="<?= $parm_no[2]; ?>" style="width:85px;text-align:center"
                    name="parm[<?= $parm['name']; ?>][2]" /><br />
                @
                <input lang="fr" maxlength="45" type="text" id="req" name="parm[<?= $parm['name']; ?>][3]"
                    style="width: 205px;" class="input validate[required] tipRight" value="<?= $parm_no[3]; ?>">
            </div>

            <?php
						} ?>

        </div>
    </div>
    <?php
			} ?>


    <div class="clear"></div>

    <div
        style="background: rgba(255,255,255,0.2); margin-bottom:10px; width: 99%; margin-left: 5px; border-radius: 4px">
        <input style="margin-right:-1px" class="float_right btSubmit" value="<?= i("Enregistrer"); ?>" type="submit">
        <div style="clear:both;"></div>
    </div>

</form>

<?php
	} else {

		// Si la variable o existe
		$o = addslashes(str_replace("'", "", $_GET['o']));
		if (file_exists('includes/config/' . $o . '.php')) {
			include_once('config/' . $o . '.php');
		}
	}
} ?>