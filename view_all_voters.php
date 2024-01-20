<?php
session_start();

if (!isset($_SESSION['name']) || $_SESSION['userType'] == 'user') {
    header("location:login.php");
}

require_once('config.php');
$sql="SELECT * from voters WHERE usertype='user'";
$result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>View all voters</title>
</head>
<body>
<div class="d-flex">
    <div class="">
        <?php
        include('admin_sidebar.php');
        ?>
    </div>
    <div class="d-flex p-2 flex-column ">
<h1>Voter's Data</h1>


        <table class="table border">
        <tr>
            <th class='table_td'>Username</th>
            <th class='table_td'>Matric number</th>
            <th class='table_td'> Year</th>
            <th class='table_td'> Delete</th>
            <th class='table_td'>Update</th>
        </tr>

        <?php
        while($info=$result->fetch_assoc())
        {
        ?>
        <tr>
        <td class='table_td'><?php echo  "{$info['name']}" ?></td>
        <td class='table_td'><?php echo  "{$info['matric']}" ?></td>
        <td class='table_td'><?php echo  "{$info['year']}" ?></td>
        <td class='table_td'>
            <?php echo  "<a class='btn btn-danger' onclick='return confirm(\"Are you sure to delete this?\")' href='delete.php?student_id={$info['id']}'>Delete</a>"
            ?></td> 

            <td class='table_td'><?php echo  "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>"; ?></td>
        </tr>
        <?php
        }
        ?>

        </table>
    </div>
        
</div>
    
    
</body>
</html>