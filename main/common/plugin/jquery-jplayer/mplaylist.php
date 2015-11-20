<?php
session_start();
$info = $_SESSION['play_info'];
/*//print_r($info);
$path = "https://jycom.asuscomm.com/AICLOUD350640489/".$info[0]['url'];*/
?>

<script>

    var myPlaylist = [

        {
            mp3:'<?php echo $info[0]['url']?>',
            title:'<?php echo $info[0]['곡 명']?>',
            artist:'<?php echo $info[0]['아티스트']?>',
            rating:4,
            cover:'<?php echo $info[0]['art_url']?>'
    }
    ];


</script>
