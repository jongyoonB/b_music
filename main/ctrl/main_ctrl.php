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


$login['id'] = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : null;
$login['status'] = isset($_SESSION['status']) ? $_SESSION['status'] : null;
/*include ("../model/template.php");
$Template = new Template();

$Template -> load('../common/common_data.php');
$Template -> load('../model/sign_in.php');
$Template -> load('../model/sign_up.php');
$Template -> load('../model/search.php');
$Template -> load('../model/song_list.php');*/



//echo $REQUEST['func']."<br>";


switch ($menu) {
    case 1: {
        if ($REQUEST['func'] == 100) {
            $login['id'] = isset($_POST['id']) ? $_POST['id'] : null;
            if ($login['id']) {
                $login['password'] = isset($_POST['password']) ? $_POST['password'] : null;
                $stmt = login($login);
                //echo $stmt."<Br>";
                switch ($stmt) {
                    case 0: {

                        /* 0 -> success
                         * 1 -> dupli
                         * -1 -> logged-in
                        */
                        $check_login = logged_in($login['id']);

                        switch ($check_login) {
                            case 0: {
                                $message = "Welcome " . $login['id'];
                                $status = userStatus($login['id']);

                                $_SESSION['login_id'] = $login['id'];
                                $_SESSION['status'] = $status['status'];
                                //print_r($_SESSION['status']);
                                $func = null;
                                break;
                            }

                            case -1:
                            case 1: {
                                $message = "Plz Log-out from other";
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


        } elseif ($REQUEST['func'] == 101) {
            signOut($_SESSION['login_id']);
            $message = "안녕히 가세유";
            $func = null;
            echo pop_message($message);
            //echo $func."<br>".$message."<Br>";
            echo load($func);
        } elseif ($REQUEST['func'] == 110) {
            $memInfo['id'] = isset($_POST['id']) ? $_POST['id'] : null;
            if ($memInfo['id']) {
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

    case 2: {

        switch ($sub) {
            case 1: {
                $view = "top_100";
                break;
            }

            case 2: {
                $view = "song_list";
                //echo $view;
                break;
            }
            default:
        }

        if (isset($_POST['key_option'])) {
            $_SESSION['key_option'] = $_GET['key_option'];
        }
        else {
            $_SESSION['key_option'] = null;
        }

        $arr = song_list($view, $REQUEST['page'], $REQUEST['key'], $_SESSION['key_option']);
        $_SESSION['list'] = $arr;
        $_SESSION['numbOfData'] = $arr['count'];

        echo load($REQUEST['func'], $REQUEST['page'], $REQUEST['key']);

        break;

    }

    default: {
        echo "!!!<br>";
        $func = 100;
        echo load($func, $REQUEST['page'], $REQUEST['key']);
        break;
    }


}

?>