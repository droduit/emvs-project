<?php
$pageName = "pdfGenerator";
if (isset($_POST['running'])) {
    require_once("../conf/common.php");
    $_SESSION['language'] = $_POST['language'];
}
$doctype = array(i("Affiches de projets"), i("Liste des projets"));
?>

<?php
if (isset($_POST['running'])) {
?>

<style>
#window {
    background-color: rgba(252, 98, 38, 0.9);
    top: 10%;
}

#window .container {
    border: 1px solid #e85319;
}

#window .title {
    color: #351204;
}

.tipsy-inner {
    background: none;
}
</style>

<div align="center" style="margin-top:5px">


    <form action="?p=pdfGenerator" method="post" id="form_step1">

        <div style="float:left; width:228px; margin-left: 20px">



            <img src="includes/pdfGenerator/img/tcpdf_poster.jpg" url="includes/pdfGenerator/img/"
                title="<img src='includes/pdfGenerator/img/L_tcpdf_poster.jpg' />" class="imgIllustration"
                style="border:1px solid #111; border-radius: 5px; margin-left: -1px" />

        </div>

        <div style="float:left; margin-left: 30px;">

            <div
                style="padding: 5px; border: 1px solid #e85319; border-radius: 7px; margin-bottom: 8px; background:#ffdbcd">
                <table align="center">
                    <?php
                        $i = 0;
                        foreach ($doctype as $type) {
                            $i++; ?>
                    <tr>
                        <td><input type="radio" value="<?= $i; ?>" id="opt<?= $i; ?>" name="doctype"
                                <?php if ($i == 1) { ?>checked="checked" <?php } ?> /></td>
                        <td><label for="opt<?= $i; ?>"><?= $type; ?></label></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <p style="margin-bottom:4px">
                <select name="year" style="padding: 4px 14px">
                    <?php
                        $get_years = $bdd->query("SELECT year FROM tbl_projects_history GROUP BY year ORDER BY year DESC");
                        while ($year = $get_years->fetch()) { ?>
                    <option value="<?= $year['year']; ?>" <?php if (date('Y') == $year['year']) { ?>selected="selected"
                        <?php } ?>><?= $year['year']; ?></option>
                    <?php
                        }
                        ?>
                </select>

                <select name="periode" style="padding: 4px 9px">
                    <option value="all" selected="selected"><?= i("Toutes périodes"); ?></option>
                    <?php
                        $get_per = $bdd->query("SELECT * FROM tbl_projects_period ORDER BY Nom ASC");
                        while ($per = $get_per->fetch()) { ?>
                    <option value="<?= $per['PKNoProjectPeriod']; ?>"
                        <?php if (in_array(date('m'), $periodes_time[$per['PKNoProjectPeriod'] - 1])) { ?>selected="selected"
                        <?php } ?>><?= i(substr($per['Nom'], 0, -2)) . " " . substr($per['Nom'], -1); ?></option>
                    <?php
                        }
                        ?>
                </select>
            </p>


            <p>
                <select name="profession" style="padding: 4px 8px; width:100%">
                    <option value="all" selected="selected"><?= i("Toutes professions"); ?></option>
                    <?php
                        $get_profession = $bdd->query("SELECT PKNoProfession, name_" . $_SESSION['language'] . " FROM tbl_professions ORDER BY name_" . $_SESSION['language'] . " ASC");
                        while ($profession = $get_profession->fetch()) {
                        ?>
                    <option value="<?= $profession['PKNoProfession']; ?>">
                        <?= $profession['name_' . $_SESSION['language']]; ?></option>
                    <?php
                        }
                        ?>
                </select>
            </p><br />

            <div class="generator">

                <div align="left"><b><?= i("Générateur"); ?></b></div>
                <select name="generateur" style="padding: 4px 8px; width:100%">
                    <option value="tcpdf" selected="selected">TCPDF (<?= i("Plus évolué"); ?>)</option>
                    <option value="fpdf">FPDF</option>
                </select><br /><br />
            </div>


        </div>

        <div style="clear:both"></div>

        <div class="submitArea">
            <input type="button" style="width:100%; margin:5px 0px" value="<?= i("Suivant"); ?>" id="SubmitStep1" />
        </div>

    </form>

</div>

<script>
$(function() {
    $(".imgIllustration").tipsy({
        live: true,
        gravity: "n",
        html: true,
        fade: true,
        opacity: 1
    });

    $('#SubmitStep1').click(function() {
        $('#form_step1').submit();
    });
    $('input[name="doctype"]').change(function() {

        if ($('input[name="doctype"][value="1"]').is(":checked")) {
            $(".generator").fadeIn("fast");
        } else {
            $(".generator").fadeOut("fast");
            $('input[name="generateur"][value="tcpdf"]').attr("selected", "selected");
        }

        var urlImg = 'tcpdf_poster.jpg';
        switch ($(this).val()) {
            case '1':
                urlImg = 'tcpdf_poster.jpg';
                break;
            case '2':
                urlImg = 'tcpdf_liste.jpg';
                break;
        }
        $('.imgIllustration').attr("src", $('.imgIllustration').attr("url") + urlImg).attr("title",
            "<img src='" + $('.imgIllustration').attr("url") + "L_" + urlImg + "' />");
    });
});
</script>

<?php } else {
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------
    global $bdd;

    if ((is_numeric($_POST['profession']) || $_POST['profession'] == "all") && (is_numeric($_POST['periode']) || $_POST['periode'] == "all") && is_numeric($_POST['year']) && is_numeric($_POST['doctype'])) {

        $pages_selon_type = array("poster.php", "liste.php"); ?>

<div class="titreTop"
    style="background: rgba(0,0,0,0.3); box-shadow: inset 1px 1px 2px -1px black; padding: 5px 10px; text-align:center; font-weight: bold; font-family:Verdana, Geneva, sans-serif; font-size:11pt; width:96.7%; margin:auto; margin-bottom:12px; border-radius: 5px;">
    <div style="line-height:2em"><?= $doctype[$_POST['doctype'] - 1]; ?></div>
</div>

<?php
        include_once("pdfGenerator/" . $pages_selon_type[$_POST['doctype'] - 1]);
    } else {

        echo '
		<h1 class="errorpage_title">PDF Generator</h1>
		<h2 class="errorpage_subtitle">' . i("ne comprend pas votre requète") . '</h2>';
    }
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------
} ?>