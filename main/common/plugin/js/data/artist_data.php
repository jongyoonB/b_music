<?php
    $info = isset($_SESSION['artist_info']) ? $_SESSION['artist_info'] : null;
    if(!$info){
        //die ("No info(from Page 926");
    }

?>

<script>
    var artistData = [
    <?php
        for($index_i = 1 ; $index_i <= count($info) ; $index_i ++){
            echo "{";
            echo "text: \"".$info[($index_i-1)]['artist_name']."\", ";
            echo "value: ".$index_i.", ";
            echo "selected: false, ";
            echo "description: \"".$info[($index_i-1)]['artist_info']."\", ";
            echo "imageSrc: \"".$info[($index_i-1)]['artist_image']."\" ";
            echo "}";
            if($index_i != count($info)){
                echo ", ";
            }
        }
    ?>
    ];



    /*text: "Twitter",
    value: 2,
    selected: false,
    description: "Description with Twitter",
    imageSrc: "http://dl.dropbox.com/u/40036711/Images/twitter-icon-32.png"
    },*/

</script>