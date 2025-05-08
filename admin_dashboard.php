<?php
session_start();

// Ensure the user is logged in as an admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");  // Redirect to admin login if not logged in as admin
    exit();
}

// Fetch admin details
$admin_name = $_SESSION['admin_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #800000, #f4f4f4); /* Maroon and Off-white gradient */
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            color: white;
        }

        .btn-primary {
            background-color: #800000;
            border-color: #800000;
        }

        .btn-primary:hover {
            background-color: #5b0000;
            border-color: #5b0000;
        }

        .row .col-md-4 {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Welcome, <?php echo $admin_name; ?>!</h1>
        <div class="row justify-content-center">
            <!-- Admin functionalities like handling requests -->
            <div class="col-md-4">
                <a href="visitor_requests.php" class="btn btn-primary w-100 mb-2">Manage Visitor Requests</a>
            </div>
            <div class="col-md-4">
                <a href="maintenance_requests.php" class="btn btn-primary w-100 mb-2">Manage Maintenance Requests</a>
            </div>
            <div class="col-md-4">
                <a href="leave_requests.php" class="btn btn-primary w-100 mb-2">Manage Leave Requests</a>
            </div>
            <div class="col-md-4">
                <a href="view_room_bookings.php" class="btn btn-primary w-100 mb-2">View Room Bookings</a>
            </div>
        </div>
    </div>
</body>
</html>
