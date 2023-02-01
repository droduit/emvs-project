<?php
require_once('../conf/common.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <title>EP::EMVs Projects</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="stylesheet" href="jqueryMobile/jquery.mobile-1.1.0.min" />
        <link rel="stylesheet" href="jqueryMobile/jquery.mobile.structure-1.1.0.min.css" />
        <link rel="stylesheet" href="jqueryMobile/jquery.mobile.theme-1.1.0.min.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="jqueryMobile/jquery.mobile-1.1.0.min.js"></script>

        <link href="plugin/photoswipe/styles.css" type="text/css" rel="stylesheet" />
        <link href="plugin/photoswipe/photoswipe.css" type="text/css" rel="stylesheet" />

        <link href="plugin/swipeButton/jquery.swipeButton-1.2.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="plugin/swipeButton/jquery.swipeButton-1.2.js"></script>

        <script>
        $(document).ready(function() {
            $('#swipeMe li').swipeDelete({
                btnTheme: 'e',
                btnLabel: 'Delete',
                btnClass: 'aSwipeButton',
                click: function(e) {
                    e.preventDefault();
                    var url = $(e.target).attr('href');
                    $(this).parents('li').slideUp();

                    $.post(url, function(data) {
                        console.log(data);
                    });
                }
            });
        });
        </script>
    </head>

    <body>

        <div data-role="page">

            <div data-role="header" class="ui-header ui-bar-a" role="banner">

                <?php if (!isset($_GET['title'])) { ?>
                <div data-role="navbar" class="ui-navbar ui-navbar-noicons" role="navigation"
                    style="border-bottom:1px solid #333">
                    <ul class="ui-grid-a">
                        <li class="ui-block-a"><a href="../index.php?v=pc" data-theme="a"
                                class="ui-btn ui-btn-up-a"><span class="ui-btn-text">Version PC</span></a></li>
                        <li class="ui-block-b"><a href="http://www.emvs.ch/" data-theme="a"
                                class="ui-btn ui-btn-up-a"><span class="ui-btn-text">Site EMVs</span></a></li>
                    </ul>
                </div>
                <?php } else {
				echo '<h1 class="ui-title" tabindex="0" role="heading" aria-level="1">';
				echo '<a data-iconpos="right" data-icon="arrow-l" data-role="button" href="javascript:history.go(-1)" class="ui-btn-left ui-btn ui-btn-icon-right ui-btn-corner-all ui-shadow ui-btn-up-a" data-theme="a"><span class="ui-btn-inner ui-btn-corner-all" aria-hidden="true"><span class="ui-btn-text">Retour</span><span class="ui-icon ui-icon-arrow-l ui-icon-shadow"></span></span></a>';
				echo $_GET['title'] . '</h1>';
			}
			?>




            </div><!-- /header -->

            <div data-role="content">

                <?php
			if (isset($_GET['p'])) {
				if (file_exists("includes/" . str_replace("~", "/", $_GET['p']) . ".php")) {
					include_once("includes/" . str_replace("~", "/", $_GET['p']) . ".php");
				} else {
					echo '<h3>Oupss...</h3>';
					echo "<p>Cette page ne semble pas exister...</p>";
				}
			} else { ?>
                <ul id="swipeMe" data-role="listview" data-inset="false" data-filter="false">
                    <div style="background:#9CF; padding:10px">
                        <div
                            style="background: url(../img/logo.png) no-repeat center; width: 70%; height:70px; margin:auto; background-size: contain">
                        </div>
                    </div>


                    <li data-role="list-divider" role="heading"
                        class="ui-li ui-li-divider ui-btn ui-bar-b ui-btn-up-undefined">Choisissez une destination</li>

                    <?php
					$nav = array(
						array(i('Projets'), '?p=projects'),
						array(i('Apprentis'), '?p=students'),
						array(i('Enseignants'), '?p=teachers')
					);

					$i = 0;
					foreach ($nav as $n) { ?>
                    <li data-swipeurl="swiped.html?1">
                        <a href="<?= $n[1]; ?>&title=<?= $n[0]; ?>"><?= $n[0]; ?></a>
                    </li>

                    <?php
					}
					?>
                </ul>
                <?php
			} ?>

            </div><!-- /content -->



            <div data-theme="d" class="footer-docs ui-footer ui-bar-d" data-role="footer" role="contentinfo">
                <p align="center">&copy; 2012 EMVS</p>
            </div><!-- /footer -->

        </div><!-- /page -->

        <script>
        $(function() {
            $('.collapsible').click(function() {
                $('.collapser').slideToggle();
            });
        });
        </script>

    </body>

</html>