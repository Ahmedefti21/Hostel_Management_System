<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(120deg, #800000, #f4f4f4);
            background-attachment: fixed;
            color: #fff;
        }

        .navbar {
            background-color: #800000;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar .nav-link:hover {
            color: #ffcc00 !important;
        }

        .container {
            margin-top: 50px;
        }

        .facilities-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .list-group-item {
            background-color: #ffffff;
            color: #800000;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .list-group-item:hover {
            background-color: #f4f4f4;
            cursor: pointer;
        }

        footer {
            background-color: #800000;
            color: white;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin-bottom: 0;
        }

        .btn-primary {
            background-color: #800000;
            border-color: #800000;
        }

        .btn-primary:hover {
            background-color: #5b0000;
            border-color: #5b0000;
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
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Facilities Section -->
    <div class="container mt-5">
        <div class="facilities-header">
            <h2>Hostel Facilities</h2>
            <p>Our hostel provides top-notch facilities to ensure your stay is comfortable and enjoyable.</p>
        </div>
        <ul class="list-group">
            <li class="list-group-item">Wi-Fi Access</li>
            <li class="list-group-item">24/7 Security</li>
            <li class="list-group-item">Air Conditioning</li>
            <li class="list-group-item">Laundry Service</li>
            <li class="list-group-item">Common Area for Socializing</li>
            <li class="list-group-item">Study Rooms</li>
            <li class="list-group-item">Gymnasium</li>
            <li class="list-group-item">Cafeteria with Healthy Meals</li>
            <li class="list-group-item">Regular Cleaning Services</li>
        </ul>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <p>&copy; 2025 Hostel Management System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
