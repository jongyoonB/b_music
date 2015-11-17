<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-16
 * Time: 오후 10:21
 */


function songInfo($argcode, $argStatus){
    $sql = "select `곡 명`, `앨범`, `아티스트`, url, url_short, image_url from song_list where code = ".$argcode;
    $result = mysqli_query(DB_CONN(), $sql);

    if($argStatus != "free" && $argStatus != "admin")
    {
        $duration = "url_short";
    }
    else{
        $duration = "url";
    }
    $cnt = 0;
    while($row = mysqli_fetch_array($result))
    {
        $arrTemp[$cnt] = $row;
        $arrTemp[$cnt]['url'] = $row[$duration];
    };
    if($argStatus){
        $arrTemp['description'] = "$argStatus"." 회원입니다";
    }
    else{
        $arrTemp['description'] = "비 회원 입니다";
    }

    echo $argStatus."<br>".$duration."<br>".$arrTemp[0]['url']."<br>";

    return $arrTemp;
}

function build_playlist($argInfo){

}

function popPlayer(){
    echo "<script>window.open('../view/body/common/music_player.php')</script>";


}
