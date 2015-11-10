<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-06
 * Time: 오후 2:43
 */
include_once ('../common/common_info.php');

//$numbOfPage = $_SESSION['numbPage'];
//$numbOfPage=($numbOfRows % perPage == 0) ? floor($numbOfRows / perPage) : floor($numbOfRows / perPage) +1;
/*$start_p = ($REQUEST['page'] % 10 !=0) ? floor($REQUEST['page'] / 10)*10 +1 : floor(($REQUEST['page']-1) / 10)*10 + 1;
$end_p = ($start_p+9 < $numbOfPage) ? $start_p + 9 : $numbOfPage;*/
//$numbOfrows = $_SESSION['numbPage'];

$numbOfrows = $_SESSION['numbOfRows'];
$block = ceil($REQUEST['page'] / perBlock);
$b_startP = (($block -1) * perBlock) + 1;
$b_endP = $b_startP + perBlock -1;
$totalP = ceil($numbOfrows / perPage);

if($b_endP > $totalP){
    $b_endP = $totalP;
}


//echo $numbOfPage."<br>".$start_p."<br>".$end_p."<Br>";
$url = "../ctrl/main_ctrl.php?func=$REQUEST[func]&Key=$REQUEST[key]&page=";
//$url = "../ctrl/main_ctrl.php?func=$REQUEST[func]&key=$REQUEST[key]&page=";


if($b_startP == 1){
    echo "☜ ";
}
else{
    echo "<a href = ".$url.($start_p-perPage).">☜ </a>";
}

if($REQUEST['page'] == 1){
    echo "◀ ";
}

else{
    echo "<a href = ".$url.($REQUEST['page']-1).">◀ </a>";
}


for ($index_I = $b_startP; $index_I <= $b_endP; $index_I++) {
    if($REQUEST['page'] == $index_I){
        echo "&nbsp[".$index_I."]&nbsp</a>";
    }
    else {
        echo "<a href = ../ctrl/main_ctrl.php?func=$REQUEST[func]&key=$REQUEST[key]&page=$index_I>&nbsp" .$index_I."&nbsp</a>";
    }
}

if($REQUEST['page']>=$totalP){
    echo " ▶";
}
else{
    echo "<a href = ".$url.($REQUEST['page']+1)."> ▶</a>";
}

if($b_endP+1>$totalP){
    echo " ☞";
}
else{
    echo "<a href = ".$url.($b_endP+1)."> ☞</a>";
}


?>