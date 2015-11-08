<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:22
 */
session_start();
//include (dirname(__FILE__).'/../css/song_list.css');

?>

<head>
    <style>
        div {
            border: solid 1px;
        }


    </style>
</head>
<div>
    <div>
        <header><?php include ('./menu/header.php')?></header>
    </div>

    <div>
        <div>
            <nav><?php include ('./menu/main_menu.php')?></nav>
        </div>

        <span style="border-right: double 1px">
            <?php include ('./menu/left_menu.php')?>
        </span>

        <span>
            <?php include ('./body/common/default_view.php')?>
        </span>

    </div>

    <div>
        <footer><?php include ('./menu/footer.php')?></footer>
    </div>

</div>








