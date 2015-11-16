<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-16
 * Time: 오후 10:21
 */


function songInfo($argcode){
    $sql = "select `곡 명`, `앨범`, `아티스트`, url from song_list where code = ".$argcode;
    $result = mysqli_query(DB_CONN(), $sql);
    while($row = mysqli_fetch_array($result))
    {
        $arrTemp[] = $row;
    };
    return $arrTemp;
}

function build_playlist($argInfo){

}

function popPlayer(){
    echo "<script>window.open('../view/body/common/music_player.php')</script>";
}