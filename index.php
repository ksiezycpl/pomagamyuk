<?php 
	include_once("connect.php"); 
	$sql_towary_data_aktualizacji = "SELECT MAX(data) FROM towary";	
	$result_towary_data_aktualizacji = mysqli_query($link, $sql_towary_data_aktualizacji);
	$wiersz_towary_data_aktualizacji = mysqli_fetch_array($result_towary_data_aktualizacji);
		$data_aktualizacji = $wiersz_towary_data_aktualizacji[0];
?>
<?php include("head.php"); ?> 
<div class='container-fluid'>
    <?php include("nav.php"); ?>
	<div class='row mt-1'>
		<div class='col-sm-12 mt-2'>
			<center>
			 <h4 class='p-1 text-white' style='background-color: #3399ff;'>Wybierz jeśli chcesz coś podarować
                         <?php if ( $settings['pokaz_sklepik']=="on"){ ?>
                             lub czegoś potrzebujesz</h4>
                         <?php } ?>
			<center>
		</div>
		<div class='col-sm-12'>
			<center>
			  <h5 class='p-1' style='background-color: #ffa500;'>Ostatnie zmiany: <?php echo $data_aktualizacji; ?></h5>
			<center>
		</div>
	</div>

<?php if ( $settings['pokaz_sklepik']=="on") { 
$sklepik_status="collapse";
?>
        <div class='row'>
            <div class='col-sm-3' ></div>
            <div class='col-sm-3 img-fluid daje text-center p-2 ' data-bs-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1"><div class='p-5 top-menu blink' ><h3>Potrzebne są</h3></div></div>
            <div class='col-sm-3 img-fluid szukam text-center p-2 '  data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"><div class='p-5 top-menu blink' ><h3>Dostępne są</h3></div></div>
            <div class='col-sm-3' ></div>
	</div>
<?php 
} else
{
$sklepik_status="";
}

?>

	<div class='row daje <?php print $sklepik_status; ?> ' id="multiCollapseExample1">
		<div class='col-sm-4 mt-2'>
                    <center>
                        <h4 class='display-5'><small>Towary</small></h4>
                    </center>
			<a href='potrzebne.php?kategorie__glowne_id=1&wsk_potrzebne=1'><img src='img/towary_in.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
		<div class='col-sm-4 mt-2'>
                        <center>
                            <h4 class='display-5'><small>Usługi</small></h4>
                        </center>
			<a href='potrzebne.php?kategorie__glowne_id=2&wsk_potrzebne=1'><img src='img/uslugi_in.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
		<div class='col-sm-4 mt-2'>
                        <center>
                            <h4 class='display-5'><small>Zakwaterowanie</small></h4>
                        </center>
			<a href='potrzebne.php?kategorie__glowne_id=3&wsk_potrzebne=1'><img src='img/nocleg_in.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
	</div>

<?php if ( $settings['pokaz_sklepik']=="on") { ?>
	<div class='row szukam collapse ' id="multiCollapseExample2">
		<div class='col-sm-4 mt-2'>
                        <center>
                            <h4 class='display-5'><small>Towary</small></h4>
                        </center>
			<a href='dostepne.php?kategorie__glowne_id=1&wsk_dostepne=1'><img src='img/towary_out.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
		<div class='col-sm-4 mt-2'>
                        <center>
                            <h4 class='display-5'><small>Usługi</small></h4>
                        </center>
			<a href='dostepne.php?kategorie__glowne_id=2&wsk_dostepne=1'><img src='img/uslugi_out.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
		<div class='col-sm-4 mt-2'>
                        <center>
                            <h4 class='display-5'><small>Zakwaterowanie</small></h4>
                        </center>
			<a href='dostepne.php?kategorie__glowne_id=3&wsk_dostepne=1'><img src='img/nocleg_out.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
	</div>
<?php } ?>
</div>
<?php include("footer.php"); ?>
</body>
</html>
