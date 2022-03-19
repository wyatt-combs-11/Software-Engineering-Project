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
            <li style=float:right> <a href="../signup.php">Sign Up</a></li>
            <li id = "lightdarkTog" style=float:right><a onclick="ColorChange()">Toggle Light/Dark Mode</a></li>
        </ul>
    </div>

    <div>  

        <a href="TEXT.com">
            <div id="15HIIT" class="card row">
                <img id="hiit" class="exercise" src="../images/15hiit.jpg">
                <h3 id="hiit" >15 Minute HIIT</h3>
                <p id="15D">
                    A high Intensity Interval Training that should take 15 mins
                </p>
            </div>
        </a>
        
        <a href="RunningExample.html">
            <div id="test" class="card row">
                <img id="run" class="exercise" src="../images/test.jpg">
                <h3 id="h3" >Running</h3>
                <p id="runD">
                    A light interval running example
                </p>
                <!-- <p>
                    Some smaller information about the random exercises
                </p> -->
            </div>
        </a>

        <a href="TEXT.com">
            <div id="pushdiv" class="card row">
                <img id="push" class="exercise" src="../images/push.jpg">
                <h3 id="pushH" >Push Workout</h3>
                <p id="pushD">
                    A push day at the gym
                </p>
            </div>
        </a>

        
        <a href="TEXT.com">
            <div id="pulldiv" class="card row">
                <img id="pull" class="exercise" src="../images/pull.jpg">
                <h3 id="pullH" >Pull Workout</h3>
                <p id="pullD">
                    A Pull day at the gym
                </p>
            </div>
        </a>
        
        <a href="TEXT.com">
            <div id="legdiv" class="card row">
                <img id="leg" class="exercise" src="../images/leg.jpg">
                <h3 id="legH" >Leg Workout</h3>
                <p id="legD">
                    Never skip leg day
                </p>
            </div>
        </a>
        
        <a href="TEXT.com">
            <div id="chestdiv" class="card row">
                <img id="chest" class="exercise" src="../images/chest.jpg">
                <h3 id="chestH" >Chest Workout</h3>
                <p id="chestD">
                    Chest Day, my favorite
                </p>
            </div>
        </a>

        <a href="TEXT.com">
            <div id="bicepdiv" class="card row">
                <img id="bicep" class="exercise" src="../images/bicep.jpg">
                <h3 id="bicepH" >Bicep Workout</h3>
                <p id="bicepD">
                    Guys I am NOT creative
                </p>
            </div>
        </a>
        
        <a href="TEXT.com">
            <div id="crossdiv" class="card row">
                <img id="cross" class="exercise" src="../images/crossfit.jpg">
                <h3 id="crossH" >Crossfit Workout</h3>
                <p id="crossD">
                    I am gonna be honest, I don't even know what crossfit is 100%
                </p>
            </div>
        </a>
        
        <a href="TEXT.com">
            <div id="calfdiv" class="card row">
                <img id="calf" class="exercise" src="../images/calf.jpg">
                <h3 id="calfH" >Calf Exercises</h3>
                <p id="calfD">
                    I am out of creativity. That is all
                </p>
            </div>
        </a>

        <a href="TEXT.com">
            <div id="5kdiv" class="card row">
                <img id="5k" class="exercise" src="../images/5k.jpg">
                <h3 id="5kH" >5K Training Plan</h3>
                <p id="5kD">
                    A guide to training for your first 5k
                </p>
            </div>
        </a>
        
        <a href="TEXT.com">
            <div id="halfdiv" class="card row">
                <img id="half" class="exercise" src="../images/half.jpg">
                <h3 id="halfH" >Half Marathon Training Plan</h3>
                <p id="halfD">
                    A guide to training for your first Half Marathon
                </p>
            </div>
        </a>
        
        <a href="TEXT.com">
            <div id="marathondiv" class="card row">
                <img id="marathon" class="exercise" src="../images/marathon.jpg">
                <h3 id="marathonH" >Marathon Training Plan</h3>
                <p id="marathonD">
                    A guide to training for your first Marathon
                </p>
            </div>
        </a>
    </div>



</body>


</html>
