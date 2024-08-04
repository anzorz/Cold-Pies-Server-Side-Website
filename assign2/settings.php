<?php
$host = 'feenix-mariadb.swin.edu.au';
$user = 's103502758'; // Replace with your MySQL username
$pwd = '160202'; // Replace with your MySQL password
$sql_db = 's103502758_db'; // Replace with your database name

// SQL to create users table
$create_users_table = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

// Create connection
$conn = new mysqli($host, $user, $pwd, $sql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
