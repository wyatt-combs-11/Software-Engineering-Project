<!DOCTYPE html>
<html lang = en>
    
<head>
    <title> Log In </title>
    <link rel="stylesheet" href="./css/baseWebsite.css">
    <meta charset="UTF-8">
</head>

<body>

<div id="titleDiv">
    <img id = "logo" src="images/Logo.PNG" alt="Jim People Logo">
    <h1 class="mainTitle"> Login</h1>
</div>

<div id="workoutDiv"> 
    <ul>
        <li><a href="./html/JimBuddies.html">Home Page</a></li>
        <li><a href="./html/AllWorkouts.html">All Workouts</a></li>
        <li><a href="./html/ChestWorkouts.html">Chest Workouts</a></li>
        <li><a href="./html/PullWorkouts.html">Pull Workouts</a></li>
        <li><a href="./html/LegWorkouts.html">Leg Workouts</a></li>
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

    $connection = mysqli_connect('aws-exercisedb.camvz480jeos.us-east-2.rds.amazonaws.com','JimPeople','Muscles201', 'exerciseDB');

    if ($connection -> connect_errno) {
        echo "NOT CONNECTED";
    }

    // Perform query
    // if ($result = $connection -> query("SELECT * FROM Users")) {
    //    //echo "Returned rows are: " . $result -> num_rows;
    //     // Free result set
    //     while($row = mysqli_fetch_array($result))
    //     {
    //        //print_r($row);
    //     } 
    // }
    
     

    if($uName != null || $pWord != null) {
        $sql = "SELECT * FROM Users WHERE username='$uName' AND password='$pWord'";
        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) === 1) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("location: /html/AllWorkouts.html");
            echo "Login Success";

        } else {
            echo "Incorrect Username or Password";
        }
    }
?>

</div>

</body>

</html>