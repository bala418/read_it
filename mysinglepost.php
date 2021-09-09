<?php
session_start();
include "config.php";
// echo $_SESSION['username'];

if (isset($_GET['onepost'])) {

    $l = $_GET['onepost'];
    $_SESSION['megatemp'] = $l;
} else {

    $l = $_SESSION['megatemp'];
}

$_SESSION['zzz'] = $l;
$_SESSION['cp'] = $l;
$sql = "SELECT * from posts WHERE postid = $l";


$result = mysqli_query($conn, $sql);


$x = mysqli_fetch_assoc($result);
$t = $x['post_subid'];
$sal = "SELECT * from comments inner JOIN `user` on comments.cuser=`user`.`username`  WHERE cpid = $l order by cdate DESC";
// $sal = "SELECT * from comments WHERE cpid = $l order by cdate DESC";


$result1 = mysqli_query($conn, $sal);

$xy = mysqli_fetch_all($result1, MYSQLI_ASSOC);


$b = $_SESSION['username'];

$yeah = "SELECT * from user where username='$b'";
$result1 = mysqli_query($conn, $yeah);
$hm = mysqli_fetch_assoc($result1);

$sql1 = "SELECT * from subreddit WHERE subredditid='$t'";
$subname = mysqli_query($conn, $sql1);
$r = mysqli_fetch_assoc($subname);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A post :)</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style/singlepost.css">
</head>

<body>

    <div class="nav" data-aos="menu-area" data-aos-anchor-placement="botton-top">


        <!-- <div class="b1"> -->
        <div><a href="home1.php"><img src="images/redditlogo.png" alt="" style="width: 50px;"></a></div>
        <div>
            <h1>Read-It</h1>
        </div>
        <div>
            <h2>r/<?php echo $r['sub'] ?></h2>
        </div>
        <div class="b3">

        </div>

        <div> <?php echo '<img style="" class="userpfp" src="data:image/jpeg;base64,' . base64_encode($hm['userpfp']) . '">'; ?></div>

        <div>
            <a href="myprofile.php">
                <h3>u/<?php echo $_SESSION['username']; ?></h3>
            </a>
        </div>
        <div><a href="newpost.php"><i class="fas fa-plus fa-2x"></i></a></div>
        <div><a href="logout.php"><i class="fas fa-sign-out-alt fa-2x"></i></a></div>
        <!-- </div> -->

    </div>

    <div class="postarea">
        <div class="singlepost" data-aos="zoom-in-up">
            <div class="firstline">

                <div class="subpic">
                    <div>
                        <?php echo '<img style="width: 32px;border-radius:50%;" src="data:image/jpeg;base64,' . base64_encode($r['subdp']) . '">'; ?>
                    </div>
                    <div>
                        <h3>&nbsp; Posted by u/<?php echo $x['post_user'] ?></h3>
                    </div>
                </div>
                <div>
                    <h5> <?php echo $x['post_time'] ?></h5>
                </div>
            </div>
            <h1> <?php echo $x['post_title'] ?></h1>
            <div class="post"><?php echo '<img style="max-width:85%;" src="data:image/jpeg;base64,' . base64_encode($x['post_image']) . '">'; ?></div>
            <p><?php echo $x['post_desc'] ?></p>

        </div>



        <div class="singlepost" data-aos="fade-right">
            <h3 class="c">Comments:</h3>
            <?php foreach ($xy as $w) { ?>
                <div class="firstline">

                    <div class="subpic">
                        <div>
                            <?php echo '<img style="width: 40px;border-radius:50%;" src="data:image/jpeg;base64,' . base64_encode($w['userpfp']) . '">'; ?>
                        </div>
                        <div>
                            <h3 style="font-size: 22px;">&nbsp;<?php echo $w['cuser'] ?></h3>
                        </div>
                    </div>
                    <div>
                        <h5> <?php echo $w['cdate'] ?></h5>
                    </div>
                </div>
                <div>
                    <h6 class="comment"> <?php echo $w['comment'] ?></h6>
                </div>

            <?php } ?>
        </div>
    </div>

    <div class="listsub" data-aos="zoom-out">
        <!-- <h1 style="margin-bottom:8px; padding-left:10px;">Top communities</h1> -->
        <div class="sameline">

            <div><?php echo '<img style="width: 60px; border-radius:50%;" src="data:image/jpeg;base64,' . base64_encode($r['subdp']) . '">'; ?></div>
            <div>
                <h1>r/<?php echo $r['sub'] ?></h1>
            </div>
        </div>
        <div>
            <h3><?php echo $r['subdesc'] ?></h3>
        </div>
        <form action="editdelete.php" method="get">
            <div>
                <button name="eord" value="edit" class="mspe">Edit the post</button>
            </div>
            <div>
                <button name="eord" value="delete" class="mspe mspd">Delete the post</button>

            </div>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/126c326f6b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>