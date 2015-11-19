<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:23
 */

/* 100 : 로그인
 * 110 : 가입
 *
 * 200 : 전체(=210)
 * 210 : 전체
 * 220 : top 100
 *
 * 300 : 장르 전체(=210)
 * 310 : k-pop
 * 320 : pop
 * 330 : rock
 * 340 : electronic
 *
 * 4xx : 뮤비
 * 9xx : 관리자
 *
 *
*/

$menu_title = array("리스트", "장르", "뮤비");
$func = $_REQUEST['func'];

echo "<div>";
for ($cnt = 0 ; $cnt < count($menu_title) ; $cnt++) {
    $func = ($cnt+2)*100;
    echo "<span><a href = '../ctrl/main_ctrl.php?func=$func&page=1&key='>$menu_title[$cnt]</a></span>&nbsp&nbsp&nbsp";
}
echo "</div>";
?>


