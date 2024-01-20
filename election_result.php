<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['name']) || $_SESSION['userType'] == 'user') {
    header("location:login.php");
}

require_once('config.php');
$sql = "SELECT * from candidates";
$result = mysqli_query($data, $sql); 

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
    <div class="d-flex p-2 flex-column ">
        <h1>Result</h1>
        <?php
        while($info=$result->fetch_assoc())
        {
        ?>
        <div class="d-flex">
        <div class="card m-1" style="width:10rem">
            <img class="card-img-top" src="<?php echo "{$info['image']}" ?>" alt="" style="height:150px">
            <div class="card-body">
                <h5 class="card-title"><?php echo "{$info['name']}"  ?></h5>
                <div class="d-flex justify-content-between">
                    <p class="card-text"><?php echo "{$info['office']}"  ?></p>
                    <p class="card-text"><?php echo "{$info['party']}"  ?></p>
                </div>
                <p>Vote : <?php echo "{$info['vote']}" ?></p>
            </div>
        </div>
        <?php
        }
        ?>        
        </div>
    </div>
 </div>
    
    
</body>
</html>