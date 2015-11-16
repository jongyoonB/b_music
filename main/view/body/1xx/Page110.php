<html>
<head>
    <style>
        form{
            font-size : 1.5em;

        }
    </style>
    <title>가입은 처음이지?</title>
</head>

<body>
    <img src="http://i.imgur.com/X1bgKg4.jpg" width="50%" height="40%">
    <form action = "../ctrl/main_ctrl.php?func=110" method="post">
        <br>
        ID : <input type="text" name = "id" required><br><br>
        PD : <input type="text" name = "password" required>
        Nick&nbspname : <input type="text" name = "nick" required><br><br>
        E-Mail : <input type="email" name = "mail" required><br><br>
        <input type="submit" value="SignUp">
</form>
</body>
</html>