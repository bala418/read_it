<?php




include "config.php";
session_start();

if (isset($_SESSION['username'])) {
} else {
    echo "hi";
    header("location:login.php");
}

$sql = "SELECT * from posts inner join subreddit on posts.post_subid=subreddit.subredditid  order by post_time DESC";
// $sql = "SELECT * from follow inner join subreddit on posts.post_subid=subreddit.subredditid  order by post_time DESC";
// $sql = "SELECT * from posts inner join follow on posts.post_subid=follow.fsubid";
$result = mysqli_query($conn, $sql);
$x = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$zc = 1;

$b = $_SESSION['username'];

$yeah = "SELECT * from user where username='$b'";
$result1 = mysqli_query($conn, $yeah);
$hm = mysqli_fetch_assoc($result1);
$rt = $hm['userid'];

// unset($_SESSION['com']);

$yeah1 = "SELECT * from subreddit limit 8";
$result2 = mysqli_query($conn, $yeah1);
$z = mysqli_fetch_all($result2, MYSQLI_ASSOC);



$ul = "SELECT fsubid from follow where fuserid=$rt";
$ull = mysqli_query($conn, $ul);
// $ulll = mysqli_fetch_array($ull);
$ty = [];
while ($row = mysqli_fetch_array($ull)) {
    array_push($ty, $row['fsubid']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style/home1.css">
</head>

<body>



    <div class="nav" data-aos="flip-up">


        <!-- <div class="b1"> -->
        <div><a href="home1.php"><img src="images/redditlogo.png" alt="" style="width: 50px;"></a></div>
        <div>
            <h1>Read-It</h1>
        </div>
        <div>
            <h2>Home</h2>
        </div>
        <div class="b3">
            <form action="search.php" method="POST">
                <input type="text" name="sear" id="">
            </form>
        </div>
        <!-- </div> -->



        <!-- <div class="b2"> -->


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


    <form id="likef" method="post" action="like.php"></form>
    <form id="dis" method="post" action="dislike.php"></form>
    <div class="postarea">


        <?php foreach ($x as $y) { ?>
            <?php if (in_array($y['subredditid'], $ty)) {  ?>
                <?php

                $commentcount = 0;
                $bravo = $y['postid'];
                $yd = "SELECT count(*) as total from comments where cpid='$bravo'";
                $r = mysqli_query($conn, $yd);
                $data = mysqli_fetch_assoc($r);


                ?>
                <form action="singlepost.php" method="get">
                    <div class="singlepost" data-aos="fade-up">


                        <div class="firstline">
                            <div class="subpic">
                                <!-- <div>Hi</div> -->
                                <div>
                                    <?php echo '<img style="width: 32px;border-radius:50%" src="data:image/jpeg;base64,' . base64_encode($y['subdp']) . '">'; ?>
                                </div>
                                <div>
                                    <h2>&nbsp; r/<?php echo $y['sub'] ?> -</h2>
                                </div>



                                <div style="margin-left: 5px;">
                                    <h3>Posted by u/<?php echo $y['post_user'] ?></h3>
                                </div>
                            </div>
                            <div>
                                <h5> <?php echo $y['post_time'] ?></h5>
                            </div>
                        </div>
                        <h1> <?php echo $y['post_title'] ?></h1>
                        <div class="post"><?php echo '<img style="max-width:85%;" src="data:image/jpeg;base64,' . base64_encode($y['post_image']) . '">'; ?></div>
                        <div class="view"><button value="<?php echo $y['postid'] ?>" name="onepost">

                                <div class="comment">
                                    <div><i class="fas fa-comments fa-lg"></i></div>
                                    <div>
                                        <h6>&nbsp; <?php echo $data['total'] ?> Comments</h6>
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
                                    <button form="likef" class="likeb" value="<?php echo $y['postid'] ?>" name="likep"><i class="far fa-arrow-alt-circle-up fa-2x"></i></button>
                                <?php } ?>

                                <?php if ($count == 1) { ?>
                                    <button onMouseOver="this.style.color='red'" onMouseOut="this.style.color='#0091ff'" form="dis" class="dislike" style="color:#0091ff;" name="dislike" value="<?php echo $y['postid'] ?>"><i class="far fa-arrow-alt-circle-up fa-2x"></i></button>
                                <?php } ?>
                                <h1 style="display:inline-block"><?php echo $lc ?></h1>
                            </div>

                        </div>
                    </div>
                </form>
            <?php } ?>
        <?php } ?>




    </div>

    <div class="listsub" data-aos="zoom-in">
        <h1 style="margin-bottom:8px; padding-left:10px;">Top communities</h1>
        <form action="showsub.php" method="get">

            <?php foreach ($z as $y) { ?>
                <div class="subli">
                    <?php echo '<img style="width: 32px; border-radius:50%;" src="data:image/jpeg;base64,' . base64_encode($y['subdp']) . '">'; ?>
                    <button value=" <?php echo $zc ?>" name="show">&nbsp; <?php echo $zc ?>. r/<?php echo $y['sub'] ?> </button>
                </div>
                <?php $zc += 1; ?>
            <?php } ?>

        </form>

    </div>

    <script src="https://kit.fontawesome.com/126c326f6b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>