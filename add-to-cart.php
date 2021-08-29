<?php
session_start();
$id=$_GET['id'];
$_SESSION['cart'][$id]++;
header('location:menu.php');
?>