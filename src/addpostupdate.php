<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('images/wallpaper.webp');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>

</body>

</html>



<?php

include "config.php";
session_start();


$pid = $_SESSION['cp'];

$a = $_GET['title'];
$b = $_GET['desc'];
$c = $_GET['community'];

$sql = "update posts set post_title = '$a', post_desc = '$b' , post_subid ='$c' where postid ='$pid'";

$result = mysqli_query($conn, $sql);


if ($result) {
    echo '<script>alert("Post edited! Redirecting back to home page");
        window.location.href="index.php"</script>';
} else {
    echo "error";
}

?>