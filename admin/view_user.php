<?php include('../includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('includes/sidebar.php'); ?>
    <div class="container mt-5">
        <h3>User Details</h3>
        <?php
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM users WHERE id = $id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><strong>ID:</strong> {$row['id']}</p>";
            echo "<p><strong>Name:</strong> {$row['name']}</p>";
            echo "<p><strong>Email:</strong> {$row['email']}</p>";
            echo "<p><strong>Role:</strong> {$row['role']}</p>";
        } else {
            echo "<p>User not found.</p>";
        }
        ?>
        <a href="manage_users.php" class="btn btn-secondary">Back to Users</a>
    </div>
</body>
</html>
