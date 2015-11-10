<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:23
 */

echo "left menu  section<br><Br>";

/*     210 : top-100
 *     220 : total
 *
 *
 *     310 : k-pop
 *     320 : rock
 *     330 : pop
 *
 *
 *
 *     400 : mv
 *
 *
 *
 *
 */



switch($menu){

    case 2:{

        $cnt_SBmenu=2;
        break;
    }

    case 3:{

        $cnt_SBmenu=3;
        break;
    }

    default:{
        $cnt_SBmenu=0;
        break;
    }

}


for($index_i = 1 ; $index_i <= $cnt_SBmenu ; $index_i++) {
    $func = intval($REQUEST['func']/100)*100 + $index_i*10;
    echo "<a href = ../ctrl/main_ctrl.php?func=$func&page=1>";
    if ($sub == $index_i) {
        //echo "<img class = 'left' src = '../../img/Main/Menu/Left/$codeNum_select.png'>";
    } else {
        //echo "<img class='left' src = '../../img/Main/Menu/Left/$codeNum.png'>";

    }
    echo "$func<a/><br>";
}

//<a href = "../ctrl/main_ctrl.php?func=200&page=1">200&nbsp리스트</a>&nbsp&nbsp