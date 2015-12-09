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

//911, 921
function  detail_info($argCondition, $argSW){
    switch($argSW){
        case 1:{
            $table = "member";
            $target = "id";
            $query = "select * from"." ".$table." where ".$target." = '".$argCondition."'";
            $result = mysqli_query(DB_CONN(), $query);
            $arrTemp =  mysqli_fetch_array($result);
            break;
        }

        case 2:
        case 3:{
            $table = "album_info";
            $table2 = "title_info";
            $table3 = "artist";

            $target = "album_code";
            $target2 = "artist_code";

            $query = "select * from"." ".$table." where ".$target." = '".$argCondition."'";

            $arrTemp = returnValue($query);

            $query2 = "select * from"." ".$table2." where ".$target." = '".$argCondition."'";
            $query3 = "select * from"." ".$table3." where ".$target2." = '".$arrTemp[0]['artist_code']."'";
            $arrTemp['title_info'] = returnValue($query2);
            $arrTemp['artist_info'] = returnValue($query3);


            break;
        }
    }


    return $arrTemp;
}

//912
function modify_member($argID, $argInfo){
    $query = "update member set password = '".$argInfo['password']."', e_mail = '".$argInfo['e_mail']."', nick = '".$argInfo['nick']."', status = '".$argInfo['status']."' where id='".$argID."'";
    return mysqli_query(DB_CONN(), $query);
}

//913
function delete_member($argID){
    $query = "delete from member where id = '".$argID."'";
    return mysqli_query(DB_CONN(), $query);
}


function member_info($argID){
    $query = "select * from member where id = '".$argID."'";
    $result = mysqli_query(DB_CONN(), $query);
    /*    echo $query;
        exit();*/
    return mysqli_fetch_array($result);
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


//922
function add_album($argInfo){

    $conn = mysqli_connect("jycom.asuscomm.com","b_admin","B!","b_music",3306);
    $query = "insert into album_info (album_title, artist_code, release_date, art_url, artS_url)  VALUES ('".$argInfo['album_title']."', '".$argInfo['artist_code']."', '".$argInfo['release_date']."','".$argInfo['album_art']."','".$argInfo['album_artS']."')";
    mysqli_query(DB_CONN(), $query) or die("insert album data Failed");

    mysqli_query($conn,$query);

    $Acode = mysqli_insert_id($conn);
    for($index_i = 0 ; $index_i < count($argInfo['track_num']) ; $index_i ++){
        $query = "insert into title_info (title_name, track_num, album_code, genre, url, url_short)  VALUES ('".$argInfo['title_name'][$index_i]."', '".$argInfo['track_num'][$index_i]."', '".$Acode."','".$argInfo['genre'][$index_i]."','".$argInfo['url'][$index_i]."','".$argInfo['urlS'][$index_i]."')";
        //echo $query."<Br>";
        $exeResult = mysqli_query(DB_CONN(), $query) or die ("insert title data Failed");
    }


    $result['result'] = $exeResult;
    $result['Acode'] = $Acode;
    return $result;

}

function updateThumbnail($artPath, $artSPath, $album_code){
    $query = "update album_info set art_url = '".$artPath."' , artS_url = '".$artSPath."' where album_code = '".$album_code."'";
    echo $query."<Br>";
    return mysqli_query(DB_CONN(), $query);
}

function artist_info(){
    $query = "select * from artist";
    $arrTemp = returnValue($query);
    return $arrTemp;
}

//923
function modify_album($argAlbum_code, $argInfo){

    for($index_i = 0 ; $index_i < count($argInfo['title_code']) ; $index_i ++){
        $query[$index_i] = "update title_info set title_info.title_name = '".$argInfo['title_name'][$index_i]."', title_info.track_num = '".$argInfo['track_num'][$index_i]."', title_info.genre = '".$argInfo['genre'][$index_i]."'";
        $query[$index_i] .= " where title_code = '".$argInfo['title_code'][$index_i]."'";
        mysqli_query(DB_CONN(), $query[$index_i]);
    }
    $query = "update album_info set album_info.album_title = '".$argInfo['album_title']."', album_info.artist_code ='".$argInfo['artist_code']."', album_info.release_date = '".$argInfo['release_date']."'";
    $query .= " where album_info.artist_code = '".$argAlbum_code."'";
    return mysqli_query(DB_CONN(), $query);
}

//924
function delete_album($argAlbum_code){
    $title_list = list_titleDeleteAlbum($argAlbum_code);

    if($title_list){
        for($index_i = 0 ; $index_i < count($title_list) ; $index_i++) {
            $query_deleteTitle = "DELETE FROM title_info WHERE title_code = '" . $title_list[$index_i]['title_code'] . "'";
            $result = mysqli_query(DB_CONN(), $query_deleteTitle) or die("Delete Title Failed - func = ".$_REQUEST['func']);
        }
    }
    $query = "delete from album_info where album_code = '".$argAlbum_code."'";
    return mysqli_query(DB_CONN(), $query) or die("Delete Album Failed");
}

function list_titleDeleteAlbum($argAlbum_code){
    $query = "select title_info.title_code from title_info where title_info.album_code = '".$argAlbum_code."'";
    return returnValue($query);
}

//930
function list_title($argPage, $perPage, $arrKey, $arrKeyOption){

    $query = "select * from song_list";
    $query2 = "select count(*) from song_list";

    if($arrKey) {
        $query .= " where ";
        $query2 .= " where ";
        if ($arrKeyOption) {

            for ($index_i = 0; $index_i < count($arrKeyOption); $index_i++) {
                switch ($arrKeyOption[$index_i]) {

                    case "title": {
                        $query .= "`곡 명` like '%" . $arrKey . "%'";
                        $query2 .= "`곡 명` like '%" . $arrKey . "%'";
                        break;
                    }

                    case "album": {
                        $query .= "`앨범` like '%" . $arrKey . "%'";
                        $query2 .= "`앨범` like '%" . $arrKey . "%'";
                        break;
                    }

                    case "artist": {
                        $query .= "`아티스트` like '%" . $arrKey . "%'";
                        $query2 .= "`아티스트` like '%" . $arrKey . "%'";
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
            $query .= "`곡 명` like '%" . $arrKey . "%' or `앨범` like '%" . $arrKey . "%' or `아티스트` like '%" . $arrKey . "%'";
            $query2 .= "`곡 명` like '%" . $arrKey . "%' or `앨범` like '%" . $arrKey . "%' or `아티스트` like '%" . $arrKey . "%'";

        }

    }


    $query .= " limit ".(($argPage-1) * $perPage).", ".$perPage;

    $arrTemp = returnValue($query);
    $count = mysqli_fetch_array(mysqli_query(DB_CONN(), $query2));
    $arrTemp['count'] = $count[0];

    return $arrTemp;

}

//931
function add_title($argInfo, $Acode){
    $conn = mysqli_connect("jycom.asuscomm.com","b_admin","B!","b_music",3306);
    $query = "insert into title_info (title_name, track_num, album_code, genre, url, url_short)  VALUES ('".$argInfo['album_title']."', '".$argInfo['artist_code']."', '".$argInfo['release_date']."','".$argInfo['album_art']."','".$argInfo['album_artS']."')";
    mysqli_query(DB_CONN(), $query) or die("insert album data Failed");

    mysqli_query($conn,$query);

    $Acode = mysqli_insert_id($conn);
    for($index_i = 0 ; $index_i < count($argInfo['track_num']) ; $index_i ++){
        $query = "insert into title_info (title_name, track_num, album_code, genre, url, url_short)  VALUES ('".$argInfo['title_name'][$index_i]."', '".$argInfo['track_num'][$index_i]."', '".$Acode."','".$argInfo['genre'][$index_i]."','".$argInfo['url'][$index_i]."','".$argInfo['urlS'][$index_i]."')";
        //echo $query."<Br>";
        $exeResult = mysqli_query(DB_CONN(), $query) or die ("insert title data Failed");
    }


    $result['result'] = $exeResult;
    $result['Acode'] = $Acode;
    return $result;
}

//932
function modify_title(){

}

//933
function delete_song($argCode){
    $query = "delete from title_info where title_code ='".$argCode."'";
    return mysqli_query(DB_CONN(), $query);
}

?>