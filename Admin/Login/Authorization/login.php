<?php
session_start();
$name=$_POST['username'];
$password=$_POST['password'];
if ($name=="admin" && $password=="asd!@#") {
	$_SESSION['auth']=true;
	header('location:dashboard.php');
}else{
	header('location:login_form.php');
}
?>