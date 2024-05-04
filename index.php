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
        <div class="welcome-message">
            <h1>Страница постов!</h1>
            <?php 
                if (!isset($_COOKIE['User'])) {
                    ?>
                    <p><a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>, чтобы просматривать контент!</p>
                    <?php
                } else {
                    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'usersdb');

                    $sql = "SELECT * FROM posts";
                    $res = mysqli_query($link, $sql);

                    if (mysqli_num_rows($res) >  0) {
                        while ($post = mysqli_fetch_array($res)) {
                            echo "<a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a><br>";
                        }
                    } else {
                            echo "Записей пока нет";
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>
