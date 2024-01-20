<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Register</title>
</head>
<body>
<div class="d-flex justify-content-center">
        <form action="register_process.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">User Name</label>
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
          <input type="password"
            class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Year</label>
          <input type="number"
            class="form-control" name="year" id="" aria-describedby="helpId" placeholder="">
        </div>

        <input type="submit" value="SignUp" class="btn btn-primary" name="submit">
        <div class="">
            <a href="login.php">Login</a>
        </div>
        </form>
    </div>
</body>
</html>