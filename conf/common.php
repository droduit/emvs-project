<?php
if (file_exists('admin/conf/common.php')) {
	require_once('admin/conf/common.php');
}
if (file_exists('../admin/conf/common.php')) {
	require_once('../admin/conf/common.php');
}
if (file_exists('../../admin/conf/common.php')) {
	require_once('../../admin/conf/common.php');
}

function getProjectFromProfession($profession, $display = 1) {
	global $bdd;

	if ($_SESSION['language'] != "fr" && $_SESSION['language'] != "de") {
		$lang = "fr";
	} else {
		$lang = $_SESSION['language'];
	}

	$col = array('auto', 'halfcol electro', 'last info');
	$profes = array('auto', 'electro', 'info');

	$get_professions = $bdd->query("SELECT * FROM tbl_professions WHERE PKNoProfession=" . $profession . " ORDER BY name_fr DESC");
	$prof = $get_professions->fetch();

	$get_nb_projects = $bdd->query("SELECT * FROM tbl_projects_history 
									LEFT JOIN tbl_projects ON FKNoProject=PKNoProject
									WHERE FKNoProfession=" . $profession . " AND FKNoMediaImage IS NOT NULL AND archive IS NULL");

	$max_id = $get_nb_projects->rowCount() - 1;
	$rand_id = mt_rand(0, $max_id);

	$get_projects = $bdd->query("SELECT * FROM tbl_projects_history 
								LEFT JOIN tbl_projects ON FKNoProject=PKNoProject
								WHERE FKNoProfession=" . $profession . " AND FKNoMediaImage IS NOT NULL AND archive IS NULL ORDER BY year DESC LIMIT " . $rand_id . ",1");


	while ($proj = $get_projects->fetch()) {

		$desc = html_entity_decode($proj['desc_' . $lang]);
		if (strpos($desc, '.') != false) {
			$desc = substr($desc, 0, strpos($desc, '.') + 1);
		} else {
			$desc = strip_tags($desc);
		}
?>

<?php if ($display == 1) { ?>
<div style="float:left" class="wrapCoveredProject <?= $profes[$profession - 1]; ?>">
    <h1 class="<?= $profes[$profession - 1]; ?> titleProj"><?= $prof['name_' . $_SESSION['language']]; ?></h1>
    <div class="span-7 <?= $col[$profession - 1]; ?>">
        <?php } ?>

        <div style="display: block;" class="project">
            <div class="coveredProject" onclick="window.location='?p=projects&id=<?= $proj['PKNoProject']; ?>'"
                style="background-image:url(media/photo/270/<?= getLastImgProject($proj['PKNoProject']); ?>);"
                title="<?= $proj['title_' . $_SESSION['language']]; ?>"></div>
            <h2 class="linkProj"><a
                    href="?p=projects&id=<?= $proj['PKNoProject']; ?>"><?= stripslashes($proj['title_' . $_SESSION['language']]); ?></a>
            </h2>
            <p class="justify"><?= stripslashes($desc); ?></p>
            <p class="center">
                <?= '<img src="' . getQRCode($proj['PKNoProject']) . '" alt="' . $proj['title_' . $_SESSION['language']] . '" />';  ?>
            </p>
        </div>

        <?php if ($display == 1) { ?>
    </div>
</div>
<?php } ?>


<?php

	}
}
function getImgURL($url, $size) {
	return "media/photo/" . $size . "/" . $url;
}
function getQRCode($id) {
	$PNG_WEB_DIR = 'media/qrcode/';
	$filename = 'projects_detail_' . $id . '.png';
	return $PNG_WEB_DIR . basename($filename);
}

function detectMobile() {
	// True : c'est un téléphone portable qui accede au site
	// False : c'est un PC qui accede au site.

	if (isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE']))
		return true;

	if (isset($_SERVER['HTTP_ACCEPT'])) {
		$accept = strtolower($_SERVER['HTTP_ACCEPT']);
		if (strpos($accept, 'wap') !== false)
			return true;
	}

	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false) {
			return true;
		}

		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false) {
			return true;
		}

		if (preg_match('#Android|BlackBerry|Cellphone|iPhone|iPod|hiptop|HTC|MIDP-2\.|MMEF20|MOT-V|NetFront|Newt|NintendoWii|NintendoDS|Nitro|Nokia|OperaMobi|Palm|PlayStationPortable|PSP|portalmmm|SonyEricsson|Symbian|UP.Browser|UP.Link|webOS|WindowsCE|WinWAP|YahooSeeker/M1A1-R2D2|LGE VX|Maemo|phone#', $_SERVER['HTTP_USER_AGENT'])) {
			return true;
		}
	}

	return false;
}
function getOS($ua = '') {
	if (!$ua) $ua = $_SERVER['HTTP_USER_AGENT'];
	$os = 'Autre';

	$os_arr = array(
		'Windows NT 6.1'       => 'Windows 7',
		'Windows NT 6.0'       => 'Windows Vista',
		'Windows NT 5.2'       => 'Windows Server 2003',
		'Windows NT 5.1'       => 'Windows XP',
		'Windows NT 5.0'       => 'Windows 2000',
		'Windows NT'           => 'Windows NT',
		'Windows CE'           => 'Windows Mobile',
		'Win 9x 4.90'          => 'Windows Millenium.',
		'Windows 98'           => 'Windows 98',
		'Windows 95'           => 'Windows 95',
		'Win95'                => 'Windows 95',
		'Ubuntu'               => 'Linux Ubuntu',
		'Fedora'               => 'Linux Fedora',
		'Linux'                => 'Linux',
		'Unix'                 => 'Unix',
		'Macintosh'            => 'Mac',
		'Mac OS X'             => 'Mac OS X',
	);

	$ua = strtolower($ua);
	foreach ($os_arr as $k => $v) {
		if (preg_match(strtolower($k), $ua)) {
			$os = $v;
			break;
		}
	}
	return $os;
}
?>