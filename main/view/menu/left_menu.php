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

    $menu = intval($_REQUEST['func'] / 100);
    if($menu != 1){
        $sub_menu = array(
            array('전체 리스트,', 'TOP 100'),
            array('K-POP', 'POP', 'ROCK', 'ELECTRONIC'),
            array('MV'),
        );

        for ($index_i = 0; $index_i < count($sub_menu[$menu - 2]); $index_i++) {
            $func = intval($menu * 100 + ($index_i + 1) * 10);
            echo "<a href = ../ctrl/main_ctrl.php?func=$func&page=1&key=>";
            if ($func == $_REQUEST['func']) {
                echo "[" . $sub_menu[$menu - 2][$index_i] . "]";
                //echo "<img class = 'left' src = '../../img/Main/Menu/Left/$codeNum_select.png'>";
            } else {
                echo $sub_menu[$menu - 2][$index_i];
                //echo "<img class='left' src = '../../img/Main/Menu/Left/$codeNum.png'>";
            }
            echo "<a/><br>";
        }
    }
}
