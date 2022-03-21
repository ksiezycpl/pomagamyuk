<?php 
	include_once("sesja.php"); 
	include_once("../connect.php");

	// ustalenie daty ost. aktualizacji
	$sql_towary_data_aktualizacji = "SELECT MAX(data) FROM towary";	
	$result_towary_data_aktualizacji = mysqli_query($link, $sql_towary_data_aktualizacji);
	$wiersz_towary_data_aktualizacji = mysqli_fetch_array($result_towary_data_aktualizacji);
	$data_aktualizacji = $wiersz_towary_data_aktualizacji[0];
 ?>
<?php include_once("head.php"); ?>
<?php include_once("nav.php"); ?>
<div class='container'>
	<div class='row mt-2'>
		<div class='col-sm-12'>
			<center>
				<h2 class='py-2' style='background-color: #3399ff; color: #FFFFFF'>Wykonaj operacje</h2>
			</center>
		</div>
		<div class='col-sm-12'>
		<center>
		  <h5 style='background-color: #ffa500;'>Ostatnie zmiany: <?php echo $data_aktualizacji; ?></h5>
		<center>
	</div>
	</div>
	<div class='row mt-2'>
		<div class='col-sm12 mt-2'>
			<p>Wybierz z menu odpowiednią opcją aby ją edytować</p>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
