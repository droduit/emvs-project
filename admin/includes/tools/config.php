<?php
$bdd = getConnexion();
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
        <h3><?= i("Configuration PHP"); ?></h3>

    </div>
    <div class="block_cont">

        <table align="center" class="tablesorter">
            <thead>
                <tr>
                    <th><?= i("Paramètre") ?></th>
                    <th><?= i("Valeur globale") ?> (php.ini)</th>
                    <th><?= i("Valeur locale") ?> (.htaccess)</th>
                    <th><?= i("Degré d'accès") ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
				foreach (ini_get_all() as $k => $v) { ?>
                <tr>
                    <td><?= $k; ?></td>
                    <td><?= $v['global_value']; ?></td>
                    <td><?= $v['local_value']; ?></td>
                    <td><?= $v['access']; ?></td>
                </tr>
                <?php
				}
				?>
            </tbody>
        </table>

        <div style="clear:both"></div>
    </div>
</div>


<link type="text/css" rel="stylesheet" href="design/tablesorter.css">
<script src="js/jquery.tablesorter.js"></script>

<script>
$(function() {
    $('.tablesorter').tablesorter({
        widgets: ['zebra'],
        sortMultiSortKey: 'ctrlKey'
    });
});
</script>