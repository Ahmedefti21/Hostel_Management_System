<?php
session_start();
include 'db.php'; // Database connection

// Ensure the user is logged in as an admin
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}

// Fetch all staff members
$staff_query = "SELECT * FROM Staff";
$staff_result = $conn->query($staff_query);

// Record attendance (check-in or check-out)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['record_attendance'])) {
    $staff_id = $_POST['staff_id'];
    $action = $_POST['action'];
    $current_date = date('Y-m-d');
    $current_datetime = date('Y-m-d H:i:s');

    if ($action == 'check_in') {
        // Check if the staff already checked in today
        $check_query = "SELECT * FROM Staff_Attendance WHERE staff_id = '$staff_id' AND date = '$current_date'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows == 0) {
            // Record check-in
            $insert_query = "INSERT INTO Staff_Attendance (staff_id, check_in, date, status) 
                             VALUES ('$staff_id', '$current_datetime', '$current_date', 'Present')";
            if ($conn->query($insert_query) === TRUE) {
                echo "<div class='alert alert-success'>Check-in recorded successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error recording check-in: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Staff already checked in today!</div>";
        }
    } elseif ($action == 'check_out') {
        // Update check-out time
        $update_query = "UPDATE Staff_Attendance 
                         SET check_out = '$current_datetime' 
                         WHERE staff_id = '$staff_id' AND date = '$current_date' AND check_out IS NULL";
        if ($conn->query($update_query) === TRUE && $conn->affected_rows > 0) {
            echo "<div class='alert alert-success'>Check-out recorded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error recording check-out or staff has not checked in!</div>";
        }
    }
}

// Fetch attendance records for display
$attendance_query = "SELECT s.name, s.staff_type, sa.check_in, sa.check_out, sa.date, sa.status 
                     FROM Staff_Attendance sa 
                     JOIN Staff s ON sa.staff_id = s.staff_id 
                     WHERE sa.date = CURDATE()";
$attendance_result = $conn->query($attendance_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Manage Staff Attendance</h2>

        <!-- Form to Record Attendance -->
        <h3>Record Attendance</h3>
        <form method="POST" action="manage_staff_attendance.php">
            <div class="mb-3">
                <label for="staff_id" class="form-label">Select Staff:</label>
                <select name="staff_id" class="form-select" required>
                    <option value="" disabled selected>Select Staff</option>
                    <?php while ($staff = $staff_result->fetch_assoc()): ?>
                        <option value="<?php echo $staff['staff_id']; ?>">
                            <?php echo $staff['name'] . " (" . $staff['staff_type'] . ")"; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="action" class="form-label">Action:</label>
                <select name="action" class="form-select" required>
                    <option value="check_in">Check-In</option>
                    <option value="check_out">Check-Out</option>
                </select>
            </div>
            <button type="submit" name="record_attendance" class="btn btn-primary">Record</button>
        </form>

        <!-- Display Attendance Records -->
        <h3 class="mt-5">Today's Attendance</h3>
        <?php if ($attendance_result->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Staff Name</th>
                        <th>Staff Type</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $attendance_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['staff_type']; ?></td>
                            <td><?php echo $row['check_in'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['check_out'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No attendance records found for today.</p>
        <?php endif; ?>

        <a href="admin_dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
