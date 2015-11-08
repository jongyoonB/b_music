<style>
    span{
        border: solid 1px;
    }
</style>

<div>
    <div>
        <header>
            <span>번호</span>
            <span>곡</span>
            <span>아티스트</span>
            <span>앨범</span>
            <span>발매 일</span>
            <span>????</span>
        </header>
    </div>

    <div>
        <section>
            <?php
                //include (dirname(__FILE__).'/../../../common/common_data.php');
                //session_start();
                isset($_SESSION['list']) ? $_SESSION['list'] : null;
                //$_SESSION['list']=null;

                $list = $_SESSION['list'];
                //print_r($list[0]);
                /*print_r($list[0]);
                echo "<br>";
                print_r($list[0]['곡 명']);
                echo "<br><br><br>";*/

                for($index_i = 0 ; $index_i < count($list) ; $index_i++) {
                    $url = "ftp://suser:music!@jycom.asuscomm.com:4521/music/full/".$list[$index_i]['url'].".mp3";
                    echo "<span>".($index_i+1)."</span>";
                    echo "<span><a target='_blank' href = ".$url.">".$list[$index_i]['곡 명']."</a></span>";
                    echo "<span>".$list[$index_i]['앨범']."</span>";
                    echo "<span>".$list[$index_i]['아티스트']."</span>";
                    echo "<span>".$list[$index_i]['장르']."</span>";
                    echo "<span>".$list[$index_i]['발매 일']."</span>";
                    echo "<span>????</span>";
                    echo "<br>";
                }

            include(dirname(__FILE__) . '/../searchBar.php');
            include(dirname(__FILE__) . '/../pageNavi.php');
            ?>
        </section>
    </div>
</div>
