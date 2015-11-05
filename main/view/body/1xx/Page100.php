<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-05
 * Time: 오후 7:58
 */
?>

<html>
<head>
    <title>Login 해양!</title>
    <style>
        form {
            text-align: center;
        }
    </style>
</head>

<body>
<h2 align="center">로...그...인</h2>
    <form action="../ctrl/main_ctrl.php?func=100" method="post">
        id&nbsp:&nbsp<input type="text" name = 'id' required>
        pd&nbsp:&nbsp<input type="password" name="password" required>
        <input type="submit" value="SignIn">
    </form>
</body>
</html>
