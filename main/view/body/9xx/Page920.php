<div style="width: 100%">
    <header style="width: 100%; border: solid">
        <span>코드</span>
        <spa`1n>앨범</span>
        <span>아티스트</span>
    </header>


    <section style="width: 100%; border:solid">
        <?php

        $list = $_SESSION['list_album'];
        $pageInfo = $_SESSION['pageInfo'];

        for($index_i = 0 ; $index_i < count($list)-1 ; $index_i++) {
            echo "&nbsp<span>".(($pageInfo['currentPage']-1)*$pageInfo['perPage']+$index_i+1)."</span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['앨범 명']."</span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['아티스트']."</span>&nbsp&nbsp";
            echo "<span><a href = '../ctrl/main_ctrl.php?func=923&target=".$list[$index_i]['album_code']."'>수정</a></span>&nbsp&nbsp";
            echo "<span><a href = '../ctrl/main_ctrl.php?func=924&target=".$list[$index_i]['album_code']."'>삭제</a></span>&nbsp&nbsp";
            echo "<br>";
        }

        /*include(dirname(__FILE__) . '/../search.php');
        searchBar("page", $pageInfo);*/
        //include(dirname(__FILE__) . '/../searchBar.php');
        include(dirname(__FILE__) . '/../pageNavi.php');
        pageNavi($pageInfo, $_REQUEST['func'],"page", $_REQUEST['key']);
        ?>
    </section>


</div>