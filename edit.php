<?php


include "config.php";
session_start();

$pid = $_SESSION['cp'];

$sql = "SELECT * from posts WHERE postid = $pid";


$result = mysqli_query($conn, $sql);

$x = mysqli_fetch_assoc($result);

mysqli_free_result($result);


$sql = "SELECT * from subreddit";
$res = mysqli_query($conn, $sql);
$z = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/newpost.css">
</head>

<body>



    <div>
        <h1 style="text-align: center;margin-top:20px">Hi <?php echo $_SESSION['username']; ?></h1>
    </div>
    <form action="addpostupdate.php" method="get">
        <div class=" area">



            <div class="i">
                <h1>Edit post</h1>
                <label for="">Community:</label>
                <select name="community" id="" required>
                    <?php foreach ($z as $y) { ?>
                        <option value="<?php echo $y['subredditid'] ?>"><?php echo $y['sub'] ?></option>
                    <?php } ?>
                </select><br>
                <label for="">Post-Title:</label>
                <input type="text" name="title" placeholder="Enter title of your post" required value="<?php echo $x['post_title'] ?>"><br>
                <label for="">Description:</label>
                <input type="text" name="desc" placeholder="Description" required value="<?php echo $x['post_desc'] ?>">
                <button type="submit" value="hmm" name="submit">Edit</button>
            </div>
        </div>
    </form>
</body>

</html>