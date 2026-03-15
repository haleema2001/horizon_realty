<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile - Horizon Realty</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>My Profile</h1>

<p>Welcome to your private account area.</p>
<p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION["user_name"]); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["user_email"]); ?></p>
<p><strong>Role:</strong> <?php echo htmlspecialchars($_SESSION["user_role"]); ?></p>

<p><a href="logout.php">Logout</a></p>

<?php if ($_SESSION["user_role"] === "admin") { ?>
    <p><a href="admin-users.php">Manage Users</a></p>
    <p><a href="admin-listings.php">Manage Listings</a></p>
<?php } ?>

</body>
</html>
