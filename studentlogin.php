<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email ends with @g.bracu.ac.bd
    if (strpos($email, '@g.bracu.ac.bd') !== false) {
        // Prepare a query to avoid SQL injection
        $query = "SELECT * FROM students WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email); // 's' means string parameter
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $student = $result->fetch_assoc();
            // Verify the password against the hashed password stored in the database
            if (password_verify($password, $student['password'])) {
                // Start session and redirect to the booking page
                $_SESSION['student_id'] = $student['student_id'];
                $_SESSION['email'] = $student['email'];
                header("Location: booking.php");
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
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <!-- Student Login Card -->
            <div class="card login-card">
                <!-- Inserted Image for Student Login -->
                <img src="images/studentlogin.jpg" alt="Hostel Image" class="img-fluid">
                <h2>Student Login</h2>
                <form method="POST" action="studentlogin.php">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter your email" class="form-control mb-3" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter your password" class="form-control mb-3" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <div class="login-button">
                    <a href="admin-login.php">Go to Admin Panel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>

<footer class="text-center mt-5">
    <p>&copy; 2025 Hostel Management System. All rights reserved.</p>
</footer>
