<?php
$bdd = getConnexion();
require_once('db/DBTools.class.php');
global $db_name;
?>

<style>
.db_schema {
    background: #CCE6FF;
    padding: 6px 8px;
    border-radius: 8px;
    margin: 0px 8px 6px 6px;
    float: left;
    width: 155px;
    height: 170px;
    cursor: default;
}

.db_schema .title {
    background: #82C0FF;
    padding: 5px;
    text-align: center;
    margin-bottom: 4px;
}

.db_schema .field-group {
    background: #D7EBFF;
}

.db_schema .field {
    padding: 2px 0px;
}

.data-title :first-child {
    margin-top: 20px;
}

.ui-state-highlight {
    padding: 6px 8px;
    border-radius: 8px;
    margin: 0px 8px 6px 6px;
    float: left;
    width: 155px;
    height: 170px;
}

.btTitle {
    background: rgba(0, 0, 0, 0.5);
    border-radius: 6px 6px 6px 6px;
    color: white;
    padding: 3px 8px 4px;
    position: absolute;
    right: 10px;
    top: 9px;
    cursor: pointer;
}

.btTitle:hover {
    background: rgba(0, 0, 0, 0.8);
}
</style>

<div class="block large">
    <div class="titlebar">
        <h3><?php if (!isset($_GET['view'])) {
				echo i("Base de donnée");
			} else {
				echo i("Base de donnée") . " &raquo; " . $_GET['view'];
			} ?></h3>
        <?php if (isset($_GET['view'])) { ?><a class="btTitle sql">SQL</a><?php } ?>
        <?php if (!isset($_GET['view'])) { ?> <a class="btTitle export"><?= i("Exporter") ?></a><?php } ?>
    </div>
    <div class="block_cont">
        <?php
		$db = new DBTools($bdd);

		if (count($_GET) < 3) { ?>

        <div class="tables">
            <?php
				foreach ($db->getTables() as $table) { ?>

            <div class="db_schema" nbField="<?= count($db->getFields($table)); ?>" name="<?= $table; ?>">
                <div class="title"><?= $table; ?></div>

                <div class="field-group">
                    <?php
							foreach ($db->getFields($table) as $field) { ?>
                    <div class="field">
                        <span><?= $field['field']; ?></span>
                    </div>
                    <?php
							} ?>
                </div>
            </div>

            <?php
				}
				?>
        </div>

        <script>
        $(function() {
            $.contextMenu({
                selector: '.db_schema',
                className: 'data-title',
                callback: function(key, options) {
                    if (key == "view") {
                        window.location = '?p=tools&o=db&view=' + $(this).attr("name");
                    }
                },
                items: {
                    "view": {
                        name: "<?= i("Afficher les données") ?>",
                        icon: "edit"
                    }
                }
            });

            $('.db_schema').dblclick(function() {
                window.location = '?p=tools&o=db&view=' + $(this).attr("name");
            });
            $(".tables").sortable({
                placeholder: "ui-state-highlight",
            }).disableSelection();
        });
        </script>

        <?php
		} else {
			// Apercu des données d'une table
			if (isset($_GET['view'])) {
			?>

        <table class="tablesorter">
            <thead>
                <tr>
                    <?php
							foreach ($db->getFields($_GET['view']) as $field) { ?>
                    <th><?= $field['field']; ?></th>
                    <?php } ?>
                </tr>
            </thead>

            <tbody>
                <?php
						foreach ($db->getDataFromTable($_GET['view']) as $data) { ?>


                <tr>
                    <?php
								foreach ($db->getFields($_GET['view']) as $field) { ?>
                    <td><?= $data[$field['field']]; ?></td>
                    <?php
								}
								?>
                </tr>
                <?php
						}
						?>
            </tbody>
        </table>

        <script>
        $(function() {
            $('.tablesorter').tablesorter({
                widgets: ['zebra'],
                sortMultiSortKey: 'ctrlKey'
            });

            $('.btTitle.sql').click(function() {
                openWindow('includes/tools/db/SQLPanel.php', 'table=<?= $_GET['view']; ?>', 950,
                    'Exécution de requètes SQL');
            });
        });
        </script>
        <?php
			}
		}
		?>
        <div style="clear:both"></div>
    </div>
</div>


<link type="text/css" rel="stylesheet" href="design/jquery.contextMenu.css">
<script src="js/jquery.contextMenu.js"></script>
<link type="text/css" rel="stylesheet" href="design/tablesorter.css">
<script src="js/jquery.tablesorter.js"></script>

<script>
$(function() {
    $('.btTitle.sql').click(function() {
        openWindow('includes/tools/db/SQLPanel.php', 'table=<?= $_GET['view']; ?>', 950,
            'Exécution de requètes SQL');
    });
    $('.btTitle.export').click(function() {
        $.post('includes/tools/db/export.php', {
            <?php if (isset($_GET['view'])) { ?>table: "<?= $_GET['view']; ?>",
            <?php } ?>
        }, function(html) {
            window.location = '../includes/dlFile.php?file=media/dump/' + html;
        });
    });
});
</script>