<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assign connection to global variable (if needed)
global $mysqli;
$mysqli = $conn;
?>
