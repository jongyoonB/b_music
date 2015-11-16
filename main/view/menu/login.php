<?php if($_REQUEST['func'] != 100){ ?>

<?php if(!$loggedin){ ?>

<html>
<head>
    <style>
        form {
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="../ctrl/main_ctrl.php?func=100" method="post">
        id&nbsp:&nbsp<input type="text" name = 'id' required>
        pd&nbsp:&nbsp<input type="password" name="password" required>
        <input type="submit" value="SignIn">
    </form><br><br>
    <a href = "../view/main_view.php?func=110">회원 가입(110)</a>&nbsp&nbsp

</body>
</html>
<?php }else{

    echo $loggedin."님<br>";
    echo $status."회원";

    ?>

<form action='../ctrl/main_ctrl.php' method="get">
    <input type='hidden' name='func' value='101'/>
    <input type='submit' value='로그아웃'/>
</form>

<?php } }?>