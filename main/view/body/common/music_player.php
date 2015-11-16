<?php
    $title;
    $url



//file_out to mplayer.js
?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../../../common/plugin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../common/plugin/css/music_player.css">
    <script type="text/javascript" src="../../../common/plugin/js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="../../../common/plugin/jquery-jplayer/jquery.jplayer.js"></script>
    <script type="text/javascript" src="../../../common/plugin/ttw-music-player-min.js"></script>
    <script type="text/javascript" src="../../../common/plugin/js/myplaylist.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id tortor nisi. Aenean sodales diam ac lacus elementum scelerisque. Suspendisse a dui vitae lacus faucibus venenatis vel id nisl. Proin orci ante, ultricies nec interdum at, iaculis venenatis nulla. ';

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
