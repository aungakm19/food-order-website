<?php
include 'Admin/confs/config.php';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$sql = "INSERT INTO feedback(name, email, phone, message) VALUES ('$name','$email','$phone','$message') "; 
mysqli_query($conn,$sql);
header("location: index.php");
?>