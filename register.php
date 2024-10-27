<?php include('includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-Recruitment</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Page Background */
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        
        /* Navbar Styling */
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .navbar-nav .nav-link:hover {
            color: #f8c146 !important;
        }
        
        /* Form Container */
        .container {
            max-width: 500px;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        h2 {
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Controls */
        .form-control {
            border-radius: 6px;
            border: 1px solid #ced4da;
        }
        .form-group label {
            font-weight: 500;
            color: #555;
        }

        /* Submit Button */
        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
            border-radius: 6px;
            font-weight: 600;
            width: 100%;
            padding: 10px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #004494;
        }

        /* Footer Styling */
        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 15px;
            font-size: 0.9rem;
        }

        /* Alert Styling */
        .alert {
            font-size: 0.9rem;
            margin-top: 15px;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .container {
                padding: 20px;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
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
                    <a class="nav-link" href="career.php">Careers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="partners.php">Partners</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Register</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password) {
                echo '<div class="alert alert-danger mt-3">Passwords do not match.</div>';
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $email, $hashed_password);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success mt-3">Registration successful! You can now <a href="login.php">login</a>.</div>';
                } else {
                    echo '<div class="alert alert-danger mt-3">Error: Could not register user.</div>';
                }
            }
        }
        ?>
    </div>

    <footer class="text-center">
        <div>
            © 2024 E-Recruitment. All Rights Reserved.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
