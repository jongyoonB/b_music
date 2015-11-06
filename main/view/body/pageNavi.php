<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-06
 * Time: 오후 2:43
 */

$numbOfPage = $_SESSION['numbPage'];
$start_p = ($REQUEST['page'] % 10 !=0) ? floor($REQUEST['page'] / 10)*10 +1 : floor(($REQUEST['page']-1) / 10)*10 + 1;
$end_p = ($start_p+9 < $numbOfPage) ? $start_p + 9 : $numbOfPage;

$url = "../main_ctrl.php?func=$REQUEST[func]&Key=$REQUEST[key]&page=";

if($start_p == 1){
    echo "☜ ";
}
else{
    echo "<a href = ".$url.($start_p-10).">☜ </a>";
}

if($REQUEST['page']==1){
    echo "◀ ";
}

else{
    echo "<a href = ".$url.($REQUEST['page']-1).">◀ </a>";
}


for ($index_I = $start_p; $index_I <= $end_p; $index_I++) {
    if($REQUEST['page'] == $index_I){
        echo "<a href = ../../ctrl/main_ctrl.php?func=$REQUEST[func]&key=$REQUEST[key]&page=$index_I>&nbsp[" .$index_I."]&nbsp</a>";
    }
    else {
        echo "<a href = ../../ctrl/main_ctrl.php?func=$REQUEST[func]&key=$REQUEST[key]&page=$index_I>&nbsp" .$index_I."&nbsp</a>";
    }
}

if($REQUEST['page']==$numbOfPage){
    echo " ▶";
}
else{
    echo "<a href = ".$url.($REQUEST['page']+1)."> ▶</a>";
}

if($end_p+1>$numbOfPage){
    echo " ☞";
}
else{
    echo "<a href = ".$url.($end_p+1)."> ☞</a>";
}


?>