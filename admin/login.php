<?php
if (isset($_POST['i1']) and isset($_POST['i2'])) {
	require_once("conf/common.php");

	$pass = securise($_POST['i2']);
	$email = securise($_POST['i1']);

	$MaxId = $bdd->query("SELECT PKNoMembre FROM admin_login WHERE email='" . $email . "'");
	$MaxId = $MaxId->fetch();
	$maxID = $MaxId['PKNoMembre'];

	$data = $bdd->query("SELECT * FROM admin_login WHERE email='" . $email . "' AND pass='" . sha1(md5($maxID . '--..--' . $email . sha1('--.' . $pass . '.--'))) . "' ");
	if ($data->rowCount() > 0) {
		$data = $data->fetch();
		echo "#1=true#2=?sess_id=" . sha1(md5($data['PKNoMembre'] . "--..--" . $data['email'] . $data['key_crypte'])) . "#3=";
	} else {
		echo "#1=false#2=" . i("Le mot de passe et l'email ne correspondent pas") . ".#3=";
	}
} else {


	function detectMobile() {
		// True : c'est un téléphone portable qui accede au site
		// False : c'est un PC qui accede au site.

		if (isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE']))
			return true;

		if (isset($_SERVER['HTTP_ACCEPT'])) {
			$accept = strtolower($_SERVER['HTTP_ACCEPT']);
			if (strpos($accept, 'wap') !== false)
				return true;
		}

		if (isset($_SERVER['HTTP_USER_AGENT'])) {
			if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false) {
				return true;
			}

			if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false) {
				return true;
			}

			if (preg_match('#Android|BlackBerry|Cellphone|iPhone|iPod|hiptop|HTC|MIDP-2\.|MMEF20|MOT-V|NetFront|Newt|NintendoWii|NintendoDS|Nitro|Nokia|OperaMobi|Palm|PlayStationPortable|PSP|portalmmm|SonyEricsson|Symbian|UP.Browser|UP.Link|webOS|WindowsCE|WinWAP|YahooSeeker/M1A1-R2D2|LGE VX|Maemo|phone#', $_SERVER['HTTP_USER_AGENT'])) {
				return true;
			}
		}

		return false;
	}


?>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script>
$(document).ready(function() {
    $("#loginbox").hide().fadeIn(1e3);
    $("#loginform form, .form").validate();

    var placeholder = "";
    $('input[name="input"], input[name="password"]').focus(function() {
        placeholder = $(this).attr("placeholder");
        $(this).attr("placeholder", "").removeAttr("placeholder");
    }).blur(function() {
        if ($(this).val() == "") {
            $(this).attr("placeholder", placeholder);
        }
    });

    if (get_cookie('login') != "") {
        $('input[name="input"]').val(get_cookie('login'));

        if (get_cookie('password') != "") {
            $('input[name="password"]').val(get_cookie('password'));
        }
        $('input[name="password"]').focus();
    } else {
        $('input[name="input"]').focus()
    }

    if (get_cookie('save') != "") {
        if (get_cookie('save') == 0) {
            $("#saveInfos").removeAttr("checked");
        }
    }

});

function submitForm() {
    var mail = $('input[name="input"]').val();
    var pass = $('input[name="password"]').val();

    $.post('login.php', {
            i1: mail,
            i2: pass
        },
        function(respons) {
            var _1 = getTextBetween(respons, '#1=', '#2=');
            var _2 = getTextBetween(respons, '#2=', '#3=');

            if (_1 == "true") {
                $(".theater").fadeOut(399);

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
            }

            return false;
        });


    return false;
}
</script>

<?php if (detectMobile()) { ?>
<br />
<form novalidate="novalidate" name="login" action="#" onSubmit="return submitForm();" method="post">
    <input name="input" placeholder="E-Mail" class="required" type="text">
    <input name="password" placeholder="Mot de passe" class="required" value="" type="password">

    <input type="checkbox" checked="checked" id="saveInfos" style="display:none" />
    <div align="center"> <input id="loginbutton" value="<?= i("Connexion"); ?>" style="width:83%" type="submit"></div>
</form>
<div class="message"
    style="width:300px; margin: 20px auto; font-weight:bold; text-shadow: 1px 1px 0px black; text-align:center;"
    align="center"></div>
<style>
.container_12 {
    width: 100%;
}

input[type="text"],
input[type="password"] {
    background: white;
    padding: 9px 5px;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-shadow: 0px 0px 2px 1px #3CF;
    width: 80%;
    margin: 15px auto;
    display: block;
}
</style>
<?php } else { ?>
<div style="display: block;" id="loginbox">
    <a href="#" id="logo">Admin EMVs-Projects</a>
    <div id="loginform">
        <form novalidate="novalidate" name="login" action="#" onSubmit="return submitForm();" method="post">
            <div id="username_field"><input name="input" placeholder="E-Mail" class="required" type="text"></div>
            <div id="password_field"><input name="password" placeholder="Mot de passe" class="required" value=""
                    type="password"></div>
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

    <div class="message"
        style="position:absolute; width:300px; margin-left: -7px; margin-top:10px; font-weight:bold; text-shadow: 1px 1px 0px black; text-align:center">
    </div>
</div>
<?php
	} ?>

<?php

} ?>