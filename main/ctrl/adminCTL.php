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

    $sub = intval(($func%100)/10);
    $eachPageLimit = array(
        array(5,10),
        array(10,10),
        array(10,10),
        array(5,10)
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
     * 911 회원 상세 - view
     * 912 회원 수정 - view
     * 913 회원 삭제
     *
     * 920 앨범 조회 - view
     * 921 앨범 상세 - view
     * 922 앨범 추가 - view
     * 923 앨범 수정 - view
     * 924 앨범 삭제
     *
     * 930 곡 조회 -> 앨범 상세
     * 931 곡 추가 - view
     * 932 곡 수정 - view
     * 933 곡 삭제
     */
    switch($func){

        case 910:{
            $arr = list_member($currentPage, $perPage, $_REQUEST['key'], $_SESSION['key_option']);
            $_SESSION['member_info'] = $arr;
            $pageInfo = pageInfo($currentPage, $arr['count'],$perPage,$perBlock);
            $_SESSION['pageInfo'] = $pageInfo;
            echo redirect_to_view($func,$_REQUEST['key']);
            break;
        }

        case 911:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;
            if($target) {
                detail_info($target,$sub);
            }
            else{
                die("No Target");
            }
            break;
            echo redirect_to_view($func,null);
        }

        case 912:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;

            if(isset($_SESSION['pre_member_info']) && $_SESSION['pre_member_info']){
                $info['password'] = isset($_POST['password']) ? $_POST['password'] : null;
                $info['e_mail'] = isset($_POST['e_mail']) ? $_POST['e_mail'] : null;
                $info['nick'] = isset($_POST['nick']) ? $_POST['nick'] : null;
                $info['status'] = isset($_POST['status']) ? $_POST['status'] : null;
                modify_member($_SESSION['pre_member_info']['id'], $info) or die("Query Error - Modify member");
                $_SESSION['pre_member_info']=null;
                $func = 910;
                echo redirect_to_ctrl($func,null);
            }
            else{
                if($target){
                    $pre_info = member_info($target);
                    $_SESSION['pre_member_info'] = $pre_info;
                }
                else{
                    die("No Target");
                }
                $func = 912;
                echo redirect_to_view($func,null);
            }
            break;
        }


        case 913:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;
            if($target){
                delete_member($target) or die("Query Error - Delete member");
            }
            else{
                die("No target");
            }
            $func =910;
            echo redirect_to_ctrl($func,null);
            break;
        }


        case 920:{
            $arr = list_album($currentPage, $perPage, $_REQUEST['key'], $_SESSION['key_option']);
            $_SESSION['list_album'] = $arr;
            $pageInfo = pageInfo($currentPage, $arr['count'],$perPage,$perBlock);
            $_SESSION['pageInfo'] = $pageInfo;
            echo redirect_to_view($func,$_REQUEST['key']);
            break;
        }

        case 921:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;
            $detail_album = detail_info($target, $sub);
            $_SESSION['detail_album'] = $detail_album;
            echo redirect_to_view($func,null);
            break;
        }

        case 922:{
            $func = 920;
            break;
        }

        case 923:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;

            if($target){
                $pre_info = detail_info($target, $sub);

                $_SESSION['pre_album_info'] = $pre_info;
            }
            else{
                die("No Target");
            }
            echo redirect_to_view($func,null);
        }

        case 924:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;
            if($target){
                delete_album($target);
            }
            else{
                die("No target");
            }
            $func = 920;
            echo redirect_to_ctrl($func,null);
            break;
        }

        //925
        case 925:{
            $info['album_code'] = isset($_SESSION['pre_album_info']['album_code']) ? $_SESSION['pre_album_info']['album_code'] : null;
            $info['album_title'] = isset($_POST['album_title']) ? $_POST['album_title'] : null;
            $info['artist'] = isset($_POST['artist']) ? $_POST['artist'] : null;
            $info['artist_code'] = isset($_POST['artist_code']) ? $_POST['artist_code'] : null;
            $info['release_date'] = isset($_POST['release_date']) ? $_POST['release_date'] : null;
            if(count($_SESSION['pre_album_info']['title_info']) !=0){
                for ($index_i = 0; $index_i < count($_SESSION['pre_album_info']['title_info']); $index_i++) {
                    $info['title_code'][$index_i] = isset($_SESSION['pre_album_info']['title_info'][$index_i]['title_code']) ? $_SESSION['pre_album_info']['title_info'][$index_i]['title_code'] : null;
                    $info['title_name'][$index_i] = isset($_POST['title_name'][$index_i]) ? $_POST['title_name'][$index_i] : null;
                    $info['track_num'][$index_i] = isset($_POST['track_num'][$index_i]) ? $_POST['track_num'][$index_i] : null;
                    $info['album_code'][$index_i] = isset($info['album_code']) ? $info['album_code'] : null;
                    $info['genre'][$index_i] = isset($_POST['genre'][$index_i]) ? $_POST['genre'][$index_i] : null;
                }
            }

            modify_album($_SESSION['pre_album_info'][0]['album_code'], $info) or die("Query Error - Modify album");
            $_SESSION['pre_album_info']=null;
            unset( $_SESSION['pre_album_info']);
            /* print_r($_SESSION);
               exit("not Build Yet");*/
            $func = 920;
            echo redirect_to_ctrl($func,null);
        }

        case 930:{
            $arr = list_title($currentPage, $perPage, $_REQUEST['key'], $_SESSION['key_option']);
            $_SESSION['list_title'] = $arr;
            $pageInfo = pageInfo($currentPage, $arr['count'],$perPage,$perBlock);
            $_SESSION['pageInfo'] = $pageInfo;
            echo redirect_to_view($func,null);
            break;
        }


        case 931:{
            echo redirect_to_view($func,null);
            break;
        }

        case 932:{
            echo redirect_to_view($func,null);
            break;
        }

        case 933:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;
            if($target){
                delete_song($target);
            }
            else{
                die("No target");
            }
            $func = 930;
            echo redirect_to_ctrl($func,null);
            break;
        }
        default : {

        }
    }
    //$pageInfo = pageInfo($currentPage, $arr['count'], $perPage, $perBlock);
    //$_SESSION['pageInfo'] = $pageInfo;
}
