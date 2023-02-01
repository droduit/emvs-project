<?php
if (isset($_POST['i1']) && isset($_POST['i2'])) {
	require_once('../admin/conf/mysql.php');
	require_once("conf/common.php");

	$pass = addslashes($_POST['i2']);
	$email = addslashes($_POST['i1']);

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$get_stu_login = $bdd->query("SELECT * FROM students_login WHERE email='" . $email . "'");
		$stu = $get_stu_login->fetch();

		if ($stu && empty($stu['pass'])) { // L'utilisateur n'a pas encore changé de mot de passe il se connecte pour la première fois avec le mot de passe temporaire qui a été généré.

			if ($pass == $stu['temp']) {

				// On lui créer cette fois ci le mot de passe crypté, la clé et on active son compte
				$key = sha1('--.' . $pass . '.--');
				$pass = sha1(md5($stu['PKNoMembre'] . '--..--' . $email . $key));

				$bdd->exec("UPDATE students_login SET pass='" . $pass . "', key_crypte='" . $key . "', temp=NULL, actif=1 WHERE PKNoMembre=" . $stu['PKNoMembre']);

				echo "#1=true#2=?sess_id=" . sha1(md5($stu['PKNoMembre'] . "--..--" . $email . $key)) . "#3=";
			} else {
				echo "#1=false#2=Le mot de passe et l'email ne correspondent pas.#3=";
			}
		} else {
			$maxID = $stu['PKNoMembre'];

			// Si on avait perdu le mot de passe et qu'on essaye le nouveau pass recu par mail
			if (!empty($stu['temp']) && $stu['temp'] == $pass) {
				// On met a jour la clé et le mot de passe puis on vide le pass temporaire
				$key = sha1('--.' . $pass . '.--');
				$pass1 = sha1(md5($stu['PKNoMembre'] . '--..--' . $email . $key));

				$bdd->exec("UPDATE students_login SET pass='" . $pass1 . "', key_crypte='" . $key . "', temp=NULL, actif=1 WHERE PKNoMembre=" . $stu['PKNoMembre']);

				$data = $bdd->query("SELECT * FROM students_login WHERE (email='" . $email . "' AND pass='" . sha1(md5($maxID . '--..--' . $email . sha1('--.' . $pass . '.--'))) . "') || temp='" . $pass . "' ");
			} else {
				$data = $bdd->query("SELECT * FROM students_login WHERE email='" . $email . "' AND pass='" . sha1(md5($maxID . '--..--' . $email . sha1('--.' . $pass . '.--'))) . "' ");
			}



			if ($data->rowCount() > 0) {
				$data = $data->fetch();
				echo "#1=true#2=?sess_id=" . sha1(md5($data['PKNoMembre'] . "--..--" . $data['email'] . $data['key_crypte'])) . "#3=";
			} else {
				echo "#1=false#2=" . "Le mot de passe et l'email ne correspondent pas.<br><div class=\"forgotpass\">Obtenir un nouveau mot de passe</div>#3=";
			}
		}
	} else {
		echo "#1=false#2=L'adresse e-mail est incorrecte.#3=";
	}
} else {


	$mail = explode('|', get_parm('email_student'));
?>
<style>
.forgotpass {
    margin-top: -17px;
    color: #000;
    text-shadow: none;
    font-size: 11px;
    position: absolute;
    right: 20px;
    padding: 5px 15px;
    border: 1px solid #bbb;
    border-radius: 6px;
    background: rgba(255, 255, 255, 0.3);
    opacity: 0.7;
    cursor: pointer;
    transition: all 0.2s linear;
    -moz-transition: all 0.2s linear;
}

.forgotpass:hover {
    opacity: 1;
    background: rgba(255, 255, 255, 0.4);
    border: 1px solid #ddd;
}
</style>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script>
$(document).ready(function() {
    $("#loginform form, .form").validate();

    var placeholder = "";
    $('input[type="text"],input[type="password"]').focus(function() {
        placeholder = $(this).attr("placeholder");
        $(this).attr("placeholder", "").removeAttr("placeholder");
    }).blur(function() {
        if ($(this).val() == "") {
            $(this).attr("placeholder", placeholder);
        }
    });

    if (get_cookie('login') != "") {
        $('input[name="mail"]').val(get_cookie('login'));

        if (get_cookie('password') != "") {
            $('input[name="password"]').val(get_cookie('password'));
        }
        $('input[name="password"]').focus();
    } else {
        $('input[name="input"]').focus();
    }

    if (get_cookie('save') != "") {
        if (get_cookie('save') == 0) {
            $("#saveInfos").removeAttr("checked");
        }
    }

    $("._0 .insc, ._0 .conn").click(function() {

        if ($(this).hasClass("conn")) {
            $("._2").show("fade");
            if ($("._1").css("display") == "block") {
                $("._1").hide(0);
            }
        } else {
            $("._1").show("fade");
            if ($("._2").css("display") == "block") {
                $("._2").hide(0);
            }
        }
    });

    $(".forgotpass").live("click", function() {
        if ($('input[name="mail"]').val() != "") {
            $(".insc.mail").val($('input[name="mail"]').val());
            getPassword();
        } else {
            $("._0 .insc").trigger("click");
            $(".message").slideUp("medium", '', function() {
                $(".message").html("");
            });
        }
    });

    setTimeout(function() {
        $("#loginbox").animate({
            marginTop: "-146px"
        }, 410, '', function() {
            $("._2").show("fade");
        });
    }, 300);

});

function submitForm() {
    var mail = $('input[name="mail"]').val();
    var pass = $('input[name="password"]').val();

    if (mail != "" && pass != "") {
        $.post('login.php', {
                i1: mail,
                i2: pass
            },
            function(respons) {
                var _1 = getTextBetween(respons, '#1=', '#2=');
                var _2 = getTextBetween(respons, '#2=', '#3=');

                if (_1 == "true") {
                    // Gestion des cookies
                    if (mail != "") {
                        set_cookie('login', mail, 365);
                    }
                    if ($('#saveInfos').is(":checked") == true) {
                        if (pass != "") {
                            set_cookie('password', pass, 365);
                        }
                        set_cookie('save', 1, 365);
                    } else {
                        unset_cookie('password');
                        set_cookie('save', 0, 365);
                    }

                    setTimeout(function() {
                        window.location = _2;
                    }, 399);
                } else {
                    $("#loginbox").effect("shake", 50);
                    $(".message").html(_2);
                    $(".message").show("fade");
                }

                return false;
            });
    }

    return false;
}

function getPassword() {
    adresse = $(".insc.mail").val();

    if (adresse != "") {
        if (isEmail(adresse)) {
            if (adresse.substring(adresse.indexOf('@') + 1, adresse.length) == "<?= $mail[3] ?? "" ?>") {
                // Vérification que l'adresse est assignée a un élève dans la base de donnée
                $.post('includes/login/verifMailExist.php', {
                    vars: adresse
                }, function(_st97) {
                    if (_st97 == "0") {
                        $(".message").html("Cette adresse n'est pas enregistrée pour le moment.");
                    } else {
                        $(".message").html(_st97);
                        $(".conn.mail").val(adresse);
                        $(".insc.mail").val("");
                        $("._1").hide(0);
                        $("._2").show("blind");
                        setTimeout(function() {
                            $(".conn.pass").focus();
                        }, 400);
                    }
                });
            } else {
                $(".message").html("Cette adresse n'est pas reconnue à l'EMVs");
            }
        } else {
            $(".message").html("N'importe quoi !");
        }
        $(".message").show("fade");
        $(".insc.mail").focus();
    } else {
        $(".message").hide("fade");
    }
    return false;
}

function isEmail(myVar) {
    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$', 'i');
    return regEmail.test(myVar);
}
</script>

<div style="display: block;" id="loginbox">
    <a href="#" id="logo" style="margin: 0 auto">Admin EMVs-Projects</a>

    <div id="loginform" class="_0">
        <div id="buttonline" style="margin:auto;width:212px">
            <input id="loginbutton" class="float_left width_4 insc" value="<?= i("Inscription"); ?>" type="button"
                style="margin-right: 10px" />
            <input id="loginbutton" class="float_left width_4 conn" value="<?= i("Connexion"); ?>" type="button" />
        </div>
    </div>

    <div id="loginform" class="_1" style="display:none">
        <form novalidate="novalidate" name="login" action="#" onSubmit="return getPassword();" method="post">
            <p>Entrez votre adresse email emvs</p><br />
            <div id="username_field">

                <input placeholder="adresse@<?= $mail[3] ?? ""; ?>" required="required" class="required insc mail"
                    type="text">
            </div>
            <div id="buttonline">

                <input id="loginbutton" class="float_left width_4" style="width:249px"
                    value="<?= i("Obtenir un mot de passe"); ?>" type="submit">

            </div>
        </form>
    </div>

    <div id="loginform" class="_2" style="display:none">
        <form novalidate="novalidate" name="login" action="#" onSubmit="return submitForm();" method="post">
            <div id="username_field"><input name="mail" placeholder="E-Mail" required="required"
                    class="required conn mail" type="text"></div>
            <div id="password_field"><input name="password" placeholder="Mot de passe" required="required"
                    class="required conn pass" value="" type="password"></div>
            <div id="buttonline">
                <input id="loginbutton" class="float_left width_4" value="<?= i("Connexion"); ?>" type="submit">
                <span style="position: absolute; margin-top:7px; padding-left: 6px;"><input type="checkbox"
                        checked="checked" id="saveInfos" /></span>
                <span class="passforgot float_right tipsyn"
                    style="font-size:10px; cursor: default; padding:2px 1px 0"><label for="saveInfos"
                        style="display: inline;font-size: 10px; opacity: 1; text-indent: 0px;"><?= i("Enregistrer mes identifiants"); ?></label></span>
            </div>
        </form>
    </div>



</div>

<div class="message"
    style="position:absolute; width:100%; bottom:0; left:0; padding: 20px 0px; background: rgba(255,255,255,0.20); font-weight:bold; text-shadow: 1px 1px 0px black; text-align:center; display:none">
</div>

<?php

} ?>