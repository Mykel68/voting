<?php
session_start();

if (!isset($_SESSION['name']) || $_SESSION['userType'] == 'user') {
    header("location:login.php");
}

require_once('config.php');

if (isset($_POST['register_voter'])) {
    $name = $_POST['name'];
    $matric = $_POST['matric'];
    $image = $_FILES['image']['name'];
    $password = $_POST['password'];
    $year = $_POST['year'];

    // Prevent SQL injection using prepared statement
    $check = "SELECT * FROM user WHERE matric = ?";
    $stmt = mysqli_prepare($data, $check);
    mysqli_stmt_bind_param($stmt, 's', $matric);
    mysqli_stmt_execute($stmt);
    $check_user = mysqli_stmt_get_result($stmt);

    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 1) {
        echo "<script type='text/javascript'>
            alert('You have registered before');
            </script>";
    } else {
        // Move uploaded file to a specific directory
        $targetDirectory = 'images/';
        $targetFilePath = $targetDirectory . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user(name, matric, image, password, year) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($data, $sql);
            mysqli_stmt_bind_param($stmt, 'ssssi', $name, $matric, $image, $hashedPassword, $year);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "<script type='text/javascript'>
                    alert('Data Upload Success');
                    </script>";
            } else {
                echo "Data failed";
            }
        } else {
            echo "Error uploading the file.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Register Votee</title>
</head>
<body>
 <div class="d-flex">
    <div class="">
        <?php
        include('admin_sidebar.php');
        ?>
    </div>
    <div class="d-flex p-2 flex-column ">
        <h1>Register Voter</h1>
        <form action="admin_register_voter_process.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Full Name</label>
          <input type="text"
            class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Matric Number</label>
          <input type="number"
            class="form-control" name="matric" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <input type="file"
            class="form-control" name="image" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="text"
            class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
        </div>
          <div class="form-group">
          <label for="">Year</label>
          <input type="number"
            class="form-control" name="year" id="" aria-describedby="helpId" placeholder="">
        </div>
        <input type="submit" value="Register Voter" name='submit'>
    </form>
    </div>
        
 </div>
    
    
</body>
</html>