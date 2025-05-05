<?php
session_start();
include 'db.php'; // database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the credentials match the admin username and password
    if ($username === 'adminbracu' && $password === '11223344') {
        $_SESSION['admin'] = true;
        header("Location: admin-dashboard.php");
        exit();
    } else {
        $error = "Invalid admin credentials!";
    }
}
?>

<!-- Admin Login Form -->
<form method="POST" action="admin-login.php">
    <input type="text" name="username" placeholder="Admin Username" required>
    <input type="password" name="password" placeholder="Admin Password" required>
    <button type="submit">Login</button>
</form>
<?php if (isset($error)) echo "<p>$error</p>"; ?>
