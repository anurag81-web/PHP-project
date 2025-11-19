<?php

session_start();
include "db.php";

$isLoggedIn = isset($_SESSION['user_id']);
$username = $isLoggedIn && isset($_SESSION['username']) ? $_SESSION['username'] : null;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <?php if($isLoggedIn): ?>
        <h2>Hello user :<?php echo $_SESSION['username']; ?></h2>
        <a href="profile.php"><button>Profile</button></a>
        <a href="logout.php"><button style="background:red; margin-top:10px;">Logout</button></a>
    <?php else: ?>
        <h2>Please login or register to continue.</h2>
        <a href="login.php"><button>Login</button></a>
        <a href="register.php"><button style="background:red; margin-top:10px;">Register</button></a>
    <?php endif; ?>
</div>

</body>
</html>
