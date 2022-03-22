<?php include_once("connect.php"); ?>
<?php include_once("head.php"); ?>
<div class='container-fluid'>
    <?php include_once("nav.php"); ?>
	<?php 
		$sql_kategorie__glowne = "SELECT * FROM kategorie__glowne WHERE id = ".@$_GET['kategorie__glowne_id']."";
		$result_kategorie__glowne = mysqli_query($link, $sql_kategorie__glowne);
		$wiersz_kategorie__glowne = mysqli_fetch_array($result_kategorie__glowne);
			$nazwa_kategorie__glowne = $wiersz_kategorie__glowne['nazwa'];  
                        			
		$sql_towary_data_aktualizacji = "SELECT MAX(data) FROM towary";
		$result_towary_data_aktualizacji = mysqli_query($link, $sql_towary_data_aktualizacji);
		$wiersz_towary_data_aktualizacji = mysqli_fetch_array($result_towary_data_aktualizacji);
			$data_aktualizacji = $wiersz_towary_data_aktualizacji[0];
	
	?>
	<div class='row mt-2'>
		<div class='col-sm-12'>
			<center>
				<h4 class='p-1' style='background-color: #3399ff; color: #FFFFFF'>Ogłaszane <?php echo $nazwa_kategorie__glowne; ?></h4>  
			</center>
		</div>
		<div class='col-sm-12'>
			<center>
			  <h5 class='p-1' style='background-color: #ffa500;'>Ostatnie zmiany: <?php echo $data_aktualizacji; ?></h5>
			<center>
		</div>
	</div>
	<!-- od tą zaczyna sie baza danych -->
	<?php
		$sql_kategorie__podkategorie_poziom_0 = "SELECT * FROM kategorie__podkategorie WHERE kategorie__podkategorie_3poziom = 0 AND kategorie__glowne_id = ".@$_GET['kategorie__glowne_id']." ORDER BY nazwa ASC";
		$result_kategorie__podkategorie_poziom_0 = mysqli_query($link, $sql_kategorie__podkategorie_poziom_0);
		$czy_sa_kategorie__podkategorie_poziom_0 = mysqli_num_rows($result_kategorie__podkategorie_poziom_0);
		$czy_sa_jakiekolwiek_towary=0;
		while ($wiersz_kategorie__podkategorie_poziom_0 = mysqli_fetch_array($result_kategorie__podkategorie_poziom_0)){
			$id_wiersz_kategorie__podkategorie_poziom_0 = $wiersz_kategorie__podkategorie_poziom_0['id'];
			$podkategoria_poziom_0 = $wiersz_kategorie__podkategorie_poziom_0['nazwa'];
			 if (@$_GET['wsk_dostepne'] == 1)
                            $warunek_dostepne = " AND ile_dostepne > 0 "; 
			$sql_towary_poziom_0 = "SELECT * FROM towary WHERE kategorie__podkategorie_id = ".$id_wiersz_kategorie__podkategorie_poziom_0." AND pokaz = 1".$warunek_dostepne;
			$result_towary_poziom_0 = mysqli_query($link, $sql_towary_poziom_0);
			$czy_sa_towary_poziom_0 = mysqli_num_rows($result_towary_poziom_0);
			
			$sql_kategorie__podkategorie_poziom_1 = "SELECT * FROM kategorie__podkategorie WHERE kategorie__podkategorie_3poziom = ".$id_wiersz_kategorie__podkategorie_poziom_0." ORDER BY nazwa ASC";
			$result_kategorie__podkategorie_poziom_1 = mysqli_query($link, $sql_kategorie__podkategorie_poziom_1);
			$czy_sa_kategorie__podkategorie_poziom_1 = mysqli_num_rows($result_kategorie__podkategorie_poziom_1);
			
			$poziom_1 = "";
			$czy_sa_towary_poziom_1_licznik = 0;
			while ($wiersz_kategorie__podkategorie_poziom_1 = mysqli_fetch_array($result_kategorie__podkategorie_poziom_1)){
				$id_wiersz_kategorie__podkategorie_poziom_1 = $wiersz_kategorie__podkategorie_poziom_1['id'];
				$podkategoria_poziom_1 = $wiersz_kategorie__podkategorie_poziom_1['nazwa'];
				// jeżeli jest poziom 1 dla kategorii poziomu 0 to towar sprawdzamy tylko na poziomie 1 bo na poziomie 0 go być nie morze
				$sql_towary_poziom_1 = "SELECT * FROM towary WHERE kategorie__podkategorie_id = ".$id_wiersz_kategorie__podkategorie_poziom_1." AND pokaz = 1".$warunek_dostepne;
				$result_towary_poziom_1 = mysqli_query($link, $sql_towary_poziom_1);
				$czy_sa_towary_poziom_1 = mysqli_num_rows($result_towary_poziom_1);
				$czy_sa_towary_poziom_1_licznik = $czy_sa_towary_poziom_1_licznik + $czy_sa_towary_poziom_1;
				if ($czy_sa_towary_poziom_1 > 0){
					$poziom_1 .= "
						<div class='row'>
							<div class='col-1'></div>
							<div
							class='col-11'><a href='lista.php?id_kategorie__glowne=".@$_GET['kategorie__glowne_id']."&id_wiersz_kategorie__podkategorie_poziom_0=".$id_wiersz_kategorie__podkategorie_poziom_0."&id_wiersz_kategorie__podkategorie_poziom_1=".$id_wiersz_kategorie__podkategorie_poziom_1."&wsk_dostepne=".@$_GET['wsk_dostepne']."' class='text-decoration-none'>".$podkategoria_poziom_1."</a></div>
						</div>";
				}
			}
			if ($czy_sa_towary_poziom_0 > 0 || ($czy_sa_towary_poziom_0 == 0 && $czy_sa_towary_poziom_1_licznik > 0)){	
				echo "
				<div class='row mt-2'>
					<div class='col-1'></div>
					<div class='col-11 mt-2'>
						";
					if ($czy_sa_kategorie__podkategorie_poziom_1 > 0)					
						echo "<h5>".$podkategoria_poziom_0."</h5>";
					else
						echo "<h5><a href='lista.php?id_kategorie__glowne=".@$_GET['kategorie__glowne_id']."&id_wiersz_kategorie__podkategorie_poziom_0=".$id_wiersz_kategorie__podkategorie_poziom_0."&wsk_dostepne=".@$_GET['wsk_dostepne']."' class='text-decoration-none'>".$podkategoria_poziom_0."</a></h5>";
						
				// tutaj wstawić $poziom_1 z odpowiednimi warunkami
				if ($czy_sa_towary_poziom_1_licznik > 0)
					echo $poziom_1;
				echo "
					</div> 
				</div>";
			}
                        $czy_sa_jakiekolwiek_towary =  $czy_sa_jakiekolwiek_towary + $czy_sa_towary_poziom_0 +  $czy_sa_towary_poziom_1_licznik;
		}
                if ($czy_sa_jakiekolwiek_towary == 0)
                echo ""
                    . "<div class='row mt-2'>"
                    . " <div class='col-sm-12'>"
                    . "<center><h4>W tej kategorii jeszcze nic nie ma</h4></center>"
                    . " </div>"
                    . "</div>";
	?>
	
</div>
<?php include_once("footer.php"); ?>
</body>
</html>
