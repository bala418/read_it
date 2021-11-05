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
if ($_GET['eord'] == "delete") {


    $sql = "DELETE from posts WHERE postid = $pid";


    $result = mysqli_query($conn, $sql);


    if ($result) {
        echo '<script>alert("Post Deleted! Redirecting back to user page");
        window.location.href="myprofile.php"</script>';
    } else {
        echo "error";
    }
}
if ($_GET['eord'] == "edit") {
    echo "hi";
    header("location:edit.php");
}
?>