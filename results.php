<?php
/**
 * Created by PhpStorm.
 * User: TEGA
 * Date: 4/25/2017
 * Time: 10:49 AM
 */
session_start();
require_once ("db.php");
$db = new MyDb();

if (isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']) && isset($_POST['q4']) && isset($_POST['q5']) && isset($_POST['q6']))
{
    $q_1 = $_POST['q1'];
    $q_2 = $_POST['q2'];
    $q_3 = $_POST['q3'];
    $q_4 = $_POST['q4'];
    $q_5 = $_POST['q5'];
    $q_6 = $_POST['q6'];

    $yes = "yes";
    $no = "no";

    $id = $_SESSION['id'];
    $u_name = $_SESSION['uname'];

        $recommend = "Executive";
        $status = 1;

    $stmt = $db->prepare('INSERT INTO results (id, recomend, u_name, status) VALUES (:id, :recommend, :u_name, :status)');

    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->bindValue(':recommend', $recommend, SQLITE3_TEXT);
    $stmt->bindValue(':u_name', $u_name, SQLITE3_TEXT);
    $stmt->bindParam(':status', $status, SQLITE3_INTEGER);

    $result = $stmt->execute();

//        $osql =<<< EOF
//INSERT INTO results (id, recomend, u_name, status) VALUES ('$id', '$recommend', '$u_name', '1');
//EOF;
//        $ret = $db->exec($osql);

//        if ($ret)
//        {
//            echo "<script>alert('We recomend the $recommend package.')</script>";
//            header("Location: welcome.php");
//        }
//        else
//        {
//            echo "<script>alert('There was an error somewhere')</script>";
//        }
}