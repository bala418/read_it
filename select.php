<?php

session_start();

include "config.php";

$x = $_POST['username'];
$y = $_POST['password'];

$sql = "select * from user where username='$x' and rpassword='$y'";

$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);


if ($count > 0) {
    // $_SESSION['userid']=$y;
    $_SESSION['username'] = $x;
    header("location:home1.php");
} else {
    echo "<h1>Wrong Password! please try again</h1>";
}
