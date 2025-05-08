<?php
session_start();
include 'db.php'; // Database connection

// Ensure the user is logged in as an admin
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}

// Fetch all staff members
$staff_query = "SELECT * FROM Staff";
$staff_result = $conn->query($staff_query);

// Assign a new task
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['assign_task'])) {
    $staff_id = $_POST['staff_id'];
    $task_description = $_POST['task_description'];
    $due_date = $_POST['due_date'];
    $current_date = date('Y-m-d');

    $insert_query = "INSERT INTO Staff_Tasks (staff_id, task_description, assigned_date, due_date, status) 
                     VALUES ('$staff_id', '$task_description', '$current_date', '$due_date', 'Pending')";
    if ($conn->query($insert_query) === TRUE) {
        echo "<div class='alert alert-success'>Task assigned successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error assigning task: " . $conn->error . "</div>";
    }
}

// Update task status
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $task_id = $_POST['task_id'];
    $status = $_POST['status'];

    $update_query = "UPDATE Staff_Tasks SET status = '$status' WHERE task_id = '$task_id'";
    if ($conn->query($update_query) === TRUE) {
        echo "<div class='alert alert-success'>Task status updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating task status: " . $conn->error . "</div>";
    }
}

// Fetch all tasks
$tasks_query = "SELECT s.name, s.staff_type, st.task_id, st.task_description, st.assigned_date, st.due_date, st.status 
                FROM Staff_Tasks st 
                JOIN Staff s ON st.staff_id = s.staff_id 
                ORDER BY st.due_date";
$tasks_result = $conn->query($tasks_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Staff Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Assign Staff Tasks</h2>

        <!-- Form to Assign a Task -->
        <h3>Assign a New Task</h3>
        <form method="POST" action="assign_staff_tasks.php">
            <div class="mb-3">
                <label for="staff_id" class="form-label">Select Staff:</label>
                <select name="staff_id" class="form-select" required>
                    <option value="" disabled selected>Select Staff</option>
                    <?php while ($staff = $staff_result->fetch_assoc()): ?>
                        <option value="<?php echo $staff['staff_id']; ?>">
                            <?php echo $staff['name'] . " (" . $staff['staff_type'] . ")"; ?>
                        </option>
                    <?php endwhile; ?>
                    <?php $staff_result->data_seek(0); // Reset pointer for reuse ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="task_description" class="form-label">Task Description:</label>
                <textarea name="task_description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date:</label>
                <input type="date" name="due_date" class="form-control" required>
            </div>
            <button type="submit" name="assign_task" class="btn btn-primary">Assign Task</button>
        </form>

        <!-- Display Tasks -->
        <h3 class="mt-5">Task List</h3>
        <?php if ($tasks_result->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Staff Name</th>
                        <th>Staff Type</th>
                        <th>Task Description</th>
                        <th>Assigned Date</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $tasks_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['staff_type']; ?></td>
                            <td><?php echo $row['task_description']; ?></td>
                            <td><?php echo $row['assigned_date']; ?></td>
                            <td><?php echo $row['due_date']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <form method="POST" action="assign_staff_tasks.php" style="display:inline;">
                                    <input type="hidden" name="task_id" value="<?php echo $row['task_id']; ?>">
                                    <select name="status" class="form-select d-inline w-auto">
                                        <option value="Pending" <?php if ($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                        <option value="Completed" <?php if ($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                                    </select>
                                    <button type="submit" name="update_status" class="btn btn-sm btn-primary">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No tasks assigned yet.</p>
        <?php endif; ?>

        <a href="admin_dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
