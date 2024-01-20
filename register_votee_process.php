<?php

require_once('config.php');
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $matric = $_POST['matric'];
    $party = $_POST['party'];
    $office = $_POST['office'];
    $image = $_FILES['image']; 
    $password = $_POST['password'];
    $manifesto = $_POST['manifesto'];
    $year = $_POST['year'];

    // Check if matric number is already registered
    $checkQuery = "SELECT * FROM candidates WHERE matric = ?";
    $checkStmt = mysqli_prepare($data, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, 's', $matric);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
        echo "Matric number is already registered. You cannot be voted for.";
        exit;
    }
    
    // Upload the image file
    $imageFileName = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];
    $imagePath = 'uploads/' . $imageFileName;
    move_uploaded_file($tempImage, $imagePath);

    // Insert candidate data into the database
    $query = "INSERT INTO candidates (name, matric, party, office, password, manifesto, year, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($data, $query);
    
    // Assuming you have a 'candidates' table with appropriate columns
    mysqli_stmt_bind_param($stmt, 'ssssssss', $name, $matric, $party, $office, $password, $manifesto, $year, $imagePath);
    
    mysqli_stmt_execute($stmt);

    // Check if the candidate was successfully registered
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Candidate registered successfully.";
        // Redirect or perform other actions
        header("location: admin_dashboard.php");
        exit;
    } else {
        echo "Failed to register the candidate.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Redirect to the registration page if accessed directly without a POST request
    header("location: register_candidate.php");
    exit;
}
?>
