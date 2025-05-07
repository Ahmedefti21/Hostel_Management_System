<?php
session_start();
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email format
    if (substr($email, -14) === "@g.bracu.ac.bd") {
        // Query to check if user exists
        $query = "SELECT * FROM User WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Fetch user data
            $row = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $row['password'])) {
                // Set session variables
                $_SESSION['st_id'] = $row['st_id'];
                $_SESSION['st_name'] = $row['st_name'];

                // Redirect to student dashboard
                header("Location: student_dashboard.php");
                exit();
            } else {
                // Invalid password
                echo "Invalid password! Please try again.";
            }
        } else {
            // No user found with that email
            echo "No account found with that email!";
        }
    } else {
        // Invalid email domain
        echo "Please use a valid BRACU email address ending with @g.bracu.ac.bd.";
    }
}
?>

<!-- Student Dashboard (This will be displayed after successful login) -->
<?php
// Ensure the user is logged in
if (!isset($_SESSION['st_id'])) {
    header("Location: index.php");  // Redirect to homepage if not logged in
    exit();
}
<<<<<<< HEAD

// Fetch student info (optional, for display purposes)
include 'db.php';
$st_id = $_SESSION['student_id'];
$query = "SELECT * FROM students WHERE st_id = '$student_id'";
$result = $conn->query($query);
$student = $result->fetch_assoc();
=======
>>>>>>> 5fa6782dba1251601ee60efea3ec60b6e70cfeff
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
<<<<<<< HEAD
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
=======
        <h1 class="text-center">Welcome, <?php echo $_SESSION['st_name']; ?>!</h1>
        <div class="row">
            <div class="col-md-6">
                <a href="room_booking.php" class="btn btn-primary btn-block">Room Booking</a>
            </div>
            <div class="col-md-6">
                <a href="maintenance_request.php" class="btn btn-primary btn-block">Maintenance Request</a>
            </div>
            <div class="col-md-6 mt-3">
                <a href="visitor_request.php" class="btn btn-primary btn-block">Visitor Request</a>
            </div>
            <div class="col-md-6 mt-3">
                <a href="leave_request.php" class="btn btn-primary btn-block">Leave Request</a>
            </div>
        </div>
>>>>>>> 5fa6782dba1251601ee60efea3ec60b6e70cfeff
    </div>
</body>
</html>
