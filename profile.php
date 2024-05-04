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
    <header>
        <div class="header-logo">
            <p>
                WEBSITE
            </p>
        </div>
        <nav>
            <div class="top-nav" id="mytop-nav">
                <a href="#">HOME</a>
                <a href="#">ABOUT</a>
                <a href="https://t.me/deX1d">CONTACT</a>
            </div>
        </nav>
    </header>
    <main>
        <div class="welcome-message">
            <h1>WELCOME TO MY WEBSITE FOR 
                <span class="PT_Start">RedCheck!</span>
            </h1>
        </div>
        <div class="wrapper">
            <div class="main-about">
                <div class="about-left">
                    <img src="img/mac-img-2.png" alt="" class="mac-img">
                </div>
                <div class="about-right">
                    <h1>SOME WORDS <span class="about_me">ABOUT ME</span>
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis minus totam facere, distinctio quas, aperiam aspernatur quos voluptas
                    </p>
                    <div class="container">
                        <div class="row">
                            <div class="button_js">
                                <button id="myButton">More info</button>
                                <p id="demo"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="posting-container">
            <div class="posting-message">
                <h1>HELLO, <?php echo $_COOKIE['User'];?>! START POSTING <span class="PT_Start">HERE</span></h1>
            </h1>
            <div class="posting-area">
                <form action="profile.php" method="POST" enctype="multipart/form-data" name="upload">
                    <input type="text" class="post-name" name="title" placeholder="Name of your post"><br>
                    <textarea name="text" cols="30" rows="10" placeholder="Write your post here" class="post-text"></textarea><br>
                    <input type="file" class="post-file" name="file" /><br>
                    <button type="submit" class="btn_reg" name="submit">Upload post!</button>
                </form>
            </div>
        </div>
        </div>
    </main>
    <script type="text/javascript" src="js/button.js"></script>
</body>
</html>

<?php 
    require_once('db.php');

    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'usersdb');

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $main_text = $_POST['text'];

        if (!$title || !$main_text) die ("Заполните все поля");

        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

        if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
        if(!empty($_FILES["file"]))
        {
            if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
            || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
            || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
            && (@$_FILES["file"]["size"] < 102400))
            {
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
            }
            else
            {
                echo "upload failed!";
            }
        }
    }
?>
