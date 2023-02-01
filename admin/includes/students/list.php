    <?php
	if (isset($_POST['year'])) {
		require_once("../../conf/common.php");
		$_SESSION['language'] = $_POST['language'];
	}

	?>


    <div style="float:left; width: 718px">
        <?php
		$where = "";
		if (isset($_POST['year']) || isset($_POST['profession']) || isset($_POST['key'])) {
			$where .= " WHERE ";
		}
		if (isset($_POST['year']) && $_POST['year'] == "all" && $_POST['profession'] == "all" && $_POST['key'] == "") {
			$where = "";
		}
		if (isset($_POST['year']) && $_POST['year'] != "all") {
			$where .= "yearEntree = " . $_POST['year'] . " ";
		}
		if (isset($_POST['profession']) && $_POST['profession'] != "all") {
			if ($_POST['year'] != "all") {
				$where .= "AND ";
			}
			$where  .= "FKNoProfession = " . $_POST['profession'] . " ";
		}
		if (isset($_POST['key']) && $_POST['key'] != "") {
			$_POST['key'] = addslashes($_POST['key']);
			$preg_key = preg_replace('#\s{2,}#', ' ', $_POST['key']);

			if ($_POST['profession'] != "all" || $_POST['year'] != "all") {
				$where .= " AND ";
			}
			$where .= " ( CONCAT(name, ' ', firstname) like '%" . $preg_key . "%' OR CONCAT(firstname, ' ', name) like '%" . $preg_key . "%' )";
		}

		$order = "ASC";
		if (isset($_POST['tri'])) {
			$order  = $_POST['tri'];
		}

		if ($_SESSION['language'] == "de") {
			$name = "name_de";
		} else {
			$name = "name_fr";
		}


		if (!isset($_POST['year']) || $_POST['year'] == "all") {
			$queryTxt = "
				SELECT PKNoStudent, name, yearEntree, yearSortie, firstname, tbl_students.FKNoProfession, tbl_students.FKNoMediaImage, " . $name . "
				FROM tbl_students
				LEFT JOIN tbl_professions ON PKNoProfession=tbl_students.FKNoProfession
				" . $where .
				" ORDER BY PKNoProfession " . $order . ", name " . $order . ", firstname " . $order;
		} else {
			$queryTxt = "
						SELECT PKNoStudent, name, yearEntree, yearSortie, firstname, tbl_students.FKNoProfession, tbl_students.FKNoMediaImage, " . $name . "
						FROM tbl_students
						LEFT JOIN tbl_professions ON tbl_students.FKNoProfession = PKNoProfession
						" . $where .
				"ORDER BY PKNoProfession " . $order . ", name " . $order . ", firstname " . $order;
		}

		$get_projects = $bdd->query($queryTxt);
		?>
        <div class="table-wrap">
            <div class="table">
                <table class="projects">
                    <thead>
                        <tr>
                            <th><?= i("Nom/Prénom"); ?> (<?= $get_projects->rowCount(); ?>)</th>
                            <th width="80"><?= i("Professions"); ?></th>
                            <th width="70" style="text-align:center"><?= i("Formation"); ?></th>
                            <th width="60" style="text-align:center"><?= i("Actions"); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						if ($get_projects->rowCount() < 1) {
							echo "<tr><td colspan=\"4\">" . i("Aucun élève trouvé") . "...</td></tr>";
						}

						$projI = 0;
						while ($project = $get_projects->fetch()) {
							$projI++;

							$attrTitle = "";
							if (getImg($project['FKNoMediaImage']) != "false") {
								$attrTitle = "<div style='background:url(" . getImg($project['FKNoMediaImage']) . ") no-repeat 50% 50%; width:160px; height:120px; background-size: cover'></div>";
							}

							if ($project['yearEntree'] != NULL && $project['yearSortie'] != NULL) {
								$formation = $project['yearEntree'] . " - " . $project['yearSortie'];
							} else {
								if ($project['yearEntree'] != NULL) {
									$formation = $project['yearEntree'];
								} else {
									$formation = $project['yearSortie'];
								}
							}
						?>
                        <tr ondblclick="window.location='?p=students~edit&id=<?= $project['PKNoStudent']; ?>'" class="<?php if ($projI % 2 == 0) {
																																echo 'even';
																															} else {
																																echo 'odd';
																															} ?>" style="cursor: default" projectid="<?= $project['PKNoStudent']; ?>"
                            title="<?= $attrTitle; ?>">
                            <td><?= $project["name"] . " " . $project['firstname']; ?></td>
                            <td><?= $project[$name]; ?></td>
                            <td align="center"><?= $formation; ?></td>
                            <td>
                                <div style="height: 3px;">&nbsp;</div>
                                <div class="actionbar" style="width:58px; margin-left: 5px">
                                    <a class="action edit"
                                        href="?p=students~edit&id=<?= $project['PKNoStudent']; ?>"><span><?= i("Editer"); ?></span></a>
                                    <a class="action delete"
                                        style="cursor: pointer"><span><?= i("Suppr."); ?></span></a>
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