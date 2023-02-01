<?php global $bdd;
$get_student_login = $bdd->query("SELECT * FROM students_login WHERE PKNoMembre='" . getID($_SESSION['login']) . "'");
$stu_login = $get_student_login->fetch();

$get_student = $bdd->query("SELECT * FROM tbl_students LEFT JOIN tbl_professions ON FKNoProfession=PKNoProfession WHERE email='" . $stu_login['email'] . "'");
$stu = $get_student->fetch();
?>
<div class="block small">
    <div class="block_cont" style="border-radius: 5px; background-image:none; border:none;">
        <div style="width:290px; height:200px;
        <?php if ($stu['FKNoMediaImage'] != NULL) { ?>background:url(../media/photo/<?= getImg($stu['FKNoMediaImage'], 400); ?>) no-repeat 50% 50%;<?php } else { ?>background: #ddd;<?php } ?>
        background-size: cover">
            <?php if (($stu['FKNoMediaImage'] ?? null) == null) { ?> <div
                style="text-align:center; font-weight: bold; text-shadow: 0px 1px 0px white; font-size: 12pt; color: #555; padding-top: 80px;">
                <?= i("Aucune image"); ?></div> <?php } ?>
        </div>
    </div>
</div>

<div class="block small">
    <div class="titlebar">
        <h3><?= i("Mes informations"); ?></h3>
    </div>
    <div class="block_cont" style="height: 160px">
        <?php
		echo "<p><b>Nom : </b>" . ($stu['firstname'] ?? "") . " " . ($stu['name'] ?? "") . "</p>";
		echo "<p><b>E-mail : </b>" . ($stu['email'] ?? "") . "</p>";
		echo "<p><b>Période de formation : </b>" . ($stu['YearEntree'] ?? "") . "-" . ($stu['YearSortie'] ?? "") . "</p>";
		echo "<p><b>Profession : </b>" . ($stu['name_fr'] ?? "") . "</p>";
		?>
    </div>
</div>

<div class="block small">
    <div class="titlebar">
        <h3><?= i("Authentification"); ?></h3>
    </div>
    <div class="block_cont">


        <form method="POST" action="" class="form" novalidate="novalidate" onsubmit="return submitAll();">
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

            <input style="margin-right:1px" class="float_right submit" value="<?= i("Enregistrer"); ?>" type="submit">

            <div class="clear"></div>
        </form>

    </div>
</div>

<script>
function submitAll() {
    if ($("#pass").val().length > 4) {
        if ($("#pass").val() == $("#pass2").val()) {
            return true;
        } else {
            notify("Le mot de passe et la confirmation ne correspondent pas !");
        }
    } else {
        notify("Le mot de passe doit être plus long que 4 caractères!");
    }
    return false;
}
</script>

<?php
if (isset($_POST['pass'])) {
	$pass = addslashes($_POST['pass']);

	$key = sha1('--.' . $pass . '.--');
	$pass = sha1(md5(getID($_SESSION['login']) . '--..--' . $stu['email'] . $key));

	$bdd->exec("UPDATE students_login SET pass='" . $pass . "', key_crypte='" . $key . "' WHERE PKNoMembre=" . getID($_SESSION['login']));
?>
<script>
$(function() {
    notify("Le mot de passe a été changé avec succès !");
});
</script>
<?php
}
?>