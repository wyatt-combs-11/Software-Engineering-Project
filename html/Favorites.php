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

 --JQuery used in lines 34 & 35

 Favorites
 CSE201 Section C Group 7
-->

<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../Login.php");
        exit;
    }
?>


<html lang="en">

<!-- Website Setup (Tab title, CSS, charset, Script Definition) -->
<head>
        <title> All Workouts </title>
        <script src="../jquery/jquery.js"></script>
        <script src="../js/AllWorkouts.js"></script>
        <link id="theme" rel="stylesheet" href="../css/baseWebsite.css">
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
        <h1 class="mainTitle"> Favorited Workouts</h1>
    </div>

    <!-- Heading creation and layout section -->
    <div id="workoutDiv"> 
        <ul class="heading">
            <li><a href="JimBuddies.php">Home Page</a></li>
            <li><a href="AllWorkouts.php">All Workouts</a></li>
            <li><a href="ChestWorkouts.php">Chest Workouts</a></li>
            <li><a href="PushWorkouts.php">Push Workouts</a></li>
            <li><a href="PullWorkouts.php">Pull Workouts</a></li>
            <li><a href="LegWorkouts.php">Leg Workouts</a></li>
            <li style=float:right> <a href="../signup.php">Sign Up</a></li>
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
            $sql = "    SELECT exerciseName, mainMuscle, secondMuscle 
                        FROM Exercises
                        JOIN UserExercises ON Exercises.exerciseId = UserExercises.exerciseId
                        WHERE UserExercises.userId = ".strval($_SESSION["id"]);

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
