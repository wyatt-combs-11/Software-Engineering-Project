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
    </ul>
</div>

<div style="text-align:center">
<form action = "signup.php" method = "post">
    <h2>LOGIN</h2>
    <label>Username:</label>
    <input type="text" name="uname" placeholder="Username"><br>
    <label>Password:</label>
    <input type="password" name="psword" placeholder="Password"><br>
    <label>Goals:</label>
    <input type="text" name="goals" placeholder="Goals"><br>
    <label>Age:</label>
    <input type="text" name="age" placeholder="AGE"><br>
    <button type="submit">Sign Up</button>
</form>

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