<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-16
 * Time: 오전 10:54
 */

include_once ('../model/song_list.php');


function listCTL($func){

    $argCode = isset($_REQUEST['code']) ? $_REQUEST['code'] : null;
    $argStatus = isset($_SESSION['status']) ? $_SESSION['status'] : null;

    $menu = intval($func / 100);
    $sub = ($func%100)/10;
    if($func%100 == 0){
        $func += 10;
        echo redirect_to_ctrl($func,null);
    }
    else {
        $pageName = "menu" . strval($func);

        $pageinfo = isset($_SESSION[$pageName]) ? $_SESSION[$pageName] : null;
        if (!$pageinfo) {
            $pageNumb = isset($_REQUEST[$pageName]) ? $_REQUEST[$pageName] : 1;
        } else {
            $pageNumb = isset($_REQUEST[$pageName]) ? $_REQUEST[$pageName] : $pageinfo['currentPage'];
        }
        //echo $pageNumb;
        $pageLimit = array(
            array(5, 10), //all song
            array(4, 8),  //top_100
            array(3, 5)   //genre
        );


        if (isset($_POST['key_option'])) {
            $_SESSION['key_option'] = $_POST['key_option'];
        } else {
            $_SESSION['key_option'] = null;
        }

        //top_100 -> order
        if ($menu == 2) {
            if ($sub == 2) {
                $orderByHits = true;
            } else {
                $orderByHits = false;
            }
            $perPage = $pageLimit[($sub - 1)][0];
            $perBlock = $pageLimit[($sub - 1)][1];
            $arr = song_list($orderByHits, $pageNumb, null, $_REQUEST['key'], $_SESSION['key_option'], $perPage);

        } else {
            $sub = intval($sub - 1);
            $eachPageGenre = array('k-pop', 'pop', 'rock', 'electronic');
            $perPage = $pageLimit[($menu - 1)][0];
            $perBlock = $pageLimit[($menu - 1)][1];
            $arr = song_list(false, $pageNumb, $eachPageGenre[$sub], $_REQUEST['key'], $_SESSION['key_option'], $perPage);
        }

        $_SESSION['list'] = $arr;
        $pageInfo = pageInfo($pageNumb, $arr['count'], $perPage, $perBlock);
        $_SESSION[$pageName] = $pageInfo;

        if ($argCode) {
            $info = songInfo($argCode, $argStatus);
            $_SESSION['play_info'] = $info;
            popPlayer();
        }
        //print_r($_SESSION['play_info']);
        /*print_r($_SESSION);
        echo "<br>";
        echo $pageName."<br>";
        echo $pageNumb."<br>";
        echo $arr['count']."<br>";
        echo $pageLimit[$menu-1][0]."<br>";
        echo $pageLimit[$menu-1][1]."<br>";
        print_r($pageInfo);*/
        //print_r($pageInfo);


        //echo redirect_to_view($_REQUEST['func'], $_REQUEST['key']);
        echo redirect_to_view($func, $_REQUEST['key']);
    }
}