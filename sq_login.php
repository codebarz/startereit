<?php
/**
 * Created by PhpStorm.
 * User: TEGA
 * Date: 4/24/2017
 * Time: 10:05 PM
 */
session_start();
require_once ("db.php");
$db = new MyDb();

if (isset($_POST['uname']) && isset($_POST['pword']))
{
    $uname = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['uname']);
    $pword = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['pword']);

    $sql = <<<EOF
SELECT * FROM users WHERE uname = '$uname' AND pword = '$pword';
EOF;
    $ret = $db->query($sql);

    $count = $db->querySingle("SELECT COUNT(*) as COUNT FROM users WHERE uname = '$uname' AND pword = '$pword'");

    if ($count == 1) {
        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $id = $row['ID'];
            $uname = $row['uname'];

            $_SESSION['id'] = $id;
            $_SESSION['uname'] = $uname;
            header("Location: welcome.php");
            exit();
        }
    }
}