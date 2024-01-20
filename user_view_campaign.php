<?php

session_start();
error_reporting(0);
    if(!isset($_SESSION['name']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='admin')
    {
        header("location:login.php");
    }

    require_once('config.php');

    if($_GET['votee_id'])
    {
        $v_id=$_GET['votee_id'];
        $sql="SELECT * FROM candidates WHERE id='$v_id' ";
        $result = mysqli_query($data, $sql); 
    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin dashbord</title>
</head>
<body>
<div class="d-flex">
    <div class="">
        <?php
        include('sidebar.php');
        ?>
    </div>
    <div class=" p-2 ">
        <h6>Hi <?php echo "{$_SESSION['name']}" ?></h6>
     
        <?php
        while($info=$result->fetch_assoc())
        {
        ?>
         <p>My name is <?php echo "{$info['name']}" ?></p>
        <img src="<?php echo "{$info['image']}" ?>" alt="" style="height:150px">
        <p>Vote me for <?php echo "{$info['office']}" ?> representative of <?php echo "{$info['party']}" ?></p>
        <h5>Post: <?php echo "{$info['office']}" ?></h5>
        <h5>Party: <?php echo "{$info['party']}" ?></h5>
        <div class="d-flex flex-column">
            <h6>My Campaiagn</h6>
            <?php echo "{$info['manifesto']}" ?>
        </div>
        <?php
        }
        ?>
    </div>
</div>

</body>
</html>