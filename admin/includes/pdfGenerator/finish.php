<?php
global $bdd;
$generatedPdfs = getFilesDir('../media/pdf/', 0, 'pdf');
?>

<div class="block large">
    <div class="titlebar">
        <h3><?= i("PDF générés") . " (" . count($generatedPdfs) . ")"; ?></h3>
    </div>
    <div class="block_cont">

        <?php if (!file_exists('../media/pdf/posters.pdf')) { ?>
        <div align="center" style="width:500px; float:left; margin-right: 20px">
            <?php
				$i = 0;
				if ($generatedPdfs) {

					foreach ($generatedPdfs as $pdf) {
						$i++;
						$id = substr(strstr($pdf, '_'), 1, -4);

						// La premiere fois qu'on affiche les PDF, on les renomme
						if (!empty($id) && $id != 0) {
							$get_project = $bdd->query("SELECT * FROM tbl_projects WHERE PKNoProject=" . $id);
							$proj = $get_project->fetch();

							// Renommage des fichier
							$rename = filter($proj['title_' . $_SESSION['language']]) . ".pdf";
							rename('../media/pdf/' . $pdf, '../media/pdf/' . $rename);

							$title = $proj['title_' . $_SESSION['language']];
						} else {
							$rename = $pdf;
							$title = $rename;
						} ?>
            <div onclick="window.location='../includes/dlFile.php?file=<?= 'media/pdf/' . $rename; ?>'" class="apdf"
                title="<?= i("Télécharger"); ?>">
                <div class="pdf">
                    <div class="number"><?= $i; ?></div>
                    <?= $title; ?>
                    <div style="clear:left"></div>
                </div>
            </div>

            <?php
					}
				}
				?>
        </div>
        <?php } ?>


        <div class="zipload" <?php if (file_exists('../media/pdf/posters.pdf')) { ?>
            style="position:static; float:none; margin:auto" <?php }
																																	if ($i < 7) { ?> style="position:static" <?php } ?>>

            <?php if (!file_exists('../media/pdf/posters.zip')) { ?>
            <div class="loader" style="font-size: 13pt; text-align:center; padding: 5px"><img
                    src="includes/pdfGenerator/img/loader-arrows.gif" /><br />
                <?= i("Génération de l'archive"); ?></div>
            <?php } ?>


            <div class="loaded">
                <div align="center" style="margin-bottom:20px"><img
                        src="includes/pdfGenerator/img/<?php if (!file_exists('../media/pdf/posters.pdf')) { ?>zip.png<?php } else { ?>pdf.png<?php } ?>" />
                </div>

                <div class="download"
                    style=" <?php if (!file_exists('../media/pdf/posters.zip')) { ?>display:none;<?php } ?>"
                    onclick="window.location='../includes/dlFile.php?file=media/pdf/posters.<?php if (!file_exists('../media/pdf/posters.pdf')) { ?>zip<?php } else { ?>pdf<?php } ?>'">
                    <?php if (!file_exists('../media/pdf/posters.pdf')) {
						echo i("Télécharger tous les PDF");
					} else {
						echo i("Télécharger le PDF complet");
					} ?>
                </div>
            </div>
        </div>

        <div style="clear:both"></div>



        <div id="return"></div>

    </div>
</div>

<script>
$(function() {
    $(".apdf").tipsy({
        gravity: "w"
    });

    <?php if (!file_exists('../media/pdf/posters.zip')) { ?>
    $.post('includes/pdfGenerator/createArchive.php', {}, function(html) {
        $(".zipload .loader").fadeOut("fast");
        setTimeout(function() {
            $(".zipload .download").fadeIn("fast");
        }, 120);
    });
    <?php } ?>
});
</script>

<style>
.apdf {
    text-decoration: none;
    cursor: pointer;
}

.pdf .number {
    float: left;
    padding: 2px 4px;
    background: #fff;
    border-radius: 3px;
    margin-top: -2px
}

.pdf:hover {
    background: #C4E1FF
}

.pdf {
    padding: 6px 20px;
    padding-left: 5px;
    background: #eee;
    border-bottom: 1px solid #aaa;
    margin-bottom: 3px;
}

.download {
    text-align: center;
    padding: 8px 10px;
    font-weight: bold;
    font-family: Verdana, Geneva, sans-serif;
    cursor: pointer;
    background: #444;
    border-radius: 6px;
    color: white;
}

.download:hover {
    background: #111;
}

.zipload {
    width: 400px;
    padding: 10px;
    border: 1px solid #eee;
    border-radius: 12px;
    background: #fafafa;
    margin-left: 512px;
    position: fixed;
    -moz-transition: all 0.2s linear;
}

.zipload:hover {
    background: #eee;
}
</style>