<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "jackson"; // ✅ this should match your phpMyAdmin database name

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
