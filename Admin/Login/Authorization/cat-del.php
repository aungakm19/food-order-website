<?php
include 'akm/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM category WHERE id = $id";
mysqli_query($conn, $sql);
header("location: categorytb.php");
?>