<?php
session_start();
$_SESSION['logged_user'] = false;
$_SESSION[user_id] = -1;
header('Location: log_login.php');
?>