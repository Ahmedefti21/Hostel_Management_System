<?php
session_start();
include 'db.php'; // database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email ends with @g.bracu.ac.bd
    if (strpos($email, '@g.bracu.ac.bd') !== false) {
        // Query the database to verify the email and password
        $query = "SELECT * FROM student WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $student = $result->fetch_assoc();
            if (password_verify($password, $student['password'])) {
                // Start session and redirect to the student dashboard
                $_SESSION['student_id'] = $student['student_id'];
                $_SESSION['email'] = $student['email'];
                header("Location: student_dashboard.php"); // Redirect to student dashboard
                exit();
            } else {
                $error = "Invalid password!";
            }
        } else {
            $error = "No such student found!";
        }
    } else {
        $error = "Invalid email format! Use your @g.bracu.ac.bd email.";
    }
}
?>

<!-- HTML Login Form -->
<form method="POST" action="studentlogin.php">
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <button type="submit">Login</button>
</form>
<?php if (isset($error)) echo "<p>$error</p>"; ?>

<a href="adminlogin.php">Go to Admin Panel</a>
