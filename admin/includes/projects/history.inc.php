<?php
if (isset($_POST['id'])) {
	require_once("../../conf/common.php");
	$_SESSION['language'] = $_POST['language'];
	$idProj = $_POST['id'];
} else {
	$idProj = $_GET['id'];
}


$get_history = $bdd->query("
SELECT * FROM tbl_projects_history
LEFT JOIN tbl_projects_period ON PKNoProjectPeriod=FKNoPeriode
WHERE FKNoProject=" . $idProj . "
ORDER BY year DESC, Nom Desc");

if ($get_history->rowCount() > 0) {
?>
<style>
.table-wrap th {
    line-height: 3em;
    height: auto;
}
</style>
<div class="table-wrap">
    <div class="table">
        <table class="history">
            <thead>
                <tr>
                    <th width="9"></th>
                    <th><?= i("Année/Période"); ?></th>
                    <th width="150" style="text-align:center"><?= i("Professeurs"); ?></th>
                    <th width="170" style="text-align:center"><?= i("Eleves"); ?></th>
                    <th width="55" style="text-align:center"><?= i("Actions"); ?></th>
                </tr>
            </thead>
            <tbody>

                <?php
					$idxHistory = 0;
					while ($hist = $get_history->fetch()) {
						// On sélectionne les élèves liés a la ligne d'historique en cours
						$get_students = $bdd->query("SELECT * FROM tbl_history_students
										 LEFT JOIN tbl_students ON PKNoStudent=FKNoStudent
										 WHERE FKNoHistory=" . $hist['PKNoProjectHistory'] . "
										 ORDER BY FKNoHistory DESC");

						$student = $get_students->fetch();
						$str_students = $student['firstname'] . " " . $student['name'];

						if ($get_students->rowCount() > 1) {
							$str_students .= " et " . ($get_students->rowCount() - 1) . " autre";
							if ($get_students->rowCount() - 1 >= 2) {
								$str_students .= "s";
							}
						} elseif ($get_students->rowCount() < 1) {
							$str_students = "-";
						}

						// On sélectionne les profs liés a la ligne d'historique en cours
						$get_teacher = $bdd->query("SELECT name, firstname FROM tbl_history_teachers
										LEFT JOIN tbl_teachers ON FKNoTeacher=PKNoTeacher
										WHERE FKNoHistory=" . $hist['PKNoProjectHistory'] . "
										LIMIT 1");

						$teacher = $get_teacher->fetch();

						if ($get_teacher->rowCount() < 1) {
							$str_teachers = "-";
						} else {
							$str_teachers = $teacher['firstname'] . " " . $teacher['name'];
						}

						// Image de l'historique en cours
						$get_img = $bdd->query(
							"SELECT FKNoMediaImage FROM tbl_projects_history
				WHERE PKNoProjectHistory=" . $hist['PKNoProjectHistory'] . " AND FKNoMediaImage IS NOT NULL"
						);
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

						$idxHistory++;

						if ($hist['FKNoPeriode'] != null) {
							$periode = i(substr($hist['Nom'], 0, -2));
						} else {
							$periode = "";
						}
					?>

                <tr class="<?= ($idxHistory % 2 == 0) ? 'even' : 'odd' ?>" style="cursor: default"
                    historyid="<?= $hist['PKNoProjectHistory']; ?>" title="<?= $attrTitle; ?>">
                    <td><?= $idxHistory; ?></td>
                    <td><?= '<span class="yearHistory">' . $hist['year'] . "</span> " . $periode . " " . substr($hist['Nom'] ?? "", -1); ?>
                    </td>
                    <td align="center"><?= $str_teachers; ?></td>
                    <td align="center"><?= $str_students; ?></td>
                    <td>
                        <div style="height: 3px;">&nbsp;</div>
                        <div class="actionbar" style="width:52px; margin-left: 5px">
                            <a style="cursor:pointer" class="action edit"
                                history="<?= $hist['PKNoProjectHistory']; ?>"><span><?= i("Editer"); ?></span></a>
                            <a style="cursor:pointer" class="action delete"><span><?= i("Suppr."); ?></span></a>
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
<?php
} else {
	echo '<div style="padding: 7px; background: #efefef; border-radius:4px; text-align:center">' . i("Historique vide") . '</div>';
}
?>