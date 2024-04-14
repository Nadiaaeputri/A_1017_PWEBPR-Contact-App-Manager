<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "contact_owner";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM list_contact";
$result = mysqli_query($conn, $query);

?>