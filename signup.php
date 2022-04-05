<!DOCTYPE html>
<html lang = en>

<head>
    <title> Sign Up </title>
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
        <li><a href="./html/JimBuddies.php">Home Page</a></li>
        <li><a href="./html/AllWorkouts.php">All Workouts</a></li>
        <li><a href="./html/ChestWorkouts.php">Chest Workouts</a></li>
        <li><a href="./html/PullWorkouts.php">Pull Workouts</a></li>
        <li><a href="./html/LegWorkouts.php">Leg Workouts</a></li>
        <li style=float:right><a href="Login.php">Log In</a></li>
    </ul>
</div>

<div style="text-align:center">
<div id="signupBox" class="menuCard" style="line-height: 50px;">
<form action = "signup.php" method = "post">
    <h2 style="padding-top: 25px;">Create an Account</h2>
    <label>Username:</label>
    <input type="text" name="uname" placeholder="Username" require><br>
    <label>Password:</label>
    <input type="password" name="psword" placeholder="Password" pattern="[a-zA-Z0-9]{8,}" title="Only include letters a-z and numbers 0-9. Must be more than 8 characters" require><br>
    <label>Goals:</label>
    <input type="text" name="goals" placeholder="Goals"><br>
    <label>Age:</label>
    <input type="text" name="age" placeholder="Age"><br>
    <button type="submit">Sign Up</button>
    <h2 style="font-size: 15px; padding-top: 45px;">JimPeople™</h2>
</form>
</div>

<?php
    $uName = $_POST["uname"] ?? null;
    $pWord = $_POST["psword"] ?? null;
    $goals = $_POST["goals"] ?? null;
    $age = $_POST["age"] ?? null;

    $connection = mysqli_connect('aws-exercisedb.camvz480jeos.us-east-2.rds.amazonaws.com','JimPeople','Muscles201', 'exerciseDB');

    if ($connection -> connect_errno) {
        echo "NOT CONNECTED";
    }



    if($uName != null || $pWord != null) {
        $sql = "INSERT INTO Users (username, password, goalDescription, age) VALUES ('$uName', '$pWord', '$goals', '$age')";
        mysqli_query($connection, $sql);
    }
?>

</div>

</body>

</html>
