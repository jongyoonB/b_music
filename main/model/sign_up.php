<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:29
 */

function add_user($memInfo){
    $query = "insert into member (id, password, nick,  e_mail) values ('".$memInfo['id']."','".$memInfo['password']."','".$memInfo['nick']."','".$memInfo['mail']."')";
    return mysqli_query(DB_CONN(), $query) or die ("SignUP Failed");
}