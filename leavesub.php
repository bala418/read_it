<?php

include "config.php";
session_start();


$a = $_POST['sub'];



$b = $_SESSION['username'];

$yeah = "SELECT * from user where username='$b'";
$result1 = mysqli_query($conn, $yeah);
$hm = mysqli_fetch_assoc($result1);

$b1 = $hm['userid'];
// echo $b1;


$sql = "DELETE from follow where fuserid='$b1' and fsubid='$a'";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("location:showsub.php");
} else {
    echo "easfdfdfadfasdfasdf";
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