<?php
session_start();
require_once ("db.php");
$db = new MyDb();

if (!isset($_SESSION['id']) && !isset($_SESSION['log_name']))
{
//    $records = $conn->prepare('SELECT ID, email, pword, uname FROM users WHERE ID = :user_id');
//    $records->bindParam(':user_id', $_SESSION['id']);
//    $records->execute();
//    $result = $records->fetch(PDO::FETCH_ASSOC);
//
//    $user = NULL;
//
//    if (count($result) > 0)
//    {
//        $user = $result;
//    }
    header("Location: index.php");
}
    $uname = $_SESSION['uname'];
    $id = $_SESSION['id'];

    $sql =<<<EOF
SELECT * FROM users WHERE uname = '$uname';
EOF;
    $ret = $db->query($sql);

    while ($row = $ret->fetchArray(SQLITE3_ASSOC))
    {
        $username = $row['uname'];
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
</head>
<body style="background: #f1f1f1">
<div class="w_head">
    <div class="div_dim_2">
        <div class="w_logo"></div>
        <div class="menu_tog">
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
        </div>
        <form action="logout.php" method="post" enctype="multipart/form-data">
            <input type="submit" name="logout" id="logout" value="Logout">
        </form>
    </div>
    <p>Welcome. <?php echo $username;}?></p>
</div>
<div class="l_side_bar">
    <div class="news_l">
        <h3>Instructions</h3>
        <ul>
            <li>1. Read the questions carefully before answering</li>
            <li>2. Make sure all questions are answered honestly</li>
            <li>3. Take your time, there is no time limit</li>
            <li>4. Suggestion as regard package subscription are to be taken in to consideration</li>
        </ul>
        <h3>Keep In Touch</h3>
        <p>Follow use via social media</p>
        <div class="smi">
            <div class="icons"><img src="img/fb_icon.png"></div>
            <div class="icons"><img src="img/tw_icon.png"></div>
            <div class="icons"><img src="img/ln_icon.png"></div>
            <div class="icons"><img src="img/ig_icon.png"></div>
        </div>
    </div>
</div>
    <div class="main_content">
        <div class="questions">
            <?php
            $user_id = $_SESSION['id'];
            $rec =<<<EOF
SELECT COUNT(*) as count FROM results WHERE id = '$user_id';
EOF;
            $result = $db->querySingle($rec);

            if ($result == 1)
            {
                $recomend =<<<EOF
SELECT * FROM results WHERE id = '$user_id';
EOF;
                $rret = $db->query($recomend);

                while ($rrow = $rret->fetchArray(SQLITE3_ASSOC))
                {
                    $users_id = $rrow['id'];
                    $recomendation = $rrow['recomend'];
                    $u_name = $rrow['u_name'];
                    $status = $rrow['status'];

                    echo "<h4>Thank you for taking time out to take this test. We recommend the <a href=\"#\">$recomendation</a> package for you.</h4>";
                }

            }
            else
            {
                echo "<form id='quiz' action=\"results.php\" method=\"post\" enctype=\"multipart/form-data\" onsubmit='return false'><br>
                <p>Have you ever turned a client down?</p>
                <div id=\"q_1\">
                    <input type=\"radio\" name=\"q1\" id=\"q_1_yes\" value=\"yes\">
                    <label for=\"q_1_yes\">Yes</label>
                    <input type=\"radio\" name=\"q1\" id=\"q_1_no\" value=\"no\">
                    <label for=\"q_1_no\">No</label>
                </div><br>
                <p>Are you comfortable with failure?</p>
                <div id=\"q_1\">
                    <input type=\"radio\" name=\"q2\" id=\"q_2_yes\" value=\"yes\">
                    <label for=\"q_2_yes\">Yes</label>
                    <input type=\"radio\" name=\"q2\" id=\"q_2_no\" value=\"no\">
                    <label for=\"q_2_no\">No</label>
                </div><br>
                <p>Can your concept be easily described and understood?</p>
                <div id=\"q_1\">
                    <input type=\"radio\" name=\"q3\" id=\"q_3_yes\" value=\"yes\">
                    <label for=\"q_3_yes\">Yes</label>
                    <input type=\"radio\" name=\"q3\" id=\"q_3_no\" value=\"no\">
                    <label for=\"q_3_no\">No</label>
                </div><br>
                <p>Do you use the service of a proffessional accountant or attorney?</p>
                <div id=\"q_1\">
                    <input type=\"radio\" name=\"q4\" id=\"q_4_yes\" value=\"yes\">
                    <label for=\"q_4_yes\">Yes</label>
                    <input type=\"radio\" name=\"q4\" id=\"q_4_no\" value=\"no\">
                    <label for=\"q_4_no\">No</label>
                </div><br>
                <p>Can you take risk?</p>
                <div id=\"q_1\">
                    <input type=\"radio\" name=\"q5\" id=\"q_5_yes\" value=\"yes\">
                    <label for=\"q_5_yes\">Yes</label>
                    <input type=\"radio\" name=\"q5\" id=\"q_5_no\" value=\"no\">
                    <label for=\"q_5_no\">No</label>
                </div><br>
                <p>Are you solving any problem?</p>
                <div id=\"q_1\">
                    <input type=\"radio\" name=\"q6\" id=\"q_6_yes\" value=\"yes\">
                    <label for=\"q_6_yes\">Yes</label>
                    <input type=\"radio\" name=\"q6\" id=\"q_6_no\" value=\"no\">
                    <label for=\"q_6_no\">No</label><br><br>
<!--                    <textarea name=\"prob_des\" id=\"prob_des\" placeholder=\"Please descibe.\"></textarea>-->
                    <input type=\"submit\" onclick='return handleClick();' name=\"sub_eit\" id=\"sub_eit\" value=\"Submit\">
                </div>
            </form>";
            }
            ?>
        </div>
    </div>
<div class="r_side_bar">
    <div class="news_l">
        <h3>Quick Links</h3>
        <ul>
            <li><a href="#">- Skip to view all packages</a></li>
            <li><a href="#">- Go to main site</a></li>
            <li><a href="#">- Skip to view all packages</a></li>
            <li><a href="#">- Go to main site</a></li>
        </ul>
        <div id="slide">
            <div class="current">
                <img src="img/startup%20raw.jpg">
            </div>
            <div>
                <img src="img/start-a-biz-part-1.jpg">
            </div>
            <div>
                <img src="img/startup-glossary.jpg">
            </div>
            <div>
                <img src="img/startup%20raw.jpg">
            </div>
        </div>
    </div>
</div>
<?php
//else:
//header("Location: index.php");
//?>
<?php //endif;?>
</body>
</html>
