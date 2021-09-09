<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link rel="stylesheet" href="style/signup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="sign">

        <div class="area">
            <form action="insert.php" method="post" enctype="multipart/form-data" onSubmit="return validate()">

                <div>
                    <h2>Welcome to <span style=" color:#1e97e8;font-size:40px">Read_it!<span></h2>
                    <p>By continuing, you agree to our User Agreement and Privacy Policy.</p>
                </div>


                <div><label for="">Email : </label><span id="vmail" class="erw"></span>
                    <input type="email" name="email" id="mail" placeholder="Your mail" required>
                </div>
                <div><label for="">Username : </label><span id="vname" class="erw"></span>
                    <input type="text" name="username" id="name" placeholder="A short username" required>
                </div>
                <div> <label for="">Profile Pic : </label>
                    <input type="file" name="image" id="" required>
                </div>
                <div><label for="">Password : </label><span id="vpass" class="erw"></span>
                    <input type="password" name="password" id="password" placeholder="A strong password" required>
                </div>

                <div><button type="submit" onclick="return validate()">Submit</button></div>
                <div><a style="text-align:center;" href="login.php">Exisiting user? Go here to login.</a></div>



            </form>
        </div>
        <div class="f2">
            <div class="flex-type" style="h2, a, p{
            color: #fff ;
            text-decoration: none;
          }
          p>a {
            color: #fd084a;
          }
          .blink {
            animation: blink 0.5s infinite;
          }
          @keyframes blink{
            to { opacity: .0; }
          }
          .flex-type {
            display: flex;
          }
    
          ">
                Dive into <h6 class="header-sub-title" id="word"></h6>
            </div>

            <div>
                <img src="images/final.png" alt="tempimg" style="max-width:100%;max-height:100%;">
            </div>
        </div>
    </div>



    <script src="script1.js"></script>
    <script src="script2.js"></script>
    <script>
        $("input").change(function(e) {

            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

                var file = e.originalEvent.srcElement.files[i];

                var img = document.createElement("img");
                img.className = "pp";
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