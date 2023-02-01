<?php
global $bdd;

$lang = ($_SESSION['language'] != "fr" && $_SESSION['language'] != "de") ? "fr" : $_SESSION['language'];

$get_projects = $bdd->query(
	"SELECT * FROM tbl_projects
	WHERE archive IS NULL
	ORDER BY title_" . $lang . " ASC"
);
?>

<div class="wrapTitle" style="margin-bottom: 15px; padding-bottom:0">
    <h1><?= i("Projets") ?></h1>

    <div style="border-top:2px dashed #FFCB97; margin: 18px 0px"></div>

    <form method="post" style="margin:auto; margin-bottom:0px; width:526px;" onsubmit="return false;">
        <div class="span-3" style="text-align:left; padding:0px 20px; width:56px;margin-right:0">
            <label for="like"><?= i("Recherche") ?></label>
        </div>
        <div class="span-5" style="width:160px; padding:0">
            <input type="text" value="" name="like" id="like" autocomplete="off">
        </div>


        <div class="span-4">
            <input type="checkbox" value="1" name="profession_filter" id="profession_filter">
            <select name="profession" id="profession" class="blur">
                <?php
				$get_professions = $bdd->query(
					"SELECT * FROM tbl_professions
		ORDER BY name_" . $_SESSION['language']
				);
				while ($prof = $get_professions->fetch()) { ?>
                <option value="<?= $prof['PKNoProfession'] ?>"><?= $prof['name_' . $_SESSION['language']] ?></option>
                <?php
				}
				?>
            </select>
        </div>

        <div class="span-4" style="width:90px">
            <input type="checkbox" value="1" name="year_filter" id="year_filter"><select name="year" id="year"
                class="blur">
                <?php
				for ($i = getFirstProjectDate("MAX"); $i >= getFirstProjectDate(); $i--) { ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
                <?php
				} ?>
            </select>
        </div>

        <div class="clear"></div>

    </form>

</div>

<div class="span-6">
    <?= i("Nombre de projets") ?>&nbsp;:&nbsp;
    <span class="nbProj" original="<?= $get_projects->rowCount() ?>"><?= $get_projects->rowCount() ?></span>
</div>

<div class="pagination span-16 right last">

    <a class="previousPage enable">«&nbsp;<?= i("précédent") ?></a>

    <?php
	$lastPage = $get_projects->rowCount() / 10;

	for ($i = 1; $i <= $lastPage; $i++) { ?>
    <a class="page" noPage="<?= $i ?>"><?= $i ?></a>
    <?php
	} ?>

    <a class="nextPage enable"><?= i("suivant"); ?>&nbsp;»</a>

</div>


<div class="span-22 last">
    <table class="projects" style="width:auto; border-collapse:separate;border-radius: 5px">
        <thead>
            <tr>
                <th><?= i("Titre") ?></th>
                <th><?= i("Description") ?></th>
                <th width="50px"><?= i("Année") ?></th>
            </tr>
        </thead>

        <tbody>
            <tr class="void" style="display:none">
                <td colspan="3"><?= i("Aucun résultat") ?></td>
            </tr>
            <?php
			$i = 0;
			while ($proj = $get_projects->fetch()) {

				$get_hist = $bdd->query(
					"SELECT * FROM tbl_projects_history
		WHERE FKNoProject=" . $proj['PKNoProject'] .
						" ORDER BY year DESC, FKNoPeriode DESC
		LIMIT 1"
				);
				$hist = $get_hist->fetch();

				$desc = $hist['desc_' . (empty($hist['desc_' . $lang]) ? "fr" : $lang)] ?? "";
				$desc = html_entity_decode(stripslashes($desc ?? ""));
				$desc = strip_tags(strpos($desc, '.') ? substr($desc, 0, strpos($desc, '.') + 1) : $desc);
				$desc = stripslashes($desc);

				$get_years = $bdd->query(
					"SELECT year FROM tbl_projects_history
		WHERE FKNoProject=" . $proj['PKNoProject'] .
						" GROUP BY year
		ORDER BY year asc"
				);
				$years = "";
				$intoYears = "";
				while ($year = $get_years->fetch()) {
					if ($get_years->rowCount() > 1) {
						$years .= substr($year['year'], -2) . ", ";
					} else {
						$years = $year['year'] . ", ";
					}
					$intoYears .= $year['year'] . ", ";
				}
				$years = substr($years, 0, -2);

				$rang = substr(number_format(($i / 10) + 1, 1), 0, strpos(number_format(($i / 10) + 1, 1), '.'));

				$profession = "";
				$idProf = "";

				// On récupère la profession pour le projet
				$get_profession = $bdd->query("SELECT PKNoProfession, name_" . $_SESSION['language'] . ", year FROM tbl_projects_history
                                   LEFT JOIN tbl_history_students ON PKNoProjectHistory=FKNoHistory
                                   LEFT JOIN tbl_students ON PKNoStudent=FKNoStudent
                                   LEFT JOIN tbl_professions ON PKNoProfession=tbl_students.FKNoProfession
                                   WHERE FKNoProject=" . $proj['PKNoProject'] . "
                                   GROUP BY PKNoProfession, name_" . $_SESSION['language'] . ", year
								   ORDER BY name_" . $_SESSION['language'] . " ASC
                                   ");

				if ($get_profession->rowCount() < 1) {
					$profession = "-";
					$idProf = "0";
				} else {
					while ($prof = $get_profession->fetch()) {
						$name = $prof["name_" . $_SESSION['language']];
						$profession .= ($get_profession->rowCount() > 1) ? substr($name, 0, 4) . " - " : $name . " - ";
						$idProf .= $prof['PKNoProfession'];
					}
					$profession = substr($profession, 0, -3);
				}
				if ($idProf == "") {
					$idProf = "0";
				}

				$img = empty($hist['FKNoMediaImage']) ? "" : str_replace('../', '', getImg($hist['FKNoMediaImage']));
				$attrTitle = "";
				if ($img != "") {
					$attrTitle = "<div style='background:url(" . $img . ") no-repeat 50% 50%; width:160px; height:120px; background-size: cover'></div>";
				}


				$titre = stripslashes($proj['title_' . (empty($proj['title_' . $lang]) ? 'fr' : $lang)]);
			?>
            <tr title="<?= $attrTitle; ?>" class="project <?php if ($i % 2 == 1) { ?>odd<?php } ?>"
                intoPage="<?= $rang ?>" intoProf="<?= $idProf ?>" intoYear="<?= $intoYears ?>"
                titre="<?= str_replace(' ', '', stripslashes($proj['title_' . $lang]) . $desc) ?>">
                <td><a class="link" href="?p=projects&id=<?= $proj['PKNoProject'] ?>"><?= $titre ?></a></td>
                <td><?= $desc; ?></td>
                <td align="center"><?= $years ?></td>
            </tr>
            <?php $i++;
			} ?>

        </tbody>
    </table>
</div>

<div style="clear:both"></div>
<input type="hidden" id="page" value="1" />

<script>
$(function() {
    $('tr').tipsy({
        gravity: $.fn.tipsy.autoNS,
        html: true,
        live: true,
        opacity: 1
    });

    // Choix d'une page précise
    $('a.page').click(function() {
        $("tr.project").css("display", "none");
        $('tr.project[intoPage="' + $(this).attr("noPage") + '"]').css("display", "");

        $('tr.project.odd').removeClass("odd");
        $('tr.project[intoPage="' + $(this).attr("noPage") + '"]:odd').addClass("odd");

        $('a.page').removeClass("selected");
        $(this).addClass("selected");
        $("#page").val($(this).attr("noPage"));

        $('.nbProj').html($('.nbProj').attr('original'));

        if (parseInt($("#page").val()) == $('a.page:last').attr("noPage")) {
            $(".nextPage.enable").removeClass("enable");
        } else {
            $(".nextPage").addClass("enable");
        }
        if (parseInt($("#page").val()) == $('a.page:first').attr("noPage")) {
            $(".previousPage.enable").removeClass("enable");
        } else {
            $(".previousPage").addClass("enable");
        }
    });

    // Page suivante
    $(".nextPage.enable").click(function() {
        var nopage = parseInt($("#page").val()) + 1;
        $('a.page[noPage="' + nopage + '"]').trigger('click');
    });

    // Page précédente
    $(".previousPage.enable").click(function() {
        var nopage = parseInt($("#page").val()) - 1;
        $('a.page[noPage="' + nopage + '"]').trigger('click');
    });

    // Affichage de la page 1 au chargement
    $('a.page[noPage="1"]').trigger('click');

    // Activation des liste déroulantes sur clique des cases a cocher
    $('#profession_filter, #year_filter').click(function() {
        const id = "#" + $(this).attr('id').replace('_filter', '');
        if ($(this).is(":checked")) {
            $(id).removeClass('blur');
            $(id).trigger('focus');
        } else {
            $(id).addClass('blur');

            if (!$('#profession_filter, #year_filter').is(":checked")) {
                // Les deux cases sont décochées
                $('.pagination').fadeIn("fast");
                $("tr.project").css("display", "none");
                $('a.page[noPage="' + $("#page").val() + '"]').trigger("click");
            } else {
                // Une seul des deux case est décochée
                if ($("#profession_filter").is(":checked")) {
                    $("#profession").trigger("change");
                } else {
                    $("#year").trigger("change");
                }
            }
        }
    });
    $('#profession, #year').focus(function() {
        const id = "#" + $(this).attr("id");
        $(id + "_filter").attr("checked", "checked");
        $(id).removeClass('blur');

        if ($(id + ' option[checked]').attr("value") != $("#" + $(this).attr("id")).val()) {
            $(id).trigger('change');
        }
    });

    // Selection d'une année précise
    $('#year').change(function() {
        str = '[intoYear*="' + $(this).val() + '"]';
        if ($("#profession_filter").is(":checked")) {
            str += '[intoProf*="' + $("#profession").val() + '"]';
        }
        if ($("#like").val() != "") {
            str += '[titre*="' + replaceAll(noAccent($("#like").val()), ' ', '').toLowerCase() + '"]';
        }

        $("tr.project").css("display", "none");
        $('tr.project' + str).css("display", "");

        $(".nbProj").html($('tr.project' + str).size());
        $('.pagination').fadeOut("fast");

        $('tr.project.odd').removeClass("odd");
        $('tr.project' + str + ':odd').addClass("odd");

        checkResult0('tr.project' + str);
    });

    // Selection d'une profession précise
    $('#profession').change(function() {
        str = '[intoProf*="' + $(this).val() + '"]';
        if ($("#year_filter").is(":checked")) {
            str += '[intoYear*="' + $("#year").val() + '"]';
        }
        if ($("#like").val() != "") {
            str += '[titre*="' + replaceAll(noAccent($("#like").val()), ' ', '').toLowerCase() + '"]';
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
    $('tr.project[titre]').each(function() {
        $(this).attr("titre", noAccent($(this).attr("titre")).toLowerCase());
    });

    // Recherche instantanée
    $("#like").keyup(function() {
        if ($("#like").val() != "") {
            str = '[titre*="' + replaceAll(noAccent($(this).val()), ' ', '').toLowerCase() + '"]';
        } else {
            str = "";
        }

        if ($("#year_filter").is(":checked")) {
            str += '[intoYear*="' + $("#year").val() + '"]';
        }
        if ($("#profession_filter").is(":checked")) {
            str += '[intoProf*="' + $("#profession").val() + '"]';
        }

        $('.pagination').fadeOut("fast");
        $("tr.project").css("display", "none");
        $(".nbProj").html($('tr.project' + str).size());
        $('tr.project' + str).css("display", "");
        checkResult0('tr.project' + str);
        $('tr.project.odd').removeClass("odd");
        $('tr.project' + str + ':odd').addClass("odd");
    });

    // Survol du tableau
    $('table.projects tbody tr').hover(function() {
        $(this).addClass("hover");
    }, function() {
        $(this).removeClass("hover");
    });

    // Clique sur une ligne du tableau
    $("table.projects tbody tr").click(function() {
        window.location = $(this).find('td a.link').attr("href");
    });
});

// Indique qu'il n'y a aucun résultat si c'est le cas
function checkResult0(element) {
    $("table.projects tr.void").css("display", $(element).size() == 0 ? "" : "none");
}
</script>

<style>
#content a.page {
    cursor: pointer
}

#content a.page.selected {
    font-weight: bold;
    color: black;
}

#content a.page.selected:hover {
    text-decoration: none;
    cursor: default;
}

#content a.previousPage,
#content a.nextPage {
    color: black;
    opacity: 0.4;
}

#content a.previousPage:hover,
#content a.nextPage:hover {
    cursor: default;
    text-decoration: none;
}

#content a.previousPage.enable,
#content a.nextPage.enable {
    color: #004352;
    cursor: pointer;
    opacity: 1;
}

#content a.previousPage.enable:hover,
#content a.nextPage.enable:hover {
    text-decoration: underline;
}

.tipsy {
    font-size: 11px;
    font-family: Verdana, Geneva, sans-serif;
}
</style>