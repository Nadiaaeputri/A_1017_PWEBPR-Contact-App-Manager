<?php
$host = "localhost";
$db_username = "root";
$db_password = "";
$database = "contactowner";

// Create connection
$conn = new mysqli($host, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM data_akun";
?>


