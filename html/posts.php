<?php 
    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'usersdb');
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id=$id";
    $res = mysqli_query($link, $sql);
    $rows = mysqli_fetch_array($res);
    $title = $rows['title'];
    $main_text = $rows['main_text'];
?>

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
    <?php
        echo "<h1>$title</h1>";
        echo "<p>$main_text</p>";
    ?>
</body>
</html>
