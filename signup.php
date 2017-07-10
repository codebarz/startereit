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

$message = "";

if (isset($_POST['sign_up']))
{
    if (!empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['uname']) && !empty($_POST['pword']) && !empty($_POST['c_pword']))
    {
        $date_stamp = date('d/m/Y');
        $sql = "INSERT INTO users (fname, email, uname, pword, date_stamp) VALUES (:fname, :email, :uname, :pword, :date_stamp)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':fname', $_POST['fname']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':uname', $_POST['uname']);
        $stmt->bindParam(':pword', password_hash($_POST['pword'], PASSWORD_BCRYPT));
        $stmt->bindValue(':date_stamp', $date_stamp);

        if ($stmt->execute() ):
            $message = "Account successfully created";
        else:
            $message = "Sorry!..There was a issue creating your account. Please try again";
        endif;
    }
}