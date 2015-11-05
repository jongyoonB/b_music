<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: 오후 2:29
 */
include_once (dirname(__FILE__).'/../model/common_func.php');


function all_song_list(){

    /*sub query
    $query = "select title_info.title '곡 명', album_info.title '앨범', artist.name '가수', title_info.gerne '장르', album_info.release_date '발매 일' from title_info, album_info,artist WHERE title_info.album_code = album_info.code and album_info.artist_code = artist.code;";*/

    /*join
    $query = "select title_info.title '곡 명', album_info.title '앨범', artist.name '가수' ,title_info.gerne '장르', album_info.release_date '발매 일' from title_info INNER JOIN album_info on title_info.album_code = album_info.code INNER join artist on album_info.artist_code = artist.code;";*/

    //view
    $query = "select `곡 명`, `앨범`, `아티스트`, `장르`, `발매 일` from song_list";
    return returnValue($query);
}

function top_100(){
    $query = "select `곡 명`, `앨범`, `아티스트`, `장르`, `발매 일` from song_list ORDER BY `재생 수` Limit 0, 100";
    return returnValue($query);
}

function categorize_gerne($argGerne){

    $query = "select `곡 명`, `앨범`, `아티스트`, `장르`, `발매 일` from song_list where `장르` = '".$argGerne."'";
    return returnValue($query);
}

function search($argKey){
    $query = "select `곡 명`, `앨범`, `아티스트`, `장르`, `발매 일` from song_list where `곡 명` like '%".$argKey."%' or `앨범` like '%".$argKey."%' or `아티스트` like '%".$argKey."%'";
    return returnValue($query);
}





