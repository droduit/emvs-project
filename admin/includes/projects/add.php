<style>
.tipBot.edit {
    height: 231px;
}
</style>

<form method="POST" action="" class="form" novalidate="novalidate" onsubmit="return submitAll();">

    <div class="block medium">
        <div class="titlebar">
            <h3><?= i("Nouveau projet"); ?></h3>
        </div>
        <div class="block_cont" style="position:relative">
            <div class="form_row">
                <label><?= i("Francais"); ?></label>
                <input lang="fr" maxlength="45" type="text" placeholder="<?= i("Titre du projet"); ?>" id="req"
                    name="title_fr" style="width: 435px;" class="input validate[required] tipRight" tabindex="1">
            </div>

            <div class="form_row">
                <label><?= i("Allemand"); ?></label>
                <input lang="de" maxlength="45" type="text" placeholder="<?= i("Titre du projet"); ?>" id="req"
                    name="title_de" style="width: 435px;" class="input validate[required] tipRight" tabindex="2">
            </div>

            <div class="form_row" style="position:absolute; float:none; right: 13px; bottom: 5px">
                <input type="submit" value="<?= i("Enregistrer") ?>" class="submit submitProj" tabindex="3">
            </div>
        </div>
    </div>


</form>

<div id="dialog-confirm-delete" title="<?= i("Projet déjà existant"); ?> !" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
    <p>
    <p><span class="prepend"></span></p><br /> <b><?= i("Existe déjà"); ?>.</b></p>
    <br><?= i("Voulez-vous quand meme l'ajouter"); ?>?
    </p>
</div>

<script>
//Enregistrement des modifications
function submitAll() {
    $.post('includes/projects/checkExistProject.php', {
        title_fr: name_format($('input[name="title_fr"]').val()),
        title_de: name_format($('input[name="title_de"]').val()),
        language: "<?= $_SESSION['language']; ?>"
    }, function(html1) {
        var exist = html1;

        if (exist == "false") {
            addProject();
        } else {
            var title = getTextBetween(exist, '#name=', '#id=');
            var id = getTextBetween(exist, '#id=', exist.length);

            $("#dialog-confirm-delete .prepend").html(title);

            $("#dialog-confirm-delete").dialog({
                resizable: false,
                height: 180,
                modal: false,
                buttons: {
                    "<?= i("Créer nouveau"); ?>": function() {
                        $(this).dialog("close");
                        addProject();
                    },
                    "<?= i("Modifier existant"); ?>": function() {
                        $(this).dialog("close");
                        $('input[name="title_fr"]').focus();
                        window.location = '?p=projects~edit&id=' + id;
                    }
                }
            });
        }
    });

    return false;
}

function addProject() {
    $(".submitProj").fadeOut("fast");
    $.post('includes/projects/insert_recorder.php', {
        title_fr: $('input[name="title_fr"]').val(),
        title_de: $('input[name="title_de"]').val(),
        language: "<?= language; ?>"
    }, function(html) {
        if (html.substring(0, "Error".length) != "Error") {
            window.location = '?p=projects~edit&first&id=' + html;
        } else {
            notify(html);
        }
    });
    return false;
}
</script>