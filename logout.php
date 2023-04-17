<?php
session_start();

// usun sesje
unset($_SESSION['login']);
unset($_SESSION['username']);

// wroc do logowania
header("Location: index_logowanie.php");
?>