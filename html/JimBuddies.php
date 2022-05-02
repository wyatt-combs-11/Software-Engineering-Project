<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
?>

<head>
        <title> Workout Buddies </title>
        <link id = "theme" rel="stylesheet" href="../css/baseWebsite.css">
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
        <h1 class="mainTitle"> Gym Buddies</h1>
    </div>

    <div id="workoutDiv">
        <ul class="heading">
            <li><a href="AllWorkouts.php">All Workouts</a></li>
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

    <div id="aboutBox" class="aboutCard" style="line-height: 35px; text-align: left;">
        <div>
            <row>
                <col>
                    <img id = "groupPic" src="../images/groupPic.png" alt="Staff Picture"
                    style="width:500px; height:400px; padding-left: 20px; padding-right: 20px;float: left;">
                </col>
                <col>
                    <h1 style="position: relative;"> Welcome to Gym Buddies!</h1>
                    <p style="padding-right: 10px;"> With Gym Buddies, we at the Jim People are commited to giving you an efficient method of discovering, learning, and maintaining workouts and exercises! </p>
                    <p style="padding-right: 10px;"> With an expanding catalogue of workouts, we hope to provide an extensive and effective list of ways for you to get in shape and have the body and life you've always wanted.</p>
                    <p style="padding-right: 10px;"> Our service is free to use, as we want to make sure that Gym Buddies is available to anyone who needs or wants it. Browse our workouts as a guest, or create an account in order to save your favorite workouts, keeping them right at your fingertips for when you feel like working out. Either way, we hope that you too can find a buddy in Gym Buddies!</p>
                </col>
            </row>
        </div>
    </div>



</body>


</html>
