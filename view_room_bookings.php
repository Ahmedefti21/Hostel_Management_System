<?php
session_start();
include 'db.php'; // Database connection

// Ensure the user is logged in as an admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");  // Redirect to login if not logged in as admin
    exit();
}

// Fetch all bookings along with room and user information
$query = "SELECT r.room_number, r.status, r.shared, r.fee, r.available_spots, r.st_id, u.st_name, u.email, u.st_contact
          FROM Room r
          JOIN User u ON r.st_id = u.st_id
          WHERE r.status = 'Booked'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Room Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(120deg, #800000, #f4f4f4);
            background-attachment: fixed;
        }
        .container {
            margin-top: 50px;
        }
        .table th, .table td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-white mb-4">Room Bookings</h1>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Fee</th>
                    <th>Available Spots</th>
                    <th>Booked By (Student)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['room_number']; ?></td>
                            <td><?php echo ($row['shared'] == 1) ? 'Shared' : 'Single'; ?></td>
                            <td>$<?php echo $row['fee']; ?></td>
                            <td><?php echo $row['available_spots']; ?></td>
                            <td><?php echo $row['st_name']; ?></td>
                            <td>
                                <!-- View User Info Button -->
                                <a href="view_user_info.php?st_id=<?php echo $row['st_id']; ?>" class="btn btn-info">View User Info</a>
                                <!-- Delete Button -->
                                <a href="delete_booking.php?room_number=<?php echo $row['room_number']; ?>&st_id=<?php echo $row['st_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No bookings available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
