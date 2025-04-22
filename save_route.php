<?php
include 'db_connect.php';

$from = $_POST['from'];
$to = $_POST['to'];
$price = $_POST['price'];
$time = $_POST['departure_time'];

$sql = "INSERT INTO routes (departure, destination, price, departure_time)
        VALUES ('$from', '$to', '$price', '$time')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Route added successfully. <a href='add_route.html'>Add another</a>";
} else {
    echo "❌ Error: " . $conn->error;
}
$conn->close();
?>
