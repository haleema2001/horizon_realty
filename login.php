<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["user_email"] = $_POST["email"];
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Horizon Realty</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Login</h1>

<form method="POST">
    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Login</button>
</form>

</body>
</html> 
