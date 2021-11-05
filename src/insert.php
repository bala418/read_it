<?php

include "config.php";

$un = $_POST['username'];
$p = $_POST['password'];
$e = $_POST['email'];
$x = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
// echo $x;


$sql = "INSERT into user (username,email,rpassword,userpfp) values('$un','$e','$p','$x')";


$result = mysqli_query($conn, $sql);


//create a script to alert once account created.

if ($result) {
    header("location:login.php");
} else {
    echo "error";
}
