<?php
include 'php/db.php';

$services = [];

/* Database connection check */
if ($conn && !$conn->connect_error) {
    $services[] = ["name" => "Database Connection", "status" => "Online"];
} else {
    $services[] = ["name" => "Database Connection", "status" => "Offline"];
}

/* Listings table check */
$listings_check = $conn->query("SHOW TABLES LIKE 'listings'");
if ($listings_check && $listings_check->num_rows > 0) {
    $services[] = ["name" => "Listings Table", "status" => "Online"];
} else {
    $services[] = ["name" => "Listings Table", "status" => "Offline"];
}

/* Users table check */
$users_check = $conn->query("SHOW TABLES LIKE 'users'");
if ($users_check && $users_check->num_rows > 0) {
    $services[] = ["name" => "Users Table", "status" => "Online"];
} else {
    $services[] = ["name" => "Users Table", "status" => "Offline"];
}

/* Listings query check */
$listings_query = $conn->query("SELECT COUNT(*) AS total FROM listings");
if ($listings_query) {
    $row = $listings_query->fetch_assoc();
    $services[] = ["name" => "Listings Query", "status" => "Online (" . $row["total"] . " records)"];
} else {
    $services[] = ["name" => "Listings Query", "status" => "Offline"];
}

/* Core PHP pages check */
$pages = [
    "register.php" => "Registration Page",
    "login.php" => "Login Page",
    "profile.php" => "Profile Page",
    "admin-users.php" => "Admin Users Page",
    "townhomes.php" => "Townhomes Page",
    "single-family.php" => "Single Family Page",
    "condos.php" => "Condos Page",
    "luxury-estates.php" => "Luxury Estates Page"
];

foreach ($pages as $file => $label) {
    if (file_exists($file)) {
        $services[] = ["name" => $label, "status" => "Online"];
    } else {
        $services[] = ["name" => $label, "status" => "Offline"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Horizon Realty website monitoring page">
    <meta name="keywords" content="monitoring, website status, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
    <title>Horizon Realty - Monitoring Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .status-online {
            color: green;
            font-weight: bold;
        }

        .status-offline {
            color: red;
            font-weight: bold;
        }

        .monitor-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .monitor-table th,
        .monitor-table td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        .monitor-table th {
            background-color: #f4f4f4;
        }

        .monitor-wrapper {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }
    </style>
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
                        <li><a href="single-family.php">SINGLE FAMILY</a></li>
                        <li><a href="condos.php">CONDOS</a></li>
                        <li><a href="townhomes.php">TOWNHOMES</a></li>
                        <li><a href="luxury-estates.php">LUXURY ESTATES</a></li>
                        <li><a href="commercial.php">COMMERCIAL</a></li>
                        <li><a href="land.php">LAND</a></li>
                        <li><a href="rentals.php">RENTALS</a></li>
                        <li><a href="multi-family.php">MULTI-FAMILY</a></li>
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
                <li><a href="monitor.php" class="active">MONITOR</a></li>
            </ul>
        </nav>
    </header>

    <main class="monitor-wrapper">
        <h2>Website Monitoring Page</h2>
        <p>This page reports the current working status of major Horizon Realty website features and services.</p>

        <table class="monitor-table">
            <tr>
                <th>Service</th>
                <th>Status</th>
            </tr>

            <?php foreach ($services as $service) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($service["name"]); ?></td>
                    <td class="<?php echo stripos($service["status"], 'Online') === 0 ? 'status-online' : 'status-offline'; ?>">
                        <?php echo htmlspecialchars($service["status"]); ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>

    <script src="scripts.js"></script>
</body>
</html>
