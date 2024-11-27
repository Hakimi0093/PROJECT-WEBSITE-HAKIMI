<?php
// Database connection
$host = "localhost"; // Change this if your database is on a remote server
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "MieEducTuition";

// Create connection using mysqli
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to ensure proper handling of special characters
$conn->set_charset("utf8mb4");
