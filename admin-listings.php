<?php
session_start();
include 'php/db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION["user_role"] !== "admin") {
    die("Access denied.");
}

$result = $conn->query("SELECT id, title, category, price FROM listings ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Admin listing management for Horizon Realty">
    <meta name="keywords" content="admin, listings, edit listings, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
    <title>Horizon Realty - Admin Listings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Admin Listings Management</h1>

<p><a href="profile.php">Back to Profile</a></p>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Price</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row["id"]); ?></td>
        <td><?php echo htmlspecialchars($row["title"]); ?></td>
        <td><?php echo htmlspecialchars($row["category"]); ?></td>
        <td>$<?php echo number_format((float)$row["price"]); ?> CAD</td>
        <td>
            <a href="edit-listing.php?id=<?php echo urlencode($row["id"]); ?>">Edit</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
