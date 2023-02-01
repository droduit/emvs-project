<?php
global $bdd;

if (isset($_POST['image'])) {
	require_once('../../conf/common.php');


	// Ajout de l'image au projet
	$bdd->exec("UPDATE tbl_teachers SET FKNoMediaImage=" . $_POST['image'] . " WHERE PKNoTeacher=" . $_POST['id']);
	echo i("Nouvelle image assignée") . ". <i>" . i("Recharger la page") . "</i>";
} else {

	$_GET = array_secured($_GET);
	$_GET['id'] = intval($_GET['id']);

	$proj = $bdd->query("SELECT name, firstname, email FROM tbl_teachers WHERE PKNoTeacher=" . $_GET['id']);
	$projet = $proj->fetch();

	$pageName = "teachers";
?>

<form method="POST" action="" class="form" novalidate="novalidate" onsubmit="return submitAll();">

    <div style="float:left">
        <div class="block medium">
            <div class="titlebar">
                <h3><?= i("Informations sur le professeur"); ?></h3>
            </div>
            <div class="block_cont">
                <div class="form_row" style="float:left; margin-right: 15px;">
                    <label><?= i("Nom"); ?></label>
                    <input maxlength="45" type="text" placeholder="<?= i("Nom"); ?>" id="req" name="name"
                        style="width: 275px;" class="input validate[required] tipRight" value="<?php if (isset($_GET['id'])) {
																																															echo $projet['name'];
																																														} ?>" tabindex="1">
                </div>

                <div class="form_row" style="float:left; margin-right: 15px;">
                    <label><?= i("Prénom"); ?></label>
                    <input maxlength="45" type="text" placeholder="<?= i("Prénom"); ?>" id="req" name="firstname"
                        style="width: 275px;" class="input validate[required] tipRight" value="<?php if (isset($_GET['id'])) {
																																																	echo $projet['firstname'];
																																																} ?>" tabindex="2">
                </div>

                <div class="form_row" style="float:left; margin-right: 15px;">
                    <label><?= i("E-mail"); ?></label>
                    <input maxlength="85" type="text" placeholder="<?= i("Adresse e-mail"); ?>" id="req" name="mail"
                        style="width: 275px;" class="input validate[required] tipRight" value="<?php if (isset($_GET['id'])) {
																																																	echo $projet['email'];
																																																} ?>" tabindex="3">
                </div>

                <div style="clear:both"></div>


            </div>

        </div>

        <div style="clear:both"></div>

        <div
            style="background: rgba(255,255,255,0.2); margin-bottom:10px; width: 630px; margin-left: 5px; border-radius: 4px">
            <input style="margin-right:-1px" class="float_right btSubmit" value="<?= i("Enregistrer"); ?>" type="submit"
                tabindex="4">
            <div style="clear:both;"></div>
        </div>

    </div>


    <div class="block small">
        <div class="titlebar tipsyManual"
            <?php if (isset($_GET['first'])) { ?>title="<?= '<b>' . i("Choisissez maintenant une image") . "</b>"; ?>"
            <?php } ?>>
            <h3><?= i("Photo"); ?></h3>
        </div>
        <div class="block_cont">
            <?php
				// Sélection de l'image liée à l'élève
				$get_images = $bdd->query("SELECT FKNoMediaImage FROM tbl_teachers WHERE PKNoTeacher=" . $_GET['id']);
				$img = $get_images->fetch();
				?>

            <div id="imageArea" <?php if (getImg($img['FKNoMediaImage']) != "false") { ?>style="display:none"
                <?php } ?>><?php ImagesFromDirectory(getImgDirectory("Professeurs"), $img['FKNoMediaImage']); ?></div>
            <?php if (getImg($img['FKNoMediaImage']) != "false") { ?>
            <div align="center" id="imgView">
                <div class="gallery_item" style="float:none; margin:2px">
                    <div
                        style="background: url(<?= getImg($img['FKNoMediaImage']); ?>) no-repeat 50% 50%; background-size: cover; height:150px; width: 200px">
                    </div>
                    <div class="actionbar" style="bottom:5px; top:auto; left:6px;">
                        <a class="action edit" style="cursor:pointer"><span><?= i("Changer"); ?></span></a>
                        <a class="action delete" style="cursor:pointer"><span><?= i("Détacher"); ?></span></a>
                    </div>
                </div>
            </div>
            <?php
				} ?>

        </div>
    </div>

    <input type="hidden" id="editing" value="0" />

</form>

<script>
$(function() {
    $('input[name="name"]').focus().select();

    // Actions sur l'image déjà liés, soit on change l'image soit on la détache 
    $(".action.edit").click(function() {
        $("#imgView").effect("drop");
        setTimeout(function() {
            $("#imageArea").effect("slide");
        }, 412);
    });

    $(".action.delete").click(function() {
        $.post('includes/<?= $pageName; ?>/edit.php', {
                image: "NULL",
                id: "<?= $_GET['id']; ?>"
            },
            function(html) {
                $(".action.edit").trigger("click");
                $(".coveredImg").removeClass("selected");
                notify("<?= i("L'image a été détachée avec succès"); ?>.");
            });
    });
    // ----------------------------------------------------------------------

    <?php $mail = explode('|', get_parm('email_teacher')); ?>
    // Génération du mail et messages relatifs pour l'aide a  la génération
    $('input[name="mail"]').keyup(function(e) {
        if (e.which == 17) { // Si on appuye sur CTRL
            var email = "";

            email = noAccent(<?php if (strpos($mail[0], 'prenom') != false) { ?>$(
                    'input[name="firstname"]')
                .val() <?php if (str_replace('[prenom]=', '', $mail[0]) != "*") { ?>.substring(0,
                    <?= str_replace('[prenom]=', '', $mail[0]); ?>) <?php }
																		} else { ?>$('input[name="name"]')
                .val() <?php if (str_replace('[nom]=', '', $mail[0]) != "*") { ?>.substring(0,
                    <?= str_replace('[nom]=', '', $mail[0]); ?>) <?php }
																			} ?>.toLowerCase());
            email += "<?= $mail[1]; ?>";
            email += noAccent(<?php if (strpos($mail[2], 'prenom') != false) { ?>$(
                    'input[name="firstname"]')
                .val() <?php if (str_replace('[prenom]=', '', $mail[2]) != "*") { ?>.substring(0,
                    <?= str_replace('[prenom]=', '', $mail[2]); ?>) <?php }
																		} else { ?>$('input[name="name"]')
                .val() <?php if (str_replace('[nom]=', '', $mail[2]) != "*") { ?>.substring(0,
                    <?= str_replace('[nom]=', '', $mail[2]); ?>) <?php }
																			} ?>.toLowerCase());
            email += "@<?= $mail[3]; ?>";
            email = replaceAll(email, ' ', '');

            $('input[name="mail"]').val(email);



            $(".tipsy.tipsy-n .tipsy-inner").html(
                "<?= i("Modifiez si la génération ne convient pas"); ?>");
        }
    });
    $('input[name="mail"]').tipsy({
        gravity: "n",
        live: true,
        trigger: "focus"
    });
    $('input[name="mail"]').focus(function() {
        if ($('input[name="mail"]').val() == "") {
            $('input[name="mail"]').attr("title", "<?= i("Pressez 'CTRL' pour générer"); ?>");
            $('input[name="mail"]').tipsy("show");
        } else {
            $('input[name="mail"]').tipsy("hide");
        }
        $(this).val(replaceAll($(this).val(), ' ', ''));
    });
    // ----------------------------------------------------------------------

    // Correction automatique au fur et a mesure et gestion du focus  -------
    $('input[name="name"], input[name="firstname"]').keyup(function(e) {
        $(this).val(name_format($(this).val()));
    });
    $('input[name="mail"]').keyup(function() {
        $('input[name="mail"]').val(replaceAll($(this).val(), ' ', ''));
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
    // ----------------------------------------------------------------------

    // Si on a fait des modification on l'enregistre temporairement pour savoir si on peut recharger librement la page ou pas
    $('input[name="mail"], input[name="name"], input[name="firstname"]').change(function() {
        $("#editing").val("1");
    });
    // ----------------------------------------------------------------------

    // Sélection des images
    $(".coveredImg").live("click", function() {
        var element = $(this);
        $.post('includes/<?= $pageName; ?>/edit.php', {
                image: element.attr("PK"),
                id: "<?= $_GET['id']; ?>"
            },
            function(html) {
                $(".coveredImg").removeClass("selected");
                element.addClass("selected");
                if ($("#editing").val() == 0) {
                    window.location = '?p=<?= $pageName; ?>~edit&firstOk&id=<?= $_GET['id']; ?>';
                } else {
                    notify(html);
                }
            });
    });
    // ----------------------------------------------------------------------

    $(".coveredImg").attr("title",
            "<?= i("Assigner à") . " " . $projet['firstname'] . " " . substr($projet['name'], 0, 1) . "."; ?>")
        .addClass("tipsys");
    $('.tipsys').tipsy({
        gravity: 's'
    });

    <?php if (isset($_GET['first'])) { ?>
    $(".tipsyManual").tipsy({
        gravity: "e",
        html: true,
        trigger: 'manual'
    });
    $(".tipsyManual").tipsy("show");
    <?php } ?>

    <?php if (isset($_GET['firstOk'])) { ?>notify(
        "<?= $projet['firstname'] . " " . i("a maintenant une photo"); ?>.");
    <?php } ?>
});
//Enregistrement des modifications
function submitAll() {
    $(".btSubmit").fadeOut("fast");
    $.post('includes/<?= $pageName; ?>/update_recorder.php', {
        name: name_format($('input[name="name"]').val()),
        firstname: name_format($('input[name="firstname"]').val()),
        mail: $('input[name="mail"]').val(),
        profession: $('input[name="profession"]').val(),
        id: "<?= $_GET['id']; ?>",
        language: "<?= language; ?>"
    }, function(html) {
        if (html.substring(0, 5) != "Error") {
            window.location = '?p=<?= substr($pageName, 0, -1); ?>_list';
        } else {
            notify(html);
        }
    });
    return false;
}
</script>
<?php
} ?>