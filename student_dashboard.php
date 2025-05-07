<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: studentlogin.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch student info (optional, for display purposes)
include 'db.php';
$st_id = $_SESSION['student_id'];
$query = "SELECT * FROM students WHERE st_id = '$student_id'";
$result = $conn->query($query);
$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo $student['name']; ?>!</h2>
        <p>Your student ID: <?php echo $student['student_id']; ?></p>
        
        <!-- Booking option -->
        <h3>Room Booking</h3>
        <p>Click below to book a room:</p>
        <a href="booking.php" class="btn btn-primary">Book a Room</a>
        
        <!-- Add other features here, for example: -->
        <h3>Other Features</h3>
        <ul>
            <li><a href="complaints.php">File a Complaint</a></li>
            <li><a href="leave_request.php">Request Leave</a></li>
            <li><a href="student_report.php">View Report</a></li>
            <li><a href="visitor_request.php">Request Visitor</a></li>
        </ul>
    </div>
    
    <footer class="text-center mt-5">
        <p>&copy; 2025 Hostel Management System. All rights reserved.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
