<?php
global $bdd;

if (!isset($_POST['step2'])) {
    // Sélection des projets qui correspondent au choix effectué
    $queryBase = "SELECT * FROM tbl_projects
LEFT JOIN tbl_projects_history ON FKNoProject=PKNoProject
LEFT JOIN tbl_history_students ON FKNoHistory=PKNoProjectHistory
LEFT JOIN tbl_students ON FKNoStudent=PKNoStudent
LEFT JOIN tbl_professions ON PKNoProfession=tbl_students.FKNoProfession
LEFT JOIN tbl_rooms ON PKNoRoom=tbl_projects_history.salle
WHERE year=" . $_POST['year'] . " AND archive IS NULL";

    $queryFini = $queryBase;

    $where = "";
    if (is_numeric($_POST['periode'])) {
        $where .= " AND FKNoPeriode=" . $_POST['periode'];
    }
    if (is_numeric($_POST['profession'])) {
        $where .= " AND tbl_projects_history.FKNoProfession=" . $_POST['profession'];

        $get_professions = $bdd->query("SELECT * FROM tbl_professions WHERE PKNoProfession=" . $_POST['profession']);
        $profession = $get_professions->fetch();
    } else {
        $profession['name_' . $_SESSION['language']] = i("Toutes professions");
    }

    $queryFini .= $where . " ORDER BY tbl_students.FKNoProfession ASC, title_" . $_SESSION['language'];
    $get_projects = $bdd->query($queryFini);
?>

<?php if ($_POST['generateur'] == "tcpdf") { ?>
<div class="loader" align="center"
    style="padding: 8px; background: rgba(255,255,255,0.87); border-radius: 8px; margin-bottom: 12px"><img
        src="img/ajax-loader.gif" /></div>

<div style="margin: 0px auto 10px; padding: 5px; width: 97.5%; background: rgba(255,255,255,0.25); border-radius: 7px; display:none"
    class="wrapperContent">
    <table align="center" style="margin:auto">
        <tr>
            <td>
                <select name="multiPages" id="multiPage0">
                    <option value="0"><?= i("Générer un PDF par projet"); ?></option>
                    <option value="1" selected="selected">
                        <?= i("Générer un seul PDF et répartir les projets sur plusieurs pages"); ?></option>
                </select>
            </td>
            <td style="padding-left:15px">
                <input name="showQR" type="checkbox" checked="checked" id="showQR0"><label
                    for="showQR0"><?= i("Afficher les QRCode"); ?></label>
            </td>
        </tr>
    </table>
</div>
<?php } ?>

<div class="avertissement" style="margin: 6px auto; width: 510px; display:none">
    <div style="width: 16px; height: 16px; background: #FF9; float:left; margin-right: 10px;"></div>
    <div style="float:left; line-height: 1.3em">
        <?= i("Projets contenant beaucoup de balises HTML ou dont les descriptions sont trop longues"); ?></div>
    <div style="clear:left"></div>
</div>

<div class="block large wrapperContent" <?php if ($_POST['generateur'] == "tcpdf") { ?>style="display:none" <?php } ?>>
    <div class="titlebar">
        <h3><?= i("Projets") . " (" . $get_projects->rowCount() . ")"; ?></h3>

        <div style="position:absolute; right:5px; top: 0; padding: 12px 10px 0px">
            <span><?= $_POST['year']; ?></span>
            <span><?= " - ";
                        if ($_POST['periode'] == "all") {
                            echo i("Toutes périodes");
                        } else {
                            echo i("Période") . " " . $_POST['periode'];
                        } ?></span>
            <span><?= " - " . $profession["name_" . $_SESSION['language']]; ?></span>
        </div>
    </div>
    <div class="block_cont" style="padding: 0px 0px 5px">


        <?php if ($get_projects->rowCount() < 1) {
                echo '<br><br><div align="center">' . i("Aucun projet ne correspond à ces critères") . '</div><br><br>';
            } else { ?>

        <form method="post" id="form_step2">
            <div class="table-wrap">
                <div class="table">
                    <table class="projects" style="width:948px">
                        <tbody>
                            <?php
                                    $where .= " AND year=" . $_POST['year'];

                                    while ($proj = $get_projects->fetch()) {
                                        $get_students = $bdd->query(
                                            "SELECT name, firstname, salle FROM tbl_students
				LEFT JOIN tbl_history_students ON FKNoStudent=PKNoStudent
				LEFT JOIN tbl_projects_history ON PKNoProjectHistory=FKNoHistory
				WHERE FKNoProject=" . $proj['PKNoProject'] . $where . "
				GROUP BY name, firstname, salle
				ORDER BY name, firstname"
                                        );

                                        $students = "";
                                        while ($stu = $get_students->fetch()) {
                                            $students .= trim($stu['firstname']) . " " . trim($stu['name']) . ",";
                                        }
                                        $students = substr($students, 0, -1);

                                        // ----------------

                                        $get_teachers = $bdd->query(
                                            "SELECT name, firstname FROM tbl_teachers
				LEFT JOIN tbl_history_teachers ON FKNoTeacher=PKNoTeacher
				LEFT JOIN tbl_projects_history ON PKNoProjectHistory=FKNoHistory
				WHERE FKNoProject=" . $proj['PKNoProject'] . $where . " GROUP BY FKNoTeacher ORDER BY name, firstname"
                                        );


                                        $teachers = "";
                                        while ($teach = $get_teachers->fetch()) {
                                            $teachers .= trim($teach['firstname']) . " " . trim($teach['name']) . ",";
                                        }
                                        $teachers = substr($teachers, 0, -1);

                                        $get_professions = $bdd->query("SELECT * FROM tbl_professions");

                                        $colorProfession = array("#900", "#090", "#009");

                                        // Image de l'historique en cours
                                        $get_img = $bdd->query("SELECT FKNoMediaImage FROM tbl_projects_history WHERE PKNoProjectHistory=" . $proj['PKNoProjectHistory'] . " AND FKNoMediaImage IS NOT NULL");
                                        if ($get_img->rowCount() < 1) {
                                            $img = "";
                                        } else {
                                            $image = $get_img->fetch();
                                            $img = getImg($image['FKNoMediaImage']);
                                        }

                                        $attrTitle = "";
                                        if ($img != "") {
                                            $attrTitle = "<div style='background:url(" . $img . ") no-repeat 50% 50%; width:160px; height:120px; background-size: cover'></div>";
                                        }

                                        if (strlen(strip_tags($proj['desc_fr'] ?? "") . strip_tags($proj['desc_de'] ?? "")) > 1900) {
                                            $troplong = true;
                                        } else {
                                            $troplong = false;
                                        }

                                    ?>
                            <tr style="cursor: default;" class="selected <?php if ($troplong) {
                                                                                            echo 'troplong';
                                                                                        } ?>"
                                projectid="<?= $proj['PKNoProject']; ?>" profession="<?= $idProf; ?>"
                                title="<?= $attrTitle; ?>">
                                <td width="10px" class="check">
                                    <input type="checkbox" checked="checked" class="checkedInp"
                                        id="check_<?= $proj['PKNoProject']; ?>" />
                                </td>

                                <td style="width:240px; padding:0">
                                    <input type="text" placeholder="<?= i("Titre"); ?>" style="width: 241px"
                                        value="<?= stripslashes($proj['title_fr']); ?>"
                                        name="title_fr[<?= $proj['PKNoProject']; ?>]" class="editing" />
                                </td>

                                <td style="width:60px">
                                    <select name="prof[<?= $proj['PKNoProject']; ?>]">
                                        <?php while ($profession = $get_professions->fetch()) { ?>
                                        <option
                                            style="color:<?= $colorProfession[$profession['PKNoProfession'] - 1]; ?>"
                                            <?php if ($proj['FKNoProfession'] == $profession['PKNoProfession']) { ?>selected="selected"
                                            <?php } ?> value="<?= $profession['PKNoProfession']; ?>">
                                            <?= $profession['name_' . $_SESSION['language']]; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <td style="width:200px; padding:0">
                                    <input type="text" placeholder="<?= i("Apprentis"); ?>" style="width: 205px"
                                        value="<?= $students; ?>" name="student[<?= $proj['PKNoProject']; ?>]"
                                        class="editing student" />
                                </td>

                                <td style="width:200px">
                                    <input type="text" placeholder="<?= i("Enseignants"); ?>" style="width: 200px"
                                        value="<?= $teachers; ?>" name="teacher[<?= $proj['PKNoProject']; ?>]"
                                        class="editing teacher" />
                                </td>

                                <td style="width:30px; padding:0">
                                    <input type="text" placeholder="<?= i("Salle"); ?>" maxlength="8" style="width:40px"
                                        value="<?= $proj['salle']; ?>" name="salle[<?= $proj['PKNoProject']; ?>]"
                                        class="editing" />
                                    <input type="hidden" value="<?= stripslashes($proj['desc_fr'] ?? ""); ?>"
                                        name="desc_fr[<?= $proj['PKNoProject']; ?>]" />
                                    <input type="hidden" value="<?= stripslashes($proj['desc_de'] ?? ""); ?>"
                                        name="desc_de[<?= $proj['PKNoProject']; ?>]" />
                                    <input type="hidden" value="<?= stripslashes($proj['title_de'] ?? ""); ?>"
                                        name="title_de[<?= $proj['PKNoProject']; ?>]" />
                                    <input type="hidden" value="<?= str_replace('../media/photo/270/', '', $img); ?>"
                                        name="img[<?= $proj['PKNoProject']; ?>]" />

                                </td>
                                <td>
                                    <div style="height: 3px;">&nbsp;</div>
                                    <div class="actionbar" style="width:10px; margin:0">
                                        <a class="action edit" style="cursor:pointer"
                                            edit="<?= $proj['PKNoProject']; ?>"><span><?= i("Editer"); ?></span></a>
                                    </div>
                                </td>

                            </tr>

                            <?php
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="hidden" name="doctype" value="<?= $_POST['doctype']; ?>" />
            <input type="hidden" name="year" value="<?= $_POST['year']; ?>" />
            <input type="hidden" name="periode" value="<?= $_POST['periode']; ?>" />
            <input type="hidden" name="profession" value="<?= $_POST['profession']; ?>" />
            <input type="hidden" name="step2" value="" />
            <input type="hidden" name="generateur" value="<?= $_POST['generateur']; ?>" />

            <?php if ($_POST['generateur'] == "tcpdf") { ?>
            <input type="hidden" name="multiPages" id="multiPage1" value="1" />
            <input type="hidden" name="showQR" id="showQR1" value="1" />
            <?php } ?>

            <?php } ?>
        </form>

    </div>
</div>

<div style="clear:both;"></div>
<input style="float: none; margin:auto; width: 250px; display:block; padding: 7px" class="btSubmit"
    value="<?= i("Lancer le processus de génération"); ?>" type="submit" />
<div class="replacement" style="display: none"></div>

<script>
$(function() {

    if ((document.body.clientWidth) < 1250) {
        gravite = "s";
    } else {
        gravite = "e";
    }
    $('tr[projectid]').tipsy({
        gravity: gravite,
        html: true,
        live: true,
        opacity: 1
    });

    $('.editing.student, .editing.teacher').attr('title',
            '<?= i("Séparez les noms par des virgules. La casse sera traité lors de la génération."); ?>')
        .tipsy({
            gravity: 's',
            live: true,
            trigger: "focus",
            fade: true,
            opacity: 1
        });

    $(".table-wrap").css("border", "none");


    <?php if ($_POST['generateur'] == "tcpdf") { ?>
    $("#multiPage0,#showQR0").change(function() {
        if ($(this).attr("id") == "showQR0") {
            if ($(this).is(":checked") == true) {
                $("#showQR1").val("1");
            } else {
                $("#showQR1").val("0");
            }
        } else {
            $("#multiPage1").val($(this).val());
        }
    });
    <?php } ?>

    $('tr[projectid]').click(function() {

        if ($('#check_' + $(this).attr('projectid')).is(":checked")) {
            $('#check_' + $(this).attr('projectid')).removeAttr("checked");
            $(this).removeClass("selected");
        } else {
            $('#check_' + $(this).attr('projectid')).attr("checked", "checked");
            $(this).addClass("selected");
        }
    });
    $('input,select,.action.edit').click(function() {
        $(this).parent().trigger("click");
    });

    <?php if ($_POST['generateur'] == "tcpdf") { ?>
    var nbAuto = 0;
    $('.action.edit').each(function() {
        elm = $(this);

        $.post('includes/pdfGenerator/editProjectEntry.php', {
            title_fr: $('input[name="title_fr[' + elm.attr("edit") + ']"]').val(),
            n1: 'input[name="title_fr[' + elm.attr("edit") + ']"]',
            title_de: $('input[name="title_de[' + elm.attr("edit") + ']"]').val(),
            n2: 'input[name="title_de[' + elm.attr("edit") + ']"]',
            desc_fr: $('input[name="desc_fr[' + elm.attr("edit") + ']"]').val(),
            n3: 'input[name="desc_fr[' + elm.attr("edit") + ']"]',
            desc_de: $('input[name="desc_de[' + elm.attr("edit") + ']"]').val(),
            n4: 'input[name="desc_de[' + elm.attr("edit") + ']"]',
            profession: $('select[name="prof[' + elm.attr("edit") + ']"]').val(),
            n5: 'input[name="prof[' + elm.attr("edit") + ']"]',
            student: $('input[name="student[' + elm.attr("edit") + ']"]').val(),
            n6: 'input[name="student[' + elm.attr("edit") + ']"]',
            teacher: $('input[name="teacher[' + elm.attr("edit") + ']"]').val(),
            n7: 'input[name="teacher[' + elm.attr("edit") + ']"]',
            salle: $('input[name="salle[' + elm.attr("edit") + ']"]').val(),
            n8: 'input[name="salle[' + elm.attr("edit") + ']"]',
            language: "<?= $_SESSION['language']; ?>",
            id: elm.attr("edit"),
            clicked: '1'
        }, function(html) {
            $(".replacement").html(html);
            nbAuto++;
            if ($(".action.edit").size() == nbAuto) {
                setTimeout(function() {
                    $(".loader").slideUp("fast");
                    $(".wrapperContent").slideDown("slow");
                    if ($('tr.troplong').size() > 0) {
                        $(".avertissement").fadeIn(0);
                    }
                }, 400);
            }
        });
    });
    <?php } else { ?>
    if ($('tr.troplong').size() > 0) {
        $(".avertissement").slideDown("slow");
    }
    <?php } ?>


    $('.action.edit').click(function() {
        elm = $(this);
        $.post('includes/pdfGenerator/editProjectEntry.php', {
            title_fr: $('input[name="title_fr[' + elm.attr("edit") + ']"]').val(),
            n1: 'input[name="title_fr[' + elm.attr("edit") + ']"]',
            title_de: $('input[name="title_de[' + elm.attr("edit") + ']"]').val(),
            n2: 'input[name="title_de[' + elm.attr("edit") + ']"]',
            desc_fr: $('input[name="desc_fr[' + elm.attr("edit") + ']"]').val(),
            n3: 'input[name="desc_fr[' + elm.attr("edit") + ']"]',
            desc_de: $('input[name="desc_de[' + elm.attr("edit") + ']"]').val(),
            n4: 'input[name="desc_de[' + elm.attr("edit") + ']"]',
            profession: $('select[name="prof[' + elm.attr("edit") + ']"]').val(),
            n5: 'input[name="prof[' + elm.attr("edit") + ']"]',
            student: $('input[name="student[' + elm.attr("edit") + ']"]').val(),
            n6: 'input[name="student[' + elm.attr("edit") + ']"]',
            teacher: $('input[name="teacher[' + elm.attr("edit") + ']"]').val(),
            n7: 'input[name="teacher[' + elm.attr("edit") + ']"]',
            salle: $('input[name="salle[' + elm.attr("edit") + ']"]').val(),
            n8: 'input[name="salle[' + elm.attr("edit") + ']"]',
            language: "<?= $_SESSION['language']; ?>",
            id: elm.attr("edit")
        }, function(html) {
            theaterOpen("<?= i("Edition des données"); ?>", html, false);
        });
    });
    $('.btSubmit').click(function() {
        if ($('tr.selected').size() > 0) {
            $('tr:not(.selected)').each(function() {
                $(this).remove();
            });

            setTimeout(function() {
                $('#form_step2').submit();
            }, 100);
        } else {
            alert("<?= i("Aucun document à générer"); ?>");
        }
    });
});
</script>

<style>
input.editing {
    border: 1px solid #ddd;
    padding: 1px 3px;
    border-radius: 3px;
    background: white;
}

table.projects {
    border-collapse: collapse;
}

table.projects tbody tr.selected td.check {
    border-left: 4px solid #060;
}

table.projects tbody tr.selected td {
    opacity: 1;
}

table.projects tbody tr td.check {
    border-left: 4px solid #900;
}

table.projects tbody tr td {
    opacity: 0.3;
}

table.projects tr.troplong {
    background: #FDF9A6;
}
</style>
<?php } else {

    function addslashes_recursive($input) {
        if (is_array($input)) {
            return array_map(__FUNCTION__, $input);
        } else {
            return addslashes($input);
        }
    }
?>

<div style="width:850px">

    <?php
        // ce qu'on evoye a la page pour générer les PDF
        if ($_POST['generateur'] == 'tcpdf') {
            $post_escape = addslashes_recursive($_POST);
            $post = addslashes(str_replace(array("\n", "\r"), array('###n###', '###r###'), serialize($post_escape)));
        } else {
            $post_escape = addslashes_recursive($_POST);
            $post = addslashes(str_replace(array("\n", "\r"), array('###n###', '###r###'), serialize($post_escape)));
        }

        ?>

</div>

<?php

    if (getFilesDir('../media/pdf/') != false) {
        foreach (getFilesDir('../media/pdf/') as $pdf) {
            if (file_exists('../media/pdf/' . $pdf)) {
                unlink('../media/pdf/' . $pdf);
            }
        }
    }
    ?>


<div id="window_progress">
    <div class="illustration">
        <?= i("Génération des PDF") . " (" . '<span class="nbCurrentPDF"></span>' . " " . i("sur") . " " . '<span class="nbTotalPDF"></span>' . ")"; ?>
        <img src="includes/pdfGenerator/img/loader-arrows.gif"
            style="position: absolute; margin-left: 10px; margin-top: -2px" />
    </div>
    <div class="progressbar">
        <div class="progression"></div>
    </div>
</div>



<script>
$(function() {
    // /*
    $(".titreTop").fadeOut(0);

    $(".nbCurrentPDF").html("1");
    $(".nbTotalPDF").html("<?= count($_POST['title_fr']); ?>");

    $("#theater").css("display", "block").unbind("click");
    $("#window_progress").fadeIn("slow");

    var maxWidth = parseInt(replaceAll($(".progressbar").css("width"), "px", ""));
    var currentPixel = 0;
    var currentProgress = 0;
    var nbStep = 100 / <?= count($_POST['title_fr']); ?>;

    setInterval(function() {
        if (currentProgress < 98.25) {
            currentPixel = parseInt(replaceAll($(".progression").css("width"), "px", ""));
            currentProgress = Math.round((currentPixel / 100) * maxWidth / 10.9);

            $(".progression").animate({
                width: (currentProgress + nbStep + 0.030097) + "%"
            }, 200);
            setTimeout(function() {
                if ($('.nbCurrentPDF').html() < <?= count($_POST['title_fr']) ?>) {
                    $('.nbCurrentPDF').html(parseInt($('.nbCurrentPDF').html()) + 1);
                }
            }, 160);
        } else {
            clearInterval();
        }

    }, <?php if ($_POST['generateur'] == 'tcpdf') { ?>750<?php } else { ?>500<?php } ?>);


    $.post('includes/pdfGenerator/<?php if ($_POST['generateur'] == "tcpdf") { ?>createPosterPDF_TCPDF.php<?php } else { ?>createPosterPDF_FPDF.php<?php } ?>', {
            <?php if ($_POST['generateur'] == 'tcpdf') { ?>
            post: '<?= $post; ?>'
            <?php } else { ?>
            post: '<?= $post; ?>'
            <?php } ?>
        },
        function(html) {
            $(".progression").animate({
                width: "100%"
            }, 550);
            $('.nbCurrentPDF').html("<?= count($_POST['title_fr']); ?>");

            setTimeout(function() {
                $("#theater,#window_progress").fadeOut("slow");
                setTimeout(function() {
                    window.location = '?p=pdfGenerator~finish';
                }, 200);
            }, 200);
            clearInterval();

        });
    return false;
});
</script>

<style>
#window_progress {
    display: none;
    position: fixed;
    width: 350px;
    height: 68px;
    border-radius: 15px;
    background: #eee;
    top: 40%;
    left: 50%;
    margin-left: -180px;
    padding: 6px;
    border: 2px solid #bbb;
    box-shadow: inset 0px 0px 3px 2px white;
    z-index: 9999999;
}

.progressbar {
    border-radius: 15px;
    background: #fff;
    border: 1px solid #bbb;
    width: 330px;
    margin: auto;
    height: 15px;
    margin-top: 12px;
}

.progression {
    width: 0%;
    height: 100%;
    max-width: 100%;
    background: #093;
    border-radius: 15px;
}

.illustration {
    margin-top: 12px;
    color: black;
    text-align: center;
    padding-right: 15px;
}
</style>
<?php
} ?>