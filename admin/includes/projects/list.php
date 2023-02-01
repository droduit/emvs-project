    <?php
	if (isset($_POST['year'])) {
		require_once("../../conf/common.php");
		$_SESSION['language'] = $_POST['language'];
	}

	$_POST['key'] = addslashes($_POST['key'] ?? "");
	?>


    <div style="float:left; width: 718px" class="rewrap">
        <?php
		$where = "";
		$where .= " WHERE ";

		if (isset($_POST['archive']) && $_POST['archive'] == "yes") {
			$where .= "archive IS NOT NULL ";
		} else {
			$where .= "archive IS NULL ";
		}

		if (isset($_POST['year']) && $_POST['year'] != "all") {
			$where .= "AND year = " . $_POST['year'] . " ";
		}

		if (isset($_POST['key']) && $_POST['key'] != "") {
			$preg_key = preg_replace('#\s{2,}#', ' ', $_POST['key']);

			$where .= " AND ( title_fr like '%" . $preg_key . "%' OR title_de like '%" . $preg_key . "%' )";
		}

		$order = "ASC";
		if (isset($_POST['tri'])) {
			$order  = $_POST['tri'];
		}

		if ($_SESSION['language'] == "de") {
			$title = "title_de";
			$name = "name_de";
		} else {
			$title = "title_fr";
			$name = "name_fr";
		}

		if (!isset($_POST['year']) || $_POST['year'] == "all") {
			$queryTxt = "
					SELECT *
					FROM tbl_projects
					" . $where . " ORDER BY " . $title . " " . $order;
		} else {
			$queryTxt = "SELECT *
					 FROM tbl_projects
					 INNER JOIN tbl_projects_history ON PKNoProject=FKNoProject
					 " . $where . " ORDER BY " . $title . " " . $order;
		}


		$get_projects = $bdd->query($queryTxt);
		?>

        <div class="table-wrap">
            <div class="table">
                <table class="projects">
                    <thead>
                        <tr>
                            <th><?= i("Projets"); ?> (<span class="nbRow"><?= $get_projects->rowCount(); ?></span>)</th>
                            <th width="100" style="text-align:center"><?= i("Professions"); ?></th>
                            <th width="60" style="text-align:center"><?= i("Actions"); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						if ($get_projects->rowCount() < 1) {
							echo "<tr><td colspan=\"5\">" . i("Aucun projet trouvé") . "...</td></tr>";
						}

						$projI = 0;
						while ($project = $get_projects->fetch()) {
							$projI++;

							$profession = "";
							$idProf = "";

							// On récupère la profession pour le projet
							$get_profession = $bdd->query(
								"SELECT PKNoProfession, " . $name . ", year FROM tbl_projects_history
					LEFT JOIN tbl_history_students ON PKNoProjectHistory=FKNoHistory
					LEFT JOIN tbl_students ON PKNoStudent=FKNoStudent
					LEFT JOIN tbl_professions ON PKNoProfession=tbl_students.FKNoProfession
					WHERE FKNoProject=" . $project['PKNoProject'] . "
					GROUP BY PKNoProfession, " . $name . ", year
					ORDER BY " . $name . " ASC"
							);

							if ($get_profession->rowCount() < 1) {
								$profession = "-";
								$idProf = "0";
							} else {
								while ($prof = $get_profession->fetch()) {
									$profession .= $get_profession->rowCount() > 1 ? substr($prof[$name], 0, 4) . " - " : $prof[$name] . " - ";
									$idProf .= $prof['PKNoProfession'];
								}
								$profession = substr($profession, 0, -3);
							}
							if ($idProf == "") {
								$idProf = "0";
							}

							// Image la plus récente du projet
							$attrTitle = "";
							$img = getLastImgProject($project['PKNoProject']);
							if ($img != NULL) {
								$attrTitle = "<div style='background:url(" . getImgFromURL($img) . ") no-repeat 50% 50%; width:160px; height:120px; background-size: cover'></div>";
							}

							$isArchive = ($_POST['archive'] ?? "") == "yes";
						?>
                        <tr ondblclick="window.location='?p=projects~edit&id=<?= $project['PKNoProject']; ?>'"
                            class="<?= ($projI % 2 == 0) ? 'even' : 'odd' ?>" style="cursor: default"
                            projectid="<?= $project['PKNoProject'] ?>" profession="<?= $idProf ?>"
                            title="<?= $attrTitle ?>">
                            <td><?= stripslashes((empty($project[$title])) ? $project['title_fr'] : $project[$title]); ?>
                            </td>
                            <td align="center"><?= ($profession == "") ? "-" : $profession ?></td>
                            <td>
                                <div style="height: 3px;">&nbsp;</div>
                                <div class="actionbar" style="width:78px; margin-left: 5px">
                                    <a class="action edit" href="?p=projects~edit&id=<?= $project['PKNoProject'] ?>">
                                        <span><?= i("Editer") ?></span>
                                    </a>
                                    <a class="action archive <?= $isArchive ? "restaurer" : "" ?>"
                                        style="cursor: pointer">
                                        <span><?= i($isArchive ? "Restaurer" : "Archiver") ?></span>
                                    </a>
                                    <a class="action delete" style="cursor: pointer"><span><?= i("Suppr.") ?></span></a>
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
    </div>

    <div style="clear:both"></div>

    <?php if (isset($_POST['profession'])) { ?>
    <script>
$(function() {
    $('tr[projectid], tr.hide').css("display", "none");
    var size = 0;

    <?php if ($_POST['profession'] == "all") { ?>
    $('tr[projectid][profession]').css("display", "");
    size = $('tr[projectid][profession]').size();
    <?php } else { ?>
    $('tr[projectid][profession*="<?= $_POST['profession']; ?>"]').css("display", "").addClass("display");
    size = $('tr[projectid][profession*="<?= $_POST['profession']; ?>"]').size();

    $('tr.display[projectid][profession]').removeClass("odd").removeClass("even");
    $('tr.display[projectid][profession]:odd').addClass("odd");
    $('tr.display[projectid][profession]:even').addClass("even");
    <?php } ?>

    if (size == 0) {
        $("table.projects tbody").html(
            '<tr class="hide"><td colspan="5"><?= i("Aucun projet trouvé"); ?>...</td></tr>');
        $("tr.hide").css("display", "");
    }
    $(".nbRow").html(size);
});
    </script>
    <?php } ?>