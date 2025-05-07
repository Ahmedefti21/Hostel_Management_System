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
    <li><a href="view_room_details.php">View Room Details</a></li>
    <li><a href="view_student_details.php">View Student Details</a></li>
    <li><a href="view_staff_details.php">View Staff Details</a></li>
    <li><a href="view_requests.php">View Requests</a></li>
</ul>
