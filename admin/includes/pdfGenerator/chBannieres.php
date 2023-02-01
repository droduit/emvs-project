<?php
require_once('../../conf/common.php');

if (isset($_POST['slct'])) {
	$bdd->exec("UPDATE admin_config SET value='" . $_POST['slct'] . "' WHERE name='banniere_" . $_POST['prof'] . "'");
	return;
}

$folder = "../../../media/pdf/img/";
$dossier = opendir($folder);
$nomFichier = [];
while ($Fichier = readdir($dossier)) {
	if ($Fichier != "." && $Fichier != ".." && substr($Fichier, -3) == "svg" && $Fichier != "prof_AEI.svg") {
		$nomFichier[] = $Fichier;
	}
}
closedir($dossier);

foreach ($nomFichier as $name) { ?>
<div class="img_ban" url="<?= $name ?>">
    <embed src="../media/pdf/img/<?= $name; ?>" type="image/svg+xml" width="575px" />
    <div class="ToAssigne">Assigner</div>
</div>
<?php
}
?>

<style>
.img_ban {
    margin-bottom: 3px;
}

.img_ban embed {
    cursor: pointer;
}

.ToAssigne {
    background: #9CF;
    cursor: pointer;
    padding: 3px;
    border-radius: 4px;
    text-align: center;
    margin-bottom: 15px;
    margin-top: 2px;
}

.ToAssigne:hover {
    background: #9CC;
}
</style>

<script>
$(function() {
    $(".img_ban .ToAssigne").click(function() {
        $('.bannieres[prof="<?= $_POST['prof']; ?>"] embed').attr("src", "../media/pdf/img/" + $(this)
            .parent().attr("url"));
        $.post('includes/pdfGenerator/chBannieres.php', {
            prof: "<?= $_POST['prof']; ?>",
            slct: $(this).parent().attr("url")
        }, function(html) {
            closeWindow();
            <?php if (is_chrome()) { ?>window.location.reload();
            <?php } ?>
        });
    });
});
</script>