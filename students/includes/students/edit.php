<?php
global $bdd;

if (isset($_POST['image'])) {
	require_once('../../../admin/conf/mysql.php');
	require_once('../../conf/common.php');

	$get_student_login = $bdd->query("SELECT * FROM students_login WHERE PKNoMembre='" . getID($_POST['id']) . "'");
	$stu_login = $get_student_login->fetch();

	$get_student = $bdd->query("SELECT * FROM tbl_students LEFT JOIN tbl_professions ON FKNoProfession=PKNoProfession WHERE email='" . $stu_login['email'] . "'");
	$stu = $get_student->fetch();

	// Ajout de l'image au projet
	$bdd->exec("UPDATE tbl_students SET FKNoMediaImage=" . $_POST['image'] . " WHERE PKNoStudent=" . $stu['PKNoStudent']);
	echo "Nouvelle image assignée." . " <i>" . "Recharger la page" . "</i>";

	// ICI, supprimer l'image puisqu'on la détache...
	require_once('../../../admin/includes/imageLoader/conf.php');
	$urlOldImg = str_replace('../media/photo/', '', str_replace('270/', '', getImg($stu['FKNoMediaImage'])));
	if (file_exists("../../../media/photo/" . $urlOldImg)) {
		unlink("../../../media/photo/" . $urlOldImg);
	}
	foreach ($grandeurs_img as $gr_i) {
		if (file_exists("../../../media/photo/" . $gr_i . "/" . $urlOldImg)) {
			unlink("../../../media/photo/" . $gr_i . "/" . $urlOldImg);
		}
	}
} else {

	$get_student_login = $bdd->query("SELECT * FROM students_login WHERE PKNoMembre='" . getID($_SESSION['login']) . "'");
	$stu_login = $get_student_login->fetch();

	$get_student = $bdd->query("SELECT * FROM tbl_students LEFT JOIN tbl_professions ON FKNoProfession=PKNoProfession WHERE email='" . $stu_login['email'] . "'");
	$stu = $get_student->fetch();

	if (($stu['PKNoStudent'] ?? null) != null) {
		$proj = $bdd->query("SELECT name, firstname, email, YearEntree, YearSortie, FKNoProfession, name_fr, name_de FROM tbl_students INNER JOIN tbl_professions ON FKNoProfession=PKNoProfession WHERE PKNoStudent=" . $stu['PKNoStudent']);
		$projet = $proj->fetch();
		$name = 'name_' . language;
	}
?>

<form method="POST" action="" class="form" novalidate="novalidate" onsubmit="return submitAll();">

    <div style="float:left">
        <div class="block medium">
            <div class="titlebar">
                <h3><?= i("Vos informations"); ?></h3>
            </div>
            <div class="block_cont">
                <div class="form_row" style="float:left; margin-right: 15px;">
                    <label><?= i("Nom"); ?></label>
                    <input maxlength="45" type="text" placeholder="<?= i("Nom"); ?>" id="req" name="name"
                        style="width: 207px;" class="input validate[required] tipRight" value="<?php if (isset($stu['PKNoStudent'])) {
																																															echo $projet['name'];
																																														} ?>" tabindex="1">
                </div>

                <div class="form_row" style="float:left; margin-right: 15px;">
                    <label><?= i("Prénom"); ?></label>
                    <input maxlength="45" type="text" placeholder="<?= i("Prénom"); ?>" id="req" name="firstname"
                        style="width: 207px;" class="input validate[required] tipRight" value="<?php if (isset($stu['PKNoStudent'])) {
																																																	echo $projet['firstname'];
																																																} ?>" tabindex="2" />
                </div>


                <div class="form_row" style="float:left; margin-right: 15px;">
                    <label><?= i("Profession"); ?></label>


                    <select name="profession" style="padding: 6px 10px; border-radius: 4px; border:1px solid #8E9BAC;"
                        tabindex="4">
                        <?php
							$get_profession = $bdd->query("SELECT * FROM tbl_professions");
							while ($prof = $get_profession->fetch()) {
								echo '<option value="' . $prof['PKNoProfession'] . '"';
								if ($projet['FKNoProfession'] ?? 0 == $prof['PKNoProfession']) {
									echo 'selected="selected"';
								}
								echo '>' . ($prof[$name ?? 0] ?? "") . '</option>';
							}
							?>
                    </select>
                </div>

                <div style="clear:both"></div>

                <div style="border-top: 2px dashed #E6E6E6; margin: 15px 0px;"></div>


                <div style="width:510px; margin:auto">

                    <div class="form_row" style="float:left; margin-right: 15px; width: 240px">
                        <label style="display:inline"><?= i("Entrée à l'école en"); ?></label>


                        <select name="yearEntree"
                            style="padding: 6px 10px; border-radius: 4px; border:1px solid #8E9BAC;" tabindex="5">
                            <option <?php if (($projet['YearEntree'] ?? null) == null) { ?>selected="selected"
                                <?php } ?> value="NULL">-</option>

                            <?php
								for ($i = date('Y'); $i >= 2000; $i--) {
									echo '<option value="' . $i . '"';
									if (($projet['YearEntree'] ?? null) == $i) {
										echo ' selected="selected" ';
									}
									echo '>' . $i . '</option>';
								}
								?>
                        </select>
                    </div>

                    <div class="form_row" style="float:left; margin-right: 15px; width: 240px">
                        <label style="display:inline"><?= i("Terminera sa formation en"); ?></label>


                        <select name="yearSortie"
                            style="padding: 6px 10px; border-radius: 4px; border:1px solid #8E9BAC;" tabindex="6">
                            <option <?php if (($projet['YearSortie'] ?? null) == NULL) { ?>selected="selected"
                                <?php } ?> value="NULL">-</option>

                            <?php
								for ($i = date('Y') + 5; $i >= 2000; $i--) {
									echo '<option value="' . $i . '"';
									if (($projet['YearSortie'] ?? null) == $i) {
										echo ' selected="selected" ';
									}
									echo '">' . $i . '</option>';
								}
								?>
                        </select>
                    </div>

                </div>


                <div style="clear:both"></div>


            </div>

        </div>

        <div style="clear:both"></div>

        <div
            style="background: rgba(255,255,255,0.2); margin-bottom:10px; width: 630px; margin-left: 5px; border-radius: 4px">
            <input style="margin-right:-1px" class="float_right btSubmit" value="<?= i("Enregistrer"); ?>" type="submit"
                tabindex="7">
            <div style="clear:both;"></div>
        </div>

    </div>
</form>


<div class="block small">
    <div class="titlebar tipsyManual"
        <?php if (isset($_GET['first'])) { ?>title="<?= '<b>' . i("Choisissez maintenant une image") . "</b>"; ?>"
        <?php } ?>>
        <h3><?= i("Photo"); ?></h3>
    </div>
    <div class="block_cont">
        <?php
			if (($stu['PKNoStudent'] ?? null) != NULL) {
				// Sélection de l'image liée à l'élève
				$get_images = $bdd->query("SELECT FKNoMediaImage FROM tbl_students WHERE PKNoStudent=" . $stu['PKNoStudent']);
				$img = $get_images->fetch();
			?>

        <div id="imageArea" <?php if (getImg($img['FKNoMediaImage']) != "false") { ?>style="display:none" <?php } ?>>

            <div class="pseudo-file">
                <?= i("Sélectionner une image (.jpg)"); ?>
            </div>

            <form class="formimport" enctype="multipart/form-data" method="post">
                <div align="center">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <input type="file" style=" position:relative; opacity: 0; cursor:pointer" name="image" class="file"
                        id="inputImg" />
                    <input type="submit" value="<?= i("Uploader"); ?>" class="btImporter" />
                </div>
            </form>

        </div>

        <?php if (getImg($img['FKNoMediaImage']) != "false") { ?>
        <div align="center" id="imgView">
            <div class="gallery_item" style="float:none; margin:2px">
                <div
                    style="background: url(<?= "../media/photo/" . getImg($img['FKNoMediaImage'], 400); ?>) no-repeat 50% 50%; background-size: cover; height:150px; width: 200px">
                </div>
                <div class="actionbar" style="bottom:5px; top:auto; left:6px;">
                    <a class="action edit" style="cursor:pointer"><span><?= i("Changer"); ?></span></a>
                    <a class="action delete" style="cursor:pointer"><span><?= i("Détacher"); ?></span></a>
                </div>
            </div>
        </div>
        <?php
				} ?>

        <?php
			} else {
				echo 'Ce compte élève n\'est pas reconnu';
			} ?>

    </div>
</div>

<?php
	if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

		if ($_FILES['image']['size'] <= 6291456) {
			$filename = "stu_" . getID($_SESSION['login']) . "-" . date("Ymj_His") . ".jpg";
			move_uploaded_file($_FILES['image']['tmp_name'], "../media/photo/" . $filename);

			require_once('../admin/includes/imageLoader/conf.php');
			@set_time_limit(5 * 60);

			$grandeurs_img = array_reverse($grandeurs_img);
			$path = str_replace('../../', '', $upload_dir);

			$fileName = $filename;

			// =========================================================================
			// =================== Génération des miniatures de l'image ================
			// =========================================================================
			require_once("../admin/plugins/plupload/edit/fctredimimage.php"); // Redimensionnement physique

			$dimensions = getimagesize($path . $fileName);

			$largeur = $dimensions[0];
			$hauteur = $dimensions[1];

			if ($largeur < $hauteur) {
				$format = "portrait";
			} else {
				$format  = "paysage";
			}

			$position = -1;
			foreach ($grandeurs_img as $gr_i) {
				$position++;
				// if ($position==1) { unlink($path.$fn); }

				if ($position != 0) {
					$path_src = $path . $grandeurs_img[$position - 1] . "/";
				} else {
					$path_src = $path;
				}

				if ($format == "paysage") {
					if ($largeur < $gr_i) {
						copy($path_src . $fileName, $path . $gr_i . "/" . $fileName);
					} else {
						fctredimimage($gr_i, $gr_i, $path . $gr_i . "/", '', $path_src, $fileName);
					}
				}

				if ($format == "portrait") {
					if ($hauteur > $gr_i) {
						fctredimimage($gr_i, $gr_i, $path . $gr_i . "/", '', $path_src, $fileName);
					} else {
						copy($path_src . $fileName, $path . $gr_i . "/" . $fileName);
					}
				}
			}

			// Suppression de l'ancienne image
			$urlOldImg = str_replace('270/', '', getImg($stu['FKNoMediaImage']));
			if (file_exists("../media/photo/" . $urlOldImg)) {
				unlink("../media/photo/" . $urlOldImg);
			}
			foreach ($grandeurs_img as $gr_i) {
				if (file_exists("../media/photo/" . $gr_i . "/" . $urlOldImg)) {
					unlink("../media/photo/" . $gr_i . "/" . $urlOldImg);
				}
			}

			// Mise a jour dans la base de donnée
			$bdd->exec("INSERT INTO tbl_media_images VALUES(NULL, '" . $filename . "', now(), " . getImgDirectory("Eleves") . ")");
			$bdd->exec("UPDATE tbl_students SET FKNoMediaImage=" . $bdd->lastInsertId() . " WHERE PKNoStudent=" . $stu['PKNoStudent']);

	?>
<script>
$(function() {
    window.location = '?p=students~edit';
});
</script>
<?php
		} else {
			echo i('Taille maximal autorisée : 6 Mo');
		}
	}
	?>

<div id="fileSize" style="display:none"></div>

<style>
.pseudo-file {
    width: 210px;
    background: #B9DCFF;
    padding: 5px 10px;
    position: absolute;
    left: 38px;
    top: 51px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.2s linear;
    -moz-transition: all 0.2s linear;
    text-align: center;
}

.pseudo-file.in {
    background: #80BFFF;
}

.pseudo-file.check {
    background: #9F6;
}

.btImporter {
    padding: 5px 10px;
    background: #004891;
    color: white;
    border-radius: 8px;
    margin-top: 7px;
    cursor: pointer;
}

.btImporter:hover {
    background: #003;
}
</style>

<script>
function getFileSize(inputFile) {
    var files = inputFile.files;

    if (!files) {
        //for IE
        try {
            var fs = new ActiveXObject('Scripting.FileSystemObject');
            var file = fs.getFile(inputFile.value);
            return file.size;
        } catch (ex) {
            return -1;
        }

    } else if (files.length > 0) {
        //for rest of the world
        return files[0].size;
    }
}

$(function() {
    $('input[name="name"]').focus().select();

    // Actions sur l'image déjà liés, soit on change l'image soit on la détache 
    $(".action.edit").click(function() {
        $("#imgView").effect("drop");
        setTimeout(function() {
            $("#imageArea").effect("slide");
        }, 412);
    });

    $(".action.delete").click(function() {
        $.post('includes/students/edit.php', {
                image: "NULL",
                id: "<?= $_SESSION['login']; ?>"
            },
            function(html) {
                $(".action.edit").trigger("click");
                $(".coveredImg").removeClass("selected");
                notify("<?= i("L'image a été détachée avec succès"); ?>.");
            });
    });
    // ----------------------------------------------------------------------

    $(".file").css("opacity", "0").hover(function() {
        $(".pseudo-file").addClass("in");
    }, function() {
        $(".pseudo-file").removeClass("in");
    }).change(function() {
        var ext = $(this).val().substring(parseInt($(this).val().length) - 3, $(this).val().length);
        var elm = $(this);
        setTimeout(function() {
            if (parseInt($("#fileSize").text()) <= 6000) {
                if (ext == "jpg" || ext == "JPG" || ext == "jpeg" || ext == "JPEG") {
                    $(".pseudo-file").html($(elm).val()).css("cursor", "default").addClass(
                        "check");
                    $(elm).css({
                        visibility: "hidden"
                    });
                } else {
                    alert("<?= i("Le fichier doit être au format") . " .jpg"; ?>");
                }
            } else {
                alert("<?= i("Taille max. pour les images : 6 Mo"); ?>");
            }
        }, 100);
    });

    $(".formimport").submit(function() {
        if ($(".pseudo-file").hasClass("check")) {
            return true;
        } else {
            return false;
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var inputImg = document.getElementById('inputImg');
    inputImg.addEventListener('change', function(e) {
        var fileSize = getFileSize(inputImg);
        if (fileSize > -1)
            document.getElementById('fileSize').innerHTML = (fileSize / 1024).toFixed(2);
        else
            document.getElementById('fileSize').innerHTML = "-1";
    }, false);
}, false);

//Enregistrement des modifications
function submitAll() {
    $.post('includes/students/update_recorder.php', {
        name: name_format($('input[name="name"]').val()),
        firstname: name_format($('input[name="firstname"]').val()),
        yearEntree: $('select[name="yearEntree"]').val(),
        yearSortie: $('select[name="yearSortie"]').val(),
        profession: $('select[name="profession"]').val(),
        login: "<?= $_SESSION['login']; ?>",
        language: "<?= language; ?>"
    }, function(html) {
        if (html.substring(0, 5) != "Error") {
            notify("Informations mises à jour.");
        } else {
            notify(html);
        }
    });
    return false;
}
</script>
<?php
} ?>