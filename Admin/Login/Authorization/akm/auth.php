<?php
session_start();
if (!isset($_SESSION['auth'])) {
	header("location:login_form.php");
	exit();
}
?>