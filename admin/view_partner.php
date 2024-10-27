<?php include('../includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Partner</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('includes/sidebar.php'); ?>
    <div class="container mt-5">
        <h3>Partner Details</h3>
        <?php
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM partners WHERE id = $id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><strong>Name:</strong> " . htmlspecialchars($row['name']) . "</p>";
            echo "<p><strong>Website:</strong> <a href='" . htmlspecialchars($row['website']) . "' target='_blank'>" . htmlspecialchars($row['website']) . "</a></p>";
            echo "<p><strong>Contact Info:</strong> " . htmlspecialchars($row['contact_info']) . "</p>";
        } else {
            echo "<p>Partner not found.</p>";
        }
        ?>
        <a href="manage_partners.php" class="btn btn-secondary">Back</a>
    </div>
</body>
</html>
