    <?php
	if (isset($_POST['tri'])) {
		require_once("../../conf/common.php");
		$_SESSION['language'] = $_POST['language'];
	}
	$pageName = "teachers";
	$_POST['key'] = addslashes($_POST['key'] ?? "");
	?>


    <div style="float:left; width: 718px">
        <?php
		$where = " ";
		if (isset($_POST['key']) && $_POST['key'] != "") {
			$preg_key = preg_replace('#\s{2,}#', ' ', $_POST['key']);

			$where .= " WHERE ( CONCAT(name, ' ', firstname) like '%" . $preg_key . "%' OR CONCAT(firstname, ' ', name) like '%" . $preg_key . "%' )";
		}

		$order = "ASC";
		if (isset($_POST['tri'])) {
			$order  = $_POST['tri'];
		}


		$queryTxt = "SELECT PKNoTeacher, name, firstname, FKNoMediaImage
					FROM tbl_teachers
					" . $where .
			" ORDER BY name " . $order . ", firstname " . $order;

		$get_projects = $bdd->query($queryTxt);
		?>
        <div class="table-wrap">
            <div class="table">
                <table class="projects">
                    <thead>
                        <tr>
                            <th><?= i("Nom/Prénom"); ?> (<?= $get_projects->rowCount(); ?>)</th>
                            <th width="60" style="text-align:center"><?= i("Actions"); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						if ($get_projects->rowCount() < 1) {
							echo "<tr><td colspan=\"4\">" . i("Aucun professeur trouvé") . "...</td></tr>";
						}

						$projI = 0;
						while ($project = $get_projects->fetch()) {
							$projI++;

							$attrTitle = "";
							if (getImg($project['FKNoMediaImage']) != "false") {
								$attrTitle = "<div style='background:url(" . getImg($project['FKNoMediaImage']) . ") no-repeat 50% 50%; width:160px; height:120px; background-size: cover'></div>";
							}
						?>
                        <tr ondblclick="window.location='?p=<?= $pageName; ?>~edit&id=<?= $project['PKNoTeacher']; ?>'"
                            class="<?php if ($projI % 2 == 0) {
																																		echo 'even';
																																	} else {
																																		echo 'odd';
																																	} ?>" style="cursor: default" projectid="<?= $project['PKNoTeacher']; ?>"
                            name="<?= $project["name"] . " " . $project['firstname']; ?>" title="<?= $attrTitle; ?>">
                            <td><?= $project["name"] . " " . $project['firstname']; ?></td>
                            <td>
                                <div style="height: 3px;">&nbsp;</div>
                                <div class="actionbar" style="width:58px; margin-left: 5px">
                                    <a class="action edit"
                                        href="?p=<?= $pageName; ?>~edit&id=<?= $project['PKNoTeacher']; ?>"><span><?= i("Editer"); ?></span></a>
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