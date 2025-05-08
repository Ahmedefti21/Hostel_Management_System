<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $st_id = $_POST['st_id']; // Assuming st_id is passed from the form
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $reason = $_POST['reason'];

    // Sanitize the data
    $st_id = mysqli_real_escape_string($conn, $student_id);
    $start_date = mysqli_real_escape_string($conn, $start_date);
    $end_date = mysqli_real_escape_string($conn, $end_date);
    $reason = mysqli_real_escape_string($conn, $reason);

    // Insert the data into the database
    $sql = "INSERT INTO leave_requests (st_id, start_date, end_date, reason)
            VALUES ('$student_id', '$start_date', '$end_date', '$reason')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a confirmation page
        header("Location: leave_request_confirmation.php"); // Create this page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // If the form was not submitted, redirect to the leave request form
    header("Location: leave_request.php");
    exit();
}
?>