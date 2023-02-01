<?php global $bdd; ?>
<div class="block large">
    <div class="titlebar">
        <h3><?= i("Bannières des posters"); ?></h3>
    </div>
    <div class="block_cont">
        <?php
		$getProfessions = $bdd->query("SELECT * FROM tbl_professions");
		while ($prof = $getProfessions->fetch()) {
		?>
        <div class="bannieres" prof="<?= $prof['abbr'] ?>" idprof="<?= $prof['PKNoProfession'] ?>">
            <div class="profession"><?= $prof['name_' . $_SESSION['language']] ?>
                <embed src="../media/pdf/img/<?= get_parm('banniere_' . $prof['abbr']) ?>" type="image/svg+xml"
                    width="900px" />
                <div style="float:right; margin-top: 25px;" class="actionbar">
                    <a href="#" class="action edit" prof="<?= $prof['abbr'] ?>"><span><?= i("Changer") ?></span></a>
                </div>
            </div>

            <?php
		}
			?>
        </div>
    </div>

    <style>
    .profession {
        font-size: 15pt;
        font-weight: bold;
        margin-bottom: 3px;
    }

    .bannieres {
        margin-bottom: 5px;
        position: relative;
    }
    </style>

    <script>
    $(function() {
        $('a.edit').click(function() {
            openWindow(
                'includes/pdfGenerator/chBannieres.php',
                'prof=' + $(this).attr("prof"),
                600,
                '<?= i("Sélectionner une image") ?>'
            );
        });
    });
    </script>