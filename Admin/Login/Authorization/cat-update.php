<?php
include 'akm/config.php';
$id=$_POST['id'];
$name=$_POST['name'];
$sql= "UPDATE category SET Name='$name'  WHERE id=$id";
mysqli_query($conn,$sql);
header("location:categorytb.php");
?>