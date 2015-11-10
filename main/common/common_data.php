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
$sub = intval(($REQUEST['func']/100 - $menu)*10);

$REQUEST['page'] = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
$REQUEST['key'] = isset($_REQUEST['key']) ? $_REQUEST['key'] : null;
$_SESSION['key_option'] = isset($_POST['key_option']) ? $_POST['key_option'] & print_r($_SESSION['key_option']) : null;
echo "<script>alert('')</script>" ;

//echo "<script>alert('$REQUEST[func]')</script>";
//echo "<script>alert('$menu')</script>";
//echo "<script>alert('$sub')</script>";

//echo "<script>alert('$REQUEST[key])</script>";
/*echo "<script>alert('$REQUEST[func]')</script>";
echo "<script>alert('$menu')</script>";
echo "<script>alert('$sub')</script>";*/
//echo "<script>alert('$_SESSION[message]')</script>";
?>
