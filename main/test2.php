<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-05
 * Time: 오후 8:24
 */

?>
<form action="./test.php" method="post">
    전체<input type="checkbox" name="key_option[]" value="total"><br>
    제목<input type="checkbox" name="key_option[]" value="title"><br>
    앨범<input type="checkbox" name="key_option[]" value="album"><br>
    가수<input type="checkbox" name="key_option[]" value="artist"><br>
    <input type="submit">
</form>

<!--<html>
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
<div>
    <form>
        id&nbsp:&nbsp<input type="text" name = "id"><br><br>
        pd&nbsp:&nbsp<input type="password" name = "password">
        <button type="submit" formaction="./test.php" formmethod="post">SignIn</button>
    </form>
</div>
</body>
</html>
-->