<?php include('includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers - E-Recruitment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* General Styles */
        body {
            background-color: #f2f6fc;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #003366;
        }
        
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }

        .container {
            margin-top: 50px;
        }

        /* Card Styles */
        .card {
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-title {
            color: #003366;
            font-weight: bold;
        }

        .card-subtitle {
            color: #666666;
        }

        .card-text {
            color: #555555;
        }

        .btn-primary {
            background-color: #003366;
            border: none;
            color: #ffffff;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #001a33;
        }

        /* Footer Styles */
        footer {
            background-color: #003366;
            color: #ffffff;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">E-Recruitment</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="partners.php">Partners</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center mb-4" style="color: #003366; font-weight: bold;">Available Jobs</h2>
        
        <div class="row">
            <?php
            // Fetch jobs from the database
            $sql = "SELECT id, title, company, description FROM jobs";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data for each job
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card h-100">';
                    echo '<div class="card-body d-flex flex-column">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($row['company']) . '</h6>';
                    echo '<p class="card-text">' . htmlspecialchars($row['description']) . '</p>';
                    echo '<a href="apply.php?id=' . $row['id'] . '" class="btn btn-primary mt-auto">Apply Now</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12"><p>No job listings available at this time.</p></div>';
            }
            ?>
        </div>
    </div>

    <footer class="text-center mt-5">
        <div class="text-center p-3">
            © 2024 E-Recruitment. All Rights Reserved.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
