<?php
$category = "multi-family";
?>

<!--
  Project: Horizon Realty
  Purpose: Real estate website
  Authors: Parmida Khashayar, Haleema Bibi, and Basma Abou Artema
  Date: 2026-03-26
  Notes:
    - This is the Multi-Family listings page for Horizon Realty.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Horizon Realty - Multi-family properties for sale.">
    <meta name="keywords" content="multi-family homes, duplex, triplex, investment property, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
    <title>Horizon Realty - Multi-Family</title>
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
                <li><a href="index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" aria-haspopup="true" aria-expanded="false">LISTINGS</a>
                    <ul class="dropdown-content" aria-label="Listing categories">
                        <li><a href="single-family.php">SINGLE FAMILY</a></li>
                        <li><a href="condos.php">CONDOS</a></li>
                        <li><a href="townhomes.php">TOWNHOMES</a></li>
                        <li><a href="luxury-estates.php">LUXURY ESTATES</a></li>
                        <li><a href="commercial.php">COMMERCIAL</a></li>
                        <li><a href="land.php">LAND</a></li>
                        <li><a href="rentals.php">RENTALS</a></li>
                        <li><a href="multi-family.php" class="active">MULTI-FAMILY</a></li>
                        <li><a href="new-developments.php">NEW DEVELOPMENTS</a></li>
                        <li><a href="vacation-properties.php">VACATION</a></li>
                        <li><a href="waterfront.php">WATERFRONT</a></li>
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
<li><a href="login.php">LOGIN</a></li>
<li><a href="register.php">REGISTER</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="house-collection">
            <h2>MULTI-FAMILY</h2>
            <div class="product-grid">
                <?php include 'php/listings-by-category.php'; ?>
            </div>
        </section>
    </main>

    <script src="scripts.js"></script>
</body>

</html>
