<?php include('includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partners - E-Recruitment</title>
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

        h2.text-center {
            color: #003366;
            font-weight: bold;
        }

        /* Card Styles */
        .card {
            border: none;
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
            font-size: 1.25rem;
        }

        .card-text {
            color: #555555;
        }

        /* Link Styling */
        .card a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.2s;
        }

        .card a:hover {
            color: #003366;
            text-decoration: underline;
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
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="career.php">Careers</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center mb-4">Our Partners</h2>
        
        <div class="row">
            <?php
            // Fetch partners from the database
            $sql = "SELECT id, name, website, contact_info FROM partners";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data for each partner
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card h-100">';
                    echo '<div class="card-body d-flex flex-column">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>';
                    echo '<p class="card-text">Website: <a href="' . htmlspecialchars($row['website']) . '" target="_blank">' . htmlspecialchars($row['website']) . '</a></p>';
                    echo '<p class="card-text">Contact: ' . htmlspecialchars($row['contact_info']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12"><p>No partners available at this time.</p></div>';
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
