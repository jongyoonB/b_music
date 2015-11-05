<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:22
 */
session_start();


?>

<header>
    <?php include ('./menu/header.php')?>
</header>

<nav>
    <?php include ('./menu/main_menu.php')?>
</nav>

<aside>
    <?php include ('./menu/left_menu.php')?>
</aside>

<section>
    <?php include ('./body/common/default_view.php')?>
</section>

<footer>
    <?php include ('./menu/footer.php')?>
</footer>