<?php
include 'php/db.php';
?>

<!--
  Project: Horizon Realty
  Purpose: Real estate website
  Author: Parmida Khashayar
  Date: 2026-02-25
  Notes:
    - This is the Townhomes listings page for Horizon Realty, showcasing properties with courtyard, garden, and pool views, as well as garage options.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Horizon Realty - Townhomes for sale. Courtyard, garden, and pool views with garage options.">
    <meta name="keywords" content="townhomes for sale, townhouses, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
    <title>Horizon Realty - Townhomes</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Didot&display=swap" rel="stylesheet">
</head>

<body class="spring-theme">
    <header>
        <h1>HORIZON REALTY</h1>
        <button class="mobile-menu-toggle" aria-label="Toggle navigation menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav>
            <ul class="nav-menu">
                <li><a href="index.html">HOME</a></li>
                <li class="dropdown">
                    <a href="#" aria-haspopup="true" aria-expanded="false">LISTINGS</a>
                    <ul class="dropdown-content" aria-label="Listing categories">
                        <li><a href="single-family.html">SINGLE FAMILY</a></li>
                        <li><a href="condos.html">CONDOS</a></li>
                        <li><a href="townhomes.html" class="active">TOWNHOMES</a></li>
                        <li><a href="luxury-estates.html">LUXURY ESTATES</a></li>
                        <li><a href="commercial.html">COMMERCIAL</a></li>
                        <li><a href="land.html">LAND</a></li>
                        <li><a href="rentals.html">RENTALS</a></li>
                        <li><a href="multi-family.html">MULTI-FAMILY</a></li>
                        <li><a href="new-developments.html">NEW DEVELOPMENTS</a></li>
                        <li><a href="vacation-properties.html">VACATION</a></li>
                        <li><a href="waterfront.html">WATERFRONT</a></li>
                    </ul>
                </li>
                <li><a href="featured.html">FEATURED</a></li>
                <li><a href="market-stats.html">MARKET STATS</a></li>
                <li><a href="mortgage-calculator.html">MORTGAGE CALCULATOR</a></li>
                <li><a href="virtual-tour.html">VIRTUAL TOUR</a></li>
                <li><a href="buying-guide.html">BUYING GUIDE</a></li>
                <li><a href="contact.html">CONTACT</a></li>
                <li><a href="about.html">ABOUT US</a></li>
                <li><a href="help.html">HELP</a></li>
            </ul>
        </nav>
    </header>

    <main class="house-collection">
        <h2>TOWNHOMES</h2>
            <div class="product-grid">

            <?php
            $sql = "SELECT * FROM listings WHERE category='townhomes'";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
            ?>

            <article class="product-card">
                <img src="media/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                <h3><?php echo $row['title']; ?></h3>

                <p class="product-type">
                    <?php echo $row['beds']; ?> bed • 
                    <?php echo $row['baths']; ?> bath • 
                    <?php echo $row['sqft']; ?> sq ft
                </p>

                <p class="product-price">
                    $<?php echo number_format($row['price']); ?> CAD
                </p>
            </article>

            <?php
            }
            ?>

            </div>
    </main>

    <script src="scripts.js"></script>
</body>
</html>
