<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-19
 * Time: 오후 8:31
 */
$info = isset($_SESSION['artist_info']) ? $_SESSION['artist_info'] : null;
if(!$info){
    //die ("No info(from Page 926");
    echo "null";
}

?>
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
            document.getElementById("upFile").style.display="inherit";
        }
    }
</script>

<script type="text/javascript">
    $(function(){
        $("#button_add_input").click(function(event){
            var title = "<span>타이틀&nbsp:&nbsp<input type='text' name='title_name[]' /></span>&nbsp&nbsp" +
                "<span>트랙&nbsp넘버&nbsp:&nbsp<input type='text' name='track_num[]' /></span>&nbsp&nbsp" +
                "<span>장르&nbsp:&nbsp<input type='text' name='genre[]' /></span>";
            $("#div_quotes").append(title);
            $("#div_quotes").append("\n<br />");
        });
    })
</script>

<style>
 #upFile{
     display: none;
 }
</style>

<form action="../ctrl/main_ctrl.php?func=926" method="post" enctype="multipart/form-data">
        <img width="500px" height="500px" id="upFile" src=""><br>
        <span><input name='album_art' type='file' onchange="readImage(this)"></span><br>
        <span>앨범&nbsp타이틀&nbsp:&nbsp<input type="text" name = 'album_title'></span><br>
        <span>발매일&nbsp:&nbsp<input type="date" name = 'release_date'></span><br>
    <div>
        <select id="htmlselect" name="artist_code">
            <?php
            for($index_i = 0 ; $index_i < count($info) ; $index_i ++) {
                echo "<option value='" . $info[$index_i]['artist_code'] . "' data-imagesrc='" . $info[$index_i]['artist_image'] .
                    "' data-description= '" . $info[$index_i]['artist_info'] . "'>" . $info[$index_i]['artist_name'] . "</option><BR>";
            }
            ?>
        </select>

        <script>
            $('#htmlselect').ddslick({
                onSelected: function(selectedData){
                }
            });
        </script>

    </div>
    <div id="div_quotes">
        <?php
        for ($index_i = 0 ; $index_i < 3 ; $index_i ++){
            echo "<span>타이틀&nbsp:&nbsp<input type='text' name = 'title_name[]'></span>&nbsp&nbsp";
            echo "<span>트랙&nbsp넘버&nbsp:&nbsp<input type='text' name = 'track_num[]'></span>&nbsp&nbsp";
            echo "<span>장르&nbsp:&nbsp<input type='text' name = 'genre[]'></span>";
            echo "<input name='url[]' type='file'><br>";
        }
        ?>
    </div>
    <input type="button" id="button_add_input" value="곡 추가">

    <input type="submit" value="추가">
    <input type="button" value="취소" onclick="history.back()">
</form>






