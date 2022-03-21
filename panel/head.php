<?php 
    include_once("sesja.php");  
    include_once("../connect.php");
    $sql_settings = "SELECT * FROM settings ";
    $result_settings = mysqli_query($link, $sql_settings);
    $lp = 0;

    while ($wiersz_settings = mysqli_fetch_array($result_settings))
    {
	$settings[$wiersz_settings['nazwa']]= base64_decode($wiersz_settings['wartosc']); 
    }
?>
<!DOCTYPE html>
<html>
    <head>
	<title><?php print $settings['miasto']; ?></title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta charset='utf-8'>
	<meta name="robots" content="noindex">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src='https://kit.fontawesome.com/4f9f496748.js' crossorigin='anonymous'></script>
	<script type="text/javascript" src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
	<script src='../js/pomagamyzd.js'></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='../css/main.css'>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    </head>
<body>