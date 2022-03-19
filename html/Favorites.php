<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../Login.php");
        exit;
    }
?>


<!-- <!DOCTYPE html> -->
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
</script>

<body>
    <div id="titleDiv">
        <img id = "logo" src="../images/Logo.PNG" alt="Jim People Logo">
        <h1 class="mainTitle"> All Workouts</h1>
    </div>

    <div id="workoutDiv"> 
        <ul class="heading">
            <li><a href="JimBuddies.html">Home Page</a></li>
            <li><a href="ChestWorkouts.html">Chest Workouts</a></li>
            <li><a href="PushWorkouts.html">Push Workouts</a></li>
            <li><a href="PullWorkouts.html">Pull Workouts</a></li>
            <li><a href="LegWorkouts.html">Leg Workouts</a></li>
            <li style=float:right> <a href="../Logout.php">
                <b>
                    <?php 
                        if ($_SESSION["loggedin"] === true) {
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

    <img id="homeboy" src="../images/mattox.PNG">

    </div>



</body>


</html>
