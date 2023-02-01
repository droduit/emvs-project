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

$lang = ($_SESSION['language'] != "fr" && $_SESSION['language'] != "de") ? "fr" : $_SESSION['language'];

if (isset($_GET['id'])) {
	if (is_numeric($_GET['id'])) {
		$get_student = $bdd->query(
			"SELECT * FROM tbl_teachers
			LEFT JOIN tbl_media_images ON FKNoMediaImage=PKNoMediaImage
			WHERE PKNoTeacher=" . $_GET['id']
		);
		if ($get_student->rowCount()) {

			$stu = $get_student->fetch();
			$img = $stu['FKNoMediaImage'] == null ? "img/user.png" : getImgURL($stu['URL'], "400");

			$get_projects = $bdd->query(
				"SELECT * FROM tbl_history_teachers
			LEFT JOIN tbl_projects_history ON PKNoProjectHistory=FKNoHistory
			LEFT JOIN tbl_projects ON PKNoProject=FKNoProject
			WHERE FKNoTeacher=" . $_GET['id'] . "
			ORDER BY year DESC"
			);
?>

<div class="span-22 center last wrapTitle" style="margin-bottom:15px">
    <h1><?= $stu['firstname'] . " " . $stu['name'] ?></h1>
</div>

<div class="span-11">
    <h3 style="margin-top:0"><?= i("E-mail") ?></h3>
    <p style="padding: 0px 16px">
        <a href="mailto:<?= $stu['email']; ?>"><?= $stu['email'] ?></a>
    </p>

    <h3 style="margin-top:0"><?= i("Projets") . " (" . $get_projects->rowCount() . ")" ?></h3>
    <p style="padding: 0px 16px">
    <ul class="projet">
        <?php
					while ($proj = $get_projects->fetch()) {
						$imgP = empty($proj['FKNoMediaImage']) ? "" : str_replace('../', '', getImg($proj['FKNoMediaImage']));
						$attrTitle = "";
						if ($imgP != "") {
							$attrTitle = "<div style='background:url(" . $imgP . ") no-repeat 50% 50%; width:160px; height:120px; background-size: cover'></div>";
						}
					?>
        <li title="<?= $attrTitle; ?>" onclick="window.location='?p=projects&id=<?= $proj['PKNoProject'] ?>'">
            <b style="padding-right:14px;"><?= $proj['year'] ?></b>
            <a style="color:black"
                href="?p=projects&id=<?= $proj['PKNoProject'] ?>"><?= stripslashes($proj['title_' . $lang] ?? $proj['title_fr'] ?? "") ?></a>
        </li>
        <?php
					} ?>
    </ul>
    </p>
</div>

<div class="span-11 last" style="text-align:center">
    <?php
				list($w, $h) = getimagesize($img);
				?>
    <div style="width:<?= $w ?>px; height:<?= $h ?>px; border-radius: 10px; margin:auto; position: relative"
        <?php if ($img != "img/user.png") { ?>class="image" <?php } ?>>

        <a href="<?= str_replace('400/', '', $img) ?>" rel="prettyPhoto" style="position:static"
            title="<?= $stu['firstname'] . " " . $stu['name'] ?>">
            <img src="<?= $img ?>" style="border-radius: 10px" alt="<?= $stu['firstname'] . " " . $stu['name'] ?>"
                class="photo">


            <?php
						if ($img != "img/user.png") {
							$img = str_replace('400/', '', $img);
							if (file_exists($img)) {
								list($w, $h) = getimagesize($img) ?>
            <div url="<?= $img ?>" h="<?= $h ?>" w="<?= $w ?>" class="zoom"
                style="position: absolute; bottom: 0px; border-radius: 0px 0px 10px 10px; cursor: pointer; display: none; width: 100%; color: #eee; padding: 12px 0; font-weight: bold; font-size: 14pt; font-family: Verdana, Geneva, sans-serif; background: rgba(0,0,0,0.75);">
                <?= i("Agrandir") ?></div>
            <?php
							}
						} ?>
    </div>
    </a>

</div>
<?php
		} else {
			refresh(0, '?p=teachers');
		}
	} else {
		refresh(0, '?p=teachers');
	}
} else {
	// Liste des projets
	include_once('includes/teacher_list.php');
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