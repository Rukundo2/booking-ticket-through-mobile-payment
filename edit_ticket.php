<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM reservations WHERE id=$id");
    $ticket = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Ticket</title>
</head>
<body>
    <h2>Edit Ticket</h2>
    <form method="post" action="update_ticket.php">
        <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">
        Full Name: <input type="text" name="fullname" value="<?php echo $ticket['fullname']; ?>"><br><br>
        Phone: <input type="text" name="phone" value="<?php echo $ticket['phone']; ?>"><br><br>
        Date: <input type="date" name="date" value="<?php echo $ticket['date']; ?>"><br><br>
        Seats: <input type="number" name="seats" value="<?php echo $ticket['seats']; ?>"><br><br>
        <input type="submit" value="Update Ticket">
    </form>
</body>
</html>
