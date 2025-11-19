<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Welcome, <?php echo $user['fname']; ?>!</h2>

    <p><b>First Name:</b> <?php echo $user['fname']; ?></p>
    <p><b>Last Name:</b> <?php echo $user['lname']; ?></p>
    <p><b>Email:</b> <?php echo $user['email']; ?></p>
    <p><b>Username:</b> <?php echo $user['username']; ?></p>

    <a href="update.php"><button>Update Profile</button></a>
    <a href="logout.php"><button style="background:red; margin-top:10px;">Logout</button></a>
</div>

</body>
</html>
