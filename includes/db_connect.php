<?php
// Database configuration
$host = 'localhost'; // Database host
$db_name = 'ee_recruitment'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password (default is empty for XAMPP)

// Create a connection using MySQLi
$conn = new mysqli($host, $username, $password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character set to utf8
$conn->set_charset("utf8");
?>
