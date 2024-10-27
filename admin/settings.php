<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('includes/sidebar.php'); ?>
    <div class="content">
        <h3>Settings</h3>
        <form action="update_settings.php" method="POST" class="mt-4">
            <div class="form-group">
                <label for="site_name">Site Name:</label>
                <input type="text" name="site_name" id="site_name" class="form-control" value="E-Recruitment">
            </div>
            <div class="form-group">
                <label for="admin_email">Admin Email:</label>
                <input type="email" name="admin_email" id="admin_email" class="form-control" value="admin@domain.com">
            </div>
            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>
</body>
</html>
