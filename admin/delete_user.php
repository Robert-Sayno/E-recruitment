<?php include('../includes/db_connect.php'); ?>

<?php
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('User deleted successfully!'); window.location.href='manage_users.php';</script>";
} else {
    echo "<script>alert('Error deleting user: " . $conn->error . "'); window.location.href='manage_users.php';</script>";
}
?>
