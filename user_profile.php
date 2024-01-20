<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['name']) || $_SESSION['userType'] == 'admin') {
    header("location: login.php");
    exit;
}

require_once('config.php');

// Assuming you have the user's ID stored in the session
$userId = $_SESSION['userId'];
// Fetch user data from the database
$query = "SELECT * FROM voters WHERE id = ?";
$stmt = mysqli_prepare($data, $query);

if ($stmt) {
    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    if ($info = $result->fetch_assoc()) {
        $username = $info['name'];
        $matricNumber = $info['matric'];
        $imagePath = $info['image'];
        $year = $info['year'];
        // Add more fields as needed

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // User not found
        echo "User not found.";
        exit;
    }
} else {
    // Error in preparing the statement
    die("Error in preparing the statement: " . mysqli_error($data));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Voters Profile</title>
</head>
<body>
<div class="d-flex">
    <div class="">
        <?php
        include('sidebar.php');
        ?>
    </div>
    <div class="d-flex p-2  flex-column">
    <h1>Voters Profile</h1>
    <form enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="matricNumber">Matric Number</label>
            <input type="text" class="form-control" id="matricNumber" value="<?php echo $matricNumber; ?>" readonly>
        </div>
        <div class="form-group">
        <label for="image">Image</label>
        <img src="<?php echo $imagePath; ?>" alt="User Image" class="img-fluid" style="max-width: 200px;">
        </div>
        <div class="form-group">
            <label for="matricNumber">Year Registered</label>
            <input type="text" class="form-control" id="matricNumber" value="<?php echo $year; ?>" readonly>
        </div>

        <!-- Add more form fields as needed -->
    </form>
    </div>
</div>
</body>
</html>
