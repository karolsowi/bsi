<?php
session_start();

// usun sesje
unset($_SESSION['logged_in']);
unset($_SESSION['username']);

// wroc do logowania
header("Location: login.php");
?>