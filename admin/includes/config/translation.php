<?php
$bdd = getConnexion();

class Translate_table {
	var $lang;

	function __construct($lang) {
		$this->lang = $lang;
	}
	function getLanguages() {
		$bdd = getConnexion();
		$query = $bdd->query("SHOW COLUMNS FROM tbl_translations where `Key`!='PRI'");
		while ($data = $query->fetch()) {
			$table[] = $data['Field'];
		}
		return $table;
	}
	function ReadAll() {
		$bdd = getConnexion();
		$query = $bdd->query("SELECT * FROM tbl_translations ORDER BY PKNoWord DESC");

		while ($data = $query->fetch()) {
			foreach ($this->getLanguages() as $lang) {
				$table[$lang][] = $data[$lang];
			}
		}
		return $table;
	}
	function clean($input) {
		if (is_array($input)) {
			return array_map(array($this, 'clean'), $input);
		} else {
			return trim(str_replace(array('";', '\n'), array('', '\n'), substr($input, strpos($input, '"') + 1, strlen($input))));
		}
	}
	function write() {
	}
}



// -------------------------------------------
$all = new Translate_table("");
$data = $all->ReadAll();

?>

<style>
.input-text {
    background: white;

    border-radius: 4px;
    padding: 2px 8px;
    width: <?=725 / count($language_list);
    ?>px;
}

table.translate td {
    padding: 4px 5px;
}

table.translate th {
    padding-bottom: 8px;
    padding-top: 3px;
}

table.translate tr.odd {
    background: #bbb;
}

table.translate tr.even {
    background: #ddd;
}
</style>

<div class="block large">
    <div class="titlebar">
        <h3><?= i("Traduction"); ?></h3>
        <a class="toggle show tipsys add" style="cursor:pointer" title="<?= i("Ajouter"); ?>">&nbsp;</a>
    </div>
    <div class="block_cont">

        <form method="post" class="form">
            <table class="translate" style="margin:auto">
                <thead>
                    <tr>
                        <?php foreach ($language_list as $lang => $label) { ?>
                        <th></th>
                        <th><?= $label; ?></th>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody>

                    <?php for ($i = 0; $i < count($data["fr"]); $i++) {
						$j = 0; ?>
                    <tr class="<?php if ($i % 2 == 0) {
										echo "even";
									} else {
										echo "odd";
									} ?>">
                        <td><?= $i + 1; ?></td>

                        <?php foreach ($language_list as $lang => $label) {
								$j++; ?>

                        <td><input type="text" value="<?= $data[$lang][$i]; ?>"
                                <?php if ($lang == "fr") { ?>readonly="readonly" <?php } ?>
                                name="<?= $lang . "[" . $i . "]"; ?>" class="input-text" /></td>
                        <?php if ($j < count($language_list)) { ?><td>-></td><?php } ?>

                        <?php } ?>


                    </tr>
                    <?php } ?>

                </tbody>
            </table>



            <br />
            <div align="center"><input type="submit" value="<?= i("Enregistrer"); ?>" class="submit" /></div>
        </form>

    </div>
</div>


<?php

// Enregistrement des valeurs
if (isset($_POST['fr'])) {

	$sql = "";

	for ($i = 0; $i < count($_POST['de']); $i++) {
		$sql .= "UPDATE tbl_translations set ";
		foreach ($language_list as $lang => $label) {
			if ($lang != "fr") {
				$sql .= $lang . "='" . addslashes($_POST[$lang][$i]) . "',";
			}
		}
		$sql = substr($sql, 0, -1);
		$sql .= " WHERE fr='" . addslashes($_POST['fr'][$i]) . "'; ";
	}

	$bdd->exec($sql);
	refresh(0, "?p=config&o=translation");
}
?>

<script>
$(function() {
    $(".tipsys").tipsy({
        gravity: "s"
    });
    $(".show.add").click(function() {
        openWindow('includes/config/addTranslation.php', 'language=<?= $_SESSION['language']; ?>', 500,
            '<?= i("Nouvelle traduction"); ?>');
    });
});
</script>