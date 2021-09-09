<?php

include "config.php";
session_start();
if (isset($_GET['cs'])) {
    echo "hi";

    $a = $_GET['com'];

    $b = $_SESSION['zzz'];
    $c = $_SESSION['username'];
    $sql = "INSERT into comments (comment,cpid,cuser) values('$a','$b','$c')";

    echo $sql;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:singlepost.php");
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