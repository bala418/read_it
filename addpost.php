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
    <div>
    </div>
</body>

</html>



<?php


include "config.php";
session_start();

$c = $_POST["community"];
$u = $_SESSION['username'];
$t = addslashes($_POST['title']);
$d = addslashes($_POST['desc']);





if (isset($_POST["submit"])) {
    $x = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $sql = "INSERT into posts (post_title,post_desc,post_image,post_user,post_subid) values('$t','$d','$x','$u','$c')";


    $result = mysqli_query($conn, $sql);



    if ($result) {
        // header("location:login.php");
        echo '<script>alert("Post added! Redirecting back to home page");
        window.location.href="home1.php"</script>';
    } else {
        echo "There is an error in the query";
    }
} else {
    echo ' nah something is wrong';
}









?>