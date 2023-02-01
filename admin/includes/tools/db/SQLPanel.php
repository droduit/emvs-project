<?php
require_once('../../../conf/mysql.php');
$_SESSION['language'] = $_POST['language'] ?? "fr";
require_once('DBTools.class.php');

if (!isset($_POST['query'])) { ?>
<textarea id="query" placeholder="Entrer la requête SQL"
    style="font-family: Arial, Helvetica, sans-serif; font-size: 10pt; border: 1px dashed #aaa; width: 98%; padding: 5px; height: 150px; border-radius: 8px">SELECT * FROM <?= $_POST['table']; ?> </textarea>

<div align="right" style="margin-top: 5px;"><button id="execute" type="submit">Exécuter</button></div>

<div id="resultat"></div>

<script>
$(function() {
    $('#query').focus();
    $('#execute').click(function() {
        $.post('includes/tools/db/SQLPanel.php', {
            table: "<?= $_POST['table']; ?>",
            query: $("#query").val()
        }, function(html) {
            $('#resultat').html(html);
        });
    });
});
</script>
<?php
} else {

	$queryType = strtoupper(str_replace(strstr($_POST['query'], ' '), '', $_POST['query']));


	$query = $bdd->query($_POST['query']);

	$db = new DBTools($bdd);
	if ($query->rowCount() > 0) { ?>
<table class="tablesorter">
    <thead>
        <tr>
            <?php
					foreach ($db->getFields($_POST['table']) as $field) { ?>
            <th><?= $field['field']; ?></th>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
        <?php
				while ($data = $query->fetch()) { ?>
        <tr>
            <?php
						foreach ($db->getFields($_POST['table']) as $field) { ?>
            <td><?= $data[$field['field']]; ?></td>
            <?php
						}
						?>
        </tr>
        <?php
				}
				?>
    </tbody>
</table>
<?php
		echo '<br>' . $query->rowCount() . " résultats";
	} else {
		echo '0 résultat';
	}
}
?>