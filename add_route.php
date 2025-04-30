<?php
include 'db_connect.php';

$from = $_POST['from'];
$to = $_POST['to'];
$price = $_POST['price'];
$time = $_POST['departure_time'];

$sql = "INSERT INTO routes (departure, destination, price, departure_time)
        VALUES ('$from', '$to', '$price', '$time')";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Route Submission</title>
    <meta http-equiv="refresh" content="4;url=view_routes.php">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 30px;
            text-align: center;
        }
        .message {
            background: #ffffff;
            padding: 20px;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .success {
            color: green;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .error {
            color: red;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .link {
            margin-top: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="message">
        <?php
        if ($conn->query($sql) === TRUE) {
            echo "<div class='success'>✅ Route added successfully!</div>";
            echo "<div class='link'>Redirecting to all routes... <a href='view_routes.php'>Click here if not redirected</a></div>";
        } else {
            echo "<div class='error'>❌ Error: " . $conn->error . "</div>";
            echo "<div class='link'><a href='add_route.html'>Try again</a></div>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
