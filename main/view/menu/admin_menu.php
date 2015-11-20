<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:23
 */


$menu_title = array("회원 관리", "앨범 관리", "뮤비 관리");
$func = $_REQUEST['func'];

echo "<div>";
for ($cnt = 0 ; $cnt < count($menu_title) ; $cnt++) {
    $func = 900+($cnt+1)*10;
    echo "<span><a href = '../ctrl/main_ctrl.php?func=$func&page=1&key='>$menu_title[$cnt]</a></span>&nbsp&nbsp&nbsp";
}
echo "</div>";
?>


