<?php
if (isset($_POST['load'])) {
	require_once('../../conf/common.php');
}

$get_projects = $bdd->query("SELECT * FROM tbl_projects");
$maxLoading = round($get_projects->rowCount() / 20);

if (!isset($_POST['load'])) {
	$_POST['load'] = 0;
	$limit_min = 0;
	$limit_max = 20;
} else {
	$_POST['load']++;
	if ($_POST['load'] > $maxLoading) {
		$_POST['load'] = $maxLoading;
	}
	$limit_min = 20 + (($_POST['load'] - 1) * 20);
	$limit_max = 20;
}


?>


<?php if ($_POST['load'] == 0) { ?>
<ul data-role="listview" data-filter-placeholder="Recherche" data-filter-theme="d" data-inset="false" data-filter="true"
    data-count-theme="b" id="content">
    <?php } ?>

    <?php
	$get_projects = $bdd->query(
		"SELECT * FROM tbl_projects 
	LEFT JOIN tbl_projects_history ON PKNoProject = FKNoProject
	WHERE archive IS NULL
	ORDER BY title_fr asc
	LIMIT " . $limit_min . "," . $limit_max
	);
	while ($proj = $get_projects->fetch()) {
		$desc = html_entity_decode(strip_tags($proj['desc_fr'] ?? ""));
		if (!empty($desc)) { ?>
    <li data-role="list-divider" role="heading"
        class="ui-li ui-li-divider ui-btn ui-bar-b ui-li-has-count ui-btn-up-undefined">

        <?= $proj['title_fr'];  ?>
        <span class="ui-li-count ui-btn-up-b ui-btn-corner-all"><?= $proj['year']; ?></span>

    </li>

    <li style="font-weight:normal; font-size: 10pt" data-filtertext="<?= $proj['title_fr'] . " " . $desc;  ?>">
        <?= strpos($desc, '.') != false ? substr($desc, 0, strpos($desc, '.') + 1) : strip_tags($desc) ?>
    </li>
    <?php
		}
	}
	?>

    <?php if ($_POST['load'] == 0) { ?>
</ul>
<?php } ?>

<script>
var maxLoad = 0;
var appel;

$(function() {
    var loading = 0;
    appel = setInterval(function() {
        if (loading < <?= $maxLoading ?>) {
            callMore(loading);
            loading++;
        } else {
            clearInterval(appel);
        }
    }, 1000);
});

function callMore(loading) {
    if (loading > maxLoad) {
        $.post('includes/projects.php', {
            load: loading
        }, function(html) {
            $("ul#content").append(html);
            if (loading > maxLoad) {
                maxLoad = loading;
            }
        });
    }
    if (maxLoad > <?= $maxLoading ?>) {
        clearInterval(appel);
    }
}
</script>