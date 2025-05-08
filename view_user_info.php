<?php
session_start();
include 'db.php'; // Database connection

// Ensure the user is logged in as an admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");  // Redirect to login if not logged in as admin
    exit();
}

// Check if st_id is provided in the URL
if (isset($_GET['st_id'])) {
    $st_id = $_GET['st_id'];

    // Fetch user information
    $query = "SELECT * FROM User WHERE st_id = '$st_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger'>User not found.</div>";
        exit();
    }
} else {
    echo "<div class='alert alert-danger'>Invalid request.</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
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
        <h1 class="text-center text-white mb-4">User Information</h1>
        
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td><?php echo $row['st_name']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo $row['st_contact']; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $row['address']; ?></td>
            </tr>
            <tr>
                
        </table>

        <a href="admin_dashboard.php" class="btn btn-primary">Back to Admin Dashboard</a>
    </div>
</body>
</html>
