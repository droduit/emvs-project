<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];

?>

<div id="editData<?= $_POST['id']; ?>">

    <fieldset>
        <legend align="top"><?= i("Titre"); ?></legend>

        <br />
        <div align="center">
            <input type="text" value="<?= stripslashes($_POST['title_fr']); ?>" placeholder="FR" id="title_fr"
                style="width:230px; margin-right: 15px" />
            <input type="text" value="<?= stripslashes($_POST['title_de']); ?>" placeholder="DE" id="title_de"
                style="width:230px" />
        </div>

    </fieldset>

    <fieldset>
        <legend align="top"><?= i("Description"); ?></legend>


        <div style="margin: 10px 0px 5px; display: none" align="center" class="message">
            <div class="rem" style="margin: 6px 0px"></div>
            <div class="nbMax" style="margin: 3px 0px"><?= i("Maximum autorisé"); ?> : 1900</div>
            <div class="nbActuel" style="margin: 3px 0px"><?= i("Nombre actuelle"); ?> : <span class="nb"></span></div>
        </div>

        <br />

        <button type="button" id="delTags" style="margin: 5px 0px"><?= i("Supprimer les tags HTML"); ?></button>
        <?= i("mais conserver ceux-ci") . " : "; ?>
        <input type="text" id="whitelist" value="<h1><b>" />

        <div align="center">
            <textarea id="desc_fr" placeholder="FR"><?= stripslashes($_POST['desc_fr']); ?></textarea>
            <br />
            <textarea id="desc_de" placeholder="DE"><?= stripslashes($_POST['desc_de']); ?></textarea>
        </div>

    </fieldset>

    <fieldset>
        <legend align="top"><?= i("Réalisation"); ?></legend>
        <br />
        <div><?= i("Séparez les noms par des virgules. La casse sera traité lors de la génération."); ?></div><br />
        <i>Bastien Alter,Théophane Mourad,Dominique Roduit...</i><br />

        <br />
        <div align="center">
            <textarea id="student" placeholder="<?= i("Apprentis"); ?>"><?= $_POST['student']; ?></textarea>
            <br />
            <textarea id="teacher" placeholder="<?= i("Enseignants"); ?>"><?= $_POST['teacher']; ?></textarea>
        </div>
    </fieldset>

    <div class="submitArea">
        <input type="button" onclick="closeTheater();" value="<?= i("Annuler"); ?>" />
        <input type="button" id="finish" value="<?= i("Modifier"); ?>" />
    </div>

</div>

<style>
.cadre .contenu input[type="text"],
.cadre .contenu textarea,
.cadre .contenu select {
    border-radius: 4px;
    padding: 2px 4px;
    border: 1px solid #ccc;
    background: #fff;
}

.cadre .contenu textarea {
    max-height: 180px;
    height: 90px;
}
</style>

<script>
function strip_tags(input, allowed) {
    allowed = (((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join(
    ''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
    var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
        commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
    return input.replace(commentsAndPhpTags, '').replace(tags, function($0, $1) {
        return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
    });
}

$(function() {
    <?php if (!isset($_POST['clicked'])) { ?>
    $("#delTags").live('click', function() {
        $("#desc_fr, #desc_de").each(function() {
            $(this).val(strip_tags($(this).val(), $("#whitelist").val()));
        });
        $("#delTags").stopPropagation("click");
    });
    <?php } ?>

    if (($('#desc_fr').val() + "" + $('#desc_de').val()).length > 1900) {
        $(".message").fadeIn();
        $(".rem").html("<?= i("Vous devez supprimer"); ?> <span class='nbdel'>" + (($('#desc_fr').val() + "" +
            $('#desc_de').val()).length - 1900) + "</span> <?= i("caractères au minimum"); ?>");
        $(".nbActuel .nb").html((($('#desc_fr').val() + "" + $('#desc_de').val()).length));
    }

    $('#desc_fr,#desc_de').keyup(function() {

        if (($('#desc_fr').val() + "" + $('#desc_de').val()).length > 1900) {
            $(".message").fadeIn(0);
            $(".rem").fadeIn().html("<?= i("Vous devez supprimer"); ?> <span class='nbdel'>" + (($(
                    '#desc_fr').val() + "" + $('#desc_de').val()).length - 1900) +
                "</span> <?= i("caractères au minimum"); ?>");
        } else {
            $(".rem").fadeOut();
        }
        $(".nbActuel .nb").html((($('#desc_fr').val() + "" + $('#desc_de').val()).length));
    });


    <?php if (isset($_POST['clicked'])) { ?>
    $("#finish").click(function() {
        $('<?= $_POST['n1']; ?>').val($('#title_fr').val());
        $('<?= $_POST['n2']; ?>').val($('#title_de').val());
        $('<?= $_POST['n3']; ?>').val($('#desc_fr').val());
        $('<?= $_POST['n4']; ?>').val($('#desc_de').val());
        $('<?= $_POST['n6']; ?>').val($('#student').val());
        $('<?= $_POST['n7']; ?>').val($('#teacher').val());
        closeTheater();
        $(".contenu").html("");

        <?php if (!isset($_POST['clicked'])) { ?>
        if (($('#desc_fr').val() + "" + $('#desc_de').val()).length > 1900) {
            $('tr[projectid="<?= $_POST['id']; ?>"] td').css("background", "#FFB9B9");
        } else {
            $('tr[projectid="<?= $_POST['id']; ?>"] td').css("background", "#D7FFD7");
            setTimeout(function() {
                $('tr[projectid="<?= $_POST['id']; ?>"] td').css("background", "");
                $('tr[projectid="<?= $_POST['id']; ?>"]').removeClass('troplong');
            }, 1500);
        }
        <?php } ?>
    });
    $("#finish").trigger("click");
    <?php } else { ?>
    $("#finish").live('click', function() {
        $('<?= $_POST['n1']; ?>').val($('#editData<?= $_POST['id']; ?> #title_fr').val());
        $('<?= $_POST['n2']; ?>').val($('#editData<?= $_POST['id']; ?> #title_de').val());
        $('<?= $_POST['n3']; ?>').val($('#editData<?= $_POST['id']; ?> #desc_fr').val());
        $('<?= $_POST['n4']; ?>').val($('#editData<?= $_POST['id']; ?> #desc_de').val());
        $('<?= $_POST['n6']; ?>').val($('#editData<?= $_POST['id']; ?> #student').val());
        $('<?= $_POST['n7']; ?>').val($('#editData<?= $_POST['id']; ?> #teacher').val());
        $("#editData<?= $_POST['id']; ?>").remove("");
        closeTheater();

        if (($('#desc_fr').val() + "" + $('#desc_de').val()).length > 1900) {
            $('tr[projectid="<?= $_POST['id']; ?>"] td').css("background", "#FFB9B9");
        } else {
            $('tr[projectid="<?= $_POST['id']; ?>"] td').css("background", "#D7FFD7");
            setTimeout(function() {
                $('tr[projectid="<?= $_POST['id']; ?>"] td').css("background", "");
                $('tr[projectid="<?= $_POST['id']; ?>"]').removeClass('troplong');
            }, 1500);
        }

        $("#finish").stopPropagation("click");
        return false;
    });
    <?php } ?>

});
</script>