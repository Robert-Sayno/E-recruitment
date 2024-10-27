<?php
include('../includes/db_connect.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $department = $_POST['department'];

    // Validate inputs
    if (!empty($title) && !empty($department)) {
        // Insert new job into the database
        $stmt = $conn->prepare("INSERT INTO jobs (title, department) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $department);

        if ($stmt->execute()) {
            echo "<script>alert('Job added successfully!'); window.location.href = 'manage_jobs.php';</script>";
        } else {
            echo "<script>alert('Error adding job. Please try again.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Job</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('includes/sidebar.php'); ?>
    <div class="container mt-5">
        <h3 class="mb-4">Add New Job</h3>
        <form method="POST" action="add_job.php">
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Job</button>
            <a href="manage_jobs.php" class="btn btn-secondary">Back to Job Management</a>
        </form>
    </div>
</body>
</html>
