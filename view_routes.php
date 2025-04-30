<?php
include 'db_connect.php';

$sql = "SELECT * FROM routes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Routes - Virunga Express</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f9f9f9;
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
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #3cb371;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <h2>Available Bus Routes - Virunga Express</h2>

    <table>
        <tr>
            <th>#</th>
            <th>From</th>
            <th>To</th>
            <th>Price (RWF)</th>
            <th>Departure Time</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            $count = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $count++ . "</td>
                        <td>" . $row["departure"] . "</td>
                        <td>" . $row["destination"] . "</td>
                        <td>" . $row["price"] . "</td>
                        <td>" . $row["departure_time"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No routes found.</td></tr>";
        }
        $conn->close();
        ?>
    </table>

</body>
</html>
