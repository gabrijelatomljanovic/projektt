<?php 
session_start();
unset($_SESSION['email']);
unset($_SESSION["id"]);
unset($_SESSION["uloga"]);
header("Location: index.php")
?>