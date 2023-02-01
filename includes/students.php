<link href="design/prettyPhoto/css/prettyPhoto.css" type="text/css" rel="stylesheet">
<script src="design/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>

<script language="javascript">
$(function() {
    $('a[rel="prettyPhoto"]').prettyPhoto({
        social_tools: false,
        keyboard_shortcuts: false
    });
});
</script>

<?php
global $bdd;

if ($_SESSION['language'] != "fr" && $_SESSION['language'] != "de") {
	$lang = "fr";
} else {
	$lang = $_SESSION['language'];
}

if (isset($_GET['id'])) {
	if (is_numeric($_GET['id'])) {
		$get_student = $bdd->query("SELECT * FROM tbl_students LEFT JOIN tbl_professions ON PKNoProfession=FKNoProfession LEFT JOIN tbl_media_images ON FKNoMediaImage=PKNoMediaImage WHERE PKNoStudent=" . $_GET['id']);
		if ($get_student->rowCount()) {

			$stu = $get_student->fetch();
			if ($stu['FKNoMediaImage'] == null) {
				$img = "img/user.png";
			} else {
				$img = getImgURL($stu['URL'], "400");
			}

			$get_projects = $bdd->query("SELECT * FROM tbl_history_students LEFT JOIN tbl_projects_history ON PKNoProjectHistory=FKNoHistory LEFT JOIN tbl_projects ON PKNoProject=FKNoProject WHERE FKNoStudent=" . $_GET['id'] . " ORDER BY year DESC");

			if ($stu['YearEntree'] != null && $stu['YearSortie'] != null) {
				$formation = $stu['YearEntree'] . " - " . $stu['YearSortie'];
			} else {
				if ($stu['YearEntree'] != null) {
					$formation = $stu['YearEntree'] . " - " . ($stu['YearEntree'] + 4);
				} elseif ($stu['YearSortie'] != null) {
					$formation = ($stu['YearSortie'] - 4) . " - " . $stu['YearSortie'];
				} else {
					$formation = i("Indéfini");
				}
			}
?>

<div class="span-22 center last wrapTitle" style="margin-bottom:15px;">
    <h1 class="title"><?= stripslashes($stu['firstname'] . " " . $stu['name']); ?></h1>
</div>

<div class="span-11">
    <h3 style="margin-top: 1px"><?= i("Profession"); ?></h3>
    <p class="job _<?= $stu['FKNoProfession']; ?>"><?= $stu['name_' . $_SESSION['language']]; ?></p>
    <span style="padding-left: 90px"><?= i("Années de formation"); ?> : <?= $formation; ?></span>

    <h3><?= i("Projets"); ?></h3>
    <p style="padding: 0px 16px">
        <?php if ($get_projects->rowCount() < 1) {
						echo i("Aucun projet enregistré jusqu'à ce jour");
					} else { ?>
    <ul class="projet">
        <?php while ($proj = $get_projects->fetch()) {

							if (empty($proj['FKNoMediaImage'])) {
								$imgP = "";
							} else {
								$imgP = str_replace('../', '', getImg($proj['FKNoMediaImage']));
							}
							$attrTitle = "";
							if ($imgP != "") {
								$attrTitle = "<div style='background:url(" . $imgP . ") no-repeat 50% 50%; width:160px; height:120px; background-size: cover'></div>";
							}

					?>
        <li title="<?= $attrTitle; ?>" onclick="window.location='?p=projects&id=<?= $proj['PKNoProject']; ?>'"><b
                style="padding-right:14px;"><?= $proj['year']; ?></b><a style="color:black"
                href="?p=projects&id=<?= $proj['PKNoProject']; ?>"><?= stripslashes($proj['title_' . $lang]); ?></a>
        </li>
        <?php } ?>
    </ul>
    <?php } ?>
    </p>
</div>

<div class="span-11 last" style="text-align:center;">

    <?php
				list($w, $h) = getimagesize($img);
				?>
    <div style="width:<?= $w; ?>px; height:<?= $h; ?>px; border-radius: 10px; margin:auto; position: relative"
        <?php if ($img != "img/user.png") { ?>class="image" <?php } ?>>


        <a href="<?= str_replace('400/', '', $img); ?>" rel="prettyPhoto" style="position:static"
            title="<?= $stu['firstname'] . " " . $stu['name']; ?>">

            <img src="<?= $img; ?>" alt="<?= $stu['firstname'] . " " . $stu['name']; ?>" style="border-radius: 10px"
                class="photo" />

            <?php
						if ($img != "img/user.png") {
							$img = str_replace('400/', '', $img);
							if (file_exists($img)) {
								list($w, $h) = getimagesize($img); ?>
            <div url="<?= $img; ?>" h="<?= $h; ?>" w="<?= $w; ?>" class="zoom"
                style="position: absolute; bottom: 0px; border-radius: 0px 0px 10px 10px; cursor: pointer; display: none; width: 100%; color: #eee; padding: 12px 0; font-weight: bold; font-size: 14pt; font-family: Verdana, Geneva, sans-serif; background: rgba(0,0,0,0.75);">
                <?= i("Agrandir"); ?></div>
            <?php
							}
						} ?>
    </div>
    </a>
</div>

<?php
		} else {
			refresh(0, '?p=students');
		}
	} else {
		refresh(0, '?p=students');
	}
} else {
	// Liste des projets	
	include_once('includes/student_list.php');
}
?>

<style>
ul.projet li {
    background: #efefef;
    padding: 2px 5px;
    margin: 0;
    margin-left: 16px;
    border-bottom: 1px dotted #ccc;
}

ul.projet li:hover {
    background: #eaeaea;
    cursor: pointer;
}

.job {
    width: auto;
    padding: 4px 10px;
    display: inline;
    margin-left: 16px;
    border-radius: 7px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    color: white;
    cursor: default;
}

.job._1 {
    background: #900;
}

.job._2 {
    background: #090;
}

.job._3 {
    background: #36F;
}
</style>

<script>
$(function() {
    $("ul.projet li").tipsy({
        gravity: "w",
        html: true,
        opacity: 0.95
    });
    $('.image').hover(function() {
        $(".zoom").slideToggle("fast");
        $(this).css("cursor", "pointer").addClass("_slideshow");
    }, function() {
        $(".zoom").slideToggle("fast");
        $(this).css("cursor", "").removeClass("_slideshow");
    });
});
</script>