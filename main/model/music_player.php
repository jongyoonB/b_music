<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-16
 * Time: 오후 10:21
 */


function songInfo($argCode, $argStatus){
    $sql = "select `곡 명`, `앨범`, `아티스트`, url, url_short, art_url from song_list where code = ".$argCode;
    $result = mysqli_query(DB_CONN(), $sql);

    if($argStatus != "admin" && $argStatus !="free"){
        $url = "url_short";
    }
    else{
        $url = "url";
    }
    //var_dump($argStatus);
    //echo "<br>".$url."<br>";
    $cnt = 0;
    while($row = mysqli_fetch_array($result))
    {
        $arrTemp[$cnt] = $row;
        $arrTemp[$cnt]['url'] = $row[$url];
        $cnt++;
    };

    if($argStatus){
        $arrTemp['status'] =  $argStatus." 회원 입니다";
    }
    else{
        $arrTemp['status'] ="비 회원 입니다";
    }

    //print_r($arrTemp);
    return $arrTemp;
}

function build_playlist($argInfo){

}

function popPlayer(){
    echo "<script>window.open('../view/body/common/music_player.php')</script>";
}