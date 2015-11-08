<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-06
 * Time: 오후 7:43
 */

?>
<form action="../ctrl/main_ctrl.php?func=<?php echo $REQUEST['func']?>&page=1&key=" method="post">
    <!--전체<input type="checkbox" name="key_option[]" value="total">&nbsp-->
    제목<input type="checkbox" name="key_option[]" value="title">&nbsp
    앨범<input type="checkbox" name="key_option[]" value="album">&nbsp
    가수<input type="checkbox" name="key_option[]" value="artist">&nbsp
    <input type="text" name="key">
    <input type="submit" value="검색">
</form>

