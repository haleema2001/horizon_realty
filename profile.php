<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION["user_name"];
$email = $_SESSION["user_email"];
$role = $_SESSION["user_role"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Profile - Horizon Realty</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<h1>My Profile</h1>

<p>Welcome to your private account area.</p>

<p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
<p><strong>Role:</strong> <?php echo htmlspecialchars($role); ?></p>

<hr>

<h2>Account Options</h2>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="townhomes.php">Browse Listings</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

<?php if ($role === "admin") { ?>

<hr>

<h2>Admin Controls</h2>

<ul>
    <li><a href="admin-users.php">Manage Users</a></li>
    <li><a href="admin-listings.php">Manage Listings</a></li>
    <li><a href="monitor.php">System Monitor</a></li>
</ul>

<?php } ?>

</body>
</html>
