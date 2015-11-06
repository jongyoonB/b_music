<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:22
 */

include ('../common/common_data.php');
include_once ('../model/sign_in.php');
include_once ('../model/sign_up.php');
include_once ('../model/search.php');
include_once ('../model/song_list.php');

/*include ("../model/template.php");
$Template = new Template();

$Template -> load('../common/common_data.php');
$Template -> load('../model/sign_in.php');
$Template -> load('../model/sign_up.php');
$Template -> load('../model/search.php');
$Template -> load('../model/song_list.php');*/



//echo $REQUEST['func']."<br>";


switch ($menu){
    case 1:{
        if($REQUEST['func'] == 100){
            $login['id'] = isset($_POST['id']) ? $_POST['id'] : null;
            if($login['id']) {
                $login['password'] = isset($_POST['password']) ? $_POST['password'] : null;
                $stmt = login($login);
                //echo $stmt."<Br>";
                switch ($stmt) {
                    case 0: {
                        $message = "Welcome " . $login['id'];
                        //$_SESSION['message'] = $message;
                        $func = null;
                        break;
                    }

                    case 1: {
                        $message = "Plz Check Your Password";
                        $func = 100;
                        break;
                    }

                    case -1: {
                        $message = "Plz Check Your ID";
                        $func = 100;
                        break;
                    }
                }
                echo pop_message($message);
            }
            echo load($func, $REQUEST['page']);


        }

        elseif($REQUEST['func'] == 110){
            $memInfo['id'] = isset($_POST['id']) ? $_POST['id'] : null;
            if($memInfo['id']) {
                $memInfo['password'] = isset($_POST['password']) ? $_POST['password'] : null;
                $memInfo['nick'] = isset($_POST['nick']) ? $_POST['nick'] : null;
                $memInfo['mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
                $stmt = add_user($memInfo);
                echo $stmt;
                switch ($stmt) {
                    case true: {
                        $message = "SignUp Complete";
                        $func = 100;
                        break;
                    }

                    case false: {
                        $message = "SignUp Failed";
                        $func = 110;
                        break;
                    }
                }
                echo pop_message($message);
            }
            echo load($func, $REQUEST['page'], $key);

        }


        break;
    }

    case 2:{
        $key = isset($_POST['key']) ? $_POST['key'] : null;
        $key_option = isset($_POST['key_option']) ? $_POST['key_option'] : "total";

        $arr = song_list($view, $REQUEST['page'],$key, $key_option);
        $_SESSION['list'] = $arr;
        echo load($func, $REQUEST['page'], $key);
        break;
    }

    case 3:{
        if($REQUEST['func']==300){
            $key = isset($_POST['key']) ? $_POST['key'] : null;
            $key_option = isset($_POST['key_option']) ? $_POST['key_option'] : "total";

            $arr = song_list($view, $REQUEST['page'],$key, $key_option);
            $_SESSION['list'] = $arr;

            print_r($arr);
            //echo load($func, $REQUEST['page'], $key);
        }

        break;
    }

    default:{
        echo "!!!<br>";
        //header("location: ../view/main_view.php?func=100");
        break;
    }

}


?>