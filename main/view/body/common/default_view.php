<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-05
 * Time: 오후 9:47
 */

if(!$_REQUEST['func']){
    if($status != "admin"){
        include (dirname(__FILE__).'/./mainPage.php');
    }
    else{
        include (dirname(__FILE__).'/./mainPage_Admin.php');
    }
}

else{
    $menu = intval($_REQUEST['func'] / 100);
    $sub = ($_REQUEST['func'] /100 - intval($_REQUEST['func'] / 100))*10;
//echo $menu."<br>";
    switch($menu){

        case 2:
        case 3:
        {
            $path = (dirname(__FILE__)."/SongList.php");
            break;
        }

        case 4:{
            $path = (dirname(__FILE__)."/AlbumList.php");
            break;
        }

        case 5:{
            $path = (dirname(__FILE__)."/detail_song.php");
            break;
        }

        case 6:{
            $path = (dirname(__FILE__)."/detail_album.php");
            break;
        }

        default:{
            $path = (dirname(__FILE__)."/../".$menu."xx/Page".$_REQUEST['func'].".php");
        }
    }

    if(file_exists($path)) {
        include $path;
    }
    else{
        echo "미 구현";
    }

}

?>