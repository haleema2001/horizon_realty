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

if (!isset($_GET["id"])) {
    die("Listing ID missing.");
}

$id = $_GET["id"];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $category = trim($_POST["category"]);
    $price = (int) $_POST["price"];
    $address = trim($_POST["address"]);
    $image = trim($_POST["image"]);
    $beds = (int) $_POST["beds"];
    $baths = (int) $_POST["baths"];
    $sqft = (int) $_POST["sqft"];

    $stmt = $conn->prepare("UPDATE listings SET title=?, category=?, price=?, address=?, image=?, beds=?, baths=?, sqft=? WHERE id=?");
    $stmt->bind_param("ssissiiis", $title, $category, $price, $address, $image, $beds, $baths, $sqft, $id);

    if ($stmt->execute()) {
        $message = "Listing updated successfully.";
    } else {
        $message = "Error updating listing.";
    }

    $stmt->close();
}

$stmt = $conn->prepare("SELECT * FROM listings WHERE id=?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Listing not found.");
}

$row = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Edit listing for Horizon Realty">
    <meta name="keywords" content="admin, edit listing, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
    <title>Horizon Realty - Edit Listing</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Edit Listing</h1>

<?php if ($message != "") echo "<p>$message</p>"; ?>

<form method="POST">

    <label>Title</label><br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($row["title"]); ?>" required><br><br>

    <label>Category</label><br>
    <input type="text" name="category" value="<?php echo htmlspecialchars($row["category"]); ?>" required><br><br>

    <label>Price</label><br>
    <input type="number" name="price" value="<?php echo htmlspecialchars($row["price"]); ?>" required><br><br>

    <label>Address</label><br>
    <input type="text" name="address" value="<?php echo htmlspecialchars($row["address"]); ?>" required><br><br>

    <label>Image</label><br>
    <input type="text" name="image" value="<?php echo htmlspecialchars($row["image"]); ?>" required><br><br>

    <label>Beds</label><br>
    <input type="number" name="beds" value="<?php echo htmlspecialchars($row["beds"]); ?>" required><br><br>

    <label>Baths</label><br>
    <input type="number" name="baths" value="<?php echo htmlspecialchars($row["baths"]); ?>" required><br><br>

    <label>Square Feet</label><br>
    <input type="number" name="sqft" value="<?php echo htmlspecialchars($row["sqft"]); ?>" required><br><br>

    <button type="submit">Save Changes</button>
</form>

<p><a href="admin-listings.php">Back to Admin Listings</a></p>

</body>
</html>
