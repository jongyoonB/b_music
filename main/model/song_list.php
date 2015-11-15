<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: 오후 2:29
 */
include_once (dirname(__FILE__).'/../model/common_func.php');
include_once (dirname(__FILE__).'/../common/common_info.php');

//리스트 및 검색
function song_list($view, $argPage, $arrKey, $arrKeyOption){
    /*echo "key = ".$arrKey."<br> key_option = ";
    var_dump($arrKeyOption);
    echo "<br><br>";*/
    //include ('../common/common_data.php');
    //echo $view."<br>".$argPage."<br>".$arrKeyOption."<br>";
    /*sub query
    $query = "select title_info.code, title_info.title '곡 명', album_info.title '앨범', artist.name '아티스트', title_info.genre '장르', album_info.release_date '발매 일', title_info.hits 'hits', title_info.url 'url' from title_info, album_info,artist WHERE title_info.album_code = album_info.code and album_info.artist_code = artist.code;";*/

    /*join
    $query = "select title_info.title '곡 명', album_info.title '앨범', artist.name '아티스트' ,title_info.genre '장르', album_info.release_date '발매 일' from title_info INNER JOIN album_info on title_info.album_code = album_info.code INNER join artist on album_info.artist_code = artist.code;";*/

    //view
    $query = "select `곡 명`, `앨범`, `아티스트`, `장르`, `발매 일`, url from $view";
    $query2 = "select count(*) from $view";
    //var_dump($arrKeyOption);
    //echo "<Br><Br>";
    //echo count($arrKeyOption)."<br><br>";
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
    //echo $query2."<br>";

    $query .= " limit ".(($argPage-1) * perPage).", ".perPage;
    /*echo $query."<Br>";
    echo $query2."<Br>";*/

    $arrTemp = returnValue($query);
    $count = mysqli_fetch_array(mysqli_query(DB_CONN(), $query2));
    //print_r($count);
    $arrTemp['count'] = $count[0];
    //print_r($arrTemp);
    return $arrTemp;
}


//장르 별
/*function categorize_genre($argPage, $argGenre){

    $query = "select `곡 명`, `앨범`, `아티스트`, `장르`, `발매 일` from song_list where `장르` = '".$argGenre."' limit ($argPage * perPage), ($argPage * perPage + perPage)";
    return returnValue($query);
}*/

/*function search($argPage, $argKey){
    $query = "select `곡 명`, `앨범`, `아티스트`, `장르`, `발매 일` from song_list where `곡 명` like '%".$argKey."%' or `앨범` like '%".$argKey."%' or `아티스트` like '%".$argKey."%' limit ($argPage * perPage), ($argPage * perPage + perPage)";
    return returnValue($query);
}*/





