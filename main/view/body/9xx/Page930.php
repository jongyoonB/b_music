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

        $list = $_SESSION['list_title'];
        $pageInfo = $_SESSION['pageInfo'];


        for($index_i = 0 ; $index_i < count($list)-1 ; $index_i++) {

            $url = "../ctrl/main_ctrl.php?func=".$_REQUEST['func']."&key=".$_REQUEST['key']."&code=".$list[$index_i]['title_code'];
            echo "&nbsp<span>".(($pageInfo['currentPage']-1)*$pageInfo['perPage']+$index_i+1)."</span>&nbsp&nbsp";
            echo "<span><a href = ".$url.">".$list[$index_i]['곡 명']."</a></span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['아티스트']."</span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['앨범']."</span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['장르']."</span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['발매 일']."</span>&nbsp&nbsp";
            echo "<span><a href = '../ctrl/main_ctrl.php?func=932&target=".$list[$index_i]['album_code']."'>수정</a></span>&nbsp&nbsp";
            echo "<span><a href = '../ctrl/main_ctrl.php?func=933&target=".$list[$index_i]['title_code']."'>삭제</a></span>&nbsp&nbsp";
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