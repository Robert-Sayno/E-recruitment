<?php
// Start the session
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include database connection file
include('../includes/db_connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $site_name = trim($_POST['site_name']);
    $admin_email = trim($_POST['admin_email']);
    $default_role = trim($_POST['default_role']);
    $email_notifications = trim($_POST['email_notifications']);

    // Validate inputs
    if (empty($site_name) || empty($admin_email)) {
        $_SESSION['error'] = "Site name and admin email cannot be empty.";
        header('Location: settings.php');
        exit();
    }

    // Prepare SQL query to update settings
    $query = "UPDATE settings SET site_name = ?, admin_email = ?, default_role = ?, email_notifications = ? WHERE id = 1";

    if ($stmt = $conn->prepare($query)) {
        // Bind parameters
        $stmt->bind_param("ssss", $site_name, $admin_email, $default_role, $email_notifications);
        
        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['success'] = "Settings updated successfully.";
        } else {
            $_SESSION['error'] = "Error updating settings: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
    }
}

// Close the database connection
$conn->close();

// Redirect back to settings page
header('Location: index.php');
exit();
?>
