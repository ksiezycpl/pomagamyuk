<?php
    include_once("connect.php");

    function licznik_last($link)
    {
        $sql = mysqli_query($link, "SELECT data FROM counter ORDER BY data DESC LIMIT 0,1");
        $data = mysqli_fetch_row($sql);
	return $data[0];
    }
    
    if(!@$_COOKIE['naszastrona']=="1")
    {
        $data = date('Y-m-d');
        if (licznik_last($link)==$data)
            $sql = mysqli_query($link,"UPDATE `counter` SET `licznik`=`licznik`+1 WHERE `data` = '$data';");
        else
            $sql = mysqli_query($link,"INSERT INTO `counter` (`data`, `licznik`) VALUES ('$data',1)");
  
        setcookie("naszastrona","1");
    }

    $sql_settings = "SELECT * FROM settings ";
    $result_settings = mysqli_query($link, $sql_settings);
    $lp = 0;

    while ($wiersz_settings = mysqli_fetch_array($result_settings))
    {
	$settings[$wiersz_settings['nazwa']]= base64_decode($wiersz_settings['wartosc']); 
    }

    	$sql_count_towary_gr1 = "select count(id) from towary where kategorie__glowne_id=1 and (zapotrzebowanie='-1' or zapotrzebowanie>0)";
	$result_count_towary_gr1 = mysqli_query($link, $sql_count_towary_gr1);
	$wiersz_count_towary_gr1 = mysqli_fetch_array($result_count_towary_gr1);
	$count_towary_gr1 = $wiersz_count_towary_gr1[0];
	$sql_count_towary_gr2 = "select count(id) from towary where kategorie__glowne_id=2 and (zapotrzebowanie='-1' or zapotrzebowanie>0)";
	$result_count_towary_gr2 = mysqli_query($link, $sql_count_towary_gr2);
	$wiersz_count_towary_gr2 = mysqli_fetch_array($result_count_towary_gr2);
	$count_towary_gr2 = $wiersz_count_towary_gr2[0];
	$sql_count_towary_gr3 = "select count(id) from towary where kategorie__glowne_id=3 and (zapotrzebowanie='-1' or zapotrzebowanie>0)";
	$result_count_towary_gr3 = mysqli_query($link, $sql_count_towary_gr3);
	$wiersz_count_towary_gr3 = mysqli_fetch_array($result_count_towary_gr3);
	$count_towary_gr3 = $wiersz_count_towary_gr3[0];

	$sql_count_sklepik_gr1 = "select count(id) from towary where kategorie__glowne_id=1 and ile_dostepne>0";
	$result_count_sklepik_gr1 = mysqli_query($link, $sql_count_sklepik_gr1);
	$wiersz_count_sklepik_gr1 = mysqli_fetch_array($result_count_sklepik_gr1);
	$count_sklepik_gr1 = $wiersz_count_sklepik_gr1[0];
	$sql_count_sklepik_gr2 = "select count(id) from towary where kategorie__glowne_id=2 and ile_dostepne>0";
	$result_count_sklepik_gr2 = mysqli_query($link, $sql_count_sklepik_gr2);
	$wiersz_count_sklepik_gr2 = mysqli_fetch_array($result_count_sklepik_gr2);
	$count_sklepik_gr2 = $wiersz_count_sklepik_gr2[0];
	$sql_count_sklepik_gr3 = "select count(id) from towary where kategorie__glowne_id=3 and ile_dostepne>0";
	$result_count_sklepik_gr3 = mysqli_query($link, $sql_count_sklepik_gr3);
	$wiersz_count_sklepik_gr3 = mysqli_fetch_array($result_count_sklepik_gr3);
	$count_sklepik_gr3 = $wiersz_count_sklepik_gr3[0];

?>

<!DOCTYPE html>
<html>
    <head>
    <title><?php print $settings['miasto']; ?></title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name="description" content='Pomagamy Ukrainie <?php print $settings['miasto']; ?>'>
	<meta name="keywords" content='Ukraina, pomoc, dary, sklep, sklepik, pom????, <?php print $settings['miasto']; ?>, polska'>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Author" content="ksiezyc.pl" />
	<meta http-equiv="Reply - to" content="biuro@ksiezyc.pl" />
	<meta name="Language" content="pl" />
	<meta http-equiv="Creation - date" content="2022-03-21" />
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='css/main.css'>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src='https://kit.fontawesome.com/4f9f496748.js' crossorigin='anonymous'></script>
	<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
 	<script src='js/pomagamyzd.js'></script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
   </head>
<body>