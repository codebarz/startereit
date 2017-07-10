<?php
session_start();
require_once ("db.php");

if (isset($_SESSION['user_id']))
{
    header("Location: welcome.php");
}
else
{
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Start Up ET</title>
    <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
</head>
<body>
<div class="reg_area">
    <div class="reg_area_logo">
        <img src="img/startup%20raw%20small%20white%20web.png">
    </div>
    <p>&Cross;</p>
    <div class="form_area">
        <form action="sq_login.php" method="post" id="login_form" enctype="multipart/form-data">
            <h3>LOGIN</h3>
            <input type="text" name="uname" id="uname" placeholder="Username">
            <input type="password" name="pword" id="pword" placeholder="Password">
            <input type="submit" name="login" value="Login" id="sub_log">
            <h4><a href="">Forgot Password</a> or Don't have an account? <a href="">Sign Up</a></h4>
        </form>
        <form action="sq_signup.php" method="post" id="signup_form" enctype="multipart/form-data">
            <h3>SIGN UP</h3>
            <input type="text" name="fname" id="fname" placeholder="Full Name">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="text" name="uname" id="uname" placeholder="Username">
            <input type="password" name="pword" id="pword" placeholder="Password">
            <input type="submit" name="sign_up" value="Sign Up" id="sub_sign">
            <h4>Already have an account? <a href="">Login</a></h4>
        </form>
    </div>
</div>
<div class="header">
    <div class="logo"></div>
    <div class="signup_btn">
        <p>Sign Up</p>
    </div>
    <div class="login_btn">
        <p>Login</p>
    </div>
</div>
<div class="div_fil">
    <div class="tag_line">
        <p>[START . GROW . EVOLVE]</p>
    </div>
    <div class="div_dim"></div>
</div>
</body>
</html>
