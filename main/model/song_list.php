<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: 오후 2:29
 */
include_once (dirname(__FILE__).'/../model/common_func.php');
include_once (dirname(__FILE__).'/../model/music_player.php');

//리스트 및 검색
function song_list($orderByHits, $argPage, $argGenre, $arrKey, $arrKeyOption, $perPage){

    /*sub query
    $query = "select title_info.code, title_info.title '곡 명', album_info.title '앨범', artist.name '아티스트', title_info.genre '장르', album_info.release_date '발매 일', title_info.hits 'hits', title_info.url 'url' from title_info, album_info,artist WHERE title_info.album_code = album_info.code and album_info.artist_code = artist.code;";*/

    /*join
    $query = "select title_info.title '곡 명', album_info.title '앨범', artist.name '아티스트' ,title_info.genre '장르', album_info.release_date '발매 일' from title_info INNER JOIN album_info on title_info.album_code = album_info.code INNER join artist on album_info.artist_code = artist.code;";*/

    //view
    $query = "select * from song_list";
    $query2 = "select count(*) from song_list";
    /*var_dump($arrKeyOption);
    echo "<Br><Br>";
    echo count($arrKeyOption)."<br><br>";*/
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
            if($argGenre){
                $query .= " and `장르` like '%".$argGenre."%'";
            }
        }
        else{
            $query .= "`곡 명` like '%" . $arrKey . "%' or `앨범` like '%" . $arrKey . "%' or `아티스트` like '%" . $arrKey . "%'";
            $query2 .= "`곡 명` like '%" . $arrKey . "%' or `앨범` like '%" . $arrKey . "%' or `아티스트` like '%" . $arrKey . "%'";

            if($argGenre){
                $query .= "and `장르` like '%".$argGenre."%'";
                $query2 .= "and `장르` like '%".$argGenre."%'";
            }
        }
    }
    else{
        if($argGenre){
            $query .= " where `장르` like '".$argGenre."'";
            $query2 .= " where `장르` like '".$argGenre."'";
        }

    }
    //echo $query2."<br>";
    if($orderByHits){
        $query .= " order by hits desc, `곡 명` asc";
    }
    $query .= " limit ".(($argPage-1) * $perPage).", ".$perPage;


    $arrTemp = returnValue($query);
    $count = mysqli_fetch_array(mysqli_query(DB_CONN(), $query2));
    $arrTemp['count'] = $count[0];
    echo $query."<Br>";
    echo $query2."<Br>";
    print_r($arrTemp);

    return $arrTemp;
}
