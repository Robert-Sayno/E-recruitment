<?php include('../includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Partner</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('includes/sidebar.php'); ?>
    <div class="container mt-5">
        <h3>Edit Partner</h3>
        <?php
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $conn->real_escape_string($_POST['name']);
            $website = $conn->real_escape_string($_POST['website']);
            $contact_info = $conn->real_escape_string($_POST['contact_info']);

            $sql = "UPDATE partners SET name='$name', website='$website', contact_info='$contact_info' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Partner updated successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
            }
        }

        $result = $conn->query("SELECT * FROM partners WHERE id = $id");
        $row = $result->fetch_assoc();
        ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" class="form-control" value="<?php echo htmlspecialchars($row['website']); ?>">
            </div>
            <div class="form-group">
                <label for="contact_info">Contact Info</label>
                <input type="text" name="contact_info" id="contact_info" class="form-control" value="<?php echo htmlspecialchars($row['contact_info']); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update Partner</button>
        </form>
    </div>
</body>
</html>
