<?php
global $bdd;
$query = $bdd->query("SELECT * FROM tbl_visiteurs ORDER BY last_visit DESC");
$pageName = "statistiques";
?>

<div class="block large">
    <div class="titlebar">
        <h3><?= i("Visiteurs"); ?></h3>
    </div>

    <div class="block_cont">
        <table class="tablesorter">
            <thead>
                <tr>
                    <th><?= i("Visiteur") ?> (<?= $query->rowCount() ?>)</th>
                    <th width="160">OS</th>
                    <th width="180"><?= i("Navigateur"); ?></th>
                    <th style="text-align:center" width="90"><?= i("Support"); ?></th>
                    <th width="180" style="text-align:center"><?= i("Dernière visite"); ?></th>
                    <th><?= i("Statut"); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php
				$dataI = 0;
				while ($data = $query->fetch()) {
					$dataI++;
					if ($data['ip'] == $_SERVER['REMOTE_ADDR']) {
						$name = "Moi (" . $data['ip'] . ")";
					}
				?>
                <tr ondblclick="window.location='?p=<?= $pageName ?>~visites&id=<?= $data['PKNoVisiteur'] ?>'"
                    class="<?= $dataI % 2 == 0 ? 'even' : 'odd' ?>" style="cursor: default"
                    projectid="<?= $data['PKNoVisiteur'] ?>">
                    <td><?= $name ?></td>
                    <td><?= $data['os'] ?></td>
                    <td><?= $data['navigateur'] ?></td>
                    <td style="text-align:center"><?= i(($data['pc'] == "0") ? "Mobile" : "PC") ?></td>
                    <td style="text-align:center"><?= $data['last_visit']; ?></td>
                    <td><?= str_replace(['-', ':', ' '], ['', '', ''], $data['last_visit']) + 20 > date('YmdHis') ? "En ligne" : "Hors ligne" ?>
                    </td>
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