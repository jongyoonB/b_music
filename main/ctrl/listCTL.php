<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-16
 * Time: 오전 10:54
 */
include_once ('../model/song_list.php');


function listCTL($func){


    $menu = intval($func / 100);
    $sub = $func%100/10;

    if($sub == 0){
        $func += 10;
        echo redirect_to_ctrl($func, $_REQUEST['page'], $_REQUEST['key']);
    }


    $eachPageLimit = array(
        array(5,10), //all song
        array(4,8),  //top_100
        array(3,5)   //genre
    );



    if (isset($_POST['key_option'])) {
        $_SESSION['key_option'] = $_POST['key_option'];
    }
    else {
        $_SESSION['key_option'] = null;
    }

    if($menu == 2){
        switch ($sub) {
            case 1: {
                $view = "song_list";
                break;
            }

            case 2: {
                $view = "top_100";
                //echo $view;
                break;
            }
            default:
        }
        $arr = song_list($view, $_REQUEST['page'], null, $_REQUEST['key'], $_SESSION['key_option'], $eachPageLimit[$sub-1][0]);
    }
    else{
        $sub = intval($sub-1);
        $view = 'song_list';
        $eachPageGenre = array('k-pop', 'pop', 'rock', 'electronic');
        //print_r($eachPageGenre);
        $arr = song_list($view, $_REQUEST['page'], $eachPageGenre[$sub], $_REQUEST['key'], $_SESSION['key_option'], $eachPageLimit[$menu-1][0]);
    }

    $_SESSION['list'] = $arr;
    $_SESSION['numbOfData'] = $arr['count'];
    //print_r($_SESSION['list']);
    echo redirect_to_view($_REQUEST['func'], $_REQUEST['page'], $_REQUEST['key']);
}