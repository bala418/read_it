<?php

include "config.php";
session_start();



if (isset($_POST['ssd'])) {
    $a = $_POST['ssd'];



    $b = $_SESSION['username'];

    $yeah = "SELECT * from user where username='$b'";
    $result1 = mysqli_query($conn, $yeah);
    $hm = mysqli_fetch_assoc($result1);

    $b1 = $hm['userid'];
    // echo $b1;


    $sql = "DELETE from likes where userid='$b1' and postid='$a'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:showsub.php");
    } else {
        echo "easfdfdfadfasdfasdf";
    }
}


if (isset($_POST['dislike'])) {
    $a = $_POST['dislike'];



    $b = $_SESSION['username'];

    $yeah = "SELECT * from user where username='$b'";
    $result1 = mysqli_query($conn, $yeah);
    $hm = mysqli_fetch_assoc($result1);

    $b1 = $hm['userid'];
    // echo $b1;


    $sql = "DELETE from likes where userid='$b1' and postid='$a'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:home1.php");
    } else {
        // echo "easfdfdfadfasdfasdf";
        echo $b1;
        echo $a;
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>