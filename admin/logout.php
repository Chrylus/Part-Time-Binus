<?php
session_start();
session_destroy();
session_start();
$_SESSION['status'] = "berhasil logout";
header("location:signup.php");
?>