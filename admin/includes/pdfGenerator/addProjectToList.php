<?php
require_once('../../conf/common.php');
$_SESSION['language'] = $_POST['language'];


if (isset($_POST['id'])) {


	$queryBase = "SELECT * FROM tbl_projects
					LEFT JOIN tbl_projects_history ON FKNoProject=PKNoProject
					LEFT JOIN tbl_professions ON FKNoProfession=PKNoProfession
					LEFT JOIN tbl_rooms ON PKNoRoom=tbl_projects_history.salle
					WHERE PKNoProject=" . $_POST['id'] .
		" ORDER BY PKNoProjectHistory DESC";

	$queryFini = $queryBase;

	$get_projects = $bdd->query($queryFini);

	$proj = $get_projects->fetch();

	$get_students = $bdd->query(
		"SELECT name, firstname, salle, PKNoStudent FROM tbl_students
			LEFT JOIN tbl_history_students ON FKNoStudent=PKNoStudent
			LEFT JOIN tbl_projects_history ON PKNoProjectHistory=FKNoHistory
			WHERE FKNoProject=" . $_POST['id'] .
			" GROUP BY name, firstname, salle, PKNoStudent
			ORDER BY name, firstname"
	);

	$get_teachers = $bdd->query(
		"SELECT name, firstname, PKNoTeacher FROM tbl_teachers
			LEFT JOIN tbl_history_teachers ON FKNoTeacher=PKNoTeacher
			LEFT JOIN tbl_projects_history ON PKNoProjectHistory=FKNoHistory
			WHERE FKNoProject=" . $_POST['id'] .
			" GROUP BY FKNoTeacher
			ORDER BY name, firstname"
	);

	$get_professions = $bdd->query("SELECT * FROM tbl_professions");

	$colorProfession = array("#900", "#090", "#009");

	// Image de l'historique en cours
	$get_img = $bdd->query(
		"SELECT FKNoMediaImage FROM tbl_projects_history
			WHERE PKNoProjectHistory=" . $proj['PKNoProjectHistory'] . " AND FKNoMediaImage IS NOT NULL"
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
?>
<tr style="cursor: move;" class="selected" projectid="<?= $proj['PKNoProject'] ?>" profession="<?= $idProf ?>"
    title="<?= $attrTitle ?>">
    <td width="10px" class="check">
        <input type="checkbox" checked="checked" class="checkedInp" id="check_<?= $proj['PKNoProject'] ?>" />
    </td>

    <td style="width:25px; padding:0">
        <select name="prof[<?= $proj['PKNoProject']; ?>]">
            <?php while ($profession = $get_professions->fetch()) { ?>
            <option style="color:<?= $colorProfession[$profession['PKNoProfession'] - 1] ?>"
                <?php if ($proj['FKNoProfession'] == $profession['PKNoProfession']) { ?>selected="selected" <?php } ?>
                value="<?= $profession['PKNoProfession'] ?>">
                <?= substr($profession['name_' . $_SESSION['language']], 0, 1) ?></option>
            <?php } ?>
        </select>
    </td>

    <td style="width:348px; padding-right:0">
        <input type="text" placeholder="<?= i("Titre") ?>" style="width: 335px"
            value="<?= stripslashes($proj['title_fr']) ?>" name="title_fr[<?= $proj['PKNoProject'] ?>]"
            class="editing" />
    </td>

    <td style="width:20px;  padding:0">
        <input type="text" placeholder="<?= i("Salle"); ?>" maxlength="8" size="6" value="<?= $proj['salle'] ?>"
            name="salle[<?= $proj['PKNoProject'] ?>]" class="editing" />
    </td>

    <td width="205px">

        <?php
			while ($teach = $get_teachers->fetch()) {
				$teacher = trim($teach['firstname']) . " " . trim($teach['name']);
			?>
        <div style="margin:0; padding:0;" class="teacher" idno="<?= $teach['PKNoTeacher']; ?>"
            proj="<?= $proj['PKNoProject'] ?>">
            <div <?php if ($get_teachers->rowCount() > 1) { ?>class="delItemPeople" title="<?= i("Supprimer"); ?>"
                <?php } else { ?>class="pseudoDelItem" <?php } ?> type="t" idno="<?= $teach['PKNoTeacher']; ?>"
                proj="<?= $proj['PKNoProject']; ?>"><?php if ($get_teachers->rowCount() > 1) { ?>X<?php } ?></div>

            <div style="display:inline">
                <input type="text" placeholder="<?= i("Enseignants") ?>" style="width: 170px" value="<?= $teacher ?>"
                    name="teacher[<?= $proj['PKNoProject'] ?>][<?= $teach['PKNoTeacher'] ?>]" class="editing teacher" />
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
        <div style="margin:0; padding:0" class="student" idno="<?= $stu['PKNoStudent'] ?>"
            proj="<?= $proj['PKNoProject'] ?>">
            <div <?php if ($get_students->rowCount() > 1) { ?> class="delItemPeople" title="<?= i("Supprimer") ?>"
                <?php } else { ?> class="pseudoDelItem" <?php } ?> type="s" idno="<?= $stu['PKNoStudent'] ?>"
                proj="<?= $proj['PKNoProject'] ?>">
                <?php if ($get_students->rowCount() > 1) { ?>X<?php } ?>
            </div>
            <div style="display:inline">
                <input type="text" placeholder="<?= i("Apprentis") ?>" value="<?= $student ?>" style="width: 170px"
                    name="student[<?= $proj['PKNoProject']; ?>][<?= $stu['PKNoStudent']; ?>]" class="editing student" />
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

} else {

	if (isset($_POST['value'])) {

		$get_projects = $bdd->query(
			"SELECT * FROM tbl_projects
				WHERE lower(title_fr) like '%" . addslashes($_POST['value']) . "%' OR lower(title_de) like '%" . addslashes($_POST['value']) . "%'
				LIMIT 15"
		);
		if ($get_projects->rowCount() < 1) { ?>
<div align="center" style="padding-top: 9px"><?= i('Aucun projet ne correspond à votre recherche') . "..."; ?></div>
<?php
		} else {
			while ($proj = $get_projects->fetch()) { ?>
<li>
    <div class="titleProj">
        <?= str_replace(addslashes($_POST['value']), '<b>' . addslashes($_POST['value']) . '</b>', stripslashes($proj['title_fr'])); ?>
    </div>
    <div class="addBt" idProj="<?= $proj['PKNoProject']; ?>"><?= i("Ajouter"); ?></div>
    <div style="clear:both"></div>
</li>
<?php
			}
		}
	} else {

		$get_projects = $bdd->query("SELECT * FROM tbl_projects LIMIT 15");
		?>
<input type="search" placeholder="<?= i("Recherche"); ?>..." class="search"
    style="padding: 7px 10px; border-bottom:1px solid #003; width:96%" />
<ul class="projectItem">
    <?php
			while ($proj = $get_projects->fetch()) { ?>

    <li>
        <div class="titleProj"><?= stripslashes($proj['title_fr']); ?></div>
        <div class="addBt" idProj="<?= $proj['PKNoProject']; ?>"><?= i("Ajouter"); ?></div>
        <div style="clear:both"></div>
    </li>

    <?php
			} ?>
</ul>

<style>
#window .container {
    padding: 0;
}

ul.projectItem {
    padding: 0px;
    margin: 0px;
}

.projectItem li {
    list-style: none;
    background: #D2E9FF;
    padding: 6px 12px;
    margin: 0;
    border-bottom: 1px solid #4FA7FF;
}

.addBt {
    float: right;
    padding: 4px 8px;
    margin-right: 6px;
    background: #fff;
    border-radius: 5px;
    cursor: pointer;
}

.addBt:hover {
    background: #0080FF;
    color: white;
}

.titleProj {
    float: left;
    line-height: 1.8em
}
</style>

<script>
$(function() {
    $(".search").focus().keyup(function() {
        $.post('includes/pdfGenerator/addProjectToList.php', {
            language: "<?= $_SESSION['language'] ?>",
            value: $(this).val()
        }, function(html) {
            $('.projectItem').html(html);
        });
    });

    $('.addBt').live('click', function() {
        $.post('includes/pdfGenerator/addProjectToList.php', {
                language: "<?= $_SESSION['language'] ?>",
                id: $(this).attr("idProj"),
                year: "<?= $_POST['year'] ?>",
                periode: "<?= $_POST['periode'] ?>",
                profession: "<?= $_POST['profession'] ?>"
            },
            function(html) {
                $('table.projects tbody').append(html);
                $('table.projects tbody tr[projectid]').removeClass("odd").removeClass("even");
                $('table.projects tbody tr[projectid]:odd').addClass("odd");
                $('table.projects tbody tr[projectid]:even').addClass("even");
                window.scrollTo(0, 999500);
            }
        );
        $('.addBt').stopPropagation('click');
    });
});
</script>

<?php
	}
} ?>