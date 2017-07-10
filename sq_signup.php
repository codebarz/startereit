<?php
session_start();
require_once ("db.php");
$db = new MyDb();

//if (isset($_SESSION['user_id']))
//{
//    header("Location: welcome.php");
//}
//else
//{
//    header("Location: index.php");
//}
//
////$message = '';

if (isset($_POST['sign_up']))
{
    $fname = strip_tags(@$_POST['fname']);
    $email = strip_tags(@$_POST['email']);
    $uname = strip_tags(@$_POST['uname']);
    $pword = strip_tags(@$_POST['pword']);
    $date_stamp = date('d/m/Y');
        if (strlen($pword) > 30 || strlen($pword) < 5)
        {
            echo "<p>Your password must be between 5 and 30 characters long</p>";
        }
        else
        {
            $count = <<<EOF
SELECT COUNT(email) as count FROM users WHERE email = '$email';
EOF;
            $count_ret = $db->querySingle($count);

            if ($count_ret == 1)
            {
                echo "This email is already in use";
            }
            else
            {
                $sql =<<<EOF
INSERT INTO users (fname, email, uname, pword, date_stamp) VALUES ('$fname', '$email', '$uname', '$pword', '$date_stamp');
EOF;
                $ret = $db->exec($sql);

                if (!$ret)
                {
                    echo "<script>alert('There was an error somewhere!..Please try again')</script>";
                }
                else
                {
                    header("Location: index.php");
                }

            }
        }
}