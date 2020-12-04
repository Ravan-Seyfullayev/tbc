<?php 
session_start();
unset($_SESSION['name']);
unset($_SESSION['pasword']);
header('Location: index.php');
?>