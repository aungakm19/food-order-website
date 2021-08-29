<?php
include 'akm/config.php';
$id=$_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];
$supplier=$_POST['supplier'];
$category_id = $_POST['category_id'];
$cover=$_FILES['cover']['name'];
$tmp=$_FILES['cover']['tmp_name'];
if ($cover) {
	move_uploaded_file($tmp, "covers/$cover");
	$sql= "UPDATE menu SET food_name='$name' , price='$price' , supplier='$supplier' , cover='$cover' , category_id='$category_id' WHERE id='$id'";
}else{
	$sql= "UPDATE menu SET food_name='$name' , price='$price' , supplier='$supplier' , category_id='$category_id' WHERE id='$id'";
}

mysqli_query($conn,$sql);
header("location:menu.php");
?>