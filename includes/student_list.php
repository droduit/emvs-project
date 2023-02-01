<?php
global $bdd;

$queryTxt =
	"SELECT * FROM tbl_students
LEFT JOIN tbl_professions ON PKNoProfession=FKNoProfession
LEFT JOIN tbl_media_images ON FKNoMediaImage=PKNoMediaImage
ORDER BY YearEntree DESC, FKNoProfession ASC, name, firstname";
$get_students = $bdd->query($queryTxt);
?>

<style>
.prefix-1 {
    padding-left: 40px;
}

.suffix-1 {
    padding-right: 20px;
}
</style>

<script type="text/javascript" src="js/jquery-ui-1.9.1.js"></script>
<link rel="stylesheet" href="design/ui-lightness/jquery-ui-1.9.1.css" type="text/css">

<div style="float:left; width:240px">

    <div>
        <h2 style="margin-top:1em; margin-bottom: 14px"><?= i("Apprentis"); ?></h2>
    </div>

    <div
        style="margin-top:10px; margin-left: -4px; margin-right: 35px; background: #ff6600; padding: 14px 0px 0px; padding-left: 15px; color: white; border-radius: 6px">
        <form method="post" style="" onsubmit="return false;">
            <div class="span-3" style="margin-bottom:1px"><label for="like"><?= i("Mots clé"); ?></label></div>
            <div class="span-4" style="width:180px; margin-bottom:15px"><input type="text" value="" name="like"
                    id="like" autocomplete="off"></div>

            <div class="span-3" style="margin-bottom:2px"><label><?= i("Catégories"); ?></label></div>
            <div class="span-4" style="margin-bottom:15px">
                <input type="checkbox" value="1" name="profession_filter" id="profession_filter">
                <select name="profession" id="profession" class="blur">
                    <?php
					$get_professions = $bdd->query(
						"SELECT * FROM tbl_professions
			ORDER BY name_" . $_SESSION['language']
					);
					while ($prof = $get_professions->fetch()) { ?>
                    <option value="<?= $prof['PKNoProfession'] ?>"><?= $prof['name_' . $_SESSION['language']] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>


            <div class="span-3" style="margin-bottom:2px">
                <label><?= i("Début") ?></label>
            </div>
            <div class="span-4">
                <input type="checkbox" value="1" name="debut_filter" id="debut_filter">
                <select name="debut" id="debut" class="blur">
                    <?php
					$get_years = $bdd->query(
						"SELECT yearEntree as year FROM tbl_students
			WHERE yearEntree IS NOT null
			GROUP BY yearEntree
			ORDER BY yearEntree DESC
			LIMIT 8"
					);
					while ($yearD = $get_years->fetch()) { ?>
                    <option value="<?= $yearD['year'] ?>"><?= $yearD['year'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="clear"></div>

        </form>
    </div>

</div>

<div class="span-11" style="width:625px; margin-left:5px; margin-right:0px;margin-top:25px">
    <table class="projects" style="width:auto; border-collapse:separate;border-radius: 5px">
        <thead>
            <tr>
                <th width="150"><?= i("Nom") ?></th>
                <th width="150"><?= i("Prénom") ?></th>
                <th width="100"><?= i("Profession") ?></th>
                <th width="120"><?= i("Années de formation") ?></th>
            </tr>
        </thead>

        <tbody>
            <tr class="void" style="display:none">
                <td colspan="3"><?= i("Aucun résultat"); ?></td>
            </tr>
            <?php
			$i = 0;
			$year = 0;
			while ($stu = $get_students->fetch()) {
				$i++;
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

				if ($year != $stu['YearEntree']) {
					$yearF = $formation != i("Indéfini") ? $stu['YearEntree'] : $formation;
					$styleDebut = empty($year) ? "" : "border-top:2px solid #FF4411";
					$separateur = '<tr year="' . $yearF . '" class="annees"><td style="' . $styleDebut . '; background-color: #Ffd9c1; font-family: arial,sans-serif; font-size: 12px; padding-top: 3px; border-bottom:2px solid #FF4411; font-weight:bold;" colspan="4">' . $yearF . '</td><tr>';
					$i = 0;
				} else {
					$separateur = "";
				}
				$year = $stu['YearEntree'] != null ? $stu['YearEntree'] : 0;

				echo $separateur;

				$attrTitle = "";
				if (getImg($stu['FKNoMediaImage']) != "false") {
					$imgsize = getimagesize(str_replace('../', '', getImg($stu['FKNoMediaImage'])));
					$type = $imgsize[1] > $imgsize[0] ? "portrait" : "paysage";
					$attrTitle = "<div style='background:url(" . str_replace('../', '', getImg($stu['FKNoMediaImage'])) . ") no-repeat 50% 50%; width:220px; height:";
					$attrTitle .= ($type == "portrait") ? "280px" : "200px";
					$attrTitle .= "; background-size: cover'></div>";
				}
			?>
            <tr class="project <?php if ($i % 2 == 0) { ?>odd<?php } ?>" intoProf="<?= $stu['FKNoProfession'] ?>"
                titre="<?= $stu['firstname'] . $stu['name'] ?>" yearDebut="<?= $stu['YearEntree'] ?>"
                yearFin="<?= $stu['YearSortie'] ?>" title="<?= $attrTitle ?>">
                <td><a href="?p=students&id=<?= $stu['PKNoStudent'] ?>"><?= $stu['name'] ?></a></td>
                <td><a href="?p=students&id=<?= $stu['PKNoStudent'] ?>"><?= $stu['firstname'] ?></a></td>
                <td align="center"><?= $stu['name_' . $_SESSION['language']] ?></td>
                <td align="center"><?= $formation; ?></td>
            </tr>
            <?php

			} ?>

        </tbody>
    </table>
</div>


<script>
$(function() {
    $('table tr:has(a)').hover(
        function() {
            $(this).addClass('hover');
        },
        function() {
            $(this).removeClass('hover');
        }
    ).click(function() {
        $(this).removeClass('hover');
        window.location.href = $('a', this).attr('href');
        return false;
    });

    // Activation des liste déroulantes sur clique des cases a cocher
    $('#profession_filter,#debut_filter').click(function() {
        id = "#" + $(this).attr('id').replace('_filter', '');
        if ($(this).is(":checked")) {
            $(id).removeClass('blur');
            $(id).trigger('focus');
        } else {
            $(id).addClass('blur');

            if (!$('#profession_filter').is(":checked") && !$('#debut_filter').is(":checked")) {
                // Les deux cases sont décochées
                $("#like").keyup();
            } else {
                // Une seul des deux case est décochée
                if ($("#profession_filter").is(":checked")) {
                    $("#profession").trigger("change");
                } else {
                    $("#debut").trigger("change");
                }
            }
        }
    });

    $('#profession,#debut').focus(function() {
        $("#" + $(this).attr("id") + "_filter").attr("checked", "checked");
        $("#" + $(this).attr("id")).removeClass('blur');

        if ($("#" + $(this).attr("id") + ' option[checked]').attr("value") != $("#" + $(this).attr(
                "id")).val()) {
            $("#" + $(this).attr("id")).trigger('change');
        }
    });

    // Selection d'une profession précise
    $('#profession').change(function() {
        if ($("#like").val() != "") {
            $("tr.annees[year]").css("display", "none");
        } else if ($("#debut_filter").is(":checked")) {
            $("tr.annees[year]").css("display", "none");
            $("tr.annees[year=\"" + $("#debut").val() + "\"]").css("display", "");
        } else {
            $("tr.annees[year]").css("display", "");
        }

        str = '[intoProf*="' + $(this).val() + '"]';
        if ($("#like").val() != "") {
            str += '[titre*="' + replaceAll(noAccent($("#like").val()), ' ', '').toLowerCase() + '"]';
        }
        if ($("#debut_filter").is(":checked")) {
            str += '[yearDebut*="' + $("#debut").val() + '"]';
        }

        $("tr.project").css("display", "none");
        $('tr.project' + str).css("display", "");


        $(".nbProj").html($('tr.project' + str).size());
        $('.pagination').fadeOut("fast");

        $('tr.project.odd').removeClass("odd");
        $('tr.project' + str + ':odd').addClass("odd");

        checkResult0('tr.project' + str);
    });

    // Selection d'une année de début
    $('#debut').change(function() {
        $("tr.annees[year]").css("display", "none");
        $("tr.annees[year=\"" + $(this).val() + "\"]").css("display", "");

        str = '[yearDebut*="' + $(this).val() + '"]';
        if ($("#like").val() != "") {
            str += '[titre*="' + replaceAll(noAccent($("#like").val()), ' ', '').toLowerCase() + '"]';
        }
        if ($("#profession_filter").is(":checked")) {
            str += '[intoProf*="' + $("#profession").val() + '"]';
        }

        $("tr.project").css("display", "none");
        $('tr.project' + str).css("display", "");


        $(".nbProj").html($('tr.project' + str).size());
        $('.pagination').fadeOut("fast");

        $('tr.project.odd').removeClass("odd");
        $('tr.project' + str + ':odd').addClass("odd");

        checkResult0('tr.project' + str);
    });

    // Formattages des titres pour la recherche instantanée
    $('tr[titre]').each(function() {
        $(this).attr("titre", noAccent($(this).attr("titre")).toLowerCase());
    });

    // Recherche instantanée
    $("#like").keyup(function() {
        if ($("#like").val() != "") {
            str = '[titre*="' + replaceAll(noAccent($(this).val()), ' ', '').toLowerCase() + '"]';
            $("tr.annees").css("display", "none");
        } else {
            str = "";
            if ($("#debut_filter").is(":checked")) {
                $("tr.annees[year]").css("display", "none");
                $("tr.annees[year=\"" + $("#debut").val() + "\"]").css("display", "");
            } else {
                $("tr.annees").css("display", "");
            }
        }

        if ($("#profession_filter").is(":checked")) {
            str += '[intoProf*="' + $("#profession").val() + '"]';
        }
        if ($("#debut_filter").is(":checked")) {
            str += '[yearDebut*="' + $("#debut").val() + '"]';
        }

        $("tr.project").css("display", "none");
        $(".nbProj").html($('tr.project' + str).size());
        $('tr.project' + str).css("display", "");
        checkResult0('tr.project' + str);
        $('tr.project.odd').removeClass("odd");
        $('tr.project' + str + ':odd').addClass("odd");

    });
});
// Indique qu'il n'y a aucun résultat si c'est le cas
function checkResult0(element) {
    if ($(element).size() == 0) {
        $("table.projects tr.void").css("display", "");
        $("tr.annees[year]").css("display", "none");
    } else {
        $("table.projects tr.void").css("display", "none");
    }
}
</script>