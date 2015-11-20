<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:23
 */

/*     210 : top-100
 *     220 : total
 *
 *
 *     310 : k-pop
 *     320 : rock
 *     330 : pop
 *
 *
 *     400 : mv
 *
 *
 */

if($_REQUEST['func']){
    /*print_r($_SESSION['menu210']);
    $pageName = "menu".($_REQUEST['func']);
    $pageinfo = isset($_SESSION[$pageName]) ? $_SESSION[$pageName] : null;
    if(!$pageinfo){
        $pageNumb = isset($_REQUEST[$pageName]) ? $_REQUEST[$pageName] : 1 ;
    }
    else{
        $pageNumb = isset($_SESSION[$pageName]) ? $pageinfo['currentPage'] : 1;
    }
    echo "pageName = ".$pageName."<Br>";
    echo "pageNumb = ".$pageNumb."<BR>";*/
    $menu = ($_REQUEST['func'] % 100)/10;
    $sub_menu = array(
        array(),
        array("앨범 관리", "전체 곡 관리"),
    );
    if($menu != 1){
        for ($index_i = 0; $index_i < count($sub_menu[$menu - 1]); $index_i++) {
            $func = intval(900 + $menu*10 + $index_i);
            echo "<a href = ../ctrl/main_ctrl.php?func=$func&key=>";
            if ($func == $_REQUEST['func']) {
                echo "[" . $sub_menu[$menu - 1][$index_i] . "]";
                //echo "<img class = 'left' src = '../../img/Main/Menu/Left/$codeNum_select.png'>";
            } else {
                echo $sub_menu[$menu - 1][$index_i];
                //echo "<img class='left' src = '../../img/Main/Menu/Left/$codeNum.png'>";
            }
            echo "<a/><br>";
        }
    }
}
