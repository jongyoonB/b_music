<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:22
 */
session_start();

include ('../common/common_data.php');
include_once ('../model/sign_in.php');
include_once ('../model/sign_up.php');
include_once ('../model/search.php');


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
        listCTL($_REQUEST['func']);
        break;
    }


    default: {
        echo "!!";
        echo redirect_to_view($_REQUEST['func'], $_REQUEST['page'], $_REQUEST['key']);
        break;
    }


}

?>