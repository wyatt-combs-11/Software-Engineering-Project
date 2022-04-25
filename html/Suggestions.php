<?php
    session_start();
?>


<html lang="en">

<head>
        <title> Suggestions  </title>
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
        <h1 class="mainTitle"> Suggest a Workout</h1>
    </div>

    <div id="workoutDiv"> 
        <ul class="heading">
            <li><a href="JimBuddies.php">Home Page</a></li>
            <li><a href="AllWorkouts.php">All Workouts</a></li>
            <li><a href="ChestWorkouts.php">Chest Workouts</a></li>
            <li><a href="PushWorkouts.php">Push Workouts</a></li>
            <li><a href="PullWorkouts.php">Pull Workouts</a></li>
            <li><a href="LegWorkouts.php">Leg Workouts</a></li>
            <li><a href="Favorites.php">Favorited Workouts</a></li>
            <li style=float:right> <a href="../signup.php">Sign Up</a></li>
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
            <li id = "lightdarkTog" style=float:right><a onclick="ColorChange()">Toggle Light/Dark Mode</a></li>
        </ul>
    </div>

    <div>
            <?php
                if ($_SESSION["loggedin"] === true) {
                    echo '<div style="text-align:center">
                            <div id="signupBox" class="menuCard" style="line-height: 35px; height: 400px">
                            <form action = "Suggestions.php" method = "post">
                            <h2 style="padding-top: 15px;">Suggest a Workout to JimBuddies</h2>
                            <label>Workout Name:</label>
                            <input type="text" name="WOName" placeholder="Workout Name" required><br>
                            <label>Workout Description:</label>
                            <textarea id="description" name="description" rows="5" cols="30" placeholder="Description" required></textarea><br>
                            <label>Push, Pull, or Legs:</label>
                            <input list="type" name="type" placeholder="Push, Pull, or Legs" required>
                                <datalist id="type">
                                    <option value="Push">
                                    <option value="Pull">
                                    <option value="Legs">
                                    <option value="N/A">
                                </datalist><br>
                            <label>Main Muscle:</label>
                            <input type="text" name="mainMuscle" placeholder="EX:Biceps, Glutes, Chest..." required><br>
                            <label>Secondary Muscle:</label>
                            <input type="text" name="secMuscle" placeholder="EX:Biceps, Glutes, Chest..."><br>
                            <button type="submit">Submit</button>
                            <h2 style="font-size: 15px; padding-top: 25px;">JimPeople™</h2>
                            </form>
                            </div>';
                } else {
                        echo '<div style="text-align:center">
                                <p><a href="../Login.php">Login</a> or <a href="../signup.php">Sign Up</a> to suggest a workout</p>';
                }
            ?>
    </div>

    <div>  
        <?php
            $workoutName = $_POST["WOName"] ?? null;
            $description = $_POST["description"] ?? null;
            $type = $_POST["type"] ?? null;
            $mainMuscle = $_POST["mainMuscle"] ?? null;
            $secMuscle = $_POST["secMuscle"] ?? null;


            $connection = new mysqli('aws-exercisedb.camvz480jeos.us-east-2.rds.amazonaws.com','JimPeople','Muscles201', 'exerciseDB');

            if ($connection -> connect_errno) {
                echo "NOT CONNECTED";
            }

            //Enter into database

        ?>
    </div>


</body>


</html>
