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

if (isset($_GET["toggle"])) {

    $user_id = (int) $_GET["toggle"];

    $stmt = $conn->prepare("
        UPDATE users
        SET status = CASE
            WHEN status = 'active' THEN 'disabled'
            ELSE 'active'
        END
        WHERE id = ?
    ");

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin-users.php");
    exit();
}

$result = $conn->query("SELECT id, full_name, email, role, status FROM users ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Users</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>User Administration</h1>

<p>
<a href="profile.php">Back to Profile</a> |
<a href="index.php">Home</a> |
<a href="logout.php">Logout</a>
</p>

<hr>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?php echo htmlspecialchars($row["full_name"]); ?></td>
    <td><?php echo htmlspecialchars($row["email"]); ?></td>
    <td><?php echo htmlspecialchars($row["role"]); ?></td>
    <td><?php echo htmlspecialchars($row["status"]); ?></td>
    <td>
        <a href="admin-users.php?toggle=<?php echo $row["id"]; ?>">
            <?php echo $row["status"] === "active" ? "Disable" : "Enable"; ?>
        </a>
    </td>
</tr>

<?php } ?>

</table>

<p><a href="profile.php">Back to Profile</a></p>

</body>
</html>
