<?php include('../includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applications</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include('includes/sidebar.php'); ?>
    <div class="container mt-5">
        <h3 class="mb-4">Applications</h3>
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th><a href="?sort=id">Application ID</a></th>
                    <th><a href="?sort=applicant_name">Applicant Name</a></th>
                    <th><a href="?sort=job_title">Job Title</a></th>
                    <th><a href="?sort=status">Status</a></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Handle sorting
                $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
                $valid_columns = ['id', 'applicant_name', 'job_title', 'status'];
                
                if (!in_array($sort, $valid_columns)) {
                    $sort = 'id'; // Default sorting by ID
                }

                $result = $conn->query("SELECT * FROM applications ORDER BY $sort");

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['applicant_name']}</td>
                            <td>{$row['job_title']}</td>
                            <td>{$row['status']}</td>
                            <td><a href='view_application.php?id={$row['id']}' class='btn btn-primary'>View</a></td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
