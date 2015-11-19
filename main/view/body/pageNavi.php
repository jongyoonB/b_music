<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-06
 * Time: 오후 2:43
 */


function pageNavi($argPageInfo, $func, $argPageName, $argKey){


    //echo "<br>".$b_startP."<br>".$b_endP."<Br>".$totalP."<br>";
    $url = "../ctrl/main_ctrl.php?func=".$func."&key=".$argKey."&".$argPageName."=";
    $_SESSION['url_test'] = $url;

    //$url = "../ctrl/main_ctrl.php?func=$REQUEST[func]&key=$REQUEST[key]&page=";


    if($argPageInfo['block'] == 1){
        echo "☜ ";
    }
    else{
        echo "<a href = ".$url.($argPageInfo['b_startP']-$argPageInfo['perBlock']).">☜ </a>";
    }

    if($argPageInfo['currentPage'] == 1){
        echo "◀ ";
    }

    else{
        echo "<a href = ".$url.($argPageInfo['currentPage']-1).">◀ </a>";
    }


    for ($index_I = $argPageInfo['b_startP']; $index_I <= $argPageInfo['b_endP']; $index_I++) {
        if($argPageInfo['currentPage'] == $index_I){
            echo "&nbsp[".$index_I."]&nbsp</a>";
        }
        else {
            echo "<a href = $url$index_I>&nbsp" .$index_I."&nbsp</a>";
        }
    }

    if($argPageInfo['currentPage']+1 >= $argPageInfo['totalP']){
        echo " ▶";
    }
    else{
        echo "<a href = ".$url.($argPageInfo['currentPage'] + 1)."> ▶</a>";
    }

    if($argPageInfo['block']>=$argPageInfo['cntBlock']){
        echo " ☞";
    }
    else{
        echo "<a href = ".$url.($argPageInfo['b_endP']+1)."> ☞</a>";
    }

}
?>