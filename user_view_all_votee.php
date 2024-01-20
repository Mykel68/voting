<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['name']) || $_SESSION['userType'] == 'admin') {
    header("location:login.php");
}
if($_GET['votee_id'])
    {
        $v_id=$_GET['teacher_id']; 

    }

require_once('config.php');
$sql="SELECT * from candidates";
$result=mysqli_query($data,$sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Voters Dashboard</title>
</head>
<body>
<div class="d-flex">
    <div class="">
        <?php
        include('sidebar.php');
        ?>
    </div>
    <div class=" p-2 ">
    <h1>All Candidates</h1>
        <div class="d-flex flex-wrap">

        <?php
    while($info=$result->fetch_assoc())
    {
    ?>
    <div class="card m-1" style="width: 12rem;">
    <img class="card-img-top" src="<?php echo $info['image']; ?>" alt="Card image cap" height="200">
    <div class="card-body">
    <p class="card-text"><?php echo  "{$info['party']}" ?></p>
    <p class="card-text><?php echo  "{$info['office']}" ?></p>
    <p class="card-text><?php echo  "{$info['manifesto']}" ?></p>
    
    <?php
                echo "
                <a href='user_view_campaign.php?votee_id={$info['id']}' class='btn btn-primary'>More</a>";
                ?>

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
