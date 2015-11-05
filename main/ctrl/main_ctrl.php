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

http://localhost/PHP/PJ/B_music/index.html



//echo $REQUEST['func']."<br>";


switch ($menu){
    case 1:{
        if($REQUEST['func'] == 100){
            $POST['id'] = isset($_POST['id']) ? $_POST['id'] : null;
            $POST['password'] = isset($_POST['password']) ? $_POST['password'] : null;
            $stmt = login($POST['id'], $POST['password']);
            //echo $stmt."<Br>";
            switch($stmt){
                case 0:{
                    $message = "Welcome ".$POST['id'];
                    //echo "<script>alert('$message')</script>";
                    $_SESSION['message'] = $message;
                    $func = null;
                    break;
                }

                case 1:{
                    $message = "Plz Check Your Password";
                    $func = 100;
                    break;
                }

                case -1:{
                    $message = "Plz Check Your ID";
                    $func = 100;
                    break;
                }
            }
            $_SESSION['message'] = $message;
            //echo $_SESSION['message'];
            //echo "<BR>".$message."<br>".$func."<br>";
            //header("location:../view/main_view.php?func=$func");
            echo "<script>location.replace('../view/main_view.php?func=$func')</script>";

        }

        elseif($REQUEST['func'] == 110){

        }
        break;
    }

    case 2:{

        break;
    }

    case 3:{

        break;
    }

    default:{
        echo "!!!<br>";
        //header("location: ../view/main_view.php?func=100");
        break;
    }

}


?>