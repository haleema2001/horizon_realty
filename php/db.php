<?php
$host = "localhost";
$username = "abouart_horizon_realty";
$password = "UDPKuK2uf3ZP97W2qXxS";
$database = "abouart_horizon_realty";

$conn = new mysqli($host, $username, $password, $database);

$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>