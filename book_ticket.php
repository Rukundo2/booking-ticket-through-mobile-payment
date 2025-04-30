<?php
include 'db_connect.php';

// Fetch routes from the database
$result = $conn->query("SELECT * FROM routes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book a Ticket - Virunga Express</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">🎫 Book a Ticket - Virunga Express</h2>

        <form action="save_ticket.php" method="POST" class="shadow p-4 bg-white rounded">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="route_id" class="form-label">Select Route</label>
                <select name="route_id" class="form-select" required>
                    <option value="">-- Choose Route --</option>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <option value="<?= $row['id'] ?>">
                            <?= $row['departure'] ?> → <?= $row['destination'] ?> (<?= $row['departure_time'] ?>)
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Travel Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="seats" class="form-label">Number of Seats</label>
                <input type="number" name="seats" class="form-control" min="1" required>
            </div>

            <button type="submit" class="btn btn-success">Reserve Ticket</button>
        </form>
    </div>
</body>
</html>
