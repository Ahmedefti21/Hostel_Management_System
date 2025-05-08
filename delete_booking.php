<?php
session_start();
include 'db.php'; // Database connection

// Ensure the user is logged in as an admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");  // Redirect to login if not logged in as admin
    exit();
}

// Check if room_number and st_id are set in the URL
if (isset($_GET['room_number']) && isset($_GET['st_id'])) {
    $room_number = $_GET['room_number'];
    $st_id = $_GET['st_id'];

    // Delete the booking by setting status back to Available and removing st_id
    $query = "UPDATE Room SET status = 'Available', st_id = NULL WHERE room_number = '$room_number' AND st_id = '$st_id'";

    if ($conn->query($query) === TRUE) {
        echo "<div class='alert alert-success'>Room booking deleted successfully!</div>";
        header("Location: admin_dashboard.php"); // Redirect back to the dashboard after deletion
    } else {
        echo "<div class='alert alert-danger'>Error deleting booking: " . $conn->error . "</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Invalid request.</div>";
}
?>
