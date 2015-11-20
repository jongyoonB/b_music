<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-06
 * Time: 오후 7:43
 */
function searchBar($argPageName, $argPageInfo){
    $cheked = isset($_SESSION['key_option']) ? $_SESSION['key_option'] : null;
    if(!$_REQUEST['key']){
        $cheked = null;
    }

    $index_name = array(
        array("Title", "Album", "Artist"),
        array("ID", "Nick")
    );

    $sub = intval($_REQUEST['func'] / 100);

    switch($sub) {
        case 2:
        case 3:
        case 4:{
            $sub = 0;
            break;
        }

        case 9:{
            $sub = 1;
        }

        default:{

        }
    }
    echo "<form action='../ctrl/main_ctrl.php?func=".$_REQUEST['func']."&$argPageName=".$argPageInfo['currentPage']."&key=' method='post'>";

    for($index_i = 0 ; $index_i < count($index_name[$sub]) ; $index_i ++){
    echo $index_name[$sub][$index_i]."<input type='checkbox' name='key_option[]'"; if($cheked){if(in_array($index_name[$sub][$index_i],$cheked)==true) echo 'checked';}echo " value='".$index_name[$sub][$index_i]."'>&nbsp";
    }
    echo "<input type='text' name='key' value='".$_REQUEST['key']. "'>";
    echo "<input type='submit' value='검색'></form>";
}

?>

