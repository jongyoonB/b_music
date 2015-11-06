<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:25
 */
//$_SESSION['message'] = isset($_SESSION['message']) ? $_SESSION['message'] : null;
$REQUEST['func'] = isset($_REQUEST['func']) ? $_REQUEST['func'] : null;
$menu = isset($REQUEST['func']) ? intval($REQUEST['func'] / 100) : null;
switch ($menu){
    case 2:{
        $view = "top_100";
    }

    case 3:{
        $view = "song_list";
    }
}
$REQUEST['page'] = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
$REQUEST['key'] = isset($_REQUEST['key']) ? $_REQUEST['key'] : null;
$SERVER['current_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;

echo "<script>alert('$REQUEST[func]')</script>";
/*echo "<script>alert('$REQUEST[func]')</script>";
echo "<script>alert('$menu')</script>";*/
//echo "<script>alert('$_SESSION[message]')</script>";
?>
