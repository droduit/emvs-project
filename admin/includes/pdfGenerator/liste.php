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

    $queryFini .= $where . " ORDER BY tbl_rooms.ordre ASC";
    $get_projects = $bdd->query($queryFini);

?>

<div class="block large wrapperContent">
    <div class="titlebar">
        <h3><?= i("Projets") . " (" . $get_projects->rowCount() . ")"; ?></h3>
        <a style="cursor:pointer" class="toggle show tipsys addProject"
            title="<?= i("Ajouter des projets à la liste"); ?>">&nbsp;</a>


    </div>
    <div class="block_cont" style="padding: 0px 0px 5px">


        <?php if ($get_projects->rowCount() < 1) {
                echo '<br><br><div align="center">' . i("Aucun projet ne correspond à ces critères") . '</div><br><br>';
            } else { ?>

        <form method="post" id="form_step2">
            <div class="table-wrap">
                <div class="table">
                    <table class="projects">
                        <tbody>
                            <?php
                                    $where .= " AND year=" . $_POST['year'];

                                    while ($proj = $get_projects->fetch()) {
                                        $get_students = $bdd->query(
                                            "SELECT name, firstname, salle, PKNoStudent FROM tbl_students
					LEFT JOIN tbl_history_students ON FKNoStudent=PKNoStudent
					LEFT JOIN tbl_projects_history ON PKNoProjectHistory=FKNoHistory
					WHERE FKNoProject=" . $proj['PKNoProject'] . $where . "
					GROUP BY name, firstname, salle, PKNoStudent
					ORDER BY name, firstname"
                                        );

                                        $get_teachers = $bdd->query(
                                            "SELECT name, firstname, PKNoTeacher FROM tbl_teachers
					LEFT JOIN tbl_history_teachers ON FKNoTeacher=PKNoTeacher
					LEFT JOIN tbl_projects_history ON PKNoProjectHistory=FKNoHistory
					WHERE FKNoProject=" . $proj['PKNoProject'] . $where .
                                                " GROUP BY FKNoTeacher
					ORDER BY name, firstname"
                                        );

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

                                    ?>
                            <tr style="cursor: move;" class="selected" projectid="<?= $proj['PKNoProject']; ?>"
                                profession="<?= $idProf; ?>" title="<?= $attrTitle; ?>">
                                <td width="10px" class="check">
                                    <input type="checkbox" checked="checked" class="checkedInp"
                                        id="check_<?= $proj['PKNoProject']; ?>" />
                                </td>

                                <td style="width:25px; padding:0">
                                    <select name="prof[<?= $proj['PKNoProject']; ?>]">
                                        <?php while ($profession = $get_professions->fetch()) { ?>
                                        <option
                                            style="color:<?= $colorProfession[$profession['PKNoProfession'] - 1]; ?>"
                                            <?php if ($proj['FKNoProfession'] == $profession['PKNoProfession']) { ?>selected="selected"
                                            <?php } ?> value="<?= $profession['PKNoProfession']; ?>">
                                            <?= substr($profession['name_' . $_SESSION['language']], 0, 1); ?></option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <td style="width:348px; padding-right:0">
                                    <input type="text" placeholder="<?= i("Titre"); ?>" style="width: 335px"
                                        value="<?= stripslashes($proj['title_fr']); ?>"
                                        name="title_fr[<?= $proj['PKNoProject']; ?>]" class="editing" />
                                </td>

                                <td style="width:20px;  padding:0">
                                    <input type="text" placeholder="<?= i("Salle"); ?>" maxlength="8" style="width:50px"
                                        value="<?= $proj['salle']; ?>" name="salle[<?= $proj['PKNoProject']; ?>]"
                                        class="editing" />
                                </td>

                                <td width="205px">

                                    <?php
                                                while ($teach = $get_teachers->fetch()) {
                                                    $teacher = trim($teach['firstname']) . " " . trim($teach['name']);
                                                ?>

                                    <div style="margin:0; padding:0;" class="teacher"
                                        idno="<?= $teach['PKNoTeacher']; ?>" proj="<?= $proj['PKNoProject']; ?>">

                                        <div <?php if ($get_teachers->rowCount() > 1) { ?>class="delItemPeople"
                                            title="<?= i("Supprimer"); ?>" <?php } else { ?>class="pseudoDelItem"
                                            <?php } ?> type="t" idno="<?= $teach['PKNoTeacher']; ?>"
                                            proj="<?= $proj['PKNoProject']; ?>">
                                            <?php if ($get_teachers->rowCount() > 1) { ?>X<?php } ?></div>

                                        <div style="display:inline">
                                            <input type="text" placeholder="<?= i("Enseignants"); ?>"
                                                style="width: 170px" value="<?= $teacher; ?>"
                                                name="teacher[<?= $proj['PKNoProject']; ?>][<?= $teach['PKNoTeacher']; ?>]"
                                                class="editing teacher" />
                                        </div>

                                        <div style="clear:both"></div>

                                    </div>

                                    <?php
                                                }
                                                ?>

                                </td>



                                <td width="205px">

                                    <?php
                                                while ($stu = $get_students->fetch()) {
                                                    $student = trim($stu['firstname']) . " " . trim($stu['name']); ?>
                                    <div style="margin:0; padding:0;" class="student" idno="<?= $stu['PKNoStudent']; ?>"
                                        proj="<?= $proj['PKNoProject']; ?>">

                                        <div <?php if ($get_students->rowCount() > 1) { ?>class="delItemPeople"
                                            title="<?= i("Supprimer"); ?>" <?php } else { ?>class="pseudoDelItem"
                                            <?php } ?> type="s" idno="<?= $stu['PKNoStudent']; ?>"
                                            proj="<?= $proj['PKNoProject']; ?>">
                                            <?php if ($get_students->rowCount() > 1) { ?>X<?php } ?></div>

                                        <div style="display:inline">
                                            <input type="text" placeholder="<?= i("Apprentis"); ?>"
                                                value="<?= $student; ?>" style="width: 170px"
                                                name="student[<?= $proj['PKNoProject']; ?>][<?= $stu['PKNoStudent']; ?>]"
                                                class="editing student" />
                                        </div>

                                        <div style="clear:both"></div>

                                    </div>
                                    <?php
                                                }
                                                ?>

                                </td>


                                <input type="hidden" value="<?= stripslashes($proj['title_de']); ?>"
                                    name="title_de[<?= $proj['PKNoProject']; ?>]" />
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

            <?php } ?>
        </form>

    </div>
</div>

<div style="clear:both;"></div>
<input style="float: none; margin:auto; width: 250px; display:block; padding: 7px" class="btSubmit"
    value="<?= i("Générer la liste"); ?>" type="submit" />
<div class="replacement" style="display: none"></div>



<script>
$(function() {

    // -----------------------------------------------------------------
    var fixHelper = function(e, ui) {
        ui.children().each(function() {
            $(this).width($(this).width());
        });
        return ui;
    };

    var order = "";
    $("table.projects tbody").sortable({
        placeholder: "ui-state-highlight",

        update: function(event, ui) {
            // Mise à jour de l'ordre
            var i = 0;
            $('table.projects tbody tr[projectid]').each(function() {
                i++;
                $(this).find("td.order").html(i);
            });
            $('table.projects tbody tr[projectid]').removeClass("odd").removeClass("even");
            $('table.projects tbody tr[projectid]:odd').addClass("odd");
            $('table.projects tbody tr[projectid]:even').addClass("even");
        }
    });
    // -----------------------------------------------------------------


    $(".tipsys").tipsy({
        gravity: "e",
        fade: true,
        opacity: 1
    }).tipsy('show');

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

    $(".table-wrap").css("border", "none");

    $('tr[projectid]').live('click', function() {

        if ($('#check_' + $(this).attr('projectid')).is(":checked")) {
            $('#check_' + $(this).attr('projectid')).removeAttr("checked");
            $(this).removeClass("selected");
        } else {
            $('#check_' + $(this).attr('projectid')).attr("checked", "checked");
            $(this).addClass("selected");
        }
    });
    $('input,select,.action.edit,.delItemPeople').live('click', function() {
        $(this).parent().trigger("click");
    });

    $('.delItemPeople').tipsy({
        gravity: "s",
        live: true,
        opacity: 1
    }).live('click', function() {

        if ($(this).attr("type") == "s") {
            $('.student[idno="' + $(this).attr("idno") + '"][proj="' + $(this).attr("proj") + '"]')
                .remove();
        }
        if ($(this).attr("type") == "t") {
            $('.teacher[idno="' + $(this).attr("idno") + '"][proj="' + $(this).attr("proj") + '"]')
                .remove();
        }
        $('.tipsy').fadeOut();

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

    $(".addProject").click(function() {
        openWindow('includes/pdfGenerator/addProjectToList.php',
            'language=<?= $_SESSION['language']; ?>&year=<?= $_POST['year']; ?>&periode=<?= $_POST['periode']; ?>&profession=<?= $_POST['profession']; ?>',
            500, '<?= i("Ajouter des projets à la liste"); ?>');
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

.pseudoDelItem,
.delItemPeople {
    padding: 2px 3px 2px 3px;
    background: #aaa;
    cursor: pointer;
    display: inline-block;
}

.pseudoDelItem {
    cursor: default;
    padding: 5px 5px;
    border-radius: 5px;
    background: #ccc;
}

.delItemPeople:hover {
    background: #666;
    color: white;
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
        $post_escape = addslashes_recursive($_POST);
        $post = addslashes(str_replace(array("\n", "\r"), array('###n###', '###r###'), serialize($post_escape)));

        ?>

</div>

<?php
    if (getFilesDir('../media/pdf/')) {
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


<div class="data" style="line-height:1.4em;"></div>



<script>
$(function() {

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
            }, 50);
            setTimeout(function() {
                if ($('.nbCurrentPDF').html() < <?= count($_POST['title_fr']) ?>) {
                    $('.nbCurrentPDF').html(parseInt($('.nbCurrentPDF').html()) + 1);
                }
            }, 5);
        } else {
            clearInterval();
        }

    }, 80);


    $.post('includes/pdfGenerator/createListPDF.php', {
            post: '<?= $post; ?>'
        },
        function(html) {
            clearInterval();
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