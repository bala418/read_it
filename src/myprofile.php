<?php
include "config.php";
session_start();


$bruh = $_SESSION['username'];

// echo $bruh;
$sql = "SELECT * from posts inner join subreddit on posts.post_subid=subreddit.subredditid WHERE post_user='$bruh' order by post_time DESC";

$result = mysqli_query($conn, $sql);
$x = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);


$sql2 = "SELECT * from user where username='$bruh'";


// foreach ($x as $y) {
//     echo '<img style="max-width:400px" src="data:image/jpeg;base64,' . base64_encode($y['post_image']) . '">';
// }
$result = mysqli_query($conn, $sql2);

$z = mysqli_fetch_assoc($result);
if (empty($x)) {
    // echo "<h1>Sorry, you haven't posted anything. Keep posting bruh";
}


$k = "SELECT count(*) as total
FROM posts
INNER JOIN likes ON posts.postid=likes.postid
WHERE posts.post_user='$bruh'";

$gh = mysqli_query($conn, $k);
$data = mysqli_fetch_assoc($gh);
$karma = $data['total'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style/myproflie.css">
</head>

<body>
    <div class="nav" data-aos="menu-area" data-aos-anchor-placement="botton-top">


        <!-- <div class="b1"> -->
        <div><a href="index.php"><img src="images/redditlogo.png" alt="" style="width: 50px;"></a></div>
        <div>
            <h1>Read-It</h1>
        </div>
        <div>
            <h2>Profile</h2>
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


    <div class="postarea">
        <form action="mysinglepost.php" method="get">

            <?php foreach ($x as $y) { ?>
                <div class="singlepost" data-aos="fade-up">





                    <div class="firstline">

                        <div class="subpic">
                            <div>
                                <?php echo '<img style="width: 32px;border-radius:50%;" src="data:image/jpeg;base64,' . base64_encode($y['subdp']) . '">'; ?>
                            </div>
                            <div>
                                <h2>&nbsp; r/<?php echo $y['sub'] ?> -</h2>
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
                    <div class="post">
                        <?php echo '<img style="max-width:85%;" src="data:image/jpeg;base64,' . base64_encode($y['post_image']) . '">'; ?>
                    </div>

                    <div class="view"><button value="<?php echo $y['postid'] ?>" name="onepost">

                            <div class="comment">
                                <div><i class="fas fa-comments fa-lg"></i></div>
                                <div>
                                    <h6>&nbsp; Options</h6>
                                </div>
                            </div>
                        </button>
                    </div>

                </div>
            <?php } ?>


        </form>

    </div>



    <div class="listsub" data-aos="flip-left">
        <div class="sameline">

            <div><?php echo '<img style="width: 150px; border-radius:50%;" src="data:image/jpeg;base64,' . base64_encode($z['userpfp']) . '">'; ?></div>
            <div>
                <h1><?php echo $z['username'] ?></h1>
            </div>
        </div>

        <div>
            <h3>E-mail : <?php echo $z['email'] ?></h3>
        </div>
        <div>
            <h3>Unique User ID : <?php echo $z['userid'] ?></h3>
        </div>
        <div class="k">
            <div>
                <h3 class="karma">Karma : <?php echo $karma ?></h3>
            </div>
            <div>
                <img src="images/blie.gif" alt="" height="37px">
            </div>
        </div>


    </div>
    <script src="https://kit.fontawesome.com/126c326f6b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>