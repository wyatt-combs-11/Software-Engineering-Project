<!--
 Account Settings
 CSE201 Section C Group 7
-->

<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ./Login.php");
        exit;
    }
?>


<html lang = en>

<!-- Website Setup (Tab title, CSS, charset) -->
<head>
    <title> Log In </title>
    <link rel="stylesheet" href="./css/baseWebsite.css">
    <meta charset="UTF-8">
</head>

<body>

<!-- Logo and upper page setup -->
<div id="titleDiv">
    <img id = "logo" src="images/Logo.PNG" alt="Jim People Logo">
    <h1 class="mainTitle"> Login</h1>
</div>

<!-- Heading creation and layout section -->
<div id="workoutDiv">
    <ul>
        <li><a href="./html/JimBuddies.php">Home Page</a></li>
        <li><a href="./html/AllWorkouts.php">All Workouts</a></li>
        <li><a href="./html/ChestWorkouts.php">Chest Workouts</a></li>
        <li><a href="./html/PullWorkouts.php">Pull Workouts</a></li>
        <li><a href="./html/LegWorkouts.php">Leg Workouts</a></li>
        <li><a href="./html/ReviewsPage.php">Reviews</a></li>
        <li style=float:right><a href="signup.php">Sign Up</a></li>
        <!-- <li style=float:right><a href="TESTLINK.com">Log In</a></li> -->
    </ul>
</div>

<div style="text-align:center">
<form action = "accountSettings.php" method = "post">
    <h2>LOGIN</h2>
    <label>Change Username:</label>
    <input type="text" name="uname" placeholder="Username"><br>
    <label>Change Password:</label>
    <input type="password" name="psword" placeholder="Password"><br>
    <label>Light Versus Dark Mode: </label>
    <select name="mode">
        <option value="0">Light Mode</option>
        <option value="1">Dark Mode</option>
    </select> <br>
    <button type="submit">Update Settings</button>
</form>

<?php
    $adminUName = "ADMIN";
    $adminPWord = "ADMIN";
    $uName = $_POST["uname"] ?? null;
    $pWord = $_POST["psword"] ?? null;
    $mode = $_POST["mode"] ?? null;

    $current = $_SESSION["id"];

    $connection = mysqli_connect('aws-exercisedb.camvz480jeos.us-east-2.rds.amazonaws.com','JimPeople','Muscles201', 'exerciseDB');

    if ($connection -> connect_errno) {
        echo "NOT CONNECTED";
    }

    if ($uName != null) {
        $sql = "UPDATE Users SET username = '$uName' WHERE (userId = '$current');";
        mysqli_query($connection, $sql);
        $_SESSION["username"] = $uName;
    }

    if($pWord != null) {
        $sql = "UPDATE Users SET password = '$pWord' WHERE (userId = '$current');";
        mysqli_query($connection, $sql);
    }

    if ($mode != null) {
        $sql = "UPDATE Users SET mode = '$mode' WHERE (userId = '$current');";
        mysqli_query($connection, $sql);
        $_SESSION["mode"] = $mode;

    }

?>

</div>

</body>

</html>
