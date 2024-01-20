<?php
// Include your database connection file (e.g., config.php)
require_once('config.php');

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Check admin credentials
    $query = "SELECT * FROM admin WHERE name = ? AND usertype = 'admin'";
    $stmt = mysqli_prepare($data, $query);

    if ($stmt) {
        // Bind parameters and execute the query
        mysqli_stmt_bind_param($stmt, 's', $name);
        mysqli_stmt_execute($stmt);

        // Get the result set
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Verify password (assuming the password is not hashed)
            if ($password === $row['password']) {
                // Authentication successful
                $_SESSION['userId'] = $row['id']; // Assuming 'id' is the unique identifier for the user
                $_SESSION['name'] = $row['name'];
                $_SESSION['userType'] = 'admin'; // Set user type as 'admin'
                
                echo "Admin login successful.";
                
                // Redirect admin to the admin dashboard
                header("location: admin_dashboard.php");
                exit;
            } else {
                // Invalid password
                $_SESSION['loginMessage'] = "Invalid password.";
            }
        } else {
            // Admin not found
            $_SESSION['loginMessage'] = "Admin not found.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing the statement
        die("Error in preparing the statement: " . mysqli_error($data));
    }

    // Redirect back to the login page with an error message
    header("location: login.php");
} else {
    // Redirect to the login page if accessed directly without a POST request
    header("location: login.php");
}
?>
