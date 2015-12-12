<div style="width: 100%">
    <header style="width: 100%; border: solid">
        <span>번호</span>
        <span>앨범</span>
        <span>아티스트</span>
    </header>


    <section style="width: 100%; border:solid">
        <?php

        $list = $_SESSION['list'];
        $pageName = "menu".$_REQUEST['func'];
        $pageInfo = $_SESSION[$pageName];

        for($index_i = 0 ; $index_i < count($list)-1 ; $index_i++) {
            if(file_exists($defaultPath.$list[$index_i]['album_code'].$albumArtPath."thumbnail.jpg")){
                $thumbnail = $defaultPath.$list[$index_i]['album_code'].$albumArtPath."thumbnail.jpg";
            }

            else{
                $thumbnail = $defaultPath."no_album_artS.jpg";
            }
            $url = "../ctrl/main_ctrl.php?func=".$_REQUEST['func']."&key=".$_REQUEST['key']."&code=9999";
            echo "&nbsp<span>".(($pageInfo['currentPage']-1)*$pageInfo['perPage']+$index_i+1)."</span>&nbsp&nbsp";
            echo "<a href = ".$url."><img src='".$thumbnail."'></a>";
            echo "<span><a href = ".$url.">".$list[$index_i]['앨범 명']."</a></span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['아티스트']."</span>&nbsp&nbsp";
            echo "<br>";
        }

        include(dirname(__FILE__) . '/../search.php');
        searchBar("page", $pageInfo);
        //include(dirname(__FILE__) . '/../searchBar.php');
        include(dirname(__FILE__) . '/../pageNavi.php');
        pageNavi($pageInfo, $_REQUEST['func'],"page", $_REQUEST['key']);
        ?>
    </section>


</div>