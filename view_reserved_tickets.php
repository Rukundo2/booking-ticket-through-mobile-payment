<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reserved Tickets - Virunga Express</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #2ecc71;
            color: white;
        }
        a.btn {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 2px;
            display: inline-block;
        }
        a.confirm-btn { background-color: #3498db; }
        a.confirm-btn:hover { background-color: #2980b9; }

        a.edit-btn { background-color: #e67e22; }
        a.edit-btn:hover { background-color: #d35400; }

        a.delete-btn { background-color: #e74c3c; }
        a.delete-btn:hover { background-color: #c0392b; }
    </style>
</head>
<body>
    <h2>All Reserved Tickets - Virunga Express</h2>
    <table>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Phone</th>
            <th>From</th>
            <th>To</th>
            <th>Date</th>
            <th>Seats</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = "SELECT r.id, r.fullname, r.phone, ro.departure, ro.destination, r.date, r.seats, r.status 
                FROM reservations r
                JOIN routes ro ON r.route_id = ro.id";
        $result = $conn->query($sql);
        $sn = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $sn++ . "</td>
                    <td>" . $row['fullname'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['departure'] . "</td>
                    <td>" . $row['destination'] . "</td>
                    <td>" . $row['date'] . "</td>
                    <td>" . $row['seats'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td>";

                if ($row['status'] == 'Pending') {
                    echo "<a class='btn confirm-btn' href='confirm_ticket.php?id=" . $row['id'] . "'>Confirm</a> ";
                }

                echo "<a class='btn edit-btn' href='edit_ticket.php?id=" . $row['id'] . "'>Edit</a> ";
                echo "<a class='btn delete-btn' href='delete_ticket.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this ticket?')\">Delete</a>";

                echo "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No reservations found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
