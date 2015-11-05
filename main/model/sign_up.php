<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ¿ÀÈÄ 2:29
 */

function add_user($argInfo){
    $query = "insert into member (name, id, password, e_mail) values ('".$argInfo['name']."','".$argInfo['id']."','".$argInfo['password']."','".$argInfo['e_mail']."')";
    return mysqli_query($query) or die ("SignUP Failed");
}