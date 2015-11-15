<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:30
 */

include_once 'common_func.php';

function login($login)
{

    $query = "select * from member where id = '" . $login['id'] . "'";
    //echo $query."<br>";
    if($DBvalue = mysqli_fetch_array(mysqli_query(DB_CONN(), $query))){;
        //echo $DBvalue['id'];
        //echo $DBvalue['password'];
        if ($DBvalue['id'] == $login['id']) {

            if ($DBvalue['password'] == $login['password']) {
                return 0;
            } else {
                return 1;
            }
        }
    }

    else{
        return -1;
    }

}

function logged_in($argID){
    $query = "select ip_add from member where id='".$argID."'";
    echo $query;
    $store_ip = mysqli_fetch_array(mysqli_query(DB_CONN(), $query));
    $current_ip = $_SERVER['REMOTE_ADDR'];

    echo "<script>alert('$store_ip[ip_add]')</script>" ;
    echo "<script>alert('$current_ip')</script>" ;
    if(!$store_ip['ip_add']){
        $query = "update member set ip_add = '".$current_ip."' where id = '".$argID."'";
        mysqli_query(DB_CONN(), $query);
        return 0;
    }
    else{
        if($store_ip == $current_ip){
            return 1;
        }
        else{
            return -1;
        }
    }

}

function userStatus($argID){
    $query = "select status from member where id='".$argID."'";
    return mysqli_fetch_array(mysqli_query(DB_CONN(), $query));
}

function signOut($argID){
    $query = "update member set ip_add = null where id = '".$argID."'";
    mysqli_query(DB_CONN(), $query);
    session_destroy();
}