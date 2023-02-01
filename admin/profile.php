<?php global $bdd; ?>
<div class="block big">
    <div class="titlebar">
        <h3><?= i("Votre profil"); ?></h3>
    </div>
    <div class="block_cont">
        <?php
		$query = $bdd->query("SELECT * FROM admin_login WHERE PKNoMembre=" . getID($_SESSION['login']));
		$data = $query->fetch();

		echo "<p><b>Login : </b>" . $data['email'] . "</p>";
		if (isset($_COOKIE['password'])) {
			echo '<p><b>' . i("Mot de passe") . " : </b>" . substr($_COOKIE['password'], 0, 3) . str_repeat("*", strlen($_COOKIE['password']) - 3) . '</p>';
		}
		echo "<p><b>" . i("Hôte") . " : </b>" . get_ip() . "</p>";
		echo "<p><b>" . i("Langue") . " : </b>" . language . "</p>";
		?>
    </div>
</div>