<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/signup.css">
</head>

<body>
    <div class="sign">

        <div class="area">
            <form action="select.php" method="post">

                <div>
                    <h2>Welcome to <span style=" color:#1e97e8;font-size:40px">Read_it!<span></h2>
                    <p>Login with your email and username.</p>
                </div>

                <div><label for="">Username : </label>
                    <input type="text" name="username" id="" autofocus placeholder="Username">
                </div>

                <div><label for="">Password : </label>
                    <input type="password" name="password" id="" placeholder="Password">
                </div>

                <div><button type="submit">Log in</button></div>
                <div><a href="signup.php">Not registered? Sign up here!</a></div>



            </form>
        </div>
        <div class="f2">
            <div class="flex-type">
                Dive into <h6 class="header-sub-title" id="word">Read_It</h6>
            </div>

            <div>
                <img src="images/final.png" alt="tempimg" style="max-width:100%;max-height:100%;">
            </div>
        </div>
    </div>

</body>

</html>