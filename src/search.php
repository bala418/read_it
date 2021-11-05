<?php
session_start();
include "config.php";

// echo "HI";
$y = $_POST['sear'];

$bruh = $_SESSION['username'];
$sql2 = "SELECT * from user where username='$bruh'";


// foreach ($x as $y) {
//     echo '<img style="max-width:400px" src="data:image/jpeg;base64,' . base64_encode($y['post_image']) . '">';
// }
$result = mysqli_query($conn, $sql2);

$z = mysqli_fetch_assoc($result);


$sql = "SELECT * from posts inner join subreddit on posts.post_subid=subreddit.subredditid where post_title like '%$y%' order by post_time DESC";
// $sql = "SELECT * from follow inner join subreddit on posts.post_subid=subreddit.subredditid  order by post_time DESC";
// $sql = "SELECT * from posts inner join follow on posts.post_subid=follow.fsubid";
$result = mysqli_query($conn, $sql);
$x = mysqli_fetch_all($result, MYSQLI_ASSOC);




$yeah1 = "SELECT * from subreddit where sub like '%$y%'";
$result2 = mysqli_query($conn, $yeah1);
$k = mysqli_fetch_all($result2, MYSQLI_ASSOC);

$zc = 1;

$yeah2 = "SELECT * from comments where comment like '%$y%'";
$result3 = mysqli_query($conn, $yeah2);
$h = mysqli_fetch_all($result3, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style/search.css">
</head>

<body>



    <div class="nav" data-aos="menu-area" data-aos-anchor-placement="botton-top">


        <!-- <div class="b1"> -->
        <div><a href="index.php"><img src="images/redditlogo.png" alt="" style="width: 50px;"></a></div>
        <div>
            <h1>Read-It</h1>
        </div>
        <div>
            <h2>Search Results</h2>
        </div>
        <div class="b3">
            <form action="search.php" method="POST">
                <input type="text" name="sear" id="">
            </form>
        </div>
        <!-- </div> -->



        <!-- <div class="b2"> -->


        <div> <?php echo '<img style="" class="userpfp" src="data:image/jpeg;base64,' . base64_encode($z['userpfp']) . '">'; ?></div>

        <div>
            <a href="myprofile.php">
                <h3>u/<?php echo $_SESSION['username']; ?></h3>
            </a>
        </div>
        <div><a href="newpost.php"><i class="fas fa-plus fa-2x"></i></a></div>
        <div><a href="logout.php"><i class="fas fa-sign-out-alt fa-2x"></i></a></div>
        <!-- </div> -->

    </div>



    <h1 style="margin-left: 150px;">Posts</h1>
    <div class="postarea">


        <?php foreach ($x as $y) { ?>
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
                                    <h6>&nbsp; Comments</h6>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>



    <div class="listsub" data-aos="zoom-in">
        <h1 style="margin-bottom:8px; padding-left:10px;">Related sub reddits</h1>
        <form action="showsub.php" method="get">

            <?php foreach ($k as $y) { ?>
                <div class="subli">
                    <?php echo '<img style="width: 32px; border-radius:50%;" src="data:image/jpeg;base64,' . base64_encode($y['subdp']) . '">'; ?>
                    <button value="<?php echo $y['subredditid'] ?>" name="show">&nbsp; <?php echo $zc ?>. r/<?php echo $y['sub'] ?> </button>
                </div>
                <?php $zc += 1; ?>
            <?php } ?>

        </form>

    </div>

    <h1 style="margin-left: 150px;">Comments</h1>
    <?php foreach ($h as $g) { ?>
        <form action="singlepost.php" method="get">
            <div class="singlepost" data-aos="fade-up" style="width: 60%;">


                <div class="firstline">
                    <div class="subpic">
                        <div style="margin-left: 5px;">
                            <h3>Posted by u/<?php echo $g['cuser'] ?></h3>
                        </div>
                    </div>
                    <div>
                        <h5> <?php echo $g['cdate'] ?></h5>
                    </div>
                </div>
                <h1> <?php echo $g['comment'] ?></h1>
                <div class="view"><button value="<?php echo $g['cpid'] ?>" name="onepost">

                        <div class="comment">
                            <div><i class="fas fa-comments fa-lg"></i></div>
                            <div>
                                <h6>&nbsp; View thread</h6>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    <?php } ?>
    </div>

    <script src="https://kit.fontawesome.com/126c326f6b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>