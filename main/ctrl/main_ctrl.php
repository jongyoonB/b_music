<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:22
 */
session_start();

include ('../common/common_data.php');
include_once ('../common/common_info.php');
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

                        /* 0 -> success
                         * 1 -> dupli
                         * -1 -> logged-in
                        */
                        $check = logged_in($login['id']);

                        switch($check){
                            case 0:{
                                $message = "Welcome " . $login['id'];
                                $func = null;
                                break;
                            }

                            case 1:{
                                $message = "Plz Log-out from other browser";
                                $func = 100;
                                break;
                            }

                            case -1:{
                                $message = "U Already Logged in";
                                $func = null;
                                break;
                            }
                        }

                        //$_SESSION['message'] = $message;

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
            echo load($func);
            //header('location: ../view/main_view.php?func='.$func);


        }

        elseif($REQUEST['func'] == 110){
            $memInfo['id'] = isset($_POST['id']) ? $_POST['id'] : null;
            if($memInfo['id']) {
                $memInfo['password'] = isset($_POST['password']) ? $_POST['password'] : null;
                $memInfo['nick'] = isset($_POST['nick']) ? $_POST['nick'] : null;
                $memInfo['mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
                $stmt = add_user($memInfo);
                //echo $stmt;
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
            echo load($func);
            //header('location: ../view/main_view.php?func='.$func);

        }


        break;
    }

    case 2:{
        //echo "sub = ".$sub."<br>";
        switch ($sub){
            case 0:{
                $view = "top_100";
                break;
            }

            case 1:{
                $view = "song_list";
                //echo $view;
                break;
            }

        }

        $key = isset($_POST['key']) ? $_POST['key'] : null;
        $key_option = isset($_POST['key_option']) ? $_POST['key_option'] : "total";
        /*echo $key."<br>".$view."<br>".$REQUEST['page']."<br>";
        print_r($key_option);
        echo "<br>";*/

        $arr = song_list($view, $REQUEST['page'],$key, $key_option);
        //print_r($arr);
        //$_SESSION['numbPage'] = (count($arr) % per_page ==0) ? floor($numOfRows / per_page) : floor($numOfRows / per_page) +1;
        $_SESSION['list'] = $arr;
        //print_r($_SESSION['numbPage']);
        //print_r($_SESSION['list']);
        //echo "<br>".$REQUEST['page']."<br>".$key."<br>";


        //header('location: ../view/main_view.php?func='.$func);

        echo load($REQUEST['func'], $REQUEST['page'], $key);

        break;
    }

    default:{
        echo "!!!<br>";
        //header("location: ../view/main_view.php?func=100");
        break;
    }

}


?>