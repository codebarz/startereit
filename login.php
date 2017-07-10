<?php
session_start();

if (isset($_SESSION['user_id']))
{
    header("Location: welcome.php");
}
else
{
    header("Location: index.php");
}

require 'db_connect.php';

if (!empty($_POST['email']) && !empty($_POST['pword'])):
    $records = $conn->prepare('SELECT user_id, email,pword FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $message = '';

    $result = $records->fetch(PDO::FETCH_ASSOC);

    if (count($result) > 0 && password_verify($_POST['pword'], $result['pword']))
    {
        $_SESSION['user_id'] = $result['user_id'];
        header("Location: welcome.php");
    }
    else
    {
       $message = "Username or Password incorrect";
    }
endif;
