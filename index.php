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
            background-color: white;
        }

        .login-card img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .login-button {
            text-align: center;
            margin-top: 20px;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Options -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <!-- Student Login Card -->
                <div class="card login-card">
                    <!-- Inserted Image for Student Login -->
                    <img src="images/studentlogin.jpg" alt="Hostel Image" class="img-fluid">
                    <h2>Student Login</h2>
                    <form method="POST" action="login.php">
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
                        <a href="login.php">Go to Student Panel</a>
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
