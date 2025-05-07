<?php
session_start();
include 'db.php'; // database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are correct for admin
    if ($username == 'adminbracu' && $password == '11223344') {
        $_SESSION['admin'] = true; // Set a session for the admin
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!-- Admin Login Form -->
<form method="POST" action="adminlogin.php">
    <input type="text" name="username" placeholder="Enter username" required>
    <input type="password" name="password" placeholder="Enter password" required>
    <button type="submit">Login</button>
</form>
<?php if (isset($error)) echo "<p>$error</p>"; ?>

<a href="studentlogin.php">Go to Student Login</a>
