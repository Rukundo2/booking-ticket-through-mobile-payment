<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $ticket_id = $_GET['id'];

    $sql = "DELETE FROM reservations WHERE id=$ticket_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Ticket deleted successfully!'); window.location.href='view_reserved_tickets.php';</script>";
    } else {
        echo "Error deleting ticket: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
