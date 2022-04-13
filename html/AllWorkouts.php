<?php
        session_start();
?>
<html lang="en">

<head>
        <title> All Workouts </title>
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
    <div id="titleDiv">
        <img id = "logo" src="../images/Logo.PNG" alt="Jim People Logo">
        <h1 class="mainTitle"> All Workouts</h1>
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

    <div id="workoutDiv"> 
        <ul class="heading">
            <form action = "AllWorkouts.php" method = "post" style="padding:10px;">
                <li><p><input type="text" name="search" size="40" placeholder="ex. Bench..."></p></li>
                <li><p><button type="submit">Search</button></p></li>
            </form>
        </ul>
    </div>

    <div>
        <?php
            $connection = new mysqli('aws-exercisedb.camvz480jeos.us-east-2.rds.amazonaws.com','JimPeople','Muscles201', 'exerciseDB');

            if ($connection -> connect_errno) {
                echo "NOT CONNECTED";
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
                    </div>
            <?php endforeach; ?>
        </table>
    </div>



</body>


</html>
