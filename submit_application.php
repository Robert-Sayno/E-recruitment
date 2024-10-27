<?php 
session_start(); // Start the session
include('includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user ID from the session
    if (!isset($_SESSION['user_id'])) {
        echo "User not logged in.";
        exit();
    }

    $user_id = $_SESSION['user_id']; // Get user_id from the session
    $job_id = $_POST['job_id'];
    $status = 'pending'; // Default status for a new application

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO applications (user_id, job_id, status) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $job_id, $status); // bind parameters

    // Execute the statement
    if ($stmt->execute()) {
        echo "Application submitted successfully.";
        // Optionally redirect or show a success message
        // header("Location: success.php");
        // exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
