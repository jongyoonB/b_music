<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-19
 * Time: 오후 8:31
*/
?>



<form action="../ctrl/main_ctrl.php?func=925" method="post" enctype="multipart/form-data">
    <div>
        <span><img src=""></span>
        <spqm><input name='album_art' type='file'></spqm><br>
        <span></span>
        <span>앨범&nbsp타이틀&nbsp:&nbsp<input type="text" name = 'album_title' value=""></span><br>
        <span>아티스트&nbsp:&nbsp<input type="text" name = 'artist' value="" readonly></span><br>
        <span>아티스트&nbsp코드&nbsp:&nbsp<input type="text" name = 'artist_code' value=""></span><br>
        <span>발매일&nbsp:&nbsp<input type="text" name = 'release_date' value=""></span>
    </div>
    <div>
            <?php

        if(($song_info['title_info'] !=null)){
            for ($index_i = 0 ; $index_i < count($song_info['title_info']) ; $index_i ++){
                echo "<span>타이틀&nbsp:&nbsp<input type='text' name = 'title_name[]' value='".$song_info['title_info'][$index_i]['title_name']."'</span>&nbsp&nbsp";
                echo "<span>트랙&nbsp넘버&nbsp:&nbsp<input type='text' name = 'track_num[]' value='".$song_info['title_info'][$index_i]['track_num']."'</span>&nbsp&nbsp";
                echo "<span>장르&nbsp:&nbsp<input type='text' name = 'genre[]' value='".$song_info['title_info'][$index_i]['genre']."'</span>&nbsp&nbsp<br>";
            }
        }
        else{
            echo "<br>수록곡이 없습니다";
        }
        ?>
    </div>

    <!--    <input type = "hidden" name = "func" value="923">
    -->    <input type="submit" value="수정">
    <input type="button" onclick="history.back()">
</form>
