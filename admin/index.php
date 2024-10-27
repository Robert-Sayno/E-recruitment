<?php include('../includes/db_connect.php');

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
    header("Location: login.php"); // Redirect to the login page
    exit(); // Terminate the script after redirecting
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - E-Recruitment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admin-style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #003366;
            color: #ffffff;
            min-height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 1rem;
        }

        .sidebar a, .sidebar .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            text-decoration: none;
            padding: 15px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #004080;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Header Styling */
        .header {
            background-color: #ffffff;
            padding: 10px 20px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard-header h3 {
            color: #003366;
            font-weight: bold;
        }

        /* Card Styles */
        .card {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 8px;
        }

        /* Chart Container */
        .chart-container {
            position: relative;
            margin: auto;
            width: 80%;
            height: 400px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_jobs.php">Manage Jobs</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_partners.php">Manage Partners</a>
        <a href="applications.php">Applications</a>
        <a href="settings.php">Settings</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Header -->
        <div class="header">
            <div class="dashboard-header">
                <h3>Dashboard Overview</h3>
            </div>
            <div>
                <span>Admin</span> | <a href="logout.php">Logout</a>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="container mt-4">
            <div class="row">
                <!-- Total Jobs Card -->
                <div class="col-md-3 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Jobs</h5>
                            <?php
                            $jobs_count = $conn->query("SELECT COUNT(*) AS count FROM jobs")->fetch_assoc()['count'];
                            ?>
                            <p class="card-text"><strong><?php echo $jobs_count; ?></strong></p>
                        </div>
                    </div>
                </div>
                <!-- Total Users Card -->
                <div class="col-md-3 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <?php
                            $users_count = $conn->query("SELECT COUNT(*) AS count FROM users")->fetch_assoc()['count'];
                            ?>
                            <p class="card-text"><strong><?php echo $users_count; ?></strong></p>
                        </div>
                    </div>
                </div>
                <!-- Total Partners Card -->
                <div class="col-md-3 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Partners</h5>
                            <?php
                            $partners_count = $conn->query("SELECT COUNT(*) AS count FROM partners")->fetch_assoc()['count'];
                            ?>
                            <p class="card-text"><strong><?php echo $partners_count; ?></strong></p>
                        </div>
                    </div>
                </div>
                <!-- Total Applications Card -->
                <div class="col-md-3 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Applications</h5>
                            <?php
                            $applications_count = $conn->query("SELECT COUNT(*) AS count FROM applications")->fetch_assoc()['count'];
                            ?>
                            <p class="card-text"><strong><?php echo $applications_count; ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Visualization Section -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Job Applications Overview</h5>
                            <div class="chart-container">
                                <canvas id="applicationsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Statistics</h5>
                            <p>Active Users: <?php echo $users_count; ?></p>
                            <p>New Sign-ups (Last Month): 20</p>
                            <p>Pending Applications: 25</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts for Chart.js -->
    <script>
        // Chart.js Example - Applications Overview
        var ctx = document.getElementById('applicationsChart').getContext('2d');
        var applicationsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Applications Received',
                    data: [10, 20, 35, 25, 45, 60, 70, 80, 60, 55, 65, 85], // Replace with dynamic data if available
                    backgroundColor: 'rgba(0, 51, 102, 0.1)',
                    borderColor: '#003366',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
