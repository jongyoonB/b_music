<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: 오후 9:57
 */

include_once 'common_func.php';
include_once '../common/path.php';

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


//922
function add_album($argInfo){

    $conn = mysqli_connect("jycom.asuscomm.com","b_admin","B!","b_music",3306);
    $query = "insert into album_info (album_title, artist_code, release_date)  VALUES ('".$argInfo['album_title']."', '".$argInfo['artist_code']."', '".$argInfo['release_date']."')";
    $exeResult = mysqli_query($conn,$query) or die("insert album data Failed");;
    $Acode = mysqli_insert_id($conn);
    mkdefault_dir($Acode);
    $result['result'] = $exeResult;
    $result['Acode'] = $Acode;
    return $result;

}

function updateTitleUrl($mp3Path, $mp3PrevPath, $Acode){
    $query = "update title_info set url = '".$mp3Path."' , url_short = '".$mp3PrevPath."' where album_code = '".$Acode."'";
    echo $query."<Br>";
    return mysqli_query(DB_CONN(), $query);
}

function artist_info(){
    $query = "select * from artist";
    $arrTemp = returnValue($query);
    return $arrTemp;
}

//923
function modify_album($argInfo){

    $query = "update album_info set album_info.album_title = '".$argInfo['album_title']."', album_info.artist_code ='".$argInfo['artist_code']."', album_info.release_date = '".$argInfo['release_date']."'";
    if (isset($argInfo['album_art'])){
        $query .= " , art_url = '".$argInfo['album_art']."', artS_url = '".$argInfo['album_artS']."'";
    }
    $query .= " where album_info.artist_code = '".$argInfo['album_code']."'";
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
function add_title($argInfo, $index, $Acode){
    $conn = mysqli_connect("jycom.asuscomm.com","b_admin","B!","b_music",3306);
    $query = "insert into title_info (title_name, track_num, album_code, genre)  VALUES ('".$argInfo['title_name'][$index]."', '".$argInfo['track_num'][$index]."', '".$Acode."', '".$argInfo['genre'][$index]."')";
    $exeResult = mysqli_query($conn,$query) or die("insert title[$index] data Failed");
    $Tcode = mysqli_insert_id($conn);
    $result['result'] = $exeResult;
    $result['Tcode'] = $Tcode;
    return $result;
}

//932
function modify_title($argInfo, $argPreInfo, $index){

    $conn = mysqli_connect("jycom.asuscomm.com","b_admin","B!","b_music",3306);
    $titleCode_verify = "SELECT count(title_code) from title_info where title_code = '".$argInfo['title_code']."'";
    //echo $titleCode_verify."<Br><BR><BR>";
    $result = mysqli_query($conn, $titleCode_verify);
    $result = mysqli_fetch_array($result);
    //echo $result[0]."<BR><BR><BR>";
    if($result[0] == 1){
        $query = "update title_info set title_info.title_name = '".$argInfo['title_name'][$index]."', title_info.track_num = '".$argInfo['track_num'][$index]."', title_info.genre = '".$argInfo['genre'][$index]."'";
        $query .= " where title_code = '".$argInfo['title_code']."'";
        $result = mysqli_query(DB_CONN(), $query);
        $query_result = null;
        //echo "Query = ".$query."<Br>";
    }


    else{
        $query = "insert into title_info (title_name, track_num, album_code, genre) VALUES ('".$argInfo['title_name'][$index]."', '".$argInfo['track_num'][$index]."','".$argPreInfo['album_info'][0]['album_code']."', '".$argInfo['genre'][$index]."')";
        $result = mysqli_query($conn, $query);
        $query_result = mysqli_insert_id($conn);
        //echo "Query2 = ".$query."<Br>";
    }
    //echo "<BR>";
    if(!$result){
        pop_message("Error while update title");
        redirect_to_ctrl(923, null);
    }
    return $query_result;
}

//933
function delete_title($argTarget, $argTrackNum ,$argAlbum_code){

    $defaultPath = "../mp3/";
    $mp3Path = "/mp3/";
    $mp3PrePath = "/mp3/pre/";

    $mp3Path = $defaultPath.$argAlbum_code.$mp3Path.$argTrackNum.".mp3";
    $mp3PrePath = $defaultPath.$argAlbum_code.$mp3PrePath.$argTrackNum."_Pre.mp3";

    $query = "delete from title_info where title_code ='".$argTarget."'";
    /*echo $query."<Br>";
    echo $mp3Path."<BR>";
    echo $mp3PrePath."<BR>";*/
    mysqli_query(DB_CONN(), $query);
    if(file_exists($mp3Path) && file_exists($mp3PrePath)){
        unlink("$mp3Path");
        unlink("$mp3PrePath");
    }
}

?>