<?php
session_start();
include 'db.php'; // Include database connection

// Check if user is logged in
if (!isset($_SESSION['st_id'])) {
    header("Location: index.php");  // Redirect to homepage if not logged in
    exit();
}

// Get room details from POST request
if (isset($_POST['room_number'])) {
    $room_number = $_POST['room_number'];
    $st_id = $_SESSION['st_id'];  // Logged-in student ID

    // Fetch room details
    $query = "SELECT * FROM Room WHERE room_number = '$room_number' AND status = 'Available' AND st_id IS NULL";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Room is available, proceed with booking

        // Fetch available spots for the room
        $row = $result->fetch_assoc();
        $available_spots = $row['available_spots'];

        if ($available_spots > 0) {
            // Decrease available spots
            $new_available_spots = $available_spots - 1;

            // Update the room status to 'Booked' and assign it to the student
            $update_room = "UPDATE Room SET status = 'Booked', st_id = '$st_id', available_spots = '$new_available_spots' WHERE room_number = '$room_number'";

            if ($conn->query($update_room) === TRUE) {
                echo "<div class='alert alert-success'>Room booked successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error updating room status: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>No available spots in this room!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Room not available or invalid selection.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Invalid room selection.</div>";
}
?>
