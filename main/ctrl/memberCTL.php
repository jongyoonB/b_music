<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-16
 * Time: 오전 10:54
 */

<<<<<<< HEAD
include_once ('../model/sign_in.php');
include_once ('../model/sign_up.php');

=======
>>>>>>> origin/JY_B

function memberCTL($func){
    if ($func == 100) {
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
        echo redirect_to_view($func, $_REQUEST['page'], $_REQUEST['key']);

    } elseif ($func == 101) {
        signOut($_SESSION['login_id']);
        $message = "안녕히 가세유";
        $func = null;
        echo pop_message($message);
        //echo $func."<br>".$message."<Br>";
        echo redirect_to_view($func, $_REQUEST['page'], $_REQUEST['key']);    } elseif ($func == 110) {
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
        echo redirect_to_view($func, $_REQUEST['page'], $_REQUEST['key']);
    }
}

