<!--
 * jQuery JavaScript Library v3.6.0
 * https://jquery.com/
 *
 * Includes Sizzle.js
 * https://sizzlejs.com/
 *
 * Copyright OpenJS Foundation and other contributors
 * Released under the MIT license
 * https://jquery.org/license
 *
 * Date: 2021-03-02T17:08Z

 --JQuery used in lines 30 & 31

 Chest Workouts
 CSE201 Section C Group 7
-->

<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
?>

<!-- Website Setup (Tab title, CSS, charset, Script Definition) -->
<head>
        <title> All Workouts </title>
        <script src="../jquery/jquery.js"></script>
        <script src="../js/AllWorkouts.js"></script>
        <link rel="stylesheet" href="../css/baseWebsite.css">
        <meta charset="UTF-8">
</head>

<!-- Script to change between light/dark styling sheets -->
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
    
    <!-- Logo and upper page setup -->
    <div id="titleDiv">
        <img id = "logo" src="../images/Logo.PNG" alt="Jim People Logo">
        <h1 class="mainTitle"> Chest Workouts</h1>
    </div>

    <!-- Heading creation and layout section -->
    <div id="workoutDiv"> 
        <ul class="heading">
            <li><a href="JimBuddies.php">Home Page</a></li>
            <li><a href="AllWorkouts.php">All Workouts</a></li>
            <li><a href="PushWorkouts.php">Push Workouts</a></li>
            <li><a href="PullWorkouts.php">Pull Workouts</a></li>
            <li><a href="LegWorkouts.php">Leg Workouts</a></li>
            <li><a href="Favorites.php">Favorited Workouts</a></li>
            <li><a href="ReviewsPage.php">Reviews</a></li>
            <li style=float:right> <a id= "login" href="../Login.php">
                <b> <!-- Checking login dependent headers -->
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

    <!-- Populating the page with workouts -->
    <div>  
        <?php
            $connection = new mysqli('aws-exercisedb.camvz480jeos.us-east-2.rds.amazonaws.com','JimPeople','Muscles201', 'exerciseDB');

            // Checks for positive database connection
            if ($connection -> connect_errno) {
                echo "NOT CONNECTED";
            }

            $data = [];
            $sql = 'SELECT * FROM `Exercises` WHERE mainMuscle = "Chest" OR secondMuscle = "Chest"';
            $results = $connection->query($sql);
            if($results->num_rows > 0) {
                while ($row = $results->fetch_assoc()) {
                    $data[] = $row;
                }
            }
        ?>

        <table>
            <?php foreach($results as $result): ?>
                    <div class="card row">
                        <h3 id="h3" ><?php echo $result['exerciseName'] ?></h3>
                        <p>
                            Main: <?php echo $result['mainMuscle'] ?><br>
                            Second: <?php echo $result['secondMuscle'] ?>
                        </p>
                    </div>
            <?php endforeach; ?>
        </table>
    </div>


</body>


</html>