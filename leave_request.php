<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['st_id'])) {
    header("Location: studentlogin.php"); // Redirect to student login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Leave Request Form</h2>
        <form action="submit_leave_request.php" method="POST"> <!-- Important: Create submit_leave_request.php -->
            <div class="mb-3">
                <label for="st_id" class="form-label">Student ID:</label>
                <input type="text" class="form-control" id="st_id" name="stust_iddent_id" value="<?php echo $_SESSION['st_id']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            <div class="mb-3">
                <label for="reason" class="form-label">Reason for Leave:</label>
                <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Request</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
