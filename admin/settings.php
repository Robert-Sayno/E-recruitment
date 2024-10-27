<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #343a40;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Light Mode Styles */
        .light-mode {
            background-color: #f4f4f9;
            color: #343a40;
        }

        /* Dark Mode Styles */
        .dark-mode {
            background-color: #212529;
            color: #f8f9fa;
        }

        .content {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        h3 {
            margin-bottom: 30px;
            font-weight: 600;
            text-align: center;
        }

        .card {
            border-radius: 10px;
            border: none;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .toggle-button {
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
        }

        .toggle-button:hover {
            background-color: #0056b3;
        }

        .form-section {
            padding: 20px;
        }

        /* Light mode section styles */
        .light-mode .card {
            background-color: white;
        }

        /* Dark mode section styles */
        .dark-mode .card {
            background-color: #343a40;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body class="light-mode">
    <?php include('includes/sidebar.php'); ?>

    <div class="content">
        <h3>Settings</h3>

        <!-- Theme Toggle Button -->
        <div class="text-center mb-4">
            <button class="toggle-button" onclick="toggleTheme()">Switch to Dark Mode</button>
        </div>

        <form action="update_settings.php" method="POST">
            <!-- Site Information Section -->
            <div class="card">
                <div class="card-header">
                    <h5>Site Information</h5>
                </div>
                <div class="form-section">
                    <div class="form-group">
                        <label for="site_name">Site Name:</label>
                        <input type="text" name="site_name" id="site_name" class="form-control" value="E-Recruitment">
                    </div>
                    <div class="form-group">
                        <label for="admin_email">Admin Email:</label>
                        <input type="email" name="admin_email" id="admin_email" class="form-control" value="admin@domain.com">
                    </div>
                </div>
            </div>

            <!-- User Management Section -->
            <div class="card">
                <div class="card-header">
                    <h5>User Management</h5>
                </div>
                <div class="form-section">
                    <div class="form-group">
                        <label for="default_role">Default User Role:</label>
                        <select name="default_role" id="default_role" class="form-control">
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Notification Settings Section -->
            <div class="card">
                <div class="card-header">
                    <h5>Notification Settings</h5>
                </div>
                <div class="form-section">
                    <div class="form-group">
                        <label for="email_notifications">Email Notifications:</label>
                        <select name="email_notifications" id="email_notifications" class="form-control">
                            <option value="enabled" selected>Enabled</option>
                            <option value="disabled">Disabled</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </div>
        </form>
    </div>

    <script>
        function toggleTheme() {
            const body = document.body;
            const button = document.querySelector('.toggle-button');

            if (body.classList.contains('light-mode')) {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                button.textContent = 'Switch to Light Mode';
            } else {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                button.textContent = 'Switch to Dark Mode';
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
