<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['name']) || $_SESSION['userType'] == 'user') {
  header("location:login.php");
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
        <h1>Register Votee</h1>
    <form action="register_votee_process.php" method="post" enctype="multipart/form-data">
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
          <label for="">Party</label>
          <input type="text"
            class="form-control" name="party" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Office Position</label>
          <input type="text"
            class="form-control" name="office" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <input type="file"
            class="form-control" name="image" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password"
            class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
        </div>
          <div class="form-group">
            <label for="my-textarea">Manifesto</label>
            <textarea id="my-textarea" class="form-control" name="manifesto" rows="3"></textarea>
          </div>
          <div class="form-group">
          <label for="">Year</label>
          <input type="number"
            class="form-control" name="year" id="" aria-describedby="helpId" placeholder="">
        </div>
        <input type="submit" value="Register" class="btn btn-primary" name="submit">
    </form>
    </div>
        
 </div>
    
    
</body>
</html>