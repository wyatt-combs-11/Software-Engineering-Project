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

 --JQuery used in lines 27 & 28

 All Workouts
 CSE201 Section C Group 7
-->

<?php
        session_start();
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

    function SearchExercises() {
        var input = document.getElementById("search").value;
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
        <h1 class="mainTitle"> All Workouts</h1>
    </div>

    <!-- Heading creation and layout section -->
    <div id="workoutDiv">
        <ul class="heading">
            <li><a href="JimBuddies.php">Home Page</a></li>
            <li><a href="ChestWorkouts.php">Chest Workouts</a></li>
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

    <div id="workoutDiv">
        <ul class="heading">
            <form action = "AllWorkouts.php" method = "post" style="padding:10px;">
                <li><p><input type="text" name="search" size="40" placeholder="ex. Bench..."></p></li>
                <li><p><button type="submit">Search</button></p></li>
            </form>
        </ul>
    </div>

    <!-- Populating the page with workouts -->
    <div>
        <?php
            $connection = new mysqli('aws-exercisedb.camvz480jeos.us-east-2.rds.amazonaws.com','JimPeople','Muscles201', 'exerciseDB');

            if ($connection -> connect_errno) {
                echo "NOT CONNECTED";
            }

            $userId = $_SESSION["id"] ?? null;
            $exerciseId = $_POST["wId"] ?? null;

            if($userId != null && $exerciseId != null) {
                $sql = "CALL sp_AddFavorite(".strval($userId).", ".strval($exerciseId).")";
                mysqli_query($connection, $sql);
            }

            $search_val  = $_POST['search'];

            $data = [];
            $sql = "CALL spExercise_Search('".strval($search_val)."')";
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
                            Second: <?php echo $result['secondMuscle'] ?><br>
                        </p>
                        <form style="margin: 0px" action = "AllWorkouts.php" method = "post">
                            <ul>
                                <li><p style="margin: 5px auto 5px auto; "><button style="margin: 5px 5px 5px 5px" type="submit">Favorite</button></p></li>
                                <li><?php echo "<input type='hidden' name='wId' value='".$result['exerciseId']."'>"?></li>
                            </ul>
                        </form>
                    </div>
            <?php endforeach; ?>
        </table>
    </div>



</body>


</html>
