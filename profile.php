<?php
session_start();

if (!isset($_SESSION["user_email"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile - Horizon Realty</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>My Profile</h1>

<p>Welcome to your private account area.</p>
<p>Name: Demo User</p>
<p>Email: <?php echo htmlspecialchars($_SESSION["user_email"]); ?></p>

<a href="login.php">Back to Login</a>

</body>
</html>
