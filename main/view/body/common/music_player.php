<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../../../common/plugin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../common/plugin/css/music_player.css">
    <script type="text/javascript" src="../../../common/plugin/js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="../../../common/plugin/jquery-jplayer/jquery.jplayer.js"></script>
    <script type="text/javascript" src="../../../common/plugin/ttw-music-player-min.js"></script>
    <script type="text/javascript" src="../../../common/plugin/jquery-jplayer/mplaylist.php"></script>
    <?php include '../../../common/plugin/jquery-jplayer/mplaylist.php';?>

    <script type="text/javascript">
        $(document).ready(function(){
            var description = '<?php echo $_SESSION['play_info']['status'] ?>';

            $('body').ttwMusicPlayer(myPlaylist, {
                autoPlay:false,
                description:description,
                jPlayer:{
                    swfPath:'../../../common/plugin/jquery-jplayer' //You need to override the default swf path any time the directory structure changes
                }
            });
        });
    </script>
</head>
<body>
