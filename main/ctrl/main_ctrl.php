<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:22
 */
session_start();
include_once ('../model/common_func.php');

$login['id'] = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : null;
$login['status'] = isset($_SESSION['status']) ? $_SESSION['status'] : null;

//echo $REQUEST['func']."<br>";
$menu = isset($_REQUEST['func']) ? intval($_REQUEST['func'] / 100) : null;


switch ($menu) {
    case 1: {
        include_once './memberCTL.php';
        memberCTL($_REQUEST['func']);
        break;
    }

    case 2:
    case 3:{
        include_once './listCTL.php';

        listCTL($_REQUEST['func'], isset($_REQUEST['code']) ? $_REQUEST['code'] : null);
        break;
    }


    default: {
        echo redirect_to_view($_REQUEST['func'], $_REQUEST['page'], $_REQUEST['key']);
        break;
    }


}

?>