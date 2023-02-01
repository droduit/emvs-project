<link href="design/prettyPhoto/css/prettyPhoto.css" type="text/css" rel="stylesheet">
<script src="design/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>

<script language="javascript">
$(function() {
    $('a[rel^="prettyPhoto"]').prettyPhoto({
        social_tools: false
    });
});
</script>

<?php
global $bdd;

$lang = ($_SESSION['language'] != "fr" && $_SESSION['language'] != "de") ? "fr" : $_SESSION['language'];

if (isset($_GET['id'])) {
	if (is_numeric($_GET['id'])) {
		$get_project = $bdd->query(
			"SELECT * FROM tbl_projects
			WHERE PKNoProject=" . $_GET['id']
		);
		$get_history = $bdd->query(
			"SELECT * FROM tbl_projects_history
			LEFT JOIN tbl_projects_period ON FKNoPeriode=PKNoProjectPeriod
			WHERE FKNoProject=" . $_GET['id'] .
				" ORDER BY year DESC, FKNoPeriode DESC"
		);
		$get_last_history = $bdd->query(
			"SELECT * FROM tbl_projects_history
			WHERE FKNoProject=" . $_GET['id'] .
				" ORDER BY year DESC, FKNoPeriode DESC
			LIMIT 1"
		);
		$last_hist = $get_last_history->fetch();

		$get_year = $bdd->query(
			"SELECT MIN(year) as first, MAX(year) as last FROM tbl_projects_history
			WHERE FKNoProject=" . $_GET['id']
		);
		$year = $get_year->fetch();

		if ($get_project->rowCount() > 0) {
			$project = $get_project->fetch();
?>

<div class="span-22 center last wrapTitle" style="margin-bottom:0px;">
    <h1><?= stripslashes($project['title_' . (($project['title_' . $lang] == "") ? "fr" : $lang)]) ?></h1>
</div>

<div class="span-11 ">
    <h3 style="margin-top:15px;"><?= i("Description"); ?></h3>
    <p class="justify"><?= stripslashes(html_entity_decode(stripslashes($last_hist['desc_' . $lang] ?? ""))) ?></p>


    <h3><?= i("Historique du projet"); ?></h3>

    <?php $i = 0;
				while ($hist = $get_history->fetch()) {
					$get_students = $bdd->query(
						"SELECT * FROM tbl_history_students
					LEFT JOIN tbl_students ON PKNoStudent=FKNoStudent
					LEFT JOIN tbl_professions ON PKNoProfession=tbl_students.FKNoProfession
					WHERE FKNoHistory=" . $hist['PKNoProjectHistory']
					);
					$get_teachers = $bdd->query(
						"SELECT * FROM tbl_history_teachers
					LEFT JOIN tbl_teachers ON PKNoTeacher=FKNoTeacher
					WHERE FKNoHistory=" . $hist['PKNoProjectHistory']
					);

					$resp = "";
					while ($teach = $get_teachers->fetch()) {
						$resp .= '<a href="?p=teachers&id=' . $teach['PKNoTeacher'] . '">' . $teach['firstname'] . " " . $teach['name'] . "</a>, ";
					}
					$i++;

					// Image de l'historique en cours
					$get_img = $bdd->query(
						"
					SELECT FKNoMediaImage FROM tbl_projects_history
					WHERE PKNoProjectHistory=" . $hist['PKNoProjectHistory'] . " AND FKNoMediaImage IS NOT null"
					);
					if ($get_img->rowCount() < 1) {
						$img = "";
					} else {
						$image = $get_img->fetch();
						$img = str_replace('../', '', getImg($image['FKNoMediaImage']));
					}

					if (!file_exists(str_replace('270/', '', $img))) {
						$imgPretty = !file_exists(str_replace('400/', '', $img)) ? $img : str_replace('270/', '400/', $img);
					} else {
						$imgPretty = str_replace('270/', '', $img);
					}
				?>

    <a href="<?= $imgPretty ?>" rel="prettyPhoto[g1]" style="position:static; display:none">
        <img src="<?= $img ?>"
            alt="<?= stripslashes($project['title_' . $lang]) . " :: " . $hist['year'] ?> <?php if ($hist['FKNoPeriode'] != null) { ?>- <?= i(substr($hist['Nom'], 0, -2)) . " " . substr($hist['Nom'], -2) ?><?php } ?>"
            style="border-radius:9px; box-shadow: 1px 1px 1px 0px #999" />
    </a>

    <div class="history" image="<?= $img; ?>">

        <div class="infos">

            <div
                style="float:left; border-radius: 4px; background: #333; padding: <?php if ($hist['FKNoPeriode'] != null) { ?>1px 0px 1px 7px<?php } else { ?>1px 7px<?php } ?>; color: white; width:115px; font-family:Verdana, Geneva, sans-serif">
                <div
                    style="<?php if ($hist['FKNoPeriode'] != null) { ?>float:left;<?php } ?> font-weight:bold; font-size:13px; <?php if ($hist['FKNoPeriode'] == null) { ?>text-align:center<?php } ?>">
                    <?= $hist['year'] ?></div>
                <?php if ($hist['FKNoPeriode'] != null) { ?>
                <div style="float:right; border-radius: 5px; font-size: 11px; padding: 0px 4px; background: #111">
                    <?= i(substr($hist['Nom'], 0, -2)) . " " . substr($hist['Nom'], -2) ?></div>
                <?php } ?>
                <div style="clear:both"></div>
            </div>

            <div style="float:right">
                <?php if ($get_teachers->rowCount() > 0) {
									if ($get_teachers->rowCount() > 1) {
										$respTxt = "Responsables";
									} else {
										$respTxt = "Responsable";
									}
									echo i($respTxt); ?> : <?= substr($resp, 0, -2);
																																																	} ?>
            </div>

            <div style="clear:both"></div>

            <div style="margin-top:8px; border:1px solid #ddd; border-radius: 5px; padding: 8px 0px 0px">


                <?php while ($stu = $get_students->fetch()) {
									$img = $stu['FKNoMediaImage'] != null ? str_replace('../', '', getImg($stu['FKNoMediaImage'])) : "";

									$attrTitle = "";
									if ($img != "") {
										$attrTitle = "<div style='background:url(" . $img . ") no-repeat 50% 50%; width:160px; height:120px; background-size: cover'></div>";
									} else {
										$attrTitle = $stu['name_' . $_SESSION['language']];
									}
								?>
                <a href="?p=students&id=<?= $stu['PKNoStudent'] ?>">
                    <div class="stu" title="<?= $attrTitle ?>"><?= $stu['name'] . " " . $stu['firstname'] ?></div>
                </a>
                <?php } ?>
                <div style="clear:left"></div>
            </div>


            <div class="functions" style="margin-top:8px; display:none; padding: 0px 8px">
                <?php
								$get_files = $bdd->query(
									"SELECT * FROM tbl_history_documents
							WHERE FKNoProjectHistory=" . $hist['PKNoProjectHistory'] .
										" ORDER BY nom asc"
								);
								?>

                <?php if ($get_files->rowCount() > 0) { ?>
                <div><b><?= i("Fichiers liés") ?></b></div>

                <div class="download" hist="<?= $hist['PKNoProjectHistory'] ?>">
                    <?= i("Télécharger les fichiers") . " (" . $get_files->rowCount() . ")" ?></div>

                <form id="formDownDoc" method="post" style="width:0;height:0;margin:0;padding:0"
                    hist="<?= $hist['PKNoProjectHistory'] ?>">
                    <input type="hidden" value="<?= $hist['PKNoProjectHistory'] ?>" name="idHist" />
                    <input type="submit" style="width:0px; height: 0px; opacity:0; visibility: hidden;" />
                </form>

                <div class="files" hist="<?= $hist['PKNoProjectHistory'] ?>">
                    <table style="margin-bottom:0; margin-top: 6px" class="files">
                        <thead>
                            <tr>
                                <th width="192"><?= i("Nom du fichier"); ?></th>
                                <th width="40"><?= i("Extension"); ?></th>
                                <th><?= i("Taille"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
												$iFile = 0;
												while ($file = $get_files->fetch()) {
													$iFile++; ?>
                            <tr onclick="window.location='includes/dlFile.php?file=media/doc/<?= $file['source'] ?>'"
                                class="file <?php if ($iFile % 2 == 1) { ?>odd<?php } ?>" title="<?= $file['desc'] ?>">
                                <td><?= $file['nom'] ?></td>
                                <td><?= $file['ext'] ?></td>
                                <td><?= $file['size'] ?></td>
                            </tr>
                            <?php
												}
												?>
                        </tbody>
                    </table>
                </div>
                <br />
                <?php
								}
								?>

                <?= stripslashes(html_entity_decode(stripslashes($hist['desc_' . $lang]))); ?>
            </div>

        </div>

        <?php if ($hist['desc_' . $lang] != "") { ?>
        <div class="more plus"><?= i("Plus"); ?>...</div>
        <div style="clear:right"></div>
        <?php } else { ?>
        <div style="margin-top: 8px"></div>
        <?php } ?>

    </div>
    <?php
				}
				?>
</div>

<div class="span-11 center last" style="margin-top:15px">
    <?php
				if (getLastImgProject($project['PKNoProject']) != null) {
					$img = str_replace('../', '', getImgFromURL(getLastImgProject($project['PKNoProject']), 400));

					list($w, $h) = getimagesize($img);
				?>
    <div style="width:<?= $w ?>px; height:<?= $h ?>px; border-radius: 10px; margin:auto; position: relative"
        <?php if (file_exists(str_replace('400/', '', $img))) { ?>class="image" <?php } ?>>
        <img src="<?= $img ?>" alt="<?= stripslashes($project['title_' . $lang]) ?>" class="illustration photo"
            style="border-radius:9px; box-shadow: 1px 1px 1px 0px #999" />
        <input type="hidden" id="imgActuelle" value="<?= $img ?>" />
        <?php
						if ($img != "img/user.png") {
							$img = str_replace('400/', '', $img);
							if (file_exists($img)) {
								list($w, $h) = getimagesize($img); ?>
        <div url="<?= $img ?>" h="<?= $h ?>" w="<?= $w ?>" class="zoom"><?= i("Agrandir") ?></div>
        <?php
							}
						}
						?>
    </div>
    <?php
				} else { ?>
    <div class="no-img"><?= i("Projet sans image") ?></div>
    <?php }

				$get_files = $bdd->query(
					"SELECT * FROM tbl_history_documents
				WHERE FKNoProject=" . $_GET['id'] .
						" ORDER BY nom ASC"
				);
				if ($get_files->rowCount() > 0) { ?>
    <br />
    <div style="margin:auto; width:315px">
        <div class="btFileGest lst"><?= i("Liste des fichiers") ?></div>
        <div class="btFileGest down"><?= i("Télécharger les fichiers") . " (" . $get_files->rowCount() . ")" ?></div>
        <div style="clear:both"></div>
    </div>

    <form id="formDownProj" method="post" style="width:0;height:0;margin:0;padding:0">
        <input type="hidden" value="<?= $project['PKNoProject'] ?>" name="idProj" />
        <input type="submit" style="width:0px; height: 0px; opacity:0; visibility: hidden;" />
    </form>

    <table style="margin-bottom:0; margin-top: 6px; text-align:left; display: none" class="AllFiles">
        <thead>
            <tr>
                <th width="192"><?= i("Nom du fichier") ?></th>
                <th width="40"><?= i("Extension") ?></th>
                <th><?= i("Taille") ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
							$iFile = 0;
							while ($file = $get_files->fetch()) {
								$iFile++; ?>
            <tr onclick="window.location='includes/dlFile.php?file=media/doc/<?= $file['source'] ?>'"
                class="file <?php if ($iFile % 2 == 1) { ?>odd<?php } ?>" title="<?= $file['desc'] ?>">
                <td><?= $file['nom'] ?></td>
                <td><?= $file['ext'] ?></td>
                <td><?= $file['size'] ?></td>
            </tr>
            <?php
							} ?>
        </tbody>
    </table>
    <?php
				}
				?>
</div>

<style>
.btFileGest {
    float: left;
    margin-right: 8px;
    padding: 4px 10px;
    background: #ff6600;
    border-radius: 5px;
    color: white;
    cursor: pointer;
}

.btFileGest:hover {
    background: #ff4411;
}

.tipsy {
    font-family: Verdana, Geneva, sans-serif;
}

.more {
    font-size: 9px;
    font-family: Verdana, Geneva, sans-serif;
    text-align: center;
    width: 60px;
    float: right;
    margin-right: 4px;
    background: #333;
    line-height: 1.5em;
    color: white;
    margin-top: 8px;
    cursor: pointer;
    -moz-transition: all 0.2s linear;
}

.more.hover,
.more:hover {
    background: #000;
}

.history {
    border: 2px solid #333;
    margin-bottom: 7px;
    border-radius: 6px;
    padding: 5px;
    padding-bottom: 0;
    -moz-transition: all 0.2s linear;
    position: relative;
    background: rgba(255, 255, 255, 0.25);
}

.history.hover {
    border: 2px solid #000;
    background: #eee;
}

.download {
    box-shadow: inset 0px 0px 5px -1px white;
    background: #ddd;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
    -moz-tansition: all 0.1s linear;
    transition: all 0.1s linear;
    text-align: center;
}

.download:hover {
    background: #A4FFA4;
    box-shadow: inset 0px 0px 5px 0px #6C3;
    border: 1px solid #6c3;
}

.stu {
    float: left;
    padding: 1px 9px;
    border-radius: 6px;
    margin-left: 6px;
    margin-bottom: 6px;
    background: #000;
    box-shadow: 0px 0px 3px 0px #333 inset;
    color: white
}

.zoom {
    position: absolute;
    bottom: 0px;
    border-radius: 0px 0px 10px 10px;
    cursor: pointer;
    display: none;
    width: 100%;
    color: #eee;
    padding: 12px 0;
    font-weight: bold;
    font-size: 14pt;
    font-family: Verdana, Geneva, sans-serif;
    background: rgba(0, 0, 0, 0.75);
}

.no-img {
    width: 400px;
    height: 145px;
    background: #eee;
    margin-left: 20px;
    border-radius: 6px;
    font-weight: bold;
    font-family: Verdana, Geneva, sans-serif;
    font-size: 20px;
    padding-top: 105px;
    text-shadow: 1px 1px 0px #fff
}
</style>

<script>
$(function() {

    $('.image').hover(function() {
        $(".zoom").slideToggle("fast");
        $(this).css("cursor", "pointer").addClass("_slideshow");
    }, function() {
        $(".zoom").slideToggle("fast");
        $(this).css("cursor", "").removeClass("_slideshow");
    }).click(function() {
        $("a[rel^='prettyPhoto']:first").click();
    });

    $('.stu').tipsy({
        gravity: $.fn.tipsy.autoNS,
        html: true,
        opacity: 1
    });
    $('table.files tbody tr').tipsy({
        gravity: "n"
    });

    $(".history").mouseover(function() {
        $('img.illustration').attr("src", replaceAll($(this).attr("image"), '270/', '400/'));
    }).mouseout(function() {
        $('img.illustration').attr("src", $("#imgActuelle").val());
    });

    $('.more').hover(function() {
        $(this).toggleClass("hover");
        $(this).parent().toggleClass("hover");
    }, function() {
        $(this).toggleClass("hover");
        $(this).parent().toggleClass("hover");
    });

    $(".more").click(function() {
        $(".functions").slideUp("fast");
        $(".more").html("<?= i("Plus"); ?>...");
        $(".more").not($(this)).addClass("plus");

        if ($(this).hasClass("plus")) {
            $(this).removeClass("plus");
            $(this).html("<?= i("Moins"); ?>...");
            $(this).parent().find(".functions").slideDown("fast");
        } else {
            $(this).addClass("plus");
            $(this).html("<?= i("Plus"); ?>...");
            $(this).parent().find(".functions").slideUp("fast");
        }
    });

    $('.download').click(function() {
        $('#formDownDoc[hist="' + $(this).attr('hist') + '"]').submit();
    });

    // Survol du tableau
    $('table.files tr, table.AllFiles tr').hover(function() {
        $(this).addClass("hover");
    }, function() {
        $(this).removeClass("hover");
    });

    $(".btFileGest.lst").click(function() {
        if ($("table.AllFiles").css("display") == "none") {
            $("table.AllFiles").fadeIn("fast");
        } else {
            $("table.AllFiles").fadeOut("fast");
        }
    });
    $(".btFileGest.down").click(function() {
        $("#formDownProj").submit();
    });
});
</script>

<?php
		} else {
			refresh(0, '?p=projects');
		}
	} else {
		refresh(0, '?p=projects');
	}
} else {
	// Liste des projets
	include_once('includes/project_list.php');
}
?>