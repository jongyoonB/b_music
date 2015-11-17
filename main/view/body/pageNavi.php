<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-06
 * Time: 오후 2:43
 */

$numbOfData = $_SESSION['numbOfData'];
$block = ceil($_REQUEST['page'] / 10);
$b_startP = (($block -1) * 10) + 1;
$b_endP = $b_startP + 10 -1;
$totalP = ceil($numbOfData / 10);

if($b_endP > $totalP){
    $b_endP = $totalP;
}


//echo "<br>".$b_startP."<br>".$b_endP."<Br>".$totalP."<br>";
$url = "../ctrl/main_ctrl.php?func=$_REQUEST[func]&Key=$_REQUEST[key]&page=";
//$url = "../ctrl/main_ctrl.php?func=$REQUEST[func]&key=$REQUEST[key]&page=";


if($b_startP == 1){
    echo "☜ ";
}
else{
    echo "<a href = ".$url.($start_p-10).">☜ </a>";
}

if($_REQUEST['page'] == 1){
    echo "◀ ";
}

else{
    echo "<a href = ".$url.($_REQUEST['page']-1).">◀ </a>";
}


for ($index_I = $b_startP; $index_I <= $b_endP; $index_I++) {
    if($_REQUEST['page'] == $index_I){
        echo "&nbsp[".$index_I."]&nbsp</a>";
    }
    else {
        echo "<a href = ../ctrl/main_ctrl.php?func=$_REQUEST[func]&key=$_REQUEST[key]&page=$index_I>&nbsp" .$index_I."&nbsp</a>";
    }
}

if($_REQUEST['page']>=$totalP){
    echo " ▶";
}
else{
    echo "<a href = ".$url.($_REQUEST['page']+1)."> ▶</a>";
}

if($b_endP+1>$totalP){
    echo " ☞";
}
else{
    echo "<a href = ".$url.($b_endP+1)."> ☞</a>";
}


?>