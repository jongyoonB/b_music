<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-19
 * Time: 오후 8:31
 */
    $pre_info = $_SESSION['pre_album_info'];

?>



<form action="../ctrl/main_ctrl.php?func=925" method="post">
    <div>
        <span><img src="<?php echo $pre_info[0]['art_url'];?>"></span>
        <span></span>
        <span>앨범&nbsp타이틀&nbsp:&nbsp<input type="text" name = 'album_title' value="<?php echo $pre_info[0]['album_title']?>"></span><br>
        <span>아티스트&nbsp:&nbsp<input type="text" name = 'artist' value="<?php echo $pre_info['artist_info'][0]['artist_name']?>" readonly></span><br>
        <span>아티스트&nbsp코드&nbsp:&nbsp<input type="text" name = 'artist_code' value="<?php echo $pre_info['artist_info'][0]['artist_code']?>"></span><br>
        <span>발매일&nbsp:&nbsp<input type="text" name = 'release_date' value="<?php echo $pre_info[0]['release_date']?>"></span>
    </div>
    <div>
        <?php

            if(($pre_info['title_info'] !=null)){
                for ($index_i = 0 ; $index_i < count($pre_info['title_info']) ; $index_i ++){
                    echo "<span>타이틀&nbsp:&nbsp<input type='text' name = 'title_name[]' value='".$pre_info['title_info'][$index_i]['title_name']."'</span>&nbsp&nbsp";
                    echo "<span>트랙&nbsp넘버&nbsp:&nbsp<input type='text' name = 'track_num[]' value='".$pre_info['title_info'][$index_i]['track_num']."'</span>&nbsp&nbsp";
                    echo "<span>장르&nbsp:&nbsp<input type='text' name = 'genre[]' value='".$pre_info['title_info'][$index_i]['genre']."'</span>&nbsp&nbsp<br>";
                }
            }
            else{
                echo "<br>수록곡이 없습니다";
            }
        ?>
    </div>

<!--    <input type = "hidden" name = "func" value="923">
-->    <input type="submit" value="수정">
    <input type="button" onclick="location.replace(-1)">
</form>
