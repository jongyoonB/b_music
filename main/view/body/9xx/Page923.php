<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-19
 * Time: 오후 8:31
 */

    $pre_info = $_SESSION['pre_info'];
    /*
    var_dump($pre_info);
    echo "<BR>";
    var_dump($pre_info['artist_info']);
    echo "<BR>";
    var_dump($pre_info['album_info']);
    echo "<BR>";
    var_dump($pre_info['title_info']);
    echo "<BR>";*/
?>
<script type="text/javascript">
    $(function(){
        $("#button_add_input").click(function(event){
            var title = "<span>타이틀&nbsp:&nbsp<input type='text' name='title_name[]' /></span>&nbsp&nbsp" +
                "<span>트랙&nbsp넘버&nbsp:&nbsp<input type='text' name='track_num[]' /></span>&nbsp&nbsp" +
                "<span>장르&nbsp:&nbsp<input type='text' name='genre[]' /></span>&nbsp&nbsp" +
                "<span><input name='url[]' type='file' /></span>";
            $("#div_quotes").append(title);
            $("#div_quotes").append("\n<br />");
        });
    })
</script>

<script>
    function readImage(inputFile)
    {
        if(inputFile.files && inputFile.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e)
            {
                $('#upFile').attr('src', e.target.result);
            }
            reader.readAsDataURL(inputFile.files[0]);
        }
        else{
            <?php

            if($pre_info[0]['art_url']) {
                $artImg = $albumArtPath . $pre_info[0]['art_url'];
            }
            else{
                $artImg = $albumArtPath . "no_album_art.jpg";
            }
        ?>
            $('#upFile').attr('src', '<?php echo $artImg ?>');
        }
    }

</script>

<form action="../ctrl/main_ctrl.php?func=925" method="post" enctype="multipart/form-data">
    <div>
        <?php
            if($pre_info['album_info'][0]['art_url']) {
                $artImg = $albumArtPath . $pre_info['album_info'][0]['art_url'];
            }
            else{
                $artImg = $albumArtPath . "no_album_art.jpg";
            }
        ?>

        <span><img id='upFile' src='<?php echo $artImg ?>' height='500' width='500' ></span>
        <span><input name='album_art' type='file' onchange="readImage(this)"></span><br>
        <span>앨범&nbsp타이틀&nbsp:&nbsp<input type="text" name = 'album_title' value="<?php echo $pre_info['album_info'][0]['album_title']?>"></span><br>

        <select id="htmlselect" name="artist_code">
            <option value="<?php echo $pre_info['artist_info'][0]['artist_code']?>" data-imagesrc="<?php echo $pre_info['artist_info'][0]['artist_image']?>" data-description="<?php echo $pre_info['artist_info'][0]['artist_info']?>"><?php echo $pre_info['artist_info'][0]['artist_name']?></option><br>
        </select>

        <script>
            $('#htmlselect').ddslick({
                onSelected: function(selectedData){
                }
            });
        </script>
        <span>발매일&nbsp:&nbsp<input type="text" name = 'release_date' value="<?php echo $pre_info['album_info'][0]['release_date']?>"></span>
    </div>

    <div id="div_quotes">
        <?php
        if(($pre_info['title_info'] !=null)) {
            for ($index_i = 0; $index_i < count($pre_info['title_info']); $index_i++) {
                echo "<span>타이틀&nbsp:&nbsp<input type='text' name = 'title_name[]' value='".$pre_info['title_info'][$index_i]['title_name']."'</span>&nbsp&nbsp";
                echo "<span>트랙&nbsp넘버&nbsp:&nbsp<input type='text' name = 'track_num[]' value='".$pre_info['title_info'][$index_i]['track_num']."'</span>&nbsp&nbsp";
                echo "<span>장르&nbsp:&nbsp<input type='text' name = 'genre[]' value='".$pre_info['title_info'][$index_i]['genre']."'</span>&nbsp&nbsp";
                echo "<input name='url[]' type='file'><br>";
            }
        }

        else{
            echo "<br>수록곡이 없습니다";
        }
        ?>
    </div>
    <input type="button" id="button_add_input" value="곡 추가"><br>

    <input type="submit" value="수정">
    <input type="button" value="취소" onclick="history.back()">
</form>
