<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-06
 * Time: 오후 7:43
 */

$cheked = isset($_SESSION['key_option']) ? $_SESSION['key_option'] : null;
if(!$_REQUEST['key']){
    $cheked = null;
}
?>
<form action="../ctrl/main_ctrl.php?func=<?php echo $_REQUEST['func']?>&page=<?php echo $_REQUEST['page']?>&key=" method="post">
    <!--전체<input type="checkbox" name="key_option[]" value="total">&nbsp-->
    제목<input type="checkbox" name="key_option[]" <?php if($cheked){if(in_array('title',$cheked)==true) echo 'checked';} ?> value="title">&nbsp
    앨범<input type="checkbox" name="key_option[]" <?php if($cheked){if(in_array('album',$cheked)==true) echo 'checked';} ?> value="album">&nbsp
    가수<input type="checkbox" name="key_option[]" <?php if($cheked){if(in_array('artist',$cheked)==true) echo 'checked';} ?> value="artist">&nbsp
    <input type="text" name="key" value="<?php echo $_REQUEST['key']?>">
    <!--<input type="text" name="key">-->
    <input type="submit" value="검색">
</form>


<script>

    $(function(){
        var test = localStorage.input === 'true'? true: false;
        $('input').prop('checked', test || false);
    });

    $('input').on('change', function() {
        localStorage.input = $(this).is(':checked');
        console.log($(this).is(':checked'));
    });

</script>
