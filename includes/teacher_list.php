<?php
global $bdd;

$queryTxt = "SELECT * FROM tbl_teachers ORDER BY name, firstname";
$get_teachers = $bdd->query($queryTxt);
?>

<div style="float:left; width:240px">

    <div>
        <h2 style="margin-top:1em; margin-bottom: 14px"><?= i("Enseignants"); ?></h2>
        <!-- <p><?= i("Vous trouverez ici la liste de nos enseignants"); ?>.</p> -->
    </div>

    <div
        style="margin-top:10px; margin-left: -4px; margin-right: 35px; background: #ff6600; padding: 14px 0px 0px; padding-left: 15px; color: white; border-radius: 6px">
        <form method="post" style="" onsubmit="return false;">
            <div class="span-3" style="margin-bottom:1px"><label for="like"><?= i("Recherche"); ?></label></div>
            <div class="span-4" style="width:180px; margin-bottom:15px"><input type="text" value="" name="like"
                    id="like" autocomplete="off"></div>

            <div class="clear"></div>

        </form>
    </div>

</div>


<div class="span-11" style="width:625px; margin-left:5px; margin-right:0px;margin-top:25px">


    <?php $i = 0;
	while ($teach = $get_teachers->fetch()) {
		$i++;
		$get_proj = $bdd->query("SELECT * FROM tbl_history_teachers LEFT JOIN tbl_projects_history ON PKNoProjectHistory=FKNoHistory LEFT JOIN tbl_projects ON PKNoProject=FKNoProject WHERE FKNoTeacher=" . $teach['PKNoTeacher'] . " ORDER BY year DESC");

		$img = ($teach['FKNoMediaImage'] == null) ? "img/user_small.png" : getImg($teach['FKNoMediaImage'], "270");

		$attrTitle = "<div style='background:url(" . str_replace('../', '', $img) . ") no-repeat 50% 50%; width:120px; height:85px; background-size: cover; text-align:center; border-radius: 4px' align='center'></div>";
	?>

    <div title="<?= $get_proj->rowCount();
					echo " " . i("projets"); ?> " onclick="window.location='?p=teachers&id=<?= $teach['PKNoTeacher']; ?>'"
        titre="<?= $teach['firstname'] . $teach['name']; ?>" class="prof">

        <div align="center"><?= $attrTitle; ?></div>

        <div align="center" style="width:105%; margin-top: 3px">
            <a style="color:black" href="?p=teachers&id=<?= $teach['PKNoTeacher']; ?>">
                <?= $teach['name']; ?>
                <?= $teach['firstname']; ?>
            </a>
        </div>
    </div>

    <?php } ?>

    <div class="clear"></div>
</div>


<script>
$(function() {
    $(".prof").tipsy({
        gravity: "s"
    });

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

    // Formattages des titres pour la recherche instantanée
    $('.prof[titre]').each(function() {
        $(this).attr("titre", noAccent($(this).attr("titre")).toLowerCase());
    });

    // Recherche instantanée
    $("#like").keyup(function() {
        str = $("#like").val() != "" ? '[titre*="' + replaceAll(noAccent($(this).val()), ' ', '')
            .toLowerCase() + '"]' : ""

        $(".prof").css("display", "none");;
        $('.prof' + str).css("display", "");
        checkResult0('.prof' + str);
    });
});
// Indique qu'il n'y a aucun résultat si c'est le cas
function checkResult0(element) {
    if ($(element).size() == 0) {
        $(".void").css("display", "");
    } else {
        $(".void").css("display", "none");
    }
}
</script>

<style>
.prof {
    padding: 8px;
    background: #eee;
    border-radius: 10px;
    float: left;
    width: 129px;
    margin: 5px;
    margin-left: 0;
    cursor: pointer;
    -moz-transition: all 0.1s linear;
    transition: all 0.12s linear;
    overflow: hidden;
    border: 1px solid #ddd;
}

.prof:hover {
    background: #dfdfdf;
}

.tipsy {
    font-size: 10pt;
}
</style>