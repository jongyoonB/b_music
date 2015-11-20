<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-16
 * Time: 오전 10:54
 */



function adminCTL($func){
    include_once '../model/admin_func.php';
    include_once '../model/song_list.php';

    $sub = ($func%100)/10;
    $eachPageLimit = array(
        array(5,10),
        array(10,10)
    );

    $perPage = $eachPageLimit[$sub-1][0];
    $perBlock = $eachPageLimit[$sub-1][1];

    if($func%100 == 0){
        $func += 10;
        redirect_to_ctrl($func,null);
    }

    $currentPage = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;

    if (isset($_POST['key_option'])) {
        $_SESSION['key_option'] = $_POST['key_option'];
    }
    else {
        $_SESSION['key_option'] = null;
    }
    /*
     * 910 회원 조회 - view
     * 911 회원 수정 - view
     * 912 회원 삭제
     *
     * 920 앨범 조회 - view
     * 921 곡 조회
     * 922 앨범 추가 - view
     * 923 앨범 수정 - view
     * 924 앨범 삭제
     *
     */
    switch($func){

        case 910:{
            echo "$func";
            $arr = list_member($currentPage, $perPage, $_REQUEST['key'], $_SESSION['key_option']);
            $_SESSION['member_info'] = $arr;
            $pageInfo = pageInfo($currentPage, $arr['count'],$perPage,$perBlock);
            $_SESSION['pageInfo'] = $pageInfo;
            break;
        }

        case 911:{
            echo "$func";
            $info['id'] = isset($_POST['id']) ? $_POST['id'] : null;
            $info['password'] = isset($_POST['password']) ? $_POST['password'] : null;
            $info['e_mail'] = isset($_POST['e_mail']) ? $_POST['e_mail'] : null;
            $info['nick'] = isset($_POST['nick']) ? $_POST['nick'] : null;
            $info['status'] = isset($_POST['status']) ? $_POST['status'] : null;
            $stmt = modify_member($info);
            $func =910;
            break;
        }


        case 912:{
            echo "$func";

            $func =910;
            break;
        }


        case 920:{
            echo "$func";
            $arr = list_album($currentPage, $perPage, $_REQUEST['key'], $_SESSION['key_option']);
            $_SESSION['list_album'] = $arr;
            $pageInfo = pageInfo($currentPage, $arr['count'],$perPage,$perBlock);
            $_SESSION['pageInfo'] = $pageInfo;

            break;
        }

        case 921:{
            echo "$func";
            $func=210;
            echo redirect_to_ctrl($func,null);
            break;
        }

        case 922:{
            echo "$func";
            $func = 920;
            break;
        }

        case 923:{
            echo "$func";
            $func = 920;
            break;
        }

        case 930:{
            echo "$func";

            break;
        }

        default : {

        }
    }
    //$pageInfo = pageInfo($currentPage, $arr['count'], $perPage, $perBlock);
    //$_SESSION['pageInfo'] = $pageInfo;
    echo redirect_to_view($func,$_REQUEST['key']);
}
