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
<fieldset class="infos">
    <legend align="top"><?= i("Date et Salle"); ?></legend>

    <p>

    <div style="float:left; width: 190px;">
        <label for="year"><?= i("Année") . " <span style='padding-left:25px'></span> " . i("Période"); ?></label>
        <select name="year" id="year" tabindex="1">
            <?php
			if (getFirstProjectDate() == NULL) {
				for ($i = date('Y'); $i >= date('Y') - 9; $i--) { ?>
            <option <?php if ($i == date('Y')) { ?>selected="selected" <?php } ?> value="<?= $i; ?>"><?= $i; ?></option>
            <?php
				}
			} else {
				for ($year = date('Y'); $year >= getFirstProjectDate() - 3; $year--) { ?>
            <option <?php if (isset($_POST['idHist'])) {
								if ($year == $data['year']) {
									echo 'selected="selected"';
								}
							} ?> value="<?= $year; ?>"><?= $year; ?></option>
            <?php }
			}
			?>
        </select>


        <?php $get_period = $bdd->query("SELECT * FROM tbl_projects_period ORDER BY Nom DESC"); ?>
        <select name="period" id="period" tabindex="2">
            <option value="NULL" <?php if (isset($_POST['idHist'])) {
										if ($period['PKNoProjectPeriod'] == NULL) { ?> selected="selected" <?php }
																									} ?>><?= i("Indéterminé"); ?></option>
            <?php while ($period = $get_period->fetch()) { ?>
            <option <?php
						if (isset($_POST['idHist'])) {
							if ($period['PKNoProjectPeriod'] == $data['FKNoPeriode']) {
								echo 'selected="selected"';
							}
						} else {
							if ($period['PKNoProjectPeriod'] == getProjPeriode()) { ?> selected="selected" <?php
																										}
																									} ?> value="<?= $period['PKNoProjectPeriod']; ?>">
                <?= i(substr($period['Nom'], 0, -2)) . " " . substr($period['Nom'], -1); ?></option>
            <?php } ?>
        </select>
    </div>

    <div style="float:left">
        <label for="salle"><?= i("Salle"); ?></label>

        <select name="salle" id="salle" class="tipsyn" title="<?= i("Salle dans laquel le projet sera exposé"); ?>">
            <option value="NULL" <?php if ($data['salle'] == NULL) { ?>selected="selected" <?php } ?>>-</option>
            <?php
			$get_rooms = $bdd->query("SELECT * FROM tbl_rooms ORDER BY ordre ASC");
			while ($room = $get_rooms->fetch()) { ?>
            <option <?php if (isset($_POST['idHist'])) {
							if ($data['salle'] == $room['PKNoRoom'] || $data['salle'] == $room['salle']) { ?>selected="selected" <?php }
																															} ?> value="<?= $room['PKNoRoom']; ?>">
                <?php if (is_numeric(substr($room['salle'], 0, 3))) {
						echo $room['salle'];
					} else {
						echo i($room['salle']);
					} ?>
            </option>
            <?php } ?>
        </select>


    </div>

    <div style="clear:both"></div>
    </p>



</fieldset>


<fieldset>
    <legend align="top"><?= i("Elèves executants"); ?></legend>
    <div id="areaStudentSelection">
        <form action="#" method="post" onsubmit="return addStudent();">

            <input type="text" tabindex="4" name="students" id="students" class="fieldCustomSearch tipsye"
                title="<?= i("Entrez le nom d'un élève"); ?>" autocomplete="off"
                placeholder="<?= i("Entrez le nom d'un élève"); ?>" />
            <div id="student_list"></div>
            <div class="stu_slct_area">
                <?php
				$slct_stu = "";

				if (isset($_POST['idHist'])) {
					$get_student = $bdd->query("SELECT * FROM tbl_students LEFT JOIN tbl_history_students ON FKNoStudent=PKNoStudent WHERE FKNoHistory=" . $idHistory);
					while ($student = $get_student->fetch()) {
						echo '<div class="item" itemid="' . $student['PKNoStudent'] . '">' . $student['firstname'] . " " . $student['name'] . '<span class="del tipsys" title="' . i("Supprimer") . '" itemid="' . $student['PKNoStudent'] . '">X</span></div>';
						$slct_stu .= "-" . $student['PKNoStudent'] . "-,";
					}
				}
				?>
            </div>

            <input type="submit" style="visibility:hidden; width:0px; height:0px" tabindex="-1" />

            <input type="hidden" id="ID_STUDENTS_OLD" value="<?= $slct_stu; ?>" tabindex="-1" />
            <input type="hidden" id="ID_STUDENTS" value="<?= $slct_stu; ?>" tabindex="-1" />

        </form>
    </div>
</fieldset>

<fieldset>
    <legend align="top"><?= i("Professeurs responsables"); ?></legend>

    <div id="areaTeacherSelection">
        <form action="#" method="post" onsubmit="return addTeacher();">

            <input type="text" name="teachers" tabindex="5" id="teachers" class="fieldCustomSearch tipsye"
                title="<?= i("Entrez le nom d'un professeur"); ?>" autocomplete="off"
                placeholder="<?= i("Entrez le nom d'un professeur"); ?>" />
            <div id="teacher_list"></div>
            <div class="teach_slct_area">
                <?php
				$slct_teach = "";
				if (isset($_POST['idHist'])) {
					$get_teachers = $bdd->query("SELECT * FROM tbl_teachers LEFT JOIN tbl_history_teachers ON FKNoTeacher=PKNoTeacher WHERE FKNoHistory=" . $idHistory);
					while ($teacher = $get_teachers->fetch()) {
						echo '<div class="item" itemid="' . $teacher['PKNoTeacher'] . '">' . $teacher['firstname'] . " " . $teacher['name'] . '<span class="del tipsys" title="' . i("Supprimer") . '" itemid="' . $teacher['PKNoTeacher'] . '">X</span></div>';
						$slct_teach .= "-" . $teacher['PKNoTeacher'] . "-,";
					}
				}
				?>
            </div>

            <input type="submit" style="visibility:hidden; width:0px; height:0px" tabindex="-1" />

            <input type="hidden" id="ID_TEACHERS_OLD" value="<?= $slct_teach; ?>" tabindex="-1" />
            <input type="hidden" id="ID_TEACHERS" value="<?= $slct_teach; ?>" tabindex="-1" />

        </form>
    </div>
</fieldset>

<div class="submitArea">
    <input type="button" onclick="closeTheater();" value="<?= i("Annuler"); ?>" tabindex="9" />
    <input type="button" id="SubmitAll" value="<?= i("Suivant"); ?>" tabindex="8" />
    <?php if (isset($_POST['idHist'])) { ?> <input type="button" id="finish" value="<?= i("Terminer"); ?>"
        tabindex="10" /> <?php } ?>
</div>

<script>
$(function() {
    $("#year").focus();

    var idHisto;
    $("#SubmitAll, #finish").click(function() {

        if ($("#ID_STUDENTS").val() != "") {
            clickedElm = $(this);
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
                function(html) {

                    if (clickedElm.attr("id") != "finish") {
                        <?php if (isset($_POST['idHist'])) { ?>
                        $('.cadre_submenu .item.desc').trigger("click");
                        <?php } else { ?>
                        $('.cadre_submenu .item').removeClass("selected");
                        $('.cadre_submenu .item.desc').addClass("selected");

                        idHisto = html;

                        $.post('includes/projects/history_desc.php', {
                                idHist: html,
                                idProj: "<?= $idProjet; ?>",
                                language: "<?= $_SESSION['language']; ?>"
                            },
                            function(html) {
                                $("#content_paging").html(html);
                            });
                        <?php } ?>
                    } else {
                        closeTheater();
                    }

                    $(".student_bt,.teacher_bt").die();
                    <?php if (!isset($_POST['idHist'])) { ?>
                    $('.cadre_submenu .item.unable').removeClass("unable");
                    $('.cadre_submenu .item').unbind("click");
                    $('.cadre_submenu .item').bind("click", function() {
                        $('.cadre_submenu .item').removeClass("selected");
                        $(this).addClass("selected");

                        $.post('includes/projects/' + $(this).attr("url"), {
                                idHist: idHisto,
                                idProj: "<?= $idProjet; ?>",
                                language: "<?= $_SESSION['language']; ?>"
                            },
                            function(html) {
                                $("#content_paging").html(html);
                            });
                    });
                    <?php } ?>

                    loadInto("history", "includes/projects/history.inc.php",
                        "id=<?= $idProjet; ?>&language=<?= $_SESSION['language']; ?>");
                });
        } else {
            alert("<?= i("Vous devez ajouter au minimum un apprentis et un enseignant !"); ?>");
        }
    });

    var next = 0,
        total = 0,
        list = "";


    // ===== ELEVES ------------------------------------------------------------------------------------------------------------------
    $("#students").keyup(function(e) {

        if ($(this).val().length > 0) {
            $("#student_list").slideDown("fast");
            $.post('includes/projects/student_list.php', {
                    language: "<?= $_SESSION['language']; ?>",
                    key: $(this).val()
                },
                function(html) {

                    list = getTextBetween(html, "###finTotal", html.length);
                    total = getTextBetween(html, 0, "###finTotal");

                    $("#student_list").html(list);

                    if (html.length < 5) {
                        $("#student_list").slideUp("fast");
                    } else {

                        // Gestion de la sélection des utilisateurs avec les fleches haut et bas
                        if (e.which == 40) { // fleche bas (suivant)
                            if (next < total) {
                                next++;
                            } else {
                                next = 1;
                            }
                            $(".student_bt.selected").removeClass("selected");
                            $('.student_bt[idxStu="' + next + '"]').addClass("selected");
                        } else if (e.which == 38) { // fleche haut (précédent)
                            if (next > 1) {
                                next--;
                            } else {
                                next = parseInt(total);
                            }
                            $(".student_bt.selected").removeClass("selected");
                            $('.student_bt[idxStu="' + next + '"]').addClass("selected");
                        }

                    }
                });
        } else {
            $("#student_list").slideUp("fast");
        }

    });

    $(".student_bt").live("focus", function() {
        $("#students").focus();

        if ($(this).hasClass("void") == false) {
            if ($("#ID_STUDENTS").val().search("-" + $(this).attr("PK") + "-,") == -1) {
                $(".student_bt.selected").removeClass("selected");
                $("#ID_STUDENTS").val($("#ID_STUDENTS").val() + "-" + $(this).attr("PK") + "-,");

                slctStudent(".stu_slct_area", $(this).val(), $(this).attr("PK"));
                next = 0;
            }
        } else {
            if ($(".cadre.addStu").size() < 1) {
                $(".cadre").clone().insertAfter("#theater").addClass("addStu");
                $(".cadre.addStu .title").html("<?= i("Ajouter un élève"); ?>");
                $(".cadre.addStu .data").remove();

                $.post('includes/students/add.php', {
                    live: 1,
                    language: "<?= $_POST['language']; ?>",
                    text: $("#students").val()
                }, function(html) {
                    $(".cadre.addStu .contenu").html(html);
                    $(".cadre.addStu .block.image").remove();
                });

                $(".cadre:not(.addStu)").fadeOut("fast");
            }
        }
        $("#student_list").slideUp("fast").html("");
        $("#students").val("");

    });

    $(".stu_slct_area .item .del").live("click", function() {
        delStudent("#ID_STUDENTS", ".stu_slct_area", $(this).attr("itemid"));
    });
    // ===== ELEVES ------------------------------------------------------------------------------------------------------------------

    // ===== PROFESSEURS -------------------------------------------------------------------------------------------------------------
    $("#teachers").keyup(function(e) {

        if ($(this).val().length > 0) {
            $("#teacher_list").slideDown("fast");
            $.post('includes/projects/teacher_list.php', {
                    language: "<?= $_SESSION['language']; ?>",
                    key: $(this).val()
                },
                function(html) {

                    list = getTextBetween(html, "###finTotal", html.length);
                    total = getTextBetween(html, 0, "###finTotal");

                    $("#teacher_list").html(list);

                    if (html.length < 5) {
                        $("#teacher_list").slideUp("fast");
                    } else {

                        // Gestion de la sélection des utilisateurs avec les fleches haut et bas
                        if (e.which == 40) { // fleche bas (suivant)
                            if (next < total) {
                                next++;
                            } else {
                                next = 1;
                            }
                            $(".teacher_bt.selected").removeClass("selected");
                            $('.teacher_bt[idxStu="' + next + '"]').addClass("selected");
                        } else if (e.which == 38) { // fleche haut (précédent)
                            if (next > 1) {
                                next--;
                            } else {
                                next = parseInt(total);
                            }
                            $(".teacher_bt.selected").removeClass("selected");
                            $('.teacher_bt[idxStu="' + next + '"]').addClass("selected");
                        }

                    }
                });
        } else {
            $("#teacher_list").slideUp("fast");
        }

    });

    $(".teacher_bt").live("focus", function() {
        $("#teachers").focus();

        if ($("#ID_TEACHERS").val().search("-" + $(this).attr("PK") + "-,") == -1) {
            $(".teacher_bt.selected").removeClass("selected");
            $("#ID_TEACHERS").val($("#ID_TEACHERS").val() + "-" + $(this).attr("PK") + "-,");

            slctStudent(".teach_slct_area", $(this).val(), $(this).attr("PK"));
            next = 0;
        }
        $("#teacher_list").slideUp("fast").html("");
        $("#teachers").val("");

    });

    $(".teach_slct_area .item .del").live("click", function() {
        delStudent("#ID_TEACHERS", ".teach_slct_area", $(this).attr("itemid"));
    });
    // ===== PROFESSEURS -------------------------------------------------------------------------------------------------------------
});

// Fonction déclenchée a l'envoi du formulaire pour ajouter des élèves
function addStudent() {
    // On est en train de pointer sur un élève et on veux ajouter cette ligne 
    if ($(".student_bt.selected").size() > 0) {
        $(".student_bt.selected").focus();
    }
    return false;
}

// Fonction déclenchée a l'envoi du formulaire pour ajouter des professeurs
function addTeacher() {
    // On est en train de pointer sur un élève et on veux ajouter cette ligne 
    if ($(".teacher_bt.selected").size() > 0) {
        $(".teacher_bt.selected").focus();
        $("#changement").val("1");
    }
    return false;
}

// Fonction qui ajoute un élément dans le conteneur des élèves sélectionnés
function slctStudent(element, name, id) {
    $(element).prepend("<div class=\"item\" itemid=\"" + id + "\">" + name + " <span class=\"del tipsys\" itemid=\"" +
        id + "\" title=\"<?= i("Supprimer"); ?>\">X</span></div>");
    $("#changement").val("1");
}

// Suppression d'un élément
function delStudent(element1, element2, id) {
    // Suppression de la valeur dans le champs qui les concervent
    $(element1).val($(element1).val().replace('-' + id + '-,', ''));
    // Suppression visuel de l'élément
    $(element2).find('.item[itemid="' + id + '"]').fadeOut("fast");
    // Suppression des tipsy visibles
    $(".tipsy").fadeOut("fast");
    $("#changement").val("1");
}
</script>