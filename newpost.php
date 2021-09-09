<?php
include "config.php";
session_start();

$sql = "SELECT * from subreddit";
$res = mysqli_query($conn, $sql);
$x = mysqli_fetch_all($res, MYSQLI_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style/newpost.css">
</head>

<body>
    <div>
        <h1 style="text-align: center;margin-top:20px">Hi <?php echo $_SESSION['username']; ?></h1>
    </div>
    <form action="addpost.php" method="post" enctype="multipart/form-data">
        <div class="area">



            <div class="i">
                <h1>Submit new post</h1>
                <label for="">Community:</label>
                <select name="community" id="" required>
                    <?php foreach ($x as $y) { ?>
                        <option value="<?php echo $y['subredditid'] ?>"><?php echo $y['sub'] ?></option>
                    <?php } ?>
                </select><br>
                <label for="">Post-Title:</label>
                <input type="text" name="title" placeholder="Enter title of your post" required><br>
                <label for="">Description:</label>
                <input type="text" name="desc" placeholder="Description" required>
                <button type="submit" value="hmm" name="submit">Submit</button>
            </div>


            <div class="temp">
                <div>
                    <label for="">Upload file</label>
                    <input type="file" name="image" id="" required>
                </div>

            </div>



        </div>
    </form>
    <script>
        $("input").change(function(e) {

            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

                var file = e.originalEvent.srcElement.files[i];

                var img = document.createElement("img");
                var reader = new FileReader();
                reader.onloadend = function() {
                    img.src = reader.result;
                }
                reader.readAsDataURL(file);
                $("input").after(img);
            }
        });
    </script>
</body>

</html>