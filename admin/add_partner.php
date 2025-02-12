<?php include('includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Partner</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('includes/sidebar.php'); ?>
    <div class="container mt-5">
        <h3>Add a New Partner</h3>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $conn->real_escape_string($_POST['name']);
            $website = $conn->real_escape_string($_POST['website']);
            $contact_info = $conn->real_escape_string($_POST['contact_info']);

            $sql = "INSERT INTO partners (name, website, contact_info) VALUES ('$name', '$website', '$contact_info')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Partner added successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
            }
        }
        ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact_info">Contact Info</label>
                <input type="text" name="contact_info" id="contact_info" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Add new Partner</button>
        </form>
    </div>
</body>
</html>
