<!DOCTYPE html>
<html lang = en>
    
<head>
    <title> Log In </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
<form action = "Login.php" method = "post">
    <h2>LOGIN</h2>
    <input type="text" name="uname" placeholder="Username"><br>
    <input type="password" name="psword" placeholder="Password"><br>
    <button class="btn btn-primary" type="submit">Login</button>
</form>

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