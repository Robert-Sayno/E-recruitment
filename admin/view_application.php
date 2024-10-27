<?php
// Start the session
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Redirect to login page if the user is not logged in

// Include database connection file
include('../includes/db_connect.php');

// Check if an application ID is provided
if (isset($_GET['id'])) {
    $application_id = intval($_GET['id']);

    // Prepare the SQL query to fetch application details
    $query = "SELECT applications.*, jobs.title AS job_title, jobs.company AS job_company, users.id AS applicant_name, users.email AS applicant_email
              FROM applications
              INNER JOIN jobs ON applications.job_id = jobs.id
              INNER JOIN users ON applications.user_id = users.id
              WHERE applications.id = ?";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $application_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the application exists
        if ($result->num_rows > 0) {
            $application = $result->fetch_assoc();
        } else {
            echo "Application not found.";
            exit();
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }
} else {
    echo "No application ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Application</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Application Details</h2>
    
    <!-- Application Details -->
    <table class="table table-bordered">
        <tr>
            <th>Job Title</th>
            <td><?php echo htmlspecialchars($application['job_title']); ?></td>
        </tr>
        <tr>
            <th>Company</th>
            <td><?php echo htmlspecialchars($application['job_company']); ?></td>
        </tr>
        <tr>
            <th>Applicant Name</th>
            <td><?php echo htmlspecialchars($application['applicant_name']); ?></td>
        </tr>
        <tr>
            <th>Applicant Email</th>
            <td><?php echo htmlspecialchars($application['applicant_email']); ?></td>
        </tr>
        <tr>
            <th>Application Date</th>
            <td><?php echo htmlspecialchars($application['applied_at']); ?></td>
        </tr>
        
       
    </table>

    <a href="index.php" class="btn btn-primary mt-3">Back to Dashboard</a>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
