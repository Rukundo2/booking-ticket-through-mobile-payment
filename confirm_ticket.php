<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $ticket_id = $_GET['id'];

    // Update status to Confirmed
    $sql = "UPDATE reservations SET status='Confirmed' WHERE id=$ticket_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Ticket confirmed successfully!'); window.location.href='view_reserved_tickets.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
