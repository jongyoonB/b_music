<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: 오후 2:29
 */
include_once (dirname(__FILE__).'/../model/common_func.php');
define ("perPage", 5);


//리스트 및 검색
function song_list($view, $argPage, $arrKey, $arrKeyOption){

    /*sub query
    $query = "select title_info.title '곡 명', album_info.title '앨범', artist.name '가수', title_info.gerne '장르', album_info.release_date '발매 일' from title_info, album_info,artist WHERE title_info.album_code = album_info.code and album_info.artist_code = artist.code;";*/

    /*join
    $query = "select title_info.title '곡 명', album_info.title '앨범', artist.name '가수' ,title_info.gerne '장르', album_info.release_date '발매 일' from title_info INNER JOIN album_info on title_info.album_code = album_info.code INNER join artist on album_info.artist_code = artist.code;";*/

    //view
    $query = "select `곡 명`, `앨범`, `아티스트`, `장르`, `발매 일` from $view";
    if($arrKey){
        $query .=" where ";
        for($index_i = 0 ; count($arrKeyOption) ; $index_i++){
            switch($arrKeyOption[$index_i]){

                case "title":{
                    $query .= "`곡 명` like '%".$arrKey."%'";
                    break;
                }

                case "album":{
                    $query .= "`앨범` like '%".$arrKey."%'";
                    break;
                }

                case "artist":{
                    $query .= "`가수` like '%".$arrKey."%'";
                    break;
                }

                default:{
                    $query .= "`곡 명` like '%".$arrKey."%' or `앨범` like '%".$arrKey['keyword']."%' or `아티스트` like '%".$arrKey['keyword']."%'";
                    break;
                }
            }
            if(($index_i+1) != count($arrKeyOption)){
                $query .= " or ";
            }
        }
    }
    $query .= " limit ($argPage * ".perPage.", ($argPage * ".(perPage + perPage).")";
    return returnValue($query);
}


//장르 별
/*function categorize_gerne($argPage, $argGenre){

    $query = "select `곡 명`, `앨범`, `아티스트`, `장르`, `발매 일` from song_list where `장르` = '".$argGenre."' limit ($argPage * perPage), ($argPage * perPage + perPage)";
    return returnValue($query);
}*/

/*function search($argPage, $argKey){
    $query = "select `곡 명`, `앨범`, `아티스트`, `장르`, `발매 일` from song_list where `곡 명` like '%".$argKey."%' or `앨범` like '%".$argKey."%' or `아티스트` like '%".$argKey."%' limit ($argPage * perPage), ($argPage * perPage + perPage)";
    return returnValue($query);
}*/





