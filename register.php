<?php 
// Database connection
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $student_id = $_POST['student_id'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // SQL query to insert data into the database
    $query = "INSERT INTO User (st_name, email, st_id, dept, semester, address, st_contact, password) 
              VALUES ('$name', '$email', '$student_id', '$department', '$semester', '$address', '$phone_number', '$password')";

    if ($conn->query($query) === TRUE) {
        // Redirecting to the homepage (index.php) with the user's name
        header("Location: index.php?registered_name=" . urlencode($name));
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background: linear-gradient(120deg, #800000, #f4f4f4); /* Maroon and Offwhite gradient */
      background-attachment: fixed;
    }

    .container {
      margin-top: 50px;
    }

    .form-floating input,
    .form-floating select {
      background-color: #f4f4f4;
      color: #800000;
    }

    .form-floating label {
      color: #800000;
    }

    .btn-primary {
      background-color: #800000;
      border-color: #800000;
    }

    .btn-primary:hover {
      background-color: #5b0000;
      border-color: #5b0000;
    }

    .card {
      border-radius: 10px;
      padding: 20px;
      background-color: #ffffff;
    }

    h1 {
      color: #800000;
      font-weight: bold;
    }

    footer {
      background-color: #800000;
      color: white;
      padding: 10px 0;
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <h1 class="text-center mt-3">Registration Form</h1>
    <p class="mb-4 text-center">Please fill in this form to register for our service.</p>

    <form action="register.php" method="POST"> 
      
      <!-- Name input -->
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="name" placeholder="Your Full Name" required>
        <label for="name">Name</label>
      </div>

      <!-- Email input -->
      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
        <label for="email">Email Address</label>
      </div>

      <!-- Student ID -->
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="student_id" placeholder="123456" required>
        <label for="student_id">Student ID</label>
      </div>

      <!-- Department -->
      <div class="mb-3">
        <select class="form-select" name="department" required>
          <option selected disabled>Department</option>
          <option value="CSE">CSE</option>
          <option value="BBA">BBA</option>
          <option value="Architecture">Architecture</option>
          <option value="EEE">EEE</option>
          <option value="Law">Law</option>
          <option value="Pharmacy">Pharmacy</option>
          <option value="Economics">Economics</option>
        </select>
      </div>

      <!-- Semester -->
      <div class="form-floating mb-3">
        <input type="number" class="form-control" name="semester" placeholder="Semester" required>
        <label for="semester">Semester</label>
      </div>

      <!-- Address -->
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="address" placeholder="123 Main St" required>
        <label for="address">Address</label>
      </div>

      <!-- Phone number -->
      <div class="form-floating mb-3">
        <input type="tel" class="form-control" name="phone_number" placeholder="+8801234567890" required>
        <label for="phone_number">Phone Number</label>
      </div>

      <!-- Password input -->
      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>

      <!-- Submit button -->
      <button class="btn btn-primary mb-3" type="submit">Register</button>
    </form>
  </div>

  <footer class="text-center">
    <p>&copy; 2025 Hostel Management System. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
