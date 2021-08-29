<?php
include 'Admin/confs/config.php';
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
mysqli_query($conn, "INSERT INTO orders(name, email, phone, address, status)
VALUES ('$name','$email','$phone','$address', 0) ");

$order_id = mysqli_insert_id($conn);
foreach($_SESSION['cart'] as $id => $qty) {
	mysqli_query($conn, "INSERT INTO order_items(order_id, menu_id, qty) VALUES ($order_id,$id,$qty)");
}
unset($_SESSION['cart']);

header("location: done.php");
?>

