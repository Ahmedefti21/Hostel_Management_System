<?php
session_start();

// Check if the user is logged in (optional, but recommended)
if (!isset($_SESSION['student_id'])) {
    header("Location: studentlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Leave Request Confirmation</h2>
        <p>Your leave request has been submitted successfully.</p>
        <p>We will review your request and notify you of the approval status.</p>

        <a href="student_dashboard.php" class="btn btn-primary">Back to Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>