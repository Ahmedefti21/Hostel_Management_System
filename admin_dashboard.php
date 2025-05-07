<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}
?>

<!-- Admin Dashboard content -->
<h1>Welcome to Admin Dashboard</h1>
<p>Manage the hostel system here:</p>
<ul>
    <li><a href="manage_rooms.php">Manage Rooms</a></li>
    <li><a href="view_complaints.php">View Complaints</a></li>
    <li><a href="view_leave_requests.php">View Leave Requests</a></li>
    <li><a href="generate_reports.php">Generate Reports</a></li>
</ul>
