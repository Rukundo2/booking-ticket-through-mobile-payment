<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $seats = $_POST['seats'];

    $sql = "UPDATE reservations SET fullname='$fullname', phone='$phone', date='$date', seats='$seats' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Ticket updated successfully!'); window.location.href='view_reserved_tickets.php';</script>";
    } else {
        echo "Error updating ticket: " . $conn->error;
    }
}
?>
