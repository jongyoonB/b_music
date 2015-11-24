<div style="width: 100%">
    <header style="width: 100%; border: solid">
        <span>ID</span>
        <span>Name</span>
        <span>E_MAIL</span>
        <span>NICK</span>
        <span>Status</span>
        <span>remain_play</span>
    </header>


    <section style="width: 100%; border:solid">
        <?php

        $list = $_SESSION['member_info'];
        $pageInfo = $_SESSION['pageInfo'];
        for($index_i = 0 ; $index_i < count($list)-1 ; $index_i++) {

            echo "&nbsp<span>".(($pageInfo['currentPage']-1)*$pageInfo['perPage']+$index_i+1)."</span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['id']."</span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['nick']."</span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['e_mail']."</span>&nbsp&nbsp";
            echo "<span>".$list[$index_i]['status']."</span>&nbsp&nbsp";
            if($list[$index_i]['remain_play']) {
                echo "<span>" . $list[$index_i]['remain_play'] . "</span>&nbsp&nbsp";
            }
            else{
                echo "<span>" . "'Not Inserted Yet'" . "</span>&nbsp&nbsp";
            }
            echo "<span><a href = '../ctrl/main_ctrl.php?func=912&target=".$list[$index_i]['id']."'>수정</a></span>&nbsp&nbsp";
            echo "<span><a href = '../ctrl/main_ctrl.php?func=913&target=".$list[$index_i]['id']."'>삭제</a></span>&nbsp&nbsp";
            echo "<br>";
        }

        /*include(dirname(__FILE__) . '/../search.php');
        searchBar( "page", $pageInfo);*/
        //include(dirname(__FILE__) . '/../searchBar.php');
        include(dirname(__FILE__) . '/../pageNavi.php');
        pageNavi($pageInfo, $_REQUEST['func'],"page", $_REQUEST['key']);
        ?>
    </section>


</div>