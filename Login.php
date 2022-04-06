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
        <li><a href="./html/AllWorkouts.php">All Workouts</a></li>
        <li><a href="./html/ChestWorkouts.html">Chest Workouts</a></li>
        <li><a href="./html/PullWorkouts.html">Pull Workouts</a></li>
        <li><a href="./html/LegWorkouts.html">Leg Workouts</a></li>
        <li style=float:right><a href="signup.php">Sign Up</a></li>
        <!-- <li style=float:right><a href="TESTLINK.com">Log In</a></li> -->
    </ul>
</div>

<div style="text-align:center">
<div id="signupBox" class="menuCard" style="line-height: 35px; height: 250px">
<form action = "Login.php" method = "post">
    <h2 style="padding-top: 15px;">Login to an existing account</h2>
    <label>Username:</label>
    <input type="text" name="uname" placeholder="Username"><br>
    <label>Password:</label>
    <input type="password" name="psword" placeholder="Password"><br>
    <button type="submit">Login</button>
    <h2 style="font-size: 15px; padding-top: 25px;">JimPeople™</h2>
</form>
</div>


<?php 
    $adminUName = "ADMIN";
    $adminPWord = "ADMIN";
    $uName = $_POST["uname"] ?? null;
    $pWord = $_POST["psword"] ?? null;

    $connection = mysqli_connect('aws-exercisedb.camvz480jeos.us-east-2.rds.amazonaws.com','JimPeople','Muscles201', 'exerciseDB');

    if ($connection -> connect_errno) {
        echo "NOT CONNECTED";
    }     

    if($uName != null || $pWord != null) {
        $sql = "SELECT * FROM Users WHERE username='$uName' AND password='$pWord'";
        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) === 1) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $uName;
            $hold = mysqli_fetch_row($result);
            $_SESSION["mode"] = $hold[5];
            $_SESSION["id"] = $hold[0];
            header("location: ./html/Favorites.php");
            echo "Login Success";

        } else {
            echo "Incorrect Username or Password";
        }
    }
?>

</div>

</body>

</html>
