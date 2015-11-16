<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-05
 * Time: 오후 9:47
 */

if(!$_REQUEST['func']){
    include (dirname(__FILE__).'/./mainPage.php');
}

else{
    $menu = intval($_REQUEST['func'] / 100);

    switch($menu){

        case 2:
        case 3:
        {
            $path = (dirname(__FILE__)."/SongList.php");
            break;
        }

        default:{
            $path = (dirname(__FILE__)."/../".$menu."xx/Page".$_REQUEST['func'].".php");
        }
    }

    include $path;
}

?>