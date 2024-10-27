<?php
// Start the session
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include('includes/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Recruitment Portal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Header styling */
        .navbar {
            background-color: #0056b3;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .navbar-brand {
            font-size: 1.5em;
            font-weight: bold;
        }
        .nav-link:hover {
            color: #f8f9fa !important;
            text-decoration: underline;
        }
        /* Hero Section */
        .hero-section {
            background: url('images/back.JPG') center center/cover no-repeat;
            color: #ffffff;
            padding: 100px 0;
            text-align: center;
            background-blend-mode: darken;
        }
        .hero-section h1 {
            font-size: 2.5em;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.2em;
            margin-top: 10px;
        }
        /* Feature Cards */
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        /* Footer styling */
        footer {
            background-color: #0056b3;
            color: #fff;
            padding: 20px 0;
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">E-Recruitment</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="career.php">Careers</a></li>
                <li class="nav-item"><a class="nav-link" href="partners.php">Partners</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome, <?php echo htmlspecialchars($_SESSION['user_email']); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Welcome to E-Recruitment Portal</h1>
            <p>Find your dream job and connect with top employers effortlessly!</p>
            <a href="register.php" class="btn btn-light btn-lg mt-3">Join Us Today</a>
        </div>
    </section>

    <!-- Feature Cards -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="images/emplo6.jpg" class="card-img-top" alt="Easy Application">
                    <div class="card-body">
                        <h5 class="card-title">Easy Application Process</h5>
                        <p class="card-text">Apply in just a few clicks. Simplifying your job search journey.</p>
                        <a href="register.php" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="images/emplo1.jpg" class="card-img-top" alt="Connect with Employers">
                    <div class="card-body">
                        <h5 class="card-title">Connect with Employers</h5>
                        <p class="card-text">Join Uganda’s leading companies. Start your career journey here.</p>
                        <a href="career.php" class="btn btn-primary">Explore Careers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="images/emplo3.jpg" class="card-img-top" alt="Stay Updated">
                    <div class="card-body">
                        <h5 class="card-title">Stay Updated</h5>
                        <p class="card-text">Receive job updates and notifications directly to your inbox.</p>
                        <a href="register.php" class="btn btn-primary">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Listings and About Section -->
    <div class="container">
        <div class="row">
            <!-- Latest Job Listings -->
            <div class="col-md-6 mb-4">
                <h3>Latest Job Listings</h3>
                <ul class="list-group">
                    <?php
                    $query = "SELECT * FROM jobs ORDER BY posted_at DESC LIMIT 5";
                    $result = $conn->query($query);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li class="list-group-item">';
                            echo '<h5>' . htmlspecialchars($row['title']) . '</h5>';
                            echo '<p>' . htmlspecialchars($row['company']) . '</p>';
                            echo '<a href="apply.php?id=' . $row['id'] . '" class="btn btn-sm btn-primary">Apply Now</a>';
                            echo '</li>';
                        }
                    } else {
                        echo '<li class="list-group-item">No job listings available at the moment.</li>';
                    }
                    ?>
                </ul>
            </div>

            <!-- About Us -->
            <div class="col-md-6">
                <h3>About Us</h3>
                <p>E-Recruitment is a modern platform optimized for connecting job seekers with reputable companies across Uganda. Whether you're a fresh graduate or an experienced professional, we make it easy to find the perfect role for you.</p>
                <p>Start your journey with us today and find your ideal job!</p>
                <a href="register.php" class="btn btn-success">Get Started</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <p class="mb-0">© 2024 E-Recruitment. All Rights Reserved.</p>
    </footer>

    <!-- JS for Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
