<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];
?>

<div style="background: white; position:absolute; top:0; left:0; width:670px; height:150px; z-index:99; padding: 8px; text-align:center; display:none"
    class="help">

    <div class="showHelp">X</div>
    <br />
    <table align="center" style="margin: 18px auto; text-align:center" class="aide">
        <tr>
            <th><?= i("Nom"); ?></th>
            <th><?= i("Prénom"); ?></th>
            <th><?= i("E-mail"); ?></th>
            <th><?= i("Entrée"); ?></th>
            <th><?= i("Sortie"); ?></th>
            <th><?= i("Profession"); ?></th>
            <th><?= i("Résultat"); ?></th>
        </tr>
        <?php for ($i = 1; $i <= 2; $i++) { ?>
        <tr>
            <td>Nom<?= $i; ?></td>
            <td>Prenom<?= $i; ?></td>
            <td>email<?= $i; ?>@mail.com</td>
            <td>2009</td>
            <td>2013</td>
            <td>1</td>
            <td class="res">Nom<?= $i; ?>;Prenom<?= $i; ?>;email<?= $i; ?>@mail.com;2009;2013;1</td>
        </tr>
        <?php } ?>
    </table>

    <p style="line-height:1.5em">
        <?= i("Votre fichier CSV doit contenir les lignes telles que présentées dans la case Résultat") . "<br>" . i("Vous devez séparer les lignes par un retour de chariot") . " [ENTER]"; ?>

        <br /><br /><b><?= i("Profession"); ?> : </b>
        <?php $getProfession = $bdd->query("SELECT * FROM tbl_professions");
		while ($prof = $getProfession->fetch()) {
			echo $prof['PKNoProfession'] . " = " . $prof['name_' . $_SESSION['language']] . " | ";
		} ?>
        <br /><br />
        <b><?= i("Pour générer automatiquement les e-mails, entrez # à la place de l'adresse mail !"); ?></b>
    </p>
</div>

<div class="showHelp">
    <?= i("Aide"); ?>
</div>

<div align="center">

    <div class="pseudo-file">
        <?= i("Sélectionner un CSV"); ?>
    </div>

    <form class="formimport" action="?p=student_list" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
        <input type="file" class="file" style=" position:relative; opacity: 0; cursor:pointer"
            name="file_import" /><br />
        <input type="checkbox" name="accept_doublon" id="duplicate" checked="checked" value="1" /> <label
            for="duplicate"><?= i("Ne pas importer les doublons"); ?></label><br />
        <input type="submit" value="<?= i("Importer"); ?>" class="btImporter" />
    </form>

</div>

<style>
.showHelp {
    position: absolute;
    top: 8px;
    left: 10px;
    background: #ccc;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.showHelp:hover {
    background: #9DCEFF;
}

.pseudo-file {
    width: 210px;
    background: #B9DCFF;
    padding: 5px 10px;
    position: absolute;
    left: 131px;
    top: 9px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.2s linear;
    -moz-transition: all 0.2s linear;
}

.pseudo-file.in {
    background: #80BFFF;
}

.pseudo-file.check {
    background: #9F6;
}

.btImporter {
    padding: 5px 10px;
    background: #004891;
    color: white;
    border-radius: 8px;
    margin-top: 7px;
    cursor: pointer;
}

.btImporter:hover {
    background: #003;
}
</style>

<script>
$(function() {
    $(".file").css("opacity", "0").hover(function() {
        $(".pseudo-file").addClass("in");
    }, function() {
        $(".pseudo-file").removeClass("in");
    }).change(function() {
        var ext = $(this).val().substring(parseInt($(this).val().length) - 3, $(this).val().length);

        if (ext == "csv") {
            $(".pseudo-file").html($(this).val()).css("cursor", "default").addClass("check");
            $(this).css({
                visibility: "hidden"
            });
        } else {
            alert("<?= i("Le fichier doit être au format") . " .csv"; ?>");
        }
    });

    $(".formimport").submit(function() {
        if ($(".pseudo-file").hasClass("check")) {
            return true;
        } else {
            return false;
        }
    });

    $(".showHelp").click(function() {
        if ($(".help").css("display") == "none") {
            resizeWindow(700, 240);
            setTimeout(function() {
                $(".help").fadeIn("fast");
            }, 150);
        } else {
            resizeWindow(500, 100);
            setTimeout(function() {
                $(".help").fadeOut("fast");
            }, 150);
        }
    });
});
</script>