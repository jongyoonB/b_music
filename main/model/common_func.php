<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 7:17
 */

if($_SESSION['id'] = 'admin'){
    $user = "b_admin";
    $password = "B!";
}
else{
    $user = "b_user";
    $password = "b!";
}
define("HOST", "jycom.asuscomm.com");
define("USER", $user);
define("PASSWORD", $password);
define("DB", "b_music");
define("PORT", 3306);



function DB_CONN(){
    $conn = mysqli_connect("jycom.asuscomm.com", USER, PASSWORD, DB, PORT);
    return $conn;
}

function returnValue($argQuery){
    $result = mysqli_query(DB_CONN(), $argQuery);
    //print_r($argQuery);
    while($row = mysqli_fetch_array($result)){
        $arrTemp[] = $row;
    }
    return $arrTemp;
}

function pageInfo($argPage, $cntRecord, $perPage, $perBlock){
    $page['numbOfData'] = $cntRecord;
    $page['totalP'] = ceil($page['numbOfData'] / $perPage);
    $page['currentPage'] = ($argPage <= $page['totalP']) ? $argPage : $argPage-1;
    //$page['currentPage'] = $argPage;
    $page['block'] = ceil($argPage / $perBlock);
    $page['cntBlock'] = ceil($page['totalP'] / $perBlock);
    $page['b_startP'] = (($page['block'] -1) * $perBlock) + 1;
    $page['b_endP'] = $page['b_startP'] + $perBlock -1;
    $page['perPage'] = $perPage;
    $page['perBlock'] = $perBlock;

    if($page['b_endP'] > $page['totalP']){
        $page['b_endP'] = $page['totalP'];
    }

    return $page;

}

function pop_message($argMessage){
    echo $argMessage;
    return "<script>alert('$argMessage')</script>";
}
function redirect_to_view($argFunc, $argKey){
//function redirect_to_view($argFunc, $argPage, $argKey){
    return "<script>location.replace('../view/main_view.php?func=$argFunc&key=$argKey')</script>";
}

function redirect_to_ctrl($argFunc, $argKey){
//function redirect_to_ctrl($argFunc, $argPage, $argKey){
    return "<script>location.replace('../ctrl/main_ctrl.php?func=$argFunc&key=$argKey')</script>";
}

function redirect_to_ctrlWithSongCode($argFunc, $argCode){
    return "<script>location.replace('../ctrl/main_ctrl.php?func=$argFunc&code=$argCode')</script>";
}
