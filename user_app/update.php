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

if(isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    if(!empty($_POST['password'])){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql_update = "UPDATE users SET fname='$fname', lname='$lname', email='$email', username='$username', password='$password' WHERE id='$user_id'";
    } else {
        $sql_update = "UPDATE users SET fname='$fname', lname='$lname', email='$email', username='$username' WHERE id='$user_id'";
    }

    if(mysqli_query($conn, $sql_update)){
        echo "<script>alert('Profile updated successfully'); window.location='profile.php';</script>";
    } else {
        echo "<script>alert('Can't update profile.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Your Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Update Your Profile</h2>

    <form action="" method="POST">
        <label>First Name:</label>
        <input type="text" name="fname" value="<?php echo $user['fname']; ?>" required>

        <label>Last Name:</label>
        <input type="text" name="lname" value="<?php echo $user['lname']; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required>

        <label>New Password:</label>
        <input type="password" name="password">

        <button type="submit" name="update">Save Changes</button>
    </form>

    <a href="profile.php" class="button-link">Profile</a>
</div>

</body>
</html>
