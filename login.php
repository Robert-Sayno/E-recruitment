<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start the session at the top

// Include database connection file
include('includes/db_connect.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            header("Location: index.php"); // Redirect to home page
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No user found with that email.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Recruitment</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Body Styling */
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        /* Navbar Styling */
        .navbar {
            background-color: #2C3E50;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .nav-link:hover {
            color: #f39c12 !important;
        }
        /* Container Styling */
        .container {
            max-width: 450px;
            background-color: #fff;
            padding: 30px;
            margin-top: 100px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        h2.text-center {
            font-weight: bold;
            color: #2C3E50;
        }
        /* Form Styling */
        .form-group label {
            font-weight: 600;
            color: #333;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 12px;
        }
        .form-control:focus {
            border-color: #2C3E50;
            box-shadow: 0 0 8px rgba(44, 62, 80, 0.2);
        }
        .btn-primary {
            background-color: #2C3E50;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #f39c12;
            color: #fff;
        }
        /* Footer Styling */
        footer {
            background-color: #2C3E50;
            color: #fff;
            padding: 10px 0;
            margin-top: 50px;
        }
        footer .p-3 {
            margin: 0;
        }
        /* Responsive Design */
        @media (max-width: 575px) {
            .container {
                padding: 20px;
                margin-top: 50px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
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
                    <a class="nav-link" href="register.php">Register</a>
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

    <!-- Login Form Container -->
    <div class="container mt-5">
        <h2 class="text-center">Login</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <!-- Display error message if set -->
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger mt-3"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start">
        <div class="text-center p-3">
            © 2024 E-Recruitment. All Rights Reserved.
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
