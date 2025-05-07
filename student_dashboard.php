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
    </div>
</body>
</html>
