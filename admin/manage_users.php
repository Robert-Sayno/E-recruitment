<?php include('../includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .content {
            margin: 20px;
        }
        h3 {
            color: #343a40;
            font-weight: 700;
        }
        .table {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle !important;
        }
        .btn {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php include('includes/sidebar.php'); ?>
    <div class="content">
        <h3 class="mb-4">Manage Users</h3>
        <a href="add_user.php" class="btn btn-primary mb-3">Add New User</a>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM users");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['role']}</td>
                    <td>
                        <a href='view_user.php?id={$row['id']}' class='btn btn-info btn-sm'>View</a>
                        <a href='edit_user.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete_user.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                    </td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
