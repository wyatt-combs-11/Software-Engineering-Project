<!DOCTYPE html>
<html lang = en>
    
<head>
    <title> Log In </title>
    <link rel="stylesheet" href="baseWebsite.css">
    <meta charset="UTF-8">
</head>

<body>

<div id="titleDiv">
    <img id = "logo" src="images/Logo.PNG" alt="Jim People Logo">
    <h1 class="mainTitle"> Login</h1>
</div>

<div id="workoutDiv"> 
    <ul>
        <li><a href="JimBuddies.html">Home Page</a></li>
        <li><a href="AllWorkouts.html">All Workouts</a></li>
        <li><a href="ChestWorkouts.html">Chest Workouts</a></li>
        <li><a href="PullWorkouts.html">Pull Workouts</a></li>
        <li><a href="LegWorkouts.html">Leg Workouts</a></li>
        <!-- <li style=float:right><a href="TESTLINK.com">Log In</a></li> -->
    </ul>
</div>

<div style="text-align:center">
<form action = "Login.php" method = "post">
    <h2>LOGIN</h2>
    <label>Username:</label>
    <input type="text" name="uname" placeholder="Username"><br>
    <label>Password:</label>
    <input type="password" name="psword" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>

<?php 
//http://localhost:4000/Documents/School%20Stuff/CSE%20201/intro-to-software-engineering-project/Login.php
    $adminUName = "ADMIN";
    $adminPWord = "ADMIN";
    $uName = $_POST["uname"] ?? null;
    $pWord = $_POST["psword"] ?? null;
    if($uName != null || $pWord != null) {
        if($adminUName == $uName && $adminPWord == $pWord) {
            echo "Admin Login Success";
        } else {
            echo "Incorrect Username or Password";
        }
    }
?>

</div>

</body>

</html>