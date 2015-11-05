<html>
<head>
    <style>
        form{
            font-size : 1.5em;
        }
    </style>
    <title>JOIN</title>
</head>

<body>
    <h2>가입은 처음이지?</h2>
    <img src="http://i.imgur.com/X1bgKg4.jpg" width="50%" height="40%">
    <form action = "../ctrl/main_ctrl.php" method="post">
        <br>
        name : <input type="text" name = "name" required><br><br>
        ID : <input type="text" name = "id" required><br><br>
        PD : <input type="text" name = "password" required>
        <input type="hidden" name="func" value="100">
        <input type="submit" value="SignUp">
</form>
</body>
</html>