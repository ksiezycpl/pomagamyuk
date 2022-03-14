<?php
session_start();
if(!$_SESSION['logged_user']) {
    header ("Location: ./log_login.php");
	exit;
}
?>