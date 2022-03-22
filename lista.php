<?php 
include_once("connect.php"); ?>
<?php 
	if (isset($_GET['id_kategorie__glowne']))
	{
	    $sql_kategorie__glowne = "SELECT * FROM kategorie__glowne WHERE id = ".$_GET['id_kategorie__glowne']."";
	    $result_kategorie__glowne = mysqli_query($link, $sql_kategorie__glowne);
	    $wiersz_kategorie__glowne = mysqli_fetch_array($result_kategorie__glowne);
		$nazwa_kategorie__glowne = $wiersz_kategorie__glowne['nazwa']; 
	}
	
	if (isset($_GET['id_wiersz_kategorie__podkategorie_poziom_0']))
	{
	    $sql_kategorie__podkategorie_poziom_0 = "SELECT * FROM kategorie__podkategorie WHERE id = ".$_GET['id_wiersz_kategorie__podkategorie_poziom_0'];
	    $result_kategorie__podkategorie_poziom_0 = mysqli_query($link, $sql_kategorie__podkategorie_poziom_0);
	    $wiersz_kategorie__podkategorie_poziom_0 = mysqli_fetch_array($result_kategorie__podkategorie_poziom_0);
	    $id_kategorie__podkategorie = $wiersz_kategorie__podkategorie_poziom_0['id']; 
	    $nazwa_kategorie__podkategorie_poziom_0 = $wiersz_kategorie__podkategorie_poziom_0['nazwa']; 
	}

	if (isset($_GET['id_wiersz_kategorie__podkategorie_poziom_1']))
	{
	    if ($_GET['id_wiersz_kategorie__podkategorie_poziom_1'] != ""){
		$sql_kategorie__podkategorie_poziom_1 = "SELECT * FROM kategorie__podkategorie WHERE id = ".$_GET['id_wiersz_kategorie__podkategorie_poziom_1'];
		$result_kategorie__podkategorie_poziom_1 = mysqli_query($link, $sql_kategorie__podkategorie_poziom_1);
		$wiersz_kategorie__podkategorie_poziom_1 = mysqli_fetch_array($result_kategorie__podkategorie_poziom_1);
		// jeśli warunek jest spełniony $id_kategorie__podkategorie jest nadpisane  
		$id_kategorie__podkategorie = $wiersz_kategorie__podkategorie_poziom_1['id']; 
		$nazwa_kategorie__podkategorie_poziom_1 = $wiersz_kategorie__podkategorie_poziom_1['nazwa']; 
	    }
	}
	if (@$_GET['wsk_lista'] == 1)
            $sql_towary_data_aktualizacji = "SELECT MAX(data) FROM towary WHERE pokaz = 1";
        else
            $sql_towary_data_aktualizacji = "SELECT MAX(data) FROM towary WHERE kategorie__podkategorie_id = ".$id_kategorie__podkategorie." AND pokaz = 1";
	
	$result_towary_data_aktualizacji = mysqli_query($link, $sql_towary_data_aktualizacji);
	$wiersz_towary_data_aktualizacji = mysqli_fetch_array($result_towary_data_aktualizacji);
	$data_aktualizacji = $wiersz_towary_data_aktualizacji[0];
	
	
?>

<?php include_once("head.php"); ?>
<div class='container-fluid'>
<?php include_once("nav.php"); ?>
	<div class='row mt-2'>
            <div class='col-sm-12'>
                <center>
                <h4 class='p-1' style='background-color: #3399ff; color: #FFFFFF'>Przeglądasz 
                    <?php 
                        if (@$_GET['wsk_dostepne'] == 1){ 
                            if (@$_GET['wsk_lista'] == 1)
                                echo " wszystkie";
                            echo " ogłaszane ";
                        } else {
                            if (@$_GET['wsk_lista'] == 1)
                                echo " wszystkie";
                            echo " potrzebne ";
                        } 
                        if (@$_GET['wsk_lista'] != 1)
                        echo $nazwa_kategorie__glowne.", ".$nazwa_kategorie__podkategorie_poziom_0.", ".@$nazwa_kategorie__podkategorie_poziom_1; 
                    ?>
                </center>
            </div>
	</div>
        <div class='row'>
            <div class='col-sm-12'>
                <center>
                    <h5 class='p-1' style='background-color: #ffa500;'>Stan na dzień: <?php echo $data_aktualizacji; ?></h5>
                <center>
            </div>
        </div>
	
	<!-- od tą zaczyna sie baza danych -->
	<div class='row mt-3'>
            <div class='col-sm-12'>
                <div class='table_css_responsive' id='results'>
                    <div class='theader'>
                        <div class='table_css_responsive_header'>L.P</div>
                        <div class='table_css_responsive_header'>Nazwa</div>
                        <div class='table_css_responsive_header'>Opis</div>
        <?php
            if (@$_GET['wsk_dostepne'] == 1)
                print " <div class='table_css_responsive_header'>Dostępne:</div>";
            else
                print " <div class='table_css_responsive_header'>Zapotrzebowanie</div>";
                    print "
                        <div class='table_css_responsive_header'>j.m.</div>
                    </div>";
                if (@$_GET['wsk_dostepne'] == 1)
                    $warunek_dostepne = " AND ile_dostepne > 0 "; 
                else
                    $warunek_dostepne = " AND (zapotrzebowanie = -1 OR zapotrzebowanie > 0) "; 
                // pokazuje całą listę wszystkich potrzebnych lub dostępnych towarów
                if (@$_GET['wsk_lista'] == 1)
                    $sql_towary = "SELECT * FROM towary WHERE pokaz = 1 ".$warunek_dostepne."ORDER BY nazwa";
                else
                    $sql_towary = "SELECT * FROM towary WHERE kategorie__podkategorie_id = ".$id_kategorie__podkategorie." AND pokaz = 1 ".$warunek_dostepne." ORDER BY nazwa";
		$result_towary = mysqli_query($link, $sql_towary);
		$lp = 0;
		while ($wiersz_towary = mysqli_fetch_array($result_towary)){
			$lp++;
			$id = $wiersz_towary['id']; 
			$nazwa = $wiersz_towary['nazwa']; 
			$opis = $wiersz_towary['opis'];
			$zapotrzebowanie = $wiersz_towary['zapotrzebowanie']; 
			if ($zapotrzebowanie == -1)
				$zapotrzebowanie = "Każda ilość";
			$ile_dostepne = $wiersz_towary['ile_dostepne']; 
			$j_m = $wiersz_towary['j_m']; 
			$uzytkownicy_id = $wiersz_towary['uzytkownicy_id']; 		
			$data = $wiersz_towary['data']; 		
                        $pokaz = $wiersz_towary['pokaz'];
                        if ($pokaz==1)
                        {
                            $btn_status="btn-danger";
                            $status=$pokaz;
                            $btn_pokaz_name='Ukryj na liście';
                        }
                        else
                        {
                            $btn_status="btn-success";
                            $status=$pokaz;
                            $btn_pokaz_name='Pokaż na liście';
                        }    
			print " <div class='table_css_responsive_row'>
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>L.p.:</div>
						    <div class='table_css_responsive_cell'>".$lp."</div>
				    </div>
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>Nazwa:</div>
						    <div class='table_css_responsive_cell'>".$nazwa."</div>
				    </div>
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>Opis:</div>
						    <div class='table_css_responsive_cell'>".$opis."</div>
				    </div>";
                        if (@$_GET['wsk_dostepne'] == 1)
                            print "
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>Dostępne:</div>
						    <div class='table_css_responsive_cell'>".$ile_dostepne."</div>
				    </div>";
                        else
                            print "
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>Zapotrzebowanie:</div>
						    <div class='table_css_responsive_cell'>".$zapotrzebowanie."</div>
				    </div>";
                        
                        print "
				    
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>j.m.:</div>
						    <div class='table_css_responsive_cell'>".$j_m."</div>
				    </div>          
				</div>";
	    }
	    print "</div>"
          . "</div>";
	?>
    </div>
</div>
<?php include_once("footer.php"); ?>
</body>
</html>
