<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
body {
    background-color: #89CFF0;
    font-family: Arial, sans-serif; /* Added a default font */
}
h1 {
    text-align: center;
}
h3 {
    text-align: center;
    margin-bottom: 20px; /* Added some space below the heading */
}
ul {
    list-style-type: none; /* Remove bullet points */
    padding: 0;
    margin: 0;
    display: flex;             /* Use flexbox for horizontal layout */
    justify-content: center;   /* Center items horizontally */
    align-items: center;       /* Center items vertically */
    flex-wrap: wrap;          /* Allow items to wrap to the next line */
}
li {
    margin: 10px;           /* Add spacing around each list item */
}
li a {
    display: block;          /* Make the entire link clickable */
    padding: 10px 20px;      /* Add padding inside the link */
    background-color: #007BFF; /* A nice blue color */
    color: white;            /* White text */
    text-decoration: none;   /* Remove underlines */
    border-radius: 5px;       /* Rounded corners */
    transition: background-color 0.3s ease; /* Smooth hover effect */
}
li a:hover {
    background-color: #0056b3; /* Darker blue on hover */
}
</style>
</head>
<body>

<!-- Admin Dashboard content -->
<h1>Welcome to Admin Dashboard</h1>
<h3>Manage the hostel system here:</h3>
<ul>
    <li><a href="view_room_details.php">View Room Details</a></li>
    <li><a href="view_student_details.php">View Student Details</a></li>
    <li><a href="view_staff_details.php">View Staff Details</a></li>
    <li><a href="view_requests.php">View Requests</a></li>
</ul>

</body>
</html>