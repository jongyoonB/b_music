<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-05
 * Time: 오후 7:45
 */

include_once 'common_func.php';


class Auth{
    private $Database;
    private $salt = "B!";

    function __construct(){
        $Database = DB_CONN();
        $this -> $Database = $Database;
    }

    function validateLogin($argUser, $argPassword){
        if($stmt = $this -> Database -> prepare("select * from member where id = ? AND password = ?")){
            $stmt -> bind_param("ss", $argUser, md5($argPassword, $this -> salt));
            $stmt -> execute();
            $stmt -> store_result();

            if($stmt -> num_rows > 0){
                $stmt -> close();
                return true;
            }
            else{
                $stmt->close();
                return false;
            }
        }
        else{
            die("ERROR : Could not prepare MySQLi statement");
        }
    }

    function checkLoginStream(){
        if(isset($_SESSION['loggedin'])){
            return true;
        }
        else{
            return false;
        }
    }

    function logout(){
        session_destroy();
        session_start();
    }


}