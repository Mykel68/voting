<?php
// Include your database connection file (e.g., config.php)
require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $matric = $_POST['matric'];
    $password = $_POST['password'];
    $year = $_POST['year']; // Assuming 'year' is a field in your form

    // Check if matric number is already registered
    $checkQuery = "SELECT * FROM voters WHERE matric = ?";
    $checkStmt = mysqli_prepare($data, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, 's', $matric);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
        echo "Matric number is already registered. Please use a different matric number.";
        exit;
    }

    // Upload the image file
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];
    $imagePath = 'uploads/' . $image;
    move_uploaded_file($tempImage, $imagePath);

    // Set default user type
    $userType = 'user';

    // Insert user data into the database with default user type
    $query = "INSERT INTO voters (name, matric, password, image, usertype, year) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($data, $query);
    mysqli_stmt_bind_param($stmt, 'ssssss', $name, $matric, $password, $imagePath, $userType, $year);
    mysqli_stmt_execute($stmt);

    // Check if the user was successfully registered
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "User registered successfully.";
        // Redirect to the login page or another page
        header("location: admin_register_voter.php");
        exit;
    } else {
        echo "Failed to register the user.";
    }
} else {
    // Redirect to the registration page if accessed directly without a POST request
    header("location: register.php");
}
?>
