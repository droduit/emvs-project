<?php
global $bdd;
$pageName = "student_list";
?>

<form method="POST" action="" class="form" novalidate="novalidate" onsubmit="return submitAll();">


    <div class="block large" style="width:98.7%; margin: 0px auto 12px;">
        <div class="titlebar">
            <h3><?= i("Informations sur le professeur"); ?></h3>
        </div>
        <div class="block_cont">
            <div class="form_row" style="float:left; margin-right: 15px;">
                <label><?= i("Nom"); ?></label>
                <input maxlength="45" type="text" placeholder="<?= i("Nom"); ?>" id="req" name="name"
                    style="width: 275px;" class="input validate[required] tipRight" value="" onkeyup="mailGenerate();"
                    tabindex="1">
            </div>

            <div class="form_row" style="float:left; margin-right: 15px;">
                <label><?= i("Prénom"); ?></label>
                <input maxlength="45" type="text" placeholder="<?= i("Prénom"); ?>" id="req" name="firstname"
                    style="width: 275px;" class="input validate[required] tipRight" value="" onkeyup="mailGenerate();"
                    onblur="blurForMail()" tabindex="2">
            </div>

            <div class="form_row" style="float:left; margin-right: 15px;">
                <label><?= i("E-mail"); ?></label>
                <input maxlength="85" type="text" placeholder="<?= i("Adresse e-mail"); ?>" id="req" name="mail"
                    style="width: 275px;" class="input validate[required] tipRight tipsysf"
                    title="<?= i("Vérifiez si la génération est correcte"); ?>" onblur="MailTitleDelete()" tabindex="3">
            </div>

            <div style="clear:both"></div>


        </div>
    </div>

    <div style="clear:both"></div>

    <div style="background: rgba(255,255,255,0.2); margin-bottom:10px; width:98.7%; margin:auto;  border-radius: 4px">
        <input style="margin-right:-1px" class="float_right btSubmit" value="<?= i("Enregistrer"); ?>" type="submit"
            tabindex="4">
        <div style="clear:both;"></div>
    </div>




</form>

<script>
$(function() {
    $('input[name="name"]').focus().select();
    $(".tipsysf").tipsy({
        gravity: "s",
        trigger: "focus"
    });
    $(".tipsyn").tipsy({
        gravity: "n",
        fade: true,
        trigger: "manual"
    });

    $('input[name="name"], input[name="firstname"]').keyup(function(e) {
        $(this).val(name_format($(this).val()));
    });
    $('input[name="mail"]').bind('focus, keyup', function() {
        $(this).val(replaceAll($(this).val(), ' ', ''));
    });
    $('input[name="mail"]').blur(function() {
        if (replaceAll($(this).val(), ' ', '') != "") {
            if (check_mail($(this).val()) == false) {
                notify("<?= i("Corriger l'adresse mail"); ?>");
                $('.btSubmit').hide();
                setTimeout(function() {
                    $('input[name="mail"]').focus().select();
                }, 150);
            } else {
                $('.btSubmit').show().focus();
                $(".notify").fadeOut("fast");
            }
        }
    });
});
//Enregistrement des modifications
function submitAll() {
    $(".btSubmit").fadeOut("fast");
    $.post('includes/teachers/update_recorder.php', {
        name: name_format($('input[name="name"]').val()),
        firstname: name_format($('input[name="firstname"]').val()),
        mail: $('input[name="mail"]').val(),
        profession: $('input[name="profession"]').val(),
        language: "<?= language; ?>"
    }, function(html) {
        if (html.substring(0, 5) != "Error") {
            window.location = '?p=teachers~edit&first&id=' + html; // IMPORTANT ! Redirection sur l'edition
        } else {
            notify(html);
        }
    });
    return false;
}
// Créer l'adresse mail automatiquement a partir du nom et prenom
<?php $mail = explode('|', get_parm('email_teacher')); ?>

function mailGenerate() {

    email = noAccent(<?php if (strpos($mail[0], 'prenom') != false) { ?>$('input[name="firstname"]')
        .val() <?php if (str_replace('[prenom]=', '', $mail[0]) != "*") { ?>.substring(0,
            <?= str_replace('[prenom]=', '', $mail[0]); ?>) <?php }
															} else { ?>$('input[name="name"]')
        .val() <?php if (str_replace('[nom]=', '', $mail[0]) != "*") { ?>.substring(0,
            <?= str_replace('[nom]=', '', $mail[0]); ?>) <?php }
																} ?>.toLowerCase());
    email += "<?= $mail[1]; ?>";
    email += noAccent(<?php if (strpos($mail[2], 'prenom') != false) { ?>$('input[name="firstname"]')
        .val() <?php if (str_replace('[prenom]=', '', $mail[2]) != "*") { ?>.substring(0,
            <?= str_replace('[prenom]=', '', $mail[2]); ?>) <?php }
															} else { ?>$('input[name="name"]')
        .val() <?php if (str_replace('[nom]=', '', $mail[2]) != "*") { ?>.substring(0,
            <?= str_replace('[nom]=', '', $mail[2]); ?>) <?php }
																} ?>.toLowerCase());
    email += "@<?= $mail[3]; ?>";
    email = replaceAll(email, ' ', '');

    $('input[name="mail"]').val(email);

}

function blurForMail() {
    $(".tipsyn").tipsy("show");
}
</script>