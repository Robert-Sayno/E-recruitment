<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION["email"])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: login.php"); // Change to your actual login page URL
    exit(); // Terminate the script after redirecting
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit(); // Terminate the script
}
?>
