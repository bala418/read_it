<?php

include "config.php";
session_start();


if (isset($_POST['ssl'])) {
    $a = $_POST['ssl'];



    $b = $_SESSION['username'];

    $yeah = "SELECT * from user where username='$b'";
    $result1 = mysqli_query($conn, $yeah);
    $hm = mysqli_fetch_assoc($result1);

    $b1 = $hm['userid'];
    // echo $b1;


    $sql = "INSERT into likes (postid,userid) values('$a','$b1')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:showsub.php");
    } else {
        echo "easfdfdfadfasdfasdf";
    }
}

if (isset($_POST['likep'])) {
    $a = $_POST['likep'];



    $b = $_SESSION['username'];

    $yeah = "SELECT * from user where username='$b'";
    $result1 = mysqli_query($conn, $yeah);
    $hm = mysqli_fetch_assoc($result1);

    $b1 = $hm['userid'];
    // echo $b1;


    $sql = "INSERT into likes (postid,userid) values('$a','$b1')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:index.php");
    } else {
        echo "easfdfdfadfasdfasdf";
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