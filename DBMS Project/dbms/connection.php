<?php
// Database connection parameters
$db_host = 'localhost';
$db_user = 'root';
$db_pass = ''; // Password for your database, if any
$db_name = 'bdbms'; // Replace 'your_database_name' with your actual database name

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>