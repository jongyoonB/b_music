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
define("PASSWORD", "$password");
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

function pop_message($argMessage){
    echo $argMessage;
    return "<script>alert('$argMessage')</script>";
}

function load($argFunc, $argPage, $argKey){
    return "<script>location.replace('../view/main_view.php?func=$argFunc&page=$argPage&key=$argKey')</script>";

}
