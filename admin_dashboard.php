<?php
session_start();

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
    <title>Document</title>
</head>
<body>
<div class="d-flex">
    <div class="">
        <?php
        include('admin_sidebar.php');
        ?>
    </div>
    <div class="d-flex p-2 ">

<h1>Home</h1>
    </div>
        
</div>
    
    
</body>
</html>