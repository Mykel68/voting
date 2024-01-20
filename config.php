<?php

$host="localhost";
$user="root";
$password="";
$db="voting";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die('Could not connect: '.mysqli_error());
}

?>