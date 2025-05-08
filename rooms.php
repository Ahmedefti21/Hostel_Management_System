<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(120deg, #800000, #f4f4f4);
            background-attachment: fixed;
        }

        .container {
            margin-top: 50px;
        }

        .room-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            transition: transform 0.3s;
            height: 250px; /* Equal height for all cards */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .room-card h5 {
            color: #800000;
            margin-bottom: 10px;
        }

        .room-card p {
            color: #555;
            font-size: 1rem;
        }

        .room-type-single {
            background-color: #e0f7fa; /* Light blue for single room */
        }

        .room-type-shared {
            background-color: #ffe0b2; /* Light orange for shared room */
        }

        .room-card .fee {
            font-size: 1.2rem;
            color: #800000;
            margin-top: auto;
        }

        .footer {
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

        .room-card .room-info {
            text-align: center;
            margin-top: 20px;
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

    <!-- Rooms Section -->
    <div class="container mt-5">
        <h2 class="text-center text-white mb-4">Available Rooms</h2>

        <div class="row">
            <!-- Single Room -->
            <div class="col-md-4">
                <div class="room-card room-type room-type-single">
                    <div class="card-body">
                        <h5 class="card-title">Single Room</h5>
                        <p class="card-text">Spacious and well-lit single room with attached bathroom.</p>
                        <p class="fee">Fee: $2200.00</p>
                    </div>
                </div>
            </div>

            <!-- Shared Room -->
            <div class="col-md-4">
                <div class="room-card room-type room-type-shared">
                    <div class="card-body">
                        <h5 class="card-title">Shared Room</h5>
                        <p class="card-text">A spacious shared room with multiple beds, ideal for students who prefer a social environment.</p>
                        <p class="fee">Fee: $1800.00</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 footer">
        <p>&copy; 2025 Hostel Management System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
