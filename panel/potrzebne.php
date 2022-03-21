<?php 
	include_once("sesja.php"); 
	include_once("../connect.php"); 
?>
<?php include_once("head.php"); ?>
<?php include_once("nav.php"); ?>
<div class='container'>
	<?php //include("carousel.php"); ?>
	<?php 
		$sql_kategorie__glowne = "SELECT * FROM kategorie__glowne WHERE id = ".$_GET['kategorie__glowne_id']."";
		$result_kategorie__glowne = mysqli_query($link, $sql_kategorie__glowne);
		$wiersz_kategorie__glowne = mysqli_fetch_array($result_kategorie__glowne);
			$nazwa_kategorie__glowne = $wiersz_kategorie__glowne['nazwa'];
		// ustalenie daty ost. aktualizacji
		$sql_towary_data_aktualizacji = "SELECT MAX(data) FROM towary";	
		$result_towary_data_aktualizacji = mysqli_query($link, $sql_towary_data_aktualizacji);
		$wiersz_towary_data_aktualizacji = mysqli_fetch_array($result_towary_data_aktualizacji);
		$data_aktualizacji = $wiersz_towary_data_aktualizacji[0];
	
	?>
	<div class='row mt-2'>
		<div class='col-sm-12'>
			<center>
				<h2 class='py-2' style='background-color: #3399ff; color: #FFFFFF'><?php echo $nazwa_kategorie__glowne; ?></h2>
			</center>
		</div>
		<div class='col-sm-12'>
		<center>
		  <h5 style='background-color: #ffa500;'>Ostatnie zmiany: <?php echo $data_aktualizacji; ?></h5>
		<center>
	</div>
	</div>
	<div class='row mt-2'>
		<div class='col-12 mt-2'>
			<h3>Kliknij na liście odpowiednią pozycję i wyświetl listę do edycji</h3>
		</div>
	</div>
	<!-- od tą zaczyna sie baza danych -->
	<?php
		$sql_kategorie__podkategorie_poziom_0 = "SELECT * FROM kategorie__podkategorie WHERE kategorie__podkategorie_3poziom = 0 AND kategorie__glowne_id = ".$_GET['kategorie__glowne_id']." ORDER BY nazwa ASC";
		$result_kategorie__podkategorie_poziom_0 = mysqli_query($link, $sql_kategorie__podkategorie_poziom_0);
		while ($wiersz_kategorie__podkategorie_poziom_0 = mysqli_fetch_array($result_kategorie__podkategorie_poziom_0)){
			$id_wiersz_kategorie__podkategorie_poziom_0 = $wiersz_kategorie__podkategorie_poziom_0['id'];
			$podkategoria_poziom_0 = $wiersz_kategorie__podkategorie_poziom_0['nazwa'];
			
			$sql_kategorie__podkategorie_poziom_1 = "SELECT * FROM kategorie__podkategorie WHERE kategorie__podkategorie_3poziom = ".$id_wiersz_kategorie__podkategorie_poziom_0." ORDER BY nazwa ASC";
			$result_kategorie__podkategorie_poziom_1 = mysqli_query($link, $sql_kategorie__podkategorie_poziom_1);
			$czy_sa_kategorie__podkategorie_poziom_1 = mysqli_num_rows($result_kategorie__podkategorie_poziom_1);
		echo "
		<div class='row mt-4'>
			<div class='col-12 mt-2'>
				";
				if ($czy_sa_kategorie__podkategorie_poziom_1 > 0)				
					echo "<h5>".$podkategoria_poziom_0."</h5>";
				else
					echo "<h5><a href='lista.php?id_kategorie__glowne=".$_GET['kategorie__glowne_id']."&id_wiersz_kategorie__podkategorie_poziom_0=".$id_wiersz_kategorie__podkategorie_poziom_0."' class='text-decoration-none'>".$podkategoria_poziom_0."</a></h5>";
					
			
			while ($wiersz_kategorie__podkategorie_poziom_1 = mysqli_fetch_array($result_kategorie__podkategorie_poziom_1)){
				$id_wiersz_kategorie__podkategorie_poziom_1 = $wiersz_kategorie__podkategorie_poziom_1['id'];
				$podkategoria_poziom_1 = $wiersz_kategorie__podkategorie_poziom_1['nazwa'];
				echo "
					<div class='row'>
						<div class='col-1'></div>
						<div
						class='col-11'><a href='lista.php?id_kategorie__glowne=".$_GET['kategorie__glowne_id']."&id_wiersz_kategorie__podkategorie_poziom_0=".$id_wiersz_kategorie__podkategorie_poziom_0."&id_wiersz_kategorie__podkategorie_poziom_1=".$id_wiersz_kategorie__podkategorie_poziom_1."' class='text-decoration-none'>".$podkategoria_poziom_1."</a></div>
					</div>";
			}
			echo "
				</div> 
			</div>";
		}
	?>
	
</div>
<?php include_once("footer.php"); ?>
</body>
</html>
