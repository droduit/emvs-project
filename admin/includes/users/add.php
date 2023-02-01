<?php
global $bdd;
$pageName = "users";
?>

<form method="POST" action="" class="form" novalidate="novalidate" onsubmit="return submitAll();">

    <div class="block big">
        <div class="titlebar">
            <h3><?= i("Informations d'authentification"); ?></h3>
        </div>
        <div class="block_cont">

            <div class="form_row url" style="float:left; margin-right: 15px;">
                <label><?= i("Adresse email"); ?></label>
                <input type="text" required="required" placeholder="adresse@email.com" id="email" autocomplete="off"
                    name="email" style="width: 275px;" class="input validate[required] tipRight">
            </div>

            <div class="form_row url" style="float:left; margin-right: 15px;">
                <label><?= i("Mot de passe"); ?></label>
                <input type="password" required="required" placeholder="<?= i("Nouveau mot de passe"); ?>" id="pass"
                    autocomplete="off" name="pass" style="width: 275px;" class="input validate[required] tipRight">
            </div>

            <div class="form_row url" style="float:left; margin-right: 15px;">
                <label><?= i("Confirmation du mot de passe"); ?></label>
                <input type="password" required="required" placeholder="<?= i("Retaper le mot de passe"); ?>" id="pass2"
                    autocomplete="off" name="pass2" style="width: 275px;" class="input validate[required] tipRight">
            </div>

            <div style="clear:both"></div>
        </div>

    </div>

    <div style="clear:both"></div>

    <div
        style="background: rgba(255,255,255,0.2); margin-bottom:10px; width: 99%; margin-left: 5px; border-radius: 4px;">
        <div class="txtBefore" style="padding: 7px; text-align:right">
            <?= i("Le bouton de validation n'apparaitra qu'une fois vos informations correctement remplies."); ?></div>

        <input style="margin-right:-1px; display:none" class="float_right btSubmit submitBt"
            value="<?= i("Enregistrer"); ?>" type="submit">
        <div style="clear:both;"></div>
    </div>

</form>

<script>
$(function() {
    $("#pass2").keyup(function() {
        if ($("#email").val() != "" && $(this).val().length > 4 && $(this).val() == $("#pass").val()) {
            $(".txtBefore").fadeOut();
            $(".submitBt").fadeIn();
        } else {
            $(".submitBt").fadeOut();
            $(".txtBefore").fadeIn();
        }
    });
});

//Enregistrement des modifications
function submitAll() {
    if ($("#email").val() != "") {
        if ($("#pass").val().length > 4) {
            if ($("#pass").val() == $("#pass2").val()) {
                $(".btSubmit").fadeOut("fast");
                $.post('includes/<?= $pageName; ?>/insert_recorder.php', {
                    email: $('input[name="email"]').val(),
                    pass: $('input[name="pass"]').val(),
                    id: "<?= $_GET['id']; ?>",
                    language: "<?= language; ?>"
                }, function(html) {
                    notify(html);
                    setTimeout(function() {
                        $(".btSubmit").fadeIn("fast");
                        window.location = '?p=<?= $pageName; ?>';
                    }, 800);
                });
            } else {
                notify("Le mot de passe et la confirmation ne correspondent pas !");
            }
        } else {
            notify("Le mot de passe doit être plus long que 4 caractères!");
        }
    } else {
        notify("L'email ne peut pas etre vide !");
    }
    return false;
}
</script>