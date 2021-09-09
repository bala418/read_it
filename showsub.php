<?php


session_start();
include "config.php";

if (isset($_GET['show'])) {
    $bruh = $_GET['show'];
    $_SESSION['js'] = $bruh;
} else {

    $bruh = $_SESSION['js'];
}

$sql1 = "SELECT * from subreddit WHERE subredditid='$bruh'";
$subname = mysqli_query($conn, $sql1);
$r = mysqli_fetch_assoc($subname);
$rans = $r['sub'];

$sql = "SELECT * from posts INNER JOIN `user`
ON `posts`.post_user=`user`.username WHERE post_subid='$bruh' order by post_time DESC";

$result = mysqli_query($conn, $sql);
$x = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$b = $_SESSION['username'];
$yeah = "SELECT * from user where username='$b'";
$result1 = mysqli_query($conn, $yeah);
$hm = mysqli_fetch_assoc($result1);


// $sql = "SELECT * from posts inner join subreddit on posts.post_subid=subreddit.subredditid  order by post_time DESC";
// $sql = "SELECT * from follow inner join subreddit on posts.post_subid=subreddit.subredditid  order by post_time DESC";
// $sql = "SELECT * from posts inner join follow on posts.post_subid=follow.fsubid";
// $result = mysqli_query($conn, $sql);
// $x = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style/showsub.css">

</head>

<body>



    <div class="nav">


        <div class="b1">
            <div><a href="home1.php"><img src="images/redditlogo.png" alt="" style="width: 50px;"></a></div>
            <div>
                <h1>Read-It</h1>
            </div>
            <div>
                <h2>r/<?php echo "$rans"; ?></h2>
            </div>
        </div>



        <div class="b2">


            <div> <?php echo '<img style="" class="userpfp" src="data:image/jpeg;base64,' . base64_encode($hm['userpfp']) . '">'; ?></div>

            <div>
                <a href="myprofile.php">
                    <h3>u/<?php echo $_SESSION['username']; ?></h3>
                </a>
            </div>
            <div><a href="newpost.php"><i class="fas fa-plus fa-2x"></i></a></div>
            <div><a href="logout.php"><i class="fas fa-sign-out-alt fa-2x"></i></a></div>
        </div>

    </div>


    <form id="likef" method="post" action="like.php"></form>
    <form id="dis" method="post" action="dislike.php"></form>
    <div class="postarea">
        <form action="singlepost.php" method="get">

            <?php foreach ($x as $y) { ?>
                <?php

                $commentcount = 0;
                $bravo = $y['postid'];
                $yd = "SELECT count(*) as total from comments where cpid='$bravo'";
                $k = mysqli_query($conn, $yd);
                $data = mysqli_fetch_assoc($k);


                ?>
                <div class="singlepost" data-aos="fade-up">


                    <div class="firstline">

                        <div class="subpic">
                            <div>
                                <?php echo '<img style="width: 32px;border-radius:50%;" src="data:image/jpeg;base64,' . base64_encode($y['userpfp']) . '">'; ?>
                            </div>
                            <div>
                                <h3>&nbsp; Posted by u/<?php echo $y['post_user'] ?></h3>
                            </div>
                        </div>
                        <div>
                            <h5> <?php echo $y['post_time'] ?></h5>
                        </div>
                    </div>
                    <h1> <?php echo $y['post_title'] ?></h1>
                    <div class="post"><?php echo '<img style="max-width:85%;" src="data:image/jpeg;base64,' . base64_encode($y['post_image']) . '">'; ?></div>
                    <div class="view">
                        <button value="<?php echo $y['postid'] ?>" name="onepost">

                            <div class="comment">
                                <div><i class="fas fa-comments fa-lg"></i></div>
                                <div>
                                    <h6>&nbsp;<?php echo $data['total'] ?> Comments</h6>
                                </div>
                            </div>

                        </button>
                        <div>

                            <?php
                            $b12 = $hm['userid'];
                            $gh = "SELECT * from likes where userid='$b12' and postid='$bravo'";

                            $result = mysqli_query($conn, $gh);

                            $count = mysqli_num_rows($result);
                            $sac = "SELECT * from likes where postid='$bravo'";

                            $resul = mysqli_query($conn, $sac);

                            $lc = mysqli_num_rows($resul);



                            // echo $count;
                            ?>

                            <?php if ($count == 0) { ?>
                                <button form="likef" class="likeb" value="<?php echo $y['postid'] ?>" name="ssl"><i class="far fa-arrow-alt-circle-up fa-2x"></i></button>
                            <?php } ?>

                            <?php if ($count == 1) { ?>
                                <button form="dis" class="likeb" style="color:#0091ff" name="ssd" value="<?php echo $y['postid'] ?>"><i class="far fa-arrow-alt-circle-up fa-2x"></i></button>
                            <?php } ?>
                            <h1 style="display:inline-block"><?php echo $lc ?></h1>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </form>


    </div>
    <?php
    $b12 = $hm['userid'];



    $sol = "select * from follow where fuserid='$b12' and fsubid='$bruh'";

    $result = mysqli_query($conn, $sol);

    $xv = mysqli_num_rows($result);
    ?>

    <div class="listsub" data-aos="fade-left">
        <!-- <h1 style="margin-bottom:8px; padding-left:10px;">Top communities</h1> -->
        <div class="sameline">

            <div><?php echo '<img style="width: 60px; border-radius:50%;" src="data:image/jpeg;base64,' . base64_encode($r['subdp']) . '">'; ?></div>
            <div>
                <h1>r/<?php echo $r['sub']       ?></h1>
            </div>
        </div>
        <div class="final">
            <?php if ($xv == 0) { ?>
                <form action="joinsub.php" method="post"><button class="join" name="sub" value="<?php echo $bruh ?>"><span>Join</span></button></form>
            <?php } ?>
            <?php if ($xv == 1) { ?>
                <form action="leavesub.php" method="post"><button class="leave" name="sub" value="<?php echo $bruh ?>"><span>Joined</span></button></form>
            <?php } ?>
        </div>

        <div>
            <h3><?php echo $r['subdesc'] ?></h3>
        </div>

    </div>
    <div class="other">

    </div>

    <script src="https://kit.fontawesome.com/126c326f6b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>