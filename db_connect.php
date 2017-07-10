<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "startupet";
$server = "localhost";
$username = "startupr_tega";
$password = "11861538da";
$database = "startupr_eit";

try
{
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
//$con = mysqli_connect("localhost", "root", "");
////check connection
//if (mysqli_connect_error())
//{
//    echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}
//
//// Select Database
//$select_db = mysqli_select_db($con, "startupet");
//
//// Test Connection
//
//if (!$select_db)
//{
//    echo "Yawa don gas!!! Connection to database failed";
//}
