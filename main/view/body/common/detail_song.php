<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-19
 * Time: 오후 8:31
 */

$song_info = $_SESSION['song_info'];
/*var_dump($song_info);
echo "<BR>";*/

?>
<div>
    <?php
    if(file_exists($defaultPath.$song_info['album_info'][0]['album_code'].$albumArtPath."/cover.jpg")) {
        $artImg = $defaultPath.$song_info['album_info'][0]['album_code'].$albumArtPath."/cover.jpg";
    }
    else{
        $artImg = $defaultPath . "no_album_art.jpg";
    }
    ?>

    <span><img src='<?php echo $artImg ?>' height='500' width='500' ></span><br>
    <span>앨범&nbsp타이틀&nbsp:&nbsp<input type="text" name = 'album_title' value="<?php echo $song_info['album_info'][0]['album_title']?>"></span><br>

    <select id="htmlselect" name="artist_code">
        <option value="<?php echo $song_info['artist_info'][0]['artist_code']?>" data-imagesrc="<?php echo $song_info['artist_info'][0]['artist_image']?>" data-description="<?php echo $song_info['artist_info'][0]['artist_info']?>"><?php echo $song_info['artist_info'][0]['artist_name']?></option><br>
    </select>

    <script>
        $('#htmlselect').ddslick({
            onSelected: function(selectedData){
            }
        });
    </script>
    <span>발매일&nbsp:&nbsp<input type="text" name = 'release_date' value="<?php echo $song_info['album_info'][0]['release_date']?>"></span>
</div>

<div id="div_quotes">
    <?php
    if(($song_info['title_info'] !=null)) {
        for ($index_i = 0; $index_i < count($song_info['title_info']); $index_i++) {
            echo "<span>타이틀&nbsp:&nbsp<a href='?'>".$song_info['title_info'][$index_i]['title_name']."</a></span>&nbsp&nbsp";
            echo "<span>트랙&nbsp넘버&nbsp:&nbsp".$song_info['title_info'][$index_i]['track_num']."</span>&nbsp&nbsp";
            echo "<span>장르&nbsp:&nbsp".$song_info['title_info'][$index_i]['genre']."</span>&nbsp&nbsp";
        }
    }

    else{
        echo "<br>수록곡이 없습니다";
    }
    ?>
</div>