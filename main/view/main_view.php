<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:22
 */
session_start();
include ('./menu/header.php');
//print_r($_SESSION);
//var_dump($_SESSION);
//include (dirname(__FILE__).'/../css/song_list.css');

/*$temp = "menu".$_REQUEST['func'];
var_dump($_SESSION[$temp]);*/
//echo "<Br>";

?>

<!DOCTYPE html>
<html>
<head>
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" type="text/css" href="../css/layout.css" />
</head>
<body>
<div id="wrapper">
    <div id="headerwrap">
        <div id="header">
            <?php include ('./menu/login.php')?>
        </div>
    </div>
    <div id="navigationwrap">
        <div id="navigation"><p>
            <?php
                if($status == "admin"){
                    include ('./menu/admin_menu.php');
                }
                else{
                    include ('./menu/main_menu.php');
                }
            ?>
            </p></div>
    </div>
    <div id="contentliquid"><div id="contentwrap">
            <div id="content">
                <p>
                    <?php include ('./body/common/default_view.php')?>
                </p>
            </div>
        </div></div>
    <div id="leftcolumnwrap">
        <div id="leftcolumn">
            <p>
                <?php
                    if($status != "admin"){
                        include ('./menu/left_menu.php');
                    }
                    else{
                        include ('./menu/left_menu_admin.php');
                    }//ckedit
                 ?>
            </p>
        </div>
    </div>
    <div id="footerwrap">
        <div id="footer">
            <p>
                <?php include ('./menu/footer.php')?>
            </p>
        </div>
    </div>
</div>
</body>
</html>
