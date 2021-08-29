<?php
include 'akm/config.php';
$categoryname=$_POST['name'];


$sql="INSERT INTO category(Name) VALUES('$categoryname') ";

mysqli_query($conn,$sql);
header("location:categorytb.php");
?>