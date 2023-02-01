<?php
if (isset($_POST['live'])) {
	require_once("../../conf/common.php");
	$_SESSION['language'] = $_POST['language'];
}

global $bdd;
$pageName = "student_list";
$name = "name_" . $_SESSION['language'];
?>

<?php if (isset($_POST['live'])) { ?>

<form method="POST" class="form" onsubmit="return submitAll(); return false;">

    <fieldset>
        <legend align="top"><?= i("Nom"); ?> / <?= i("Prénom"); ?></legend>
        <p>
            <input maxlength="45" type="text" placeholder="<?= i("Nom"); ?>" id="req" name="name"
                style="width: 315px; margin-right:20px" required="required" class="input validate[required] tipRight"
                value="<?= $_POST['text']; ?>" onkeyup="mailGenerate();" tabindex="1">

            <input maxlength="45" type="text" placeholder="<?= i("Prénom"); ?>" id="req" name="firstname"
                style="width: 315px;" required="required" class="input validate[required] tipRight" value=""
                onkeyup="mailGenerate();" onblur="blurForMail()" tabindex="2">
        </p>
    </fieldset>


    <fieldset>
        <legend align="top"><?= i("E-mail"); ?></legend>
        <p>
            <input maxlength="85" type="text" placeholder="<?= i("Adresse e-mail de l'élève"); ?>" id="req" name="mail"
                style="width: 98%;" required="required" class="input validate[required] tipRight tipsysf" tabindex="3"
                title="<?= i("Vérifiez si la génération est correcte"); ?>" onblur="MailTitleDelete()">
        </p>
    </fieldset>

    <fieldset>
        <legend align="top"><?= i("Profession"); ?></legend>
        <p>
            <select name="profession" style="padding: 6px 10px; border-radius: 4px; border:1px solid #8E9BAC;"
                tabindex="4">
                <?php
					$get_profession = $bdd->query("SELECT * FROM tbl_professions");
					while ($prof = $get_profession->fetch()) {
						echo '<option value="' . $prof['PKNoProfession'] . '">' . $prof[$name] . '</option>';
					}
					?>
            </select>
        </p>
    </fieldset>


    <fieldset>
        <legend align="top"><?= i("Formation"); ?></legend>



        <p>
        <div class="form_row" style="float:left; margin-right: 15px; width: 240px; margin-left: 75px;">
            <label style="display:inline"><?= i("Entrée à l'école en"); ?></label>
            <select name="yearEntree" style="padding: 6px 10px; border-radius: 4px; border:1px solid #8E9BAC;"
                tabindex="5">
                <option value="NULL">-</option>
                <?php
					for ($i = date('Y'); $i >= 2000; $i--) {
						echo '<option value="' . $i . '"';
						if (date('Y') - 3 == $i) {
							echo ' selected="selected" ';
						}
						echo '>' . $i . '</option>';
					}
					?>
            </select>
        </div>

        <div class="form_row" style="float:left; margin-right: 15px; width: 240px">
            <label style="display:inline"><?= i("Terminera sa formation en"); ?></label>


            <select name="yearSortie" style="padding: 6px 10px; border-radius: 4px; border:1px solid #8E9BAC;"
                tabindex="6">
                <option value="NULL">-</option>

                <?php
					for ($i = date('Y') + 5; $i >= 2000; $i--) {
						echo '<option value="' . $i . '"';
						if (date('Y') + 1 == $i) {
							echo ' selected="selected" ';
						}
						echo '">' . $i . '</option>';
					}
					?>
            </select>

        </div>
        </p>
    </fieldset>


    <div class="submitArea">
        <input type="button" id="cancel" value="<?= i("Annuler"); ?>" tabindex="8" />
        <input type="button" id="submitall" value="<?= i("Ajouter"); ?>" tabindex="7" />
    </div>

</form>

<script>
$(function() {
    $("#cancel").click(function() {
        $(".cadre.addStu").remove();
        $(".cadre").css("display", "block");
        $("#cancel").stopPropagation("click");
    });
    $("#submitall").click(function() {
        $(".form").submit();
        $("#submitall").stopPropagation("click");
    });
});
</script>

<style>
input[type="text"] {
    background: white;
}

p {
    margin: 8px 0px;
}
</style>

<?php } else { ?>
<form method="POST" action="" class="form" onsubmit="return submitAll();">

    <div class="block large">
        <div class="titlebar">
            <h3><?= i("Informations sur l'élève"); ?></h3>
        </div>
        <div class="block_cont">
            <div class="form_row" style="float:left; margin-right: 15px;">
                <label><?= i("Nom"); ?></label>
                <input maxlength="45" type="text" placeholder="<?= i("Nom"); ?>" id="req" name="name"
                    style="width: 215px;" required="required" class="input validate[required] tipRight" value=""
                    onkeyup="mailGenerate();" tabindex="1">
            </div>

            <div class="form_row" style="float:left; margin-right: 15px;">
                <label><?= i("Prénom"); ?></label>
                <input maxlength="45" type="text" placeholder="<?= i("Prénom"); ?>" id="req" name="firstname"
                    style="width: 215px;" required="required" class="input validate[required] tipRight" value=""
                    onkeyup="mailGenerate();" onblur="blurForMail()" tabindex="2">
            </div>

            <div class="form_row" style="float:left; margin-right: 15px;">
                <label><?= i("E-mail"); ?></label>
                <input maxlength="85" type="text" placeholder="<?= i("Adresse e-mail de l'élève"); ?>" id="req"
                    name="mail" style="width: 275px;" required="required"
                    class="input validate[required] tipRight tipsysf" tabindex="3"
                    title="<?= i("Vérifiez si la génération est correcte"); ?>" onblur="MailTitleDelete()">
            </div>

            <div class="form_row" style="float:left; margin-right: 15px;">
                <label><?= i("Profession"); ?></label>


                <select name="profession" style="padding: 6px 10px; border-radius: 4px; border:1px solid #8E9BAC;"
                    tabindex="4">
                    <?php
						$get_profession = $bdd->query("SELECT * FROM tbl_professions");
						while ($prof = $get_profession->fetch()) {
							echo '<option value="' . $prof['PKNoProfession'] . '">' . $prof[$name] . '</option>';
						}
						?>
                </select>


            </div>


            <div style="clear:both"></div>

            <div style="border-top: 2px dashed #E6E6E6; margin: 15px 0px;"></div>


            <div style="width:510px; margin:auto">

                <div class="form_row" style="float:left; margin-right: 15px; width: 240px">
                    <label style="display:inline"><?= i("Entrée à l'école en"); ?></label>


                    <select name="yearEntree" style="padding: 6px 10px; border-radius: 4px; border:1px solid #8E9BAC;"
                        tabindex="5">
                        <option value="NULL">-</option>
                        <?php
							for ($i = date('Y'); $i >= 2000; $i--) {
								echo '<option value="' . $i . '"';
								if (date('Y') - 3 == $i) {
									echo ' selected="selected" ';
								}
								echo '>' . $i . '</option>';
							}
							?>
                    </select>
                </div>

                <div class="form_row" style="float:left; margin-right: 15px; width: 240px">
                    <label style="display:inline"><?= i("Terminera sa formation en"); ?></label>


                    <select name="yearSortie" style="padding: 6px 10px; border-radius: 4px; border:1px solid #8E9BAC;"
                        tabindex="6">
                        <option value="NULL">-</option>

                        <?php
							for ($i = date('Y') + 5; $i >= 2000; $i--) {
								echo '<option value="' . $i . '"';
								if (date('Y') + 1 == $i) {
									echo ' selected="selected" ';
								}
								echo '">' . $i . '</option>';
							}
							?>
                    </select>
                </div>

            </div>


            <div style="clear:both"></div>


        </div>
    </div>




    <div
        style="background: rgba(255,255,255,0.2); margin-bottom:10px; width: 947px; margin-left: 5px; border-radius: 4px">
        <input style="margin-right:-1px" class="float_right btSubmit" value="<?= i("Enregistrer"); ?>" tabindex="7"
            type="submit">
        <div style="clear:both;"></div>
    </div>

</form>

<?php } ?>

<div id="dialog-confirm" title="<?= i("Elève déjà existant"); ?> !" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
    <p>
    <p><span class="prepend"></span></p><br /> <b><?= i("Existe déjà"); ?>.</b></p>
    <br><?= i("Voulez-vous quand meme l'ajouter"); ?>?</p>
</div>


<script>
$(function() {
    $('input[name="name"]').focus();

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

var run = 0;
//Enregistrement des modifications
function submitAll() {
    if (run == 0) {
        $.post('includes/students/checkExistStudent.php', {
            name: name_format($('input[name="name"]').val()),
            firstname: name_format($('input[name="firstname"]').val()),
            language: "<?= $_SESSION['language']; ?>"
        }, function(html1) {
            var exist = html1;

            if (exist == "false") {
                addStudent();
            } else {
                var name = getTextBetween(exist, '#name=', '#firstname=');
                var firstname = getTextBetween(exist, '#firstname=', '#profession=');
                var profession = getTextBetween(exist, '#profession=', exist.length);

                $("#dialog-confirm .prepend").html(firstname + " " + name + " (" + profession + ")");

                $("#dialog-confirm").dialog({
                    resizable: false,
                    height: 180,
                    modal: false,
                    buttons: {
                        "<?= i("Oui"); ?>": function() {
                            $(this).dialog("close");
                            addStudent();
                        },
                        "<?= i("Non"); ?>": function() {
                            $(this).dialog("close");
                            $('input[name="name"]').focus();
                        }
                    }
                });
            }
        });
    }

    run = 1;

    return false;
}

function addStudent() {
    $(".btSubmit").fadeOut("fast");
    $.post('includes/students/update_recorder.php', {
        name: name_format($('input[name="name"]').val()),
        firstname: name_format($('input[name="firstname"]').val()),
        mail: $('input[name="mail"]').val(),
        yearEntree: $('select[name="yearEntree"]').val(),
        yearSortie: $('select[name="yearSortie"]').val(),
        profession: $('select[name="profession"]').val(),
        language: "<?= $_SESSION['language']; ?>"
    }, function(html) {
        if (html.substring(0, 5) != "Error") {
            <?php if (isset($_POST['live'])) { ?>
            var nameEnreg = name_format($('input[name="name"]').val()) + " " +
                name_format($('input[name="firstname"]').val());

            $(".cadre.addStu").remove(); // Suppression du cadre d'ajout		
            $("#students").val(nameEnreg);
            $(".cadre").css("display", "block"); // Réaffichage du cadre d'historique
            $("#students").trigger("keyup", [40]); // Faire reagir et afficher les résultats

            $(".student_bt.selected").removeClass("selected");
            $("#ID_STUDENTS").val($("#ID_STUDENTS").val() + "-" + html + "-,");
            slctStudent(".stu_slct_area", nameEnreg, html);
            next = 0;

            $("#students").val("");
            $("#students").trigger("keyup", [40]); // Faire reagir et afficher les résultats

            $("#students").focus();
            $(".infoReload").fadeIn("fast");

            return false;

            $('.cadre.addStu').remove();
            <?php } else { ?>
            window.location = '?p=students~edit&first&id=' + html; // IMPORTANT ! Redirection sur l'edition
            <?php } ?>
        } else {
            notify(html);
        }
    });

    return false;
}

<?php $mail = explode('|', get_parm('email_student')); ?>

// Créer l'adresse mail automatiquement a partir du nom et prenom
function mailGenerate() {
    var email = "";

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

<?php if (str_replace('[prenom]=', '', $mail[0]) != "*") { ?><?php } ?>