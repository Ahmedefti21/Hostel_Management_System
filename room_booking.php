<?php
session_start();
include 'db.php'; // Database connection

// Check if user is logged in
if (!isset($_SESSION['st_id'])) {
    header("Location: index.php");  // Redirect to homepage if not logged in
    exit();
}

// Fetch available rooms that are not booked
$query = $query = "SELECT * FROM Room"; // Fetch all rooms regardless of booking status
$result = $conn->query($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">

    <title>Room Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gradient background */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(120deg, #800000, #f4f4f4);
            background-attachment: fixed;
        }
        .container {
            margin-top: 50px;
        }
        .room-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            transition: transform 0.3s;
        }
        .room-card h5 {
            color: #800000;
        }
        .room-card p {
            color: #555;
        }
        .room-card.booked {
            background-color: #f2f2f2;
            color: #888;
            cursor: not-allowed;
        }
        .room-card.booked h5, .room-card.booked p {
            color: #888;
        }
        .btn-primary {
            background-color: #800000;
            border-color: #800000;
        }
        .btn-primary:hover {
            background-color: #5b0000;
            border-color: #5b0000;
        }
        .room-card .fee {
            font-size: 1.2rem;
            color: #800000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-white mb-4">Available Rooms</h1>
        <div class="row">
            <?php
            // Fetch all rooms
            $query = "SELECT * FROM Room";
            $result = $conn->query($query);
            
            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
                    <div class="col-md-4">
                        <div class="card room-card <?php echo ($row['status'] == 'Booked') ? 'booked' : ''; ?>">
                            <div class="card-body">
                                <h5 class="card-title">Room Number: <?php echo $row['room_number']; ?></h5>
                                <p class="card-text">Type: <?php echo $row['shared'] == 1 ? 'Shared' : 'Single'; ?></p>
                                <p class="fee">Fee: $<?php echo $row['fee']; ?></p>
                                <?php if ($row['shared'] == 1): ?>
                                    <p class="card-text">Available Spots: <?php echo $row['available_spots']; ?></p>
                                <?php endif; ?>
                                <?php if ($row['status'] == 'Available'): ?>
                                    <form method="POST" action="book_room.php">
                                        <input type="hidden" name="room_number" value="<?php echo $row['room_number']; ?>">
                                        <button type="submit" class="btn btn-primary btn-block">Book Room</button>
                                    </form>
                                <?php elseif ($row['status'] == 'Booked'): ?>
                                    <p class="card-text text-danger">Room Booked</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
            <?php else: ?>
                <p class="text-white">No rooms available at the moment.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

