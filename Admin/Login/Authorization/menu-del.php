<?php
include 'akm/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM menu WHERE id = $id";
mysqli_query($conn, $sql);
header("location: menu.php");
?>