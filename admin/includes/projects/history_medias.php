<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];


$idProjet = intval($_POST['idProj']);

if (isset($_POST['idHist'])) {

	$idHistory = intval($_POST['idHist']);
	$get_history = $bdd->query("SELECT PKNoProjectHistory FROM tbl_projects_history WHERE PKNoProjectHistory=" . $idHistory);
	$hist = $get_history->fetch();

	$idHistory = $hist['PKNoProjectHistory'];
}

if (isset($_POST['idHist'])) {
?>
<fieldset>
    <legend align="top"><?= i("Image"); ?></legend>

    <?php
		// Sélection de l'image liée a l'historique en cours
		$get_images = $bdd->query("SELECT FKNoMediaImage FROM tbl_projects_history WHERE PKNoProjectHistory=" . $hist['PKNoProjectHistory']);
		$img = $get_images->fetch();
		?>
    <p style="margin:7px 0px">
    <div id="imageArea" <?php if (getImg($img['FKNoMediaImage']) != "false") { ?>style="display:none" <?php } ?>>
        <?php ImagesFromDirectory(getImgDirectory("Projets"), $img['FKNoMediaImage']); ?></div>

    <div align="center" id="imgView" <?php if (getImg($img['FKNoMediaImage']) == "false") { ?>style="display:none"
        <?php } ?>>
        <div class="gallery_item" style="float:none; margin:2px">
            <div style="background: url(<?= getImg($img['FKNoMediaImage']); ?>) no-repeat 50% 50%; background-size: cover; height:150px; width: 200px"
                class="cover"></div>
            <div class="actionbar" style="bottom:5px; top:auto; left:6px;">
                <a class="action edit" style="cursor:pointer"><span><?= i("Changer"); ?></span></a>
                <a class="action delete" style="cursor:pointer"><span><?= i("Détacher"); ?></span></a>
            </div>
        </div>
    </div>

    </p>
</fieldset>

<fieldset>
    <legend align="top"><?= i("Documents"); ?></legend>

    <p style="margin:7px 0px">
    <div id="docArea">
        <?php ImagesFromDirectory($hist['PKNoProjectHistory'], "", "", "doc", 1, 0); ?>
    </div>
    </p>

</fieldset>

<?php } else { ?>

<p><?= i("Recharger la page"); ?></p>

<?php } ?>

<div class="submitArea">
    <input type="button" id="previous" value="<?= i("Précédent"); ?>" tabindex="8" />
    <input type="button" id="CloseTheater" value="<?= i("Terminer"); ?>" tabindex="6" />
</div>

<style>
.images {
    width: 97.8%;
}
</style>

<script>
$(function() {
    $("#changement").val("0");
    $("#previous").click(function() {
        $('.cadre_submenu .item.desc').trigger("click");
    });
    // Sélection des images
    $(".coveredImg").live('click', function() {
        var element = $(this);
        $.post('includes/projects/edit.php', {
                image: element.attr("PK"),
                id: "<?= $hist['PKNoProjectHistory']; ?>"
            },
            function(html) {
                $(".coveredImg").removeClass("selected");
                element.addClass("selected");
                $('.gallery_item .cover').css("background-image", "url(../media/photo/400/" +
                    element.attr("url") + ")");

                $("#imageArea").fadeOut("fast");
                setTimeout(function() {
                    $("#imgView").fadeIn("fast");
                }, 122);
            });

        return false;
    });

    // Actions sur l'image déjà liés, soit on change l'image soit on la détache 
    $(".gallery_item .action.edit").live('click', function() {
        $("#imgView").fadeOut("fast");
        $(".tipsy").hide("fast");
        setTimeout(function() {
            $("#imageArea").fadeIn("fast");
        }, 122);
    });

    $(".gallery_item .action.delete").click(function() {
        $.post('includes/projects/edit.php', {
                image: "NULL",
                id: "<?= $hist['PKNoProjectHistory']; ?>"
            },
            function(html) {
                $(".gallery_item .action.edit").trigger("click");
                $(".coveredImg").removeClass("selected");
                notify("<?= i("L'image a été détachée avec succès"); ?>.");
            });
    });

    $("#CloseTheater").click(function() {
        $(".coveredImg").die('click');
        $('.gallery_item .action.edit').die();
        <?php if ($_POST['type'] == "new") { ?>window.location =
            '?p=projects~edit&id=<?= $_POST['idProj']; ?>';
        <?php } else { ?>$("#theater").trigger("click");
        <?php } ?>
    });
});
</script>