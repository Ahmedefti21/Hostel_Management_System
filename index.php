<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        /* Background gradient for the body */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(120deg, #800000 0%, #f4f4f4); /* Maroon and Offwhite gradient */
            background-attachment: fixed;
        }

        /* Navbar customization */
        .navbar {
            background-color: #f4f4f4; /* Off-white background */
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #800000 !important; /* Maroon text color */
        }

        .navbar .nav-link:hover {
            color: #8B0000; /* Darker maroon text on hover */
        }

        /* Container for form */
        .login-container {
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
            background-color: #f4f4f4; /* Off-white background for login form */
        }

        .login-card img {
          width: 80%; /* Adjusted the width to ensure equal padding on both sides */
          height: auto;
          margin: 0 auto 20px; /* Center the image */
          display: block; /* Ensures the image is treated as a block element for proper centering */


        }

        .login-button {
            text-align: center;
            margin-top: 20px;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Homepage image */
        .home-image {
            max-width: 60%; /* Reduced size */
            margin-top: 20px;
        }

        /* Change the color of buttons */
        .btn-primary {
            background-color: #800000; /* Maroon */
            border-color: #800000;
        }

        .btn-primary:hover {
            background-color: #5b0000; /* Darker Maroon */
            border-color: #5b0000;
        }

        /* Custom style for navbar link 'Register' */
        .navbar-nav .nav-item .nav-link {
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hostel Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="rooms.php">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link" href="facilities.php">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                    <!-- Replaced Login with Register -->
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Homepage Content -->
    <div class="container mt-5 text-center">
        <h1>Welcome to the BRACUBNB</h1>
        <!-- Resized Image -->
        <img src="images/hostel.jpg" alt="" class="home-image">
    </div>

    <!-- Login Options -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <!-- Student Login Card -->
                <div class="card login-card">
                    <img src="images/studentlogin.png" alt="Hostel Image" class="img-fluid">
                    <h2>Student Login</h2>
                    <form method="POST" action="studentlogin.php">
                        <input type="email" name="email" placeholder="Enter your email" class="form-control mb-3" required>
                        <input type="password" name="password" placeholder="Enter your password" class="form-control mb-3" required>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                    <div class="login-button">
                        <a href="admin-login.php">Go to Admin Panel</a>
                    </div>
                </div>

                <!-- Admin Login Card (hidden by default) -->
                <div class="card login-card mt-4" style="display: none;">
                    <img src="images/hostel.jpg" alt="Admin Login Image" class="img-fluid">
                    <h2>Admin Login</h2>
                    <form method="POST" action="admin-login.php">
                        <input type="text" name="username" placeholder="Admin Username" class="form-control mb-3" required>
                        <input type="password" name="password" placeholder="Admin Password" class="form-control mb-3" required>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                    <div class="login-button">
                        <a href="studentlogin.php">Go to Student Panel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5">
        <p>&copy; 2025 Hostel Management System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
