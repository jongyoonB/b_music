<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-05
 * Time: 오후 9:47
 */

include ('../common/common_data.php');

if(!$REQUEST['func']){
    include (dirname(__FILE__).'/./mainPage.php');
}

else{

    switch($menu){

        case 2:
        {
            $path = (dirname(__FILE__)."/SongList.php");
            break;
        }

        default:{
            $path = (dirname(__FILE__)."/../".$menu."xx/Page".$REQUEST['func'].".php");
        }
    }

    include $path;
}

?>