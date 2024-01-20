<?php

error_reporting(0);
session_start();
session_destroy();
echo $_SESSION['loginMessage'];;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Voting System</title>
</head>
<body>
<div class="d-flex justify-content-center bg-success  min-vh-100 align-items-center flex-column">
  <h1 class="text-center">Voting System</h1>
        <form action="votee_login_process.php" method="POST" class="bg-light p-5">
        <div class="form-group">
          <label for="">User Name</label>
          <input type="text"
            class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password"
            class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
        </div>
        <input type="submit" value="Login" name="login" class="btn btn-primary">
        <!-- <div class="">
          New here?
            <a href="register.php">Register</a>
            <br>
            <br>
            Or Admin
            <a href="admin_login.php">Admin</a>
        </div> -->
        </form>
    </div>
</body>
</html>