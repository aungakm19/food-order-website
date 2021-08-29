<?php
session_start();
unset($_SESSION['auth']);
header('location:login_form.php');
?>