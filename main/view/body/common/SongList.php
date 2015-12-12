<div style="width: 100%">
<header style="width: 100%; border: solid">
            <span>번호</span>
            <span>곡</span>
            <span>아티스트</span>
            <span>앨범</span>
            <span>장르

            </span>
            <span>발매 일</span>
        </header>


        <section style="width: 100%; border:solid">
            <?php

                $list = $_SESSION['list'];
                $pageName = "menu".$_REQUEST['func'];
                $pageInfo = $_SESSION[$pageName];
                          for($index_i = 0 ; $index_i < count($list)-1 ; $index_i++) {

                    //redirect to detail info
                    $url = "../ctrl/main_ctrl.php?func=".$_REQUEST['func']."&key=".$_REQUEST['key']."&code=".$list[$index_i]['title_code'];
                    if(file_exists($defaultPath.$list[$index_i]['album_code'].$albumArtPath."thumbnail.jpg")){
                        $thumbnail = $defaultPath.$list[$index_i]['album_code'].$albumArtPath."thumbnail.jpg";
                    }

                    else{
                        $thumbnail = $defaultPath."no_album_artS.jpg";
                    }


                    echo "&nbsp<span>".(($pageInfo['currentPage']-1)*$pageInfo['perPage']+$index_i+1)."</span>&nbsp&nbsp";
                    echo "<span><a href = ".$url."><img src='".$thumbnail."'></a></span>&nbsp&nbsp";
                    echo "<span><a href = ".$url.">".$list[$index_i]['곡 명']."</a></span>&nbsp&nbsp";
                    echo "<span>".$list[$index_i]['아티스트']."</span>&nbsp&nbsp";
                    echo "<span>".$list[$index_i]['앨범']."</span>&nbsp&nbsp";
                    echo "<span>".$list[$index_i]['장르']."</span>&nbsp&nbsp";
                    echo "<span>".$list[$index_i]['발매 일']."</span>&nbsp&nbsp";
                    echo "<br>";
                }

            include(dirname(__FILE__) . '/../search.php');
            searchBar($pageName, $pageInfo);
            include(dirname(__FILE__) . '/../pageNavi.php');
            pageNavi($pageInfo, $_REQUEST['func'],$pageName, $_REQUEST['key']);
            ?>
        </section>


</div>