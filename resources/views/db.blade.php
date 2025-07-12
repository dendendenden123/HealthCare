<?php
// db.php

$host     = 'localhost';     // Change this if your DB is hosted elsewhere
$username = 'root';          // Change this to your DB username
$password = '';              // Change this to your DB password
$database = 'healthcare_system'; // Change this to your actual database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
