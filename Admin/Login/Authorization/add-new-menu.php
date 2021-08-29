<?php
include 'akm/config.php';
$foodname=$_POST['name'];
$price=$_POST['price'];
$supplier=$_POST['supplier'];
$cover=$_FILES['cover']['name'];
$tmp=$_FILES['cover']['tmp_name'];
move_uploaded_file($tmp, "covers/$cover");
$category_id=$_POST['category_id'];

$sql="INSERT INTO menu(food_name,price,supplier,cover,category_id) VALUES('$foodname','$price','$supplier','$cover','$category_id') ";

mysqli_query($conn,$sql);
header("location:menu.php");
?>