<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];
$_POST['idDoc'] = intval($_POST['idDoc']);

if (isset($_POST['source'])) {
	$_POST['old'] = stripslashes(str_replace(array('###n###', '###r###'), array("\n", "\r"), $_POST['old']));
	$_POST['old'] = unserialize($_POST['old']);

	if ($_POST['desc'] == "") {
		$_POST['desc'] = NULL;
	}

	// source avec extention
	$_POST['source'] = filter($_POST['source'] . $_POST['ext']);

	// Renommage physique du fichier
	rename('../../../media/doc/' . $_POST['old']['source'], '../../../media/doc/' . $_POST['source']);

	// Mise a jour dans la base de donnée
	$pre = $bdd->prepare("UPDATE tbl_history_documents SET source=?, nom=?, `desc`=? WHERE PKNoProjectDocument=?");
	$pre->execute(array(
		securise($_POST['source']),
		securise($_POST['nom']),
		securise($_POST['desc']),
		intval($_POST['id'])
	));
} else {
	$get_document = $bdd->query("SELECT * FROM tbl_history_documents WHERE PKNoProjectDocument=" . $_POST['idDoc']);
	$doc = $get_document->fetch();

	$ext = array('.jpg', '.png', '.gif', '.bmp', '.jpeg');
?>

<div align="center">
    <table class="infosDoc">

        <?php if (in_array(strtolower(strstr($doc['source'], '.')), $ext)) { ?>
        <tr>
            <td colspan="2" align="center"><img src="../media/doc/<?= $doc['source']; ?>" height="180" /></td>
        </tr>
        <?php } ?>

        <tr>
            <td><?= i("Texte du lien"); ?></td>
            <td><input type="text" value="<?= trim($doc['nom']); ?>" name="nom" /></td>
        </tr>

        <tr>
            <td><?= i("Nom du fichier"); ?></td>
            <td><input type="text" style="width:210px"
                    value="<?= trim(substr($doc['source'], 0, strpos($doc['source'], '.'))); ?>"
                    name="source" /><?= $doc['ext']; ?></td>
        </tr>

        <tr>
            <td colspan="2"><textarea name="desc"><?= trim($doc['desc']); ?></textarea></td>
        </tr>

        <tr>
            <td colspan="2">
                <div class="submitArea">
                    <div align="right"><input id="submit" type="button" value="<?= i("Enregistrer"); ?>" /></div>
                </div>
            </td>
        </tr>

    </table>
</div>

<input type="hidden" value="<?= $doc['ext']; ?>" name="ext" />

<script>
$(function() {
    $('#submit').click(function() {
        $.post('includes/imageLoader/updDocument.php', {
            old: "<?= str_replace(array("\n", "\r"), array('###n###', '###r###'), addslashes(serialize($doc))); ?>",
            nom: $('#window input[name="nom"]').val(),
            source: $('#window input[name="source"]').val(),
            ext: $('#window input[name="ext"]').val(),
            desc: $('#window textarea[name="desc"]').val(),
            id: "<?= $_POST['idDoc']; ?>",
            language: "<?= $_SESSION['language']; ?>"
        }, function(html) {
            closeWindow();
            loadInto('docArea', 'includes/imageLoader/docFromProject.php',
                'id_directory=<?= $_POST['idHist']; ?>&language=<?= $_SESSION['language']; ?>'
                );
        });
    });
});
</script>

<style>
table.infosDoc tr td {
    padding: 5px;
}

#window input[type="text"],
#window textarea {
    border: 1px solid #ccc;
    padding: 3px 10px;
    border-radius: 5px;
    width: 240px;
}

#window input[type="text"]:hover,
#window textarea:hover,
#window input[type="text"]:focus,
#window textarea:focus {
    border: 1px solid #999;
    box-shadow: inset 0px 0px 3px 0px #ddd;
}

#window textarea {
    height: 90px;
    max-height: 200px;
    min-height: 90px;
    width: 330px;
    max-width: 330px;
    min-width: 330px;
    font-family: Verdana, Geneva, sans-serif;
    font-size: 12px;
    padding: 10px;
}
</style>
<?php } ?>