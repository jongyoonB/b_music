<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-06
 * Time: 오후 8:59
 */



?>

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
                $list = $_SESSION['list'];
                for($index_i = 0 ; count($list) ; $index_i++) {
                    echo "<span>$index_i</span>";
                    echo "<span>$list[$index_i][0]</span>";
                    echo "<span>$list[$index_i][0]</span>";
                    echo "<span>$list[$index_i][0]</span>";
                    echo "<span>$list[$index_i][0]</span>";
                    echo "<span>????</span>";
                }
            ?>
        </section>
    </div>
</div>
