<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSITE</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<main>
    <div class="registration">
        <h1>Вход</h1>
        <div class="registration_form">
            <div class="col-12">
                <form method="POST" action="login.php">
                    <div class="form_reg"><input type="text" class="form" name="username" placeholder="Login"></div>
                    <div class="form_reg"><input type="password" class="form" name="password" placeholder="Password"></div>
                    <button class="btn_reg" name="submit" type="submit">Войти</button>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>

<?php 
    require_once('db.php');

    if (isset($_COOKIE['User'])) {
        header("Location: profile.php");
    }

    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'usersdb');

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!$username || !$password) die ('Пожалуйста введите все значения!');

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

        $result = mysqli_query($link, $sql);

        if(mysqli_num_rows($result) == 1) {
            setcookie("User", $username, time()+7200);
            header('Location: profile.php');
        } else {
            echo "Не правильное имя или пароль";
        }
    }
?>
