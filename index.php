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
                             lub zajrzyj w ogłoszenia</h4>
                         <?php } ?>
			<center>
		</div>
		<div class='col-sm-12'>
			<center>
			  <h5 class='p-1' style='background-color: #ffa500;'>Ostatnie zmiany: <?php echo $data_aktualizacji; ?></h5>
			<center>
		</div>
	</div>

<?php if ( $settings['pokaz_ogloszenia']=="on") { 
$sklepik_status="collapse";
?>
        <div class='row'>
            <div class='col-sm-3' ></div>
            <div class='col-sm-3 img-fluid daje text-center p-2 ' data-bs-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1"><div class='p-5 top-menu blink' ><h3>Potrzebne są</h3></div></div>
            <div class='col-sm-3 img-fluid ogloszenia text-center p-2 '  data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"><div class='p-5 top-menu blink' ><h3>Ogłoszenia różne</h3></div></div>
            <div class='col-sm-3' ></div>
	</div>
<?php 
} else
{
    $sklepik_status="";
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

	<div class='row daje <?php print $sklepik_status; ?> ' id="multiCollapseExample1">
		<?php if ($count_towary_gr1>0) {?>
		    <div class='col-sm mt-2 '>
			<center>
			    <h4 class='display-5'><small>Rzeczy</small></h4>
			</center>
			    <a href='potrzebne.php?kategorie__glowne_id=1&wsk_potrzebne=1'><img src='img/towary_in.jpg' class='img-fluid mx-auto d-block'></a>
		    </div>
		<?php }
		if ($count_towary_gr2>0)
		{
		?>
		    <div class='col-sm mt-2'>
			    <center>
				<h4 class='display-5'><small>Usługi</small></h4>
			    </center>
			    <a href='potrzebne.php?kategorie__glowne_id=2&wsk_potrzebne=1'><img src='img/uslugi_in.jpg' class='img-fluid mx-auto d-block'></a>
		    </div>
		<?php }
		if ($count_towary_gr3>0)
		{
		?>
		    <div class='col-sm mt-2'>
			    <center>
				<h4 class='display-5'><small>Zakwaterowanie</small></h4>
			    </center>
			    <a href='potrzebne.php?kategorie__glowne_id=3&wsk_potrzebne=1'><img src='img/nocleg_in.jpg' class='img-fluid mx-auto d-block'></a>
		    </div>
		<?php }?>
	</div>

<?php if ( $settings['pokaz_ogloszenia']=="on") { ?>
	<div class='row ogloszenia collapse ' id="multiCollapseExample2">
		<?php if ($count_sklepik_gr1>0) {?>
		<div class='col-sm mt-2'>
                        <center>
                            <h4 class='display-5'><small>Rzeczy</small></h4>
                        </center>
			<a href='dostepne.php?kategorie__glowne_id=1&wsk_dostepne=1'><img src='img/towary_out.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
		<?php }
		if ($count_sklepik_gr2>0)
		{
		?>
		<div class='col-sm mt-2'>
                        <center>
                            <h4 class='display-5'><small>Usługi</small></h4>
                        </center>
			<a href='dostepne.php?kategorie__glowne_id=2&wsk_dostepne=1'><img src='img/uslugi_out.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
		<?php }
		if ($count_sklepik_gr3>0)
		{
		?>
		<div class='col-sm mt-2'>
                        <center>
                            <h4 class='display-5'><small>Zakwaterowanie</small></h4>
                        </center>
			<a href='dostepne.php?kategorie__glowne_id=3&wsk_dostepne=1'><img src='img/nocleg_out.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
		<?php }?>
	</div>
<?php } ?>
</div>
<?php include("footer.php"); ?>
</body>
</html>
