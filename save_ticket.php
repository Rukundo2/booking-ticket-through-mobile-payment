<?php
include 'db_connect.php';

$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$route_id = $_POST['route_id'];
$date = $_POST['date'];
$seats = $_POST['seats'];

$sql = "INSERT INTO reservations (fullname, phone, route_id, date, seats)
        VALUES ('$fullname', '$phone', '$route_id', '$date', '$seats')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Ticket reserved successfully. <a href='book_ticket.php'>Book another</a>";
} else {
    echo "❌ Error: " . $conn->error;
}
$conn->close();
?>
