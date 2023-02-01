<?php
require_once('conf.php');
require_once('../../conf/common.php');
$_SESSION['language'] = $_POST['language'];
?>

<head>
    <link rel="stylesheet" href="plugins/plupload/js/theme/jquery-ui-1.8.13.custom.css" type="text/css" />
    <link rel="stylesheet" href="plugins/plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />

    <script type="text/javascript" src="plugins/plupload/js/jquery.min.js"></script>
    <script type="text/javascript" src="plugins/plupload/js/jquery-ui.min.js"></script>

    <script type="text/javascript" src="plugins/plupload/js/plupload.js"></script>
    <script type="text/javascript" src="plugins/plupload/js/plupload.flash.js"></script>
    <script type="text/javascript" src="plugins/plupload/js/plupload.html5.js"></script>
    <script type="text/javascript" src="plugins/plupload/js/plupload.silverlight.js"></script>

    <script type="text/javascript" src="plugins/plupload/js/plupload.browserplus.js"></script>
    <script type="text/javascript" src="plugins/plupload/js/plupload.html4.js"></script>

    <script type="text/javascript" src="plugins/plupload/js/jquery.ui.plupload/jquery.ui.plupload.js"></script>

</head>

<div id="uploader">
    <p><?= i("Votre Navigateur ne supporte pas Flash, Silverlight, BrowserPlus ou HTML5"); ?>.</p>
</div>

<div id="state"
    style="padding: 5px 10px; border: 3px solid #F90; background: #FC6; color: black; font-weight: bold; font-family:arial; font-size: 10pt; text-align:left; margin: 5px; 0px 5px 0px; display:none">
    <div class="loader" style="display:inline-block; float:left; margin-right:10px"><img height="16px"
            src="plugins/plupload/img/loader.gif" /></div> <span class="text">Envoi des images en cours. Ne pas quitter
        la page !</span>
</div>

<div style="display:none">
    <input type="text" id="nbFileRedimensionne" value="0" />
    <input type="text" id="nbFileTotal" value="0" />
</div>

<div class="arrayListe" style="display:none"></div>

<!-- Seulement utile pour l'upload de document, pour stocker les nom d'origine -->
<input type="hidden" id="docName" />

<script type="text/javascript">
// Convert divs to queue widgets when the DOM is ready
$(function() {
    setTimeout(function() {
        $(".plupload_header_title").html("<?= i("Sélectionner vos fichiers"); ?>");
        $(".plupload_header_text").html(
            "<?= i("Ajoutez vos fichiez dans la liste d'attente et cliquez sur le bouton Démarrer"); ?>"
            );
    }, 200);

    var folder = "<?php if ($_POST['list_ext'] == "*") {
							echo str_replace('photo/', 'doc/', $upload_dir);
						} else {
							echo $upload_dir;
						} ?>";

    $("#uploader").plupload({
        // General settings
        runtimes: 'flash,html5,silverlight',
        url: 'includes/imageLoader/script_upload_plupload.php',
        max_file_size: '1000mb',
        max_file_count: 500, // user can add no more then 20 files at a time
        chunk_size: '1mb',
        unique_names: true,
        multiple_queues: true,
        multipart_params: {
            dossier: folder
        },

        // Rename files by clicking on their titles
        rename: true,

        // Sort files
        sortable: true,

        // Specify what files to browse for
        filters: [{
            title: "<?= $_POST['filter_title']; ?>",
            extensions: "<?= $_POST['list_ext']; ?>"
        }, ],

        // Flash settings
        flash_swf_url: 'plugins/plupload/js/plupload.flash.swf',

        // Silverlight settings
        silverlight_xap_url: 'plugins/plupload/js/plupload.silverlight.xap',

        init: {
            FileUploaded: function(up, fichier, ret) {
                var obj = eval('(' + ret.response + ')');
                $("#docName").val($("#docName").val() + fichier.name + ',');

                $("#nbFileRedimensionne").val(parseInt($("#nbFileRedimensionne").val()) + 1);

                $('.arrayListe').append(obj.fileName + ',');
                if ($("#nbFileRedimensionne").val() == $("#nbFileTotal").val()) {
                    $('.arrayListe').html($('.arrayListe').html().substring(0, $('.arrayListe')
                        .html().length - 1));
                    $("#uploader").slideUp("slow");

                    <?php if ($_POST['list_ext'] == "*") {
							// Si ce sont des documents de types indéterminés que l'on importe 
						?>
                    var uri = window.document.location.search;
                    $.post('includes/imageLoader/bdd.write_image.php', {
                        arrayImage: $('.arrayListe').html(),
                        FKNoMediaDossier: "<?= $_POST['FKNoDossier']; ?>",
                        type: "doc",
                        id: uri.substring(uri.search('&id=') + 4, uri.length),
                        nom: $("#docName").val()
                    }, function(html) {
                        closeWindow();
                        loadInto('docArea', 'includes/imageLoader/docFromProject.php',
                            'id_directory=<?= $_POST['FKNoDossier']; ?>&language=<?= $_SESSION['language']; ?>'
                            );
                    });
                    <?php } else { ?>
                    $("#state").fadeIn("fast");
                    $("#state .text").html(
                        "<?= i("Génération des miniatures. Fermeture automatique a la fin du traitement. Le chargement peut etre long, ne quittez pas."); ?>"
                        );

                    $.post('includes/imageLoader/bdd.write_image.php', {
                        arrayImage: $('.arrayListe').html(),
                        FKNoMediaDossier: "<?= $_POST['FKNoDossier']; ?>",
                        type: "img"
                    }, function(html) {
                        $.post('includes/imageLoader/thumbnails_create.php', {
                            arrayImage: $('.arrayListe').html(),
                            dossier: folder
                        }, function(html) {
                            $("#state").html(
                                "<?= i("Envoi terminé avec succès"); ?> (" + $(
                                    "#nbFileTotal").val() + " images)").css({
                                "background": "#9F3",
                                "border": "3px solid #0f0"
                            });
                            $("#nbFileRedimensionne,#nbFileTotal").val("0");
                            closeWindow();
                            setTimeout(function() {
                                loadInto('imageArea',
                                    'includes/imageLoader/imgFromDirectory.php',
                                    'id_directory=<?= $_POST['FKNoDossier']; ?>&selection=<?= $_POST['selection']; ?>&event_click=<?= addslashes($_POST['event_click']); ?>&language=<?= $_SESSION['language']; ?>'
                                    );
                            }, 400);
                        });
                    });
                    <?php } ?>

                }

            },

            FilesAdded: function(up, files) {
                $('.arrayListe').html("");
                $("#nbFileTotal").val(parseInt($("#nbFileTotal").val()) + files.length);
            }
        }
    });
});
</script>