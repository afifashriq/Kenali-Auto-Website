<?php
// Database configuration
$host = "localhost"; // Host name
$username = "root"; // MySQL username
$password = ""; // MySQL password
$database = "futura_ecommerce"; // Database name

// Attempt to connect to MySQL database
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
