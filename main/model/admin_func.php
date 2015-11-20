<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: 오후 9:57
 */

include_once 'common_func.php';

//910
function list_member($argPage, $perPage, $arrKey, $arrKeyOption){


    $query = "select * from member";
    $query2 = "select count(*) from member";

    if($arrKey) {
        $query .= " where ";
        $query2 .= " where ";
        if ($arrKeyOption) {

            for ($index_i = 0; $index_i < count($arrKeyOption); $index_i++) {
                switch ($arrKeyOption[$index_i]) {

                    case "id": {
                        $query .= "id = '".$arrKey."'";
                        $query2 .= "id = '".$arrKey."'";
                        break;
                    }

                    case "nick": {
                        $query .= "nick = '".$arrKey."'";
                        $query2 .= "nick = '".$arrKey."'";
                        break;
                    }

                    default: {
                        break;
                    }
                }
                if (($index_i + 1) != count($arrKeyOption)) {
                    $query .= " or ";
                    $query2 .= " or ";
                }
            }

        }
        else{
            $query  .= "id = '".$arrKey."' or nick = '".$arrKey."'";
            $query2  .= "id = '".$arrKey."' or nick = '".$arrKey."'";

        }
    }

    //echo $query2."<br>";

    $query .= " limit ".(($argPage-1) * $perPage).", ".$perPage;


    $arrTemp = returnValue($query);
    $count = mysqli_fetch_array(mysqli_query(DB_CONN(), $query2));
    $arrTemp['count'] = $count[0];
    /*echo $query."<Br>";
    echo $query2."<Br>";
    print_r($arrTemp);*/

    return $arrTemp;
}

//911
function modify_member(){

}

//912
function delete_member(){

}


//920
function list_album($argPage, $perPage, $arrKey, $arrKeyOption){




    $query = "select * from album_list";
    $query2 = "select count(*) from album_list";

    if($arrKey) {
        $query .= " where ";
        $query2 .= " where ";
        if ($arrKeyOption) {

            for ($index_i = 0; $index_i < count($arrKeyOption); $index_i++) {
                switch ($arrKeyOption[$index_i]) {

                    case "title": {
                        $query .= "`앨범 명` like = '%".$arrKey."%'";
                        $query2 .= "`앨범 명` like = '%".$arrKey."%'";
                        break;
                    }

                    case "artist": {
                        $query .= "`아티스트` like = '%".$arrKey."%'";
                        $query2 .= "`아티스트` like = '%".$arrKey."%'";
                        break;
                    }

                    default: {
                        break;
                    }
                }
                if (($index_i + 1) != count($arrKeyOption)) {
                    $query .= " or ";
                    $query2 .= " or ";
                }
            }

        }
        else{
            $query .= "`앨범 명` like '%" . $arrKey . "%' or `아티스트` like '%" . $arrKey . "%'";
            $query2 .= "`앨범 명` like '%" . $arrKey . "%' or `아티스트` like '%" . $arrKey . "%'";

        }
    }

    //echo $query2."<br>";

    $query .= " limit ".(($argPage-1) * $perPage).", ".$perPage;


    $arrTemp = returnValue($query);
    $count = mysqli_fetch_array(mysqli_query(DB_CONN(), $query2));
    $arrTemp['count'] = $count[0];
    /*echo $query."<Br>";
    echo $query2."<Br>";
    print_r($arrTemp);*/

    return $arrTemp;

}

//921
function add_album(){

}

//922
function modify_album(){

}

//923
function delete_album(){

}

//924
function delete_song(){

}

?>