<?php
include 'db.php';

$sql = "SELECT * FROM listings WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

<article class="product-card">
    <img src="media/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">

    <h3><?php echo htmlspecialchars($row['title']); ?></h3>

    <p class="product-type">
        <?php echo $row['beds']; ?> bed •
        <?php echo $row['baths']; ?> bath •
        <?php echo $row['sqft']; ?> sq ft
    </p>

    <p class="product-price">
        $<?php echo number_format((float)$row['price']); ?> CAD
    </p>
</article>

<?php
    }
} else {
    echo "<p>No listings available.</p>";
}
?>
