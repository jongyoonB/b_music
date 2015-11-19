<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-06
 * Time: 오후 7:43
 */
function searchBar(){
    $cheked = isset($_SESSION['key_option']) ? $_SESSION['key_option'] : null;
    if(!$_REQUEST['key']){
        $cheked = null;
    }

    echo "<form action='../ctrl/main_ctrl.php?func=".$_REQUEST['func']."&page=".$_REQUEST['page']."&key=' method='post'>";

    echo "제목<input type='checkbox' name='key_option[]'"; if($cheked){if(in_array('title',$cheked)==true) echo 'checked';}echo " value='title'>&nbsp";
    echo "앨범<input type='checkbox' name='key_option[]'"; if($cheked){if(in_array('album',$cheked)==true) echo 'checked';}echo " value='album'>&nbsp";
    echo "가수<input type='checkbox' name='key_option[]'"; if($cheked){if(in_array('artist',$cheked)==true) echo 'checked';}echo " value='artist'>&nbsp";
    echo "<input type='text' name='key' value='".$_REQUEST['key']. "'>";
    echo "<input type='submit' value='검색'></form>";
}

?>

