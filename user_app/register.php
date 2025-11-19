<?php
include "db.php";

if(isset($_POST['register'])) {
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' OR username='$username'");

    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Email or username already exist');</script>";
    } else {
        $sql = "INSERT INTO users (fname, lname, email, username, password)
                VALUES ('$fname', '$lname', '$email', '$username', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registered successfully'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Cannot register the user.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Create new account</h2>

    <form action="register.php" method="POST">

        <label>First Name</label>
        <input type="text" name="fname" required>

        <label>Last Name</label>
        <input type="text" name="lname" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="register">Register</button>
    </form>

    <p><a href="login.php">Login</a></p>
</div>

</body>
</html>
