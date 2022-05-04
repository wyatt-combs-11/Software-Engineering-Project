<?php
        session_start();
?>
<html lang="en">

<head>
        <title> Reviews </title>
        <script src="../jquery/jquery.js"></script>
        <script src="../js/AllWorkouts.js"></script>
        <link id="theme" rel="stylesheet" href="../css/baseWebsite.css">
        <meta charset="UTF-8">
</head>

<script>
    function ColorChange() {
        var theme = document.getElementsByTagName('link')[0];
        if (theme.getAttribute('href') == "../css/baseWebsite.css") {
            theme.setAttribute('href', "../css/baseWebsiteDark.css");
        } else {
            theme.setAttribute('href', "../css/baseWebsite.css");
        }
    }
</script>


<body>
    <a>
        <?php
            if ($_SESSION["mode"] === '1') {
                echo '<script>ColorChange();</script>';
            }
        ?>
    </a>
    <div id="titleDiv">
        <img id = "logo" src="../images/Logo.PNG" alt="Jim People Logo">
        <h1 class="mainTitle"> Reviews</h1>
    </div>

    <div id="workoutDiv">
        <ul class="heading">
            <li><a href="JimBuddies.php">Home Page</a></li>
            <li><a href="ChestWorkouts.php">Chest Workouts</a></li>
            <li><a href="PushWorkouts.php">Push Workouts</a></li>
            <li><a href="PullWorkouts.php">Pull Workouts</a></li>
            <li><a href="LegWorkouts.php">Leg Workouts</a></li>
            <li><a href="Favorites.php">Favorited Workouts</a></li>
            <li style=float:right> <a id= "login" href="../Login.php">
                <b>
                    <?php
                        if ($_SESSION["loggedin"] === true) {
                            echo '<script>document.getElementById("login").href = "../logout.php";</script>';
                            echo htmlspecialchars("Log Out");
                        } else {
                            echo htmlspecialchars("Log In");
                        }
                    ?>
            </a> </li>
            <b>
                <?php
                    if ($_SESSION["loggedin"] === true) {
                        echo "<li style=float:right><a href='../accountSettings.php'>Account Settings</a></li>";
                    } else {
                        echo '<li style=float:right> <a href="../signup.php">Sign Up</a></li>';
                    }
                ?>
            <li id = "lightdarkTog" style=float:right><a onclick="ColorChange()">Toggle Light/Dark Mode</a></li>
        </ul>
    </div>

    <div>
        <?php
            $connection = new mysqli('aws-exercisedb.camvz480jeos.us-east-2.rds.amazonaws.com','JimPeople','Muscles201', 'exerciseDB');

            if ($connection -> connect_errno) {
                echo "NOT CONNECTED";
            }

            $user = $_SESSION["username"] ?? null;
            $reviewId = $_POST["rId"] ?? null;
            $replyText = $_POST["userReply"] ?? null;

            if($user != null && $reviewId != null && $replyText != null) {
                $sql = "CALL sp_AddComment('".$user."', ".$reviewId.", '".$replyText."')";
                mysqli_query($connection, $sql);
            }

            $sql = "SELECT * FROM Reviews WHERE parentId IS NULL AND approved = TRUE";
            $results = $connection->query($sql);
        ?>

        <table>
            <?php foreach($results as $result): ?>
                    <div class="comment">
                        <h3 id="author" >Author: <?php echo $result['username'] ?></h3>
                        <p style="margin: 5px;">
                            Review: <?php echo $result['text'] ?><br>
                            Replies:<br></p>
                    <?php
                    $sql = "SELECT * FROM Reviews r
                            WHERE parentId = ".$result['reviewId']." AND approved = TRUE";
                    $comments = $connection->query($sql);
                    foreach($comments as $comment):
                        echo '<div class="reply"><h3 id="author" >Author: '.$comment['username'].'</h3>'
                        .'<p>'.strval($comment['text']).'</p></div>';
                    endforeach;
                    ?>
                        <div class="reply">
                            <ul style="background-color: lightgray;">
                                <form style="margin: 0px" action = "ReviewsPage.php" method = "post">
                                    <li><p style="margin: 5px 5px 5px 5px;"><input type="text" name="userReply" size="50" placeholder="Reply..."></p></li>
                                    <li><p style="margin: 5px 5px 5px 5px;"><button type="submit">Reply</button></p></li>
                                    <li><?php echo "<input type='hidden' name='rId' value='".$result['reviewId']."'>"?></li>
                                </form>
                            </ul>
                        </div>
                    </div>
            <?php endforeach; ?>

            <div class="comment" style="padding:5px; background-color: lightgray;">
                <ul style="background-color: lightgray;">
                    <form style="margin: 0px" action = "ReviewsPage.php" method = "post">
                        <li><p style="margin: 5px 5px 5px 5px;"><input type="text" name="userReply" size="75" placeholder="Leave a Review..."></p></li>
                        <li><p style="margin: 5px 5px 5px 5px;"><button type="submit">Comment</button></p></li>
                        <li><?php echo "<input type='hidden' name='rId' value='0'>"?></li>
                    </form>
                </ul>
            </div>

        </table>
    </div>
</body>
</html>
