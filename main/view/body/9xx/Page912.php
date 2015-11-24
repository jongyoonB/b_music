<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-19
 * Time: 오후 8:31
 */
    $pre_info = $_SESSION['pre_member_info'];
?>



<form action="../ctrl/main_ctrl.php" method="post">
    ID&nbsp:&nbsp<input type="text" name="id" value="<?php echo $pre_info['id']?>" readonly>
    Password&nbsp:&nbsp<input type="password" name="password" value="<?php echo $pre_info['password']?>">
    E_mail&nbsp:&nbsp<input type="text" name="e_mail" value="<?php echo $pre_info['e_mail']?>">
    Nick&nbsp:&nbsp<input type="text" name="nick" value="<?php echo $pre_info['nick']?>">
    Status&nbsp:&nbsp<input type="text" name="status" value="<?php echo $pre_info['status']?>">
    <input type = "hidden" name = "func" value="911">
    <input type="submit" value="수정">
    <input type="button" onclick="location.replace(-1)";
</form>
