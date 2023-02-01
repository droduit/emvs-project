<?php
global $bdd;



if (isset($_POST['image'])) {
	require_once('../../conf/common.php');

	// Ajout de l'image au projet
	$bdd->exec("UPDATE tbl_projects_history SET FKNoMediaImage=" . $_POST['image'] . " WHERE PKNoProjectHistory=" . $_POST['id']);
} else {

	if (is_numeric($_GET['id'])) {

		$proj = $bdd->query("SELECT * FROM tbl_projects WHERE PKNoProject=" . $_GET['id']);
		$projet = $proj->fetch();

		$_GET['id'] = intval($_GET['id']);
?>
<style>
.tipBot {
    height: 105px;
}

.tipBot.edit {
    height: 211px;
}
</style>

<form method="POST" action="" class="form" novalidate="novalidate" onsubmit="return submitAll();">

    <div>

        <div class="block small">
            <div class="titlebar">
                <h3><?= i("Titre"); ?></h3>
            </div>
            <div class="block_cont">
                <div class="form_row">
                    <label><?= i("Francais"); ?></label>
                    <input lang="fr" maxlength="45" type="text" placeholder="<?= i("Titre du projet"); ?>" id="req"
                        name="title_fr" style="width: 275px;" class="input validate[required] tipRight" value="<?php if (isset($_GET['id'])) {
																																																						echo stripslashes(stripslashes($projet['title_fr']));
																																																					} ?>">
                </div>

                <div class="form_row">
                    <label><?= i("Allemand"); ?></label>
                    <input lang="de" maxlength="45" type="text" placeholder="<?= i("Titre du projet"); ?>" id="req"
                        name="title_de" style="width: 275px;" class="input validate[required] tipRight" value="<?php if (isset($_GET['id'])) {
																																																						echo stripslashes(stripslashes($projet['title_de']));
																																																					} ?>">
                </div>

                <div align="right" class="submitArea" style="display:none">
                    <div class="form_row"><input type="submit" value="<?= i("Enregistrer"); ?>"
                            class="submit submitProj"></div>
                </div>

            </div>
        </div>

        <!-- 
<div class="block small">
	<div class="titlebar">
		<h3><?= i("Image"); ?></h3>
        <a href="#" class="toggle expand expandImages tipsyn" title="<?= i("Etendre l'affichage"); ?>">&nbsp;</a>
	</div>
	<div class="block_cont">
        
       
        <div id="imageArea" <?php if (getImg($img['FKNoMediaImage']) != "false") { ?>style="display:none"<?php } ?>><?php ImagesFromDirectory(getImgDirectory("Projets"), $img['FKNoMediaImage']); ?></div>
        <?php if (getImg($img['FKNoMediaImage']) != "false") { ?>
            <div align="center" id="imgView">
            <div class="gallery_item" style="float:none; margin:2px">
            	<div style="background: url(<?= getImg($img['FKNoMediaImage']); ?>) no-repeat 50% 50%; background-size: cover; height:150px; width: 200px"></div>
                <div class="actionbar" style="bottom:5px; top:auto; left:6px;">
                    <a class="action edit" style="cursor:pointer"><span><?= i("Changer"); ?></span></a>
                    <a class="action delete" style="cursor:pointer"><span><?= i("Détacher"); ?></span></a>
                </div>
            </div>
            </div>
        <?php
		} ?>
      
        
        <div class="form_row" style="margin-top: 10px;  background: #efefef; padding: 3px 7px 10px; border-radius: 5px">
			<label for="alt"><?= i("Description de l'image") . " (alt)"; ?></label>
			<input maxlength="50"  type="text" placeholder="<?= i("Attribut") . " alt"; ?>" title="<?= i("Pour enregistrer") . " : [ENTER]"; ?>" id="alt" name="alt" style="width: 260px; background:white" class="input validate[required] tipRight tipsyw" value="<?php if (isset($_GET['id'])) {
																																																																	echo $projet['alt'];
																																																																} ?>">
		</div>
        
        		
	</div>
</div>
-->

        <div class="block medium">
            <div class="titlebar">
                <h3><?= i("Historique du projet"); ?></h3>
                <a href="#" class="toggle show addHistory tipsyn" title="<?= i("Nouvelle entrée"); ?>">&nbsp;</a>
            </div>
            <div class="block_cont" style="min-height:123px">
                <script type="text/javascript" src="plugins/tiny_mce/jscripts/jquery.tinymce.js"></script>
                <div id="history"><?php include_once("includes/projects/history.inc.php"); ?></div>

            </div>
        </div>



        <div style="clear:both"></div>
    </div>


    <!--
<div class="block small">
	<div class="titlebar">
		<h3><?= i("Documents"); ?></h3>
	</div>
	<div class="block_cont">

			
		<div id="docArea">
		<?php ImagesFromDirectory($_GET['id'], "", "", "doc", 1, 0); ?>
		</div>
        
	</div>
</div>
-->

    <input type="hidden" id="editing" value="0" />
</form>

<?php
	} else {
		include_exists("blank", "Ce projet n'existe pas");
	}
	?>

<div id="dialog-confirm-del" title="<?= i("Confirmer la suppression"); ?>" style="display:none">
    <p>
        <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
    <p><b><?= i("Cette entrée va être éffacée"); ?>.</b></p>
    <br><?= i("Voulez-vous poursuivre ?"); ?>
    </p>
</div>



<script>
$(function() {

    // Suppression des guillemets pour éviter des problèmes d'affichages
    $('input[name="title_fr"],input[name="title_de"]').keyup(function(e) {
        $(this).val(replaceAll($(this).val(), '"', ''));
        $(".submitArea").fadeIn("fast");
    });

    // Activation des bulle-info
    $('.tipsyw').tipsy({
        gravity: 'w',
        trigger: 'focus',
        opacity: 1
    });
    $('.tipsyn').tipsy({
        gravity: 'n',
        opacity: 1
    });
    $('tr[historyid]').tipsy({
        gravity: "e",
        fade: true,
        html: true,
        live: true,
        opacity: 1
    });
    <?php if ($get_history->rowCount() < 1 && !isset($_GET['first'])) { ?>$('.addHistory.tipsyn').tipsy("show");
    <?php } ?>

    // On enregistre chaque modification pour savoir si on peut recharger la page ou pas
    $('input[name="title_fr"], input[name="title_de"]').change(function() {
        $("#editing").val("1");
        $(".submitArea").fadeIn("fast");
    });

    // Sélection des images
    /*
    $(".coveredImg").live("click", function(){
    	var element=$(this);
    	$.post('includes/projects/edit.php', { image:element.attr("PK"), id:"<?= $_GET['id']; ?>", alt:$("#alt").val() },
    	function(html){
    		$(".coveredImg").removeClass("selected");
    		element.addClass("selected");
    		notify(html);
    		if ($("#editing").val()==0) { window.location='?p=projects~edit&firstOk&id=<?= $_GET['id']; ?>'; } else { notify(html); }
    	});
    }); 
    
    // Actions sur l'image déjà liés, soit on change l'image soit on la détache 
    $(".gallery_item .action.edit").click(function(){
    	$("#imgView").effect("drop");
    	$(".tipsy").hide("fast");
    	$(".textarea").addClass("edit");
    	setTimeout(function(){ $("#imageArea").effect("slide"); }, 412);
    });
    
    $(".gallery_item .action.delete").click(function(){
    	$.post('includes/projects/edit.php', { image:"NULL", id:"<?= $_GET['id']; ?>" },
    		function(html) { $(".gallery_item .action.edit").trigger("click"); $(".coveredImg").removeClass("selected"); notify("<?= i("L'image a été détachée avec succès"); ?>.");
    	});
    });
    */
    // ----------------------------------------------------------------------

    // Modification d'une entrée de l'historique
    $(".history .action.edit").live('click', function() {
        $.post('includes/projects/edit_history.php', {
                idHist: $(this).attr("history"),
                idProj: "<?= $_GET['id']; ?>",
                language: "<?= language; ?>"
            },
            function(html) {
                theaterOpen($('input[name="title_<?= $_SESSION['language']; ?>"]').val(), html,
                    false);
            });
        return false;
    });

    $('table.history tr[historyid]').live('dblclick', function() {
        $(this).find(".action.edit").trigger("click");
    });

    // Ajout d'une entrée dans l'historique
    $(".addHistory").click(function() {
        $.post('includes/projects/edit_history.php', {
                idProj: "<?= $_GET['id']; ?>",
                language: "<?= language; ?>"
            },
            function(html) {
                theaterOpen($('input[name="title_<?= $_SESSION['language']; ?>"]').val(), html,
                    false);
            });
    });
    <?php if (isset($_GET['first'])) { ?>$(".addHistory").trigger("click");
    <?php } ?>

    // Confirmation de la suppression d'une entrée dans l'historique
    $(".history .action.delete").live('click', function() {
        var idHist = $(this).parent().parent().parent().attr("historyid");
        $('table.projects tr[historyid]').css("background", "");
        $('table.projects tr[historyid="' + idHist + '"]').css("background", "#FDBD84");

        $("#dialog-confirm-del").dialog({
            resizable: false,
            height: 150,
            modal: false,
            buttons: {
                "<?= i("Supprimer"); ?>": function() {
                    $(this).dialog("close");
                    $.post('includes/projects/delHistory.php', {
                        id: idHist,
                        type: "del"
                    }, function(respons) {
                        if (respons == "true") {
                            $('table.projects tr[historyid="' + idHist + '"]')
                                .effect("explode", "fast");
                            setTimeout(function() {
                                $('input[name="year"][checked]').trigger(
                                    "click");
                            }, 250);
                            loadInto("history", "includes/projects/history.inc.php",
                                "id=<?= $_GET['id']; ?>&language=<?= $_SESSION['language']; ?>"
                                );
                        } else {
                            alert(
                                "<?= i("Erreur lors de l'execution de la requete"); ?>");
                        }
                    });
                },
                "<?= i("Annuler"); ?>": function() {
                    $(this).dialog("close");
                    $('table.projects tr[historyid="' + idHist + '"]').css("background",
                    "");
                }
            },
            close: function(event, ui) {
                $('table.projects tr[historyid="' + idHist + '"]').css("background", "");
            }
        });
    });

});


//Enregistrement des modifications
function submitAll() {
    $(".submitProj").fadeOut("fast");
    $.post('includes/projects/update_recorder.php', {
        title_fr: $('input[name="title_fr"]').val(),
        title_de: $('input[name="title_de"]').val(),
        id: "<?= $_GET['id']; ?>",
        language: "<?= language; ?>"
    }, function(html) {
        if (html == "true") {
            window.location = '?p=project_list&maj=<?= $_GET['id']; ?>';
        } else {
            notify(html);
            $(".submitProj").fadeIn("fast");
        }
    });
    return false;
}
</script>
<?php } ?>