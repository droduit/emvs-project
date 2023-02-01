<?php
require_once('../../../admin/conf/mysql.php');
require_once('../../conf/common.php');

$email = addslashes($_POST['vars']);

$nom_prenom = str_replace(strstr($email, '@'), '', $email);
$terminaison = str_replace($nom_prenom, '', $email);

$mail_form = explode('|', get_parm('email_student'));

if ($terminaison == "@" . $mail_form[3]) {
	$nom = strstr($nom_prenom, '.');
	$prenom = str_replace($nom, '', $nom_prenom);
	$nom = str_replace('.', '', $nom);

	// L'adresse mail se trouve-t-elle dans la table des élèves ?
	$query = $bdd->query(
		"SELECT * FROM tbl_students
		WHERE email='" . $email . "' || (name='" . $nom . "' && firstname='" . $prenom . "')"
	);

	if ($query->rowCount() > 0) { // Oui
		// Génération d'un mot de passe corriace
		// -----------------------------------------------------------
		$lettres = array(
			chr(mt_rand(48, 57)),
			chr(mt_rand(64, 90)),
			chr(mt_rand(97, 122)),
			chr(mt_rand(35, 38)),
			chr(mt_rand(64, 90)),
			chr(mt_rand(48, 57)),
			chr(mt_rand(48, 57)),
			chr(mt_rand(97, 122)),
			chr(mt_rand(48, 57)),
			chr(mt_rand(64, 90)),
			chr(mt_rand(97, 122))
		);
		$pass = "";
		foreach ($lettres as $p) {
			$pass .= $p;
		}
		// -----------------------------------------------------------

		$existdeja = $bdd->query("SELECT * FROM students_login WHERE email='" . $email . "'");
		$stu = $existdeja->fetch();

		// Si le mot de passe n'a pas déjà été demandé
		if ($existdeja->rowCount() < 1) {
			// Enregistrement d'une entrée dans la table student_login
			// -----------------------------------------------------------
			$bdd->exec("INSERT INTO students_login VALUES(NULL, '" . $email . "', NULL, NULL, '" . $pass . "', 0)");
			// -----------------------------------------------------------
		} else {
			if ($stu['actif'] == "0") {
				$pass = $stu['temp'];
			} else {
				$bdd->exec("UPDATE students_login SET temp='" . $pass . "' WHERE email='" . $email . "' ");
			}
		}


		// Envoi d'un mail
		// -----------------------------------------------------------
		$subject = 'Acces EMVs-Projects';

		$lien = "http://" . $_SERVER['HTTP_HOST'] . "/students";

		if (empty($stu['pass'])) {
			$message =
				'<h2>EMVs-Projects</h2>' .

				"<b>Votre mot de passe :</b><span>" . $pass . "</span><br><br>" .

				"Vous pourrez changer votre mot de passe une fois connect&eacute;.<br>" .

				"<i>Pour vous connecter : </i> <a href=\"" . $lien . "\">" . $lien . "</a>";
		} else {
			$message =
				'<h2>EMVs-Projects</h2>' .

				'<i>Nous avons re&ccedil;u une demande de renouvellement de mot de passe pour votre compte.<br />' .
				'Si vous n\'&ecirc;tes pas l\'auteur de cette requ&ecirc;te, ignorez simplement cet e-mail.<br /><br />' .
				'</i>' .

				'<b>Nouveau mot de passe : </b><span>' . $pass . '</span><br><br>' .

				'Votre ancien mot de passe restera actif jusqu\'&agrave; votre prochaine connexion.<br />' .
				'Vous pourrez changer votre mot de passe une fois connect&eacute;.<br><br>' .

				'<i>Pour vous connecter : </i><a href="' . $lien . '">' . $lien . '</a>';
		}

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$headers .= 'From: EMVs-Projects <info@emvs.ch>' . "\r\n";

		mail($email, $subject, $message, $headers);
		// -----------------------------------------------------------

		echo $pass . " - Un email contenant le mot de passe a été envoyé à l'adresse \"" . $email . "\".<br><br><p>Si vous ne le recevez pas dans la minute, vérifier votre courrier indésirable ou réessayez</p>";
	} else {
		echo "0";
	}
} else {
	echo "0";
}