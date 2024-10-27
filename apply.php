<?php
include('includes/db_connect.php');

// Check if job ID is passed in the URL
if (!isset($_GET['id'])) {
    die('Job ID not specified.');
}

$job_id = intval($_GET['id']);

// Fetch job details based on the job ID
$query = "SELECT * FROM jobs WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $job_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die('Job not found.');
}

$job = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for <?php echo htmlspecialchars($job['title']); ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the application page */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #0056b3;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
        }
        footer {
            background-color: #0056b3;
            color: #fff;
            padding: 20px 0;
        }
        .btn-primary {
            background-color: #0056b3;
            border: none;
        }
        .btn-primary:hover {
            background-color: #003d7a;
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
                    <a class="nav-link" href="career.php">Careers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="partners.php">Partners</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Apply for <?php echo htmlspecialchars($job['title']); ?></h1>
        <p><strong>Company:</strong> <?php echo htmlspecialchars($job['company']); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></p>
        <p><strong>Description:</strong><br><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>

        <form action="submit_application.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="cv">Upload CV (PDF, DOC, DOCX)</label>
                <input type="file" class="form-control-file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
                <small class="form-text text-muted">Max file size: 2MB.</small>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
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
