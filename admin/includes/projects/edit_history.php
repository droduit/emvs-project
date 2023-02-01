<?php
require_once("../../conf/common.php");
$_SESSION['language'] = $_POST['language'];


$idProjet = intval($_POST['idProj']);

if (isset($_POST['idHist'])) {

	$idHistory = intval($_POST['idHist']);
	// Sélection des données pour cet entrée de l'historique
	$get_data = $bdd->query("
		SELECT * FROM tbl_projects_history
		LEFT JOIN tbl_projects_period ON FKNoPeriode=PKNoProjectPeriod
		WHERE PKNoProjectHistory=" . $idHistory);
	$data = $get_data->fetch();
}
?>

<style>
.cadre .title {
    background: #CFDFFE;
    display: none;
}

.cadre .contenu {
    position: relative;
    padding-top: 60px;
}

.cadre_submenu {
    position: absolute;
    top: 0px;
    left: 0;
    height: 36px;
    background: #BDF;
    width: 100%;
    border-bottom: 2px solid #7BF;
    border-top: 6px solid #7BF;
}

.cadre_submenu .item {
    height: 100%;
    padding: 0px 14px;
    line-height: 2.6em;
    font-size: 10pt;
    background: #A6D2FF;
    float: left;
    border-right: 1px dotted #6FB7FF;
    cursor: pointer;
    -moz-transition: all 0.15s linear;
    transition: all 0.15s linear;
}

.cadre_submenu .item:hover,
.cadre_submenu .item.selected {
    background: #71B8FF;
}

.cadre_submenu .item.unable {
    background: #efefef;
    cursor: default;
}
</style>
<script>
$(function() {

    // On change le titre
    $(".title_new").html($(".cadre .title").html());

    // Sur le clique d'un onglet du menu
    $('.cadre_submenu .item:not(.unable)').bind("click", function(e, parm) {

        if (typeof(parm) == "undefined") {
            if ($(".cadre_submenu .item.selected").hasClass("main")) { // Si on est sur "Principal"
                $.post('includes/projects/insertHistory.php', {
                        type: "<?php if (isset($_POST['idHist'])) { ?>upd<?php } else { ?>add<?php } ?>",
                        language: "<?= $_SESSION['language']; ?>",

                        idProj: "<?= $idProjet; ?>",
                        <?php if (isset($_POST['idHist'])) { ?>idHist: "<?= $idHistory; ?>",
                        <?php } ?>

                        old_teachers: $("#ID_TEACHERS_OLD").val(),
                        teachers: $("#ID_TEACHERS").val(),

                        old_students: $("#ID_STUDENTS_OLD").val(),
                        students: $("#ID_STUDENTS").val(),

                        year: $("#year").val(),
                        periode: $("#period").val(),

                        salle: $("#salle").val()
                    },
                    function(html) {});
            }

            if ($(".cadre_submenu .item.selected").hasClass("desc")) { // Si on est sur "Descriptions"
                $.post('includes/projects/insertHistory.php', {
                        type: "<?php if (isset($_POST['idHist'])) { ?>upd<?php } else { ?>add<?php } ?>",
                        language: "<?= $_SESSION['language']; ?>",

                        idProj: "<?= $idProjet; ?>",
                        <?php if (isset($_POST['idHist'])) { ?>idHist: "<?= $idHistory; ?>",
                        <?php } ?>

                        text_fr: $("#elm1").val(),
                        text_de: $("#elm2").val()
                    },
                    function(html) {});
            }
        }

        $('.cadre_submenu .item').removeClass("selected");
        $(this).addClass("selected");

        $.post('includes/projects/' + $(this).attr("url"), {
                <?php if (isset($_POST['idHist'])) { ?>idHist: "<?= $idHistory; ?>",
                <?php } ?>
                idProj: "<?= $idProjet; ?>",
                language: "<?= $_SESSION['language']; ?>"
            },
            function(html) {
                $("#content_paging").html(html);
            });

    });
    // Par défaut, on affiche le premier onglet
    $('.cadre_submenu .item.main').trigger("click", [1]);

});
</script>

<div class="cadre_submenu">
    <div class="item main selected" url="history_main.php"><?= i("Principal"); ?></div>
    <div class="item desc <?php if (!isset($_POST['idHist'])) { ?>unable<?php } ?>" url="history_desc.php">
        <?= i("Descriptions"); ?></div>
    <div class="item media <?php if (!isset($_POST['idHist'])) { ?>unable<?php } ?>" url="history_medias.php">
        <?= i("Médias"); ?></div>

    <div class="title_new" style="float: right; height: 100%; margin-right: 30px; line-height: 2.9em; font-weight:bold">
    </div>

    <div style="clear:both"></div>
</div>

<div id="content_paging" class="main"></div>

<input type="hidden" value="<?= $idProjet; ?>" id="idProj" />
<input type="hidden" value="<?= $idHistory; ?>" id="idHist" />


<script>
$(function() {

    $('.tipsye').tipsy({
        gravity: 'e',
        trigger: 'focus',
        live: true
    });
    $('.tipsys').tipsy({
        gravity: 's',
        live: true
    });

});
</script>