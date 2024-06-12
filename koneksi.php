<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "uts_312310028"; // Replace with your database name

// Create connection
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>
