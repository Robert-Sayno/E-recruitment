<?php 
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION["email"])) {
    header("Location: index.php");
    exit(); // Terminate the script after redirecting
}

$email_err = $pass_err = $login_Err = "";
$email = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_REQUEST["email"])) {
        $email_err = "<p style='color:red'> * Email Cannot Be Empty</p>";
    } else {
        $email = $_REQUEST["email"];
    }

    if (empty($_REQUEST["password"])) {
        $pass_err = "<p style='color:red'> * Password Cannot Be Empty</p>";
    } else {
        $pass = $_REQUEST["password"];
    }

    if (!empty($email) && !empty($pass)) {
        // Database connection
        require_once "../includes/db_connect.php";

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql_query = "SELECT * FROM admins WHERE email='$email' AND password='$pass'";
        $result = mysqli_query($conn, $sql_query);

        if ($result) { // Check if query execution is successful
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $_SESSION["email"] = $rows["email"];
                    header("Location: index.php?login-success");
                    exit(); // Terminate the script after redirecting
                }
            } else {
                $login_Err = "<div class='alert alert-warning alert-dismissible fade show'>
                    <strong>Invalid Email/Password</strong>
                    <button type='button' class='close' data-dismiss='alert'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
            }
        } else {
            echo "Query failed: " . mysqli_error($conn); // Output the error if query fails
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link href="../resorce/css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc; /* Light background color */
            font-family: 'Arial', sans-serif; /* Change font for modern look */
        }
        .login-form-bg {
            background-color: #ffffff; /* White background for the form */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
            padding: 40px; /* Padding around the form */
            max-width: 400px; /* Maximum width for the form */
            margin: auto; /* Center the form */
            margin-top: 100px; /* Space from the top */
        }
        .login-form h4 {
            font-weight: bold; /* Bold title */
            color: #333; /* Darker text for contrast */
        }
        .project-title {
            font-size: 1.5rem; /* Title font size */
            font-weight: bold; /* Bold title */
            color: #007bff; /* Project title color */
            text-align: center; /* Center the title */
            margin-bottom: 10px; /* Space below the title */
        }
        .project-tagline {
            font-size: 1rem; /* Tagline font size */
            color: #666; /* Tagline color */
            text-align: center; /* Center the tagline */
            margin-bottom: 30px; /* Space below the tagline */
        }
        .form-control {
            border: 1px solid #ced4da; /* Light border */
            border-radius: 5px; /* Slightly rounded inputs */
            box-shadow: none; /* No shadow */
            transition: border-color 0.3s; /* Smooth transition */
        }
        .form-control:focus {
            border-color: #007bff; /* Border color on focus */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Subtle shadow on focus */
        }
        .btn-primary {
            background-color: #007bff; /* Primary button color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded button */
            transition: background-color 0.3s; /* Smooth transition */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker on hover */
        }
        .login-form__footer {
            text-align: center; /* Center footer text */
            margin-top: 15px; /* Space above footer */
        }
    </style>
</head>
<body>
    <div class="bg">
        <div class="login-form-bg h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-12">
                        <div class="form-input-content">
                            <div class="card login-form mb-0">
                                <div class="card-body pt-5 shadow">
                                    <div class="project-title">Employee Recruitment System</div>
                             
                                    <h4 class="text-center">Hello, Admin</h4>
                                    <div class="text-center my-3"><?php echo $login_Err; ?></div>
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
                                            <?php echo $email_err; ?>       
                                        </div>
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" class="form-control" name="password">
                                            <?php echo $pass_err; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Log-In" class="btn btn-primary btn-lg w-100" name="signin">
                                        </div>
                                        <p class="login-form__footer">Not an admin? <a href="../login.php" class="text-primary">Log-In </a> as an applicant now</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
