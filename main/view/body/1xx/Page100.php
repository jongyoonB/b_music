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
    <form action="../ctrl/main_ctrl.php?func=100" method="post">
        <img src = "http://i.imgur.com/7pDE27y.jpg"><br><br>
        id&nbsp:&nbsp<input type="text" name = 'id' required>
        pd&nbsp:&nbsp<input type="password" name="password" required>
        <input type="submit" value="SignIn">
    </form>
</body>
</html>
