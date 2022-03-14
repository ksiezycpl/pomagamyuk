<?php include_once("connect.php"); ?>
<?php include_once("head.php"); ?>
<?php include_once("nav.php"); ?>
<div class='container'>
	<?php //include("carousel.php"); ?>
	<?php 
		$sql_kategorie__glowne = "SELECT * FROM kategorie__glowne WHERE id = ".$_GET['kategorie__glowne_id']."";
		$result_kategorie__glowne = mysqli_query($link, $sql_kategorie__glowne);
		$wiersz_kategorie__glowne = mysqli_fetch_array($result_kategorie__glowne);
			$nazwa_kategorie__glowne = $wiersz_kategorie__glowne['nazwa'];  
	
	?>
	<div class='row mt-4'>
		<div>
			<center>
				<h2 class='py-2' style='background-color: #3399ff;'>Potrzebne <?php echo $nazwa_kategorie__glowne; ?></h2>
			</center>
		</div>
	</div>
	<!-- od tą zaczyna sie baza danych -->
	<?php
		$sql_kategorie__podkategorie_poziom_0 = "SELECT * FROM kategorie__podkategorie WHERE kategorie__podkategorie_3poziom = 0 AND kategorie__glowne_id = ".$_GET['kategorie__glowne_id']." ORDER BY nazwa ASC";
		$result_kategorie__podkategorie_poziom_0 = mysqli_query($link, $sql_kategorie__podkategorie_poziom_0);
		$czy_sa_kategorie__podkategorie_poziom_0 = mysqli_num_rows($result_kategorie__podkategorie_poziom_0);
		
		while ($wiersz_kategorie__podkategorie_poziom_0 = mysqli_fetch_array($result_kategorie__podkategorie_poziom_0)){
			$id_wiersz_kategorie__podkategorie_poziom_0 = $wiersz_kategorie__podkategorie_poziom_0['id'];
			$podkategoria_poziom_0 = $wiersz_kategorie__podkategorie_poziom_0['nazwa'];
			
			$sql_kategorie__podkategorie_poziom_1 = "SELECT * FROM kategorie__podkategorie WHERE kategorie__podkategorie_3poziom = ".$id_wiersz_kategorie__podkategorie_poziom_0." ORDER BY nazwa ASC";
			$result_kategorie__podkategorie_poziom_1 = mysqli_query($link, $sql_kategorie__podkategorie_poziom_1);
			$czy_sa_kategorie__podkategorie_poziom_1 = mysqli_num_rows($result_kategorie__podkategorie_poziom_1);
			
			$czy_sa_towary_poziom_1 = 0;
			while ($wiersz_kategorie__podkategorie_poziom_1 = mysqli_fetch_array($result_kategorie__podkategorie_poziom_1)){
				$id_wiersz_kategorie__podkategorie_poziom_1 = $wiersz_kategorie__podkategorie_poziom_1['id'];
				$podkategoria_poziom_1 = $wiersz_kategorie__podkategorie_poziom_1['nazwa'];
				// jeżeli jest poziom 1 dla kategorii poziomu 0 to towar sprawdzamy tylko na poziomie 1 bo na poziomie 0 go być nie morze
				$sql_towary_poziom_1 = "SELECT * FROM towary WHERE kategorie__podkategorie_id = ".$id_kategorie__podkategorie;
				$result_towary_poziom_1 = mysqli_query($link, $sql_towary_poziom_1);
				$czy_sa_towary_poziom_1 = $czy_sa_towary_poziom_1 + mysqli_num_rows($result_towary_poziom_1);
				
				
				
				
			}
			
			if ($czy_sa_kategorie__podkategorie_poziom_1 == 0 || $czy_sa_towary_poziom_1 == 0){			
				echo "
				<div class='row mt-4'>
					<div class='col-12 mt-2'>
						";
					if ($czy_sa_kategorie__podkategorie_poziom_1 > 0){			
						echo "<h5>".$podkategoria_poziom_0."</h5>";
					}
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
		}
	?>
	
</div>
<?php include_once("footer.php"); ?>
</body>
</html>
