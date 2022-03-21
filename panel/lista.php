<?php 
    include_once("sesja.php"); 
    include_once("../connect.php");
?>
<?php
$curr_date_time=date("Y-m-d h:i:s");
if (@$_POST['kasuj_towar']==true)
{
    $toward_id= filter_input(INPUT_POST, 'towar_id');
  
    $query = "DELETE FROM towary WHERE id='$toward_id'";
    $result = mysqli_query($link,$query);
    print true;
    exit;
}
if (@$_POST['change_status']==true)
{
    $toward_id= filter_input(INPUT_POST, 'toward_id');
    $status=filter_input(INPUT_POST, 'status');
    $query = "UPDATE towary SET pokaz='$status' WHERE id='$toward_id'";
    $result = mysqli_query($link,$query);
    print true;
    exit;
}
if (@$_POST['update_towar']==true)
{
    $toward_id= filter_input(INPUT_POST, 'toward_id');
    $edycja_towaru_nazwa=filter_input(INPUT_POST, 'edycja_towaru_nazwa');
    $edycja_towaru_opis=filter_input(INPUT_POST, 'edycja_towaru_opis');
    $edycja_towaru_zapotrzebowanie=filter_input(INPUT_POST, 'edycja_towaru_zapotrzebowanie');
    $edycja_towaru_dostepnosc=filter_input(INPUT_POST, 'edycja_towaru_dostepnosc');
    $edycja_towaru_jednostka_miary=filter_input(INPUT_POST, 'edycja_towaru_jednostka_miary');
    $query = "UPDATE towary SET nazwa='$edycja_towaru_nazwa', opis='$edycja_towaru_opis', zapotrzebowanie='$edycja_towaru_zapotrzebowanie', ile_dostepne='$edycja_towaru_dostepnosc', j_m='$edycja_towaru_jednostka_miary', data='$curr_date_time'  WHERE id='$toward_id'";
    $result = mysqli_query($link,$query);
    print true;
    exit;
}
if (@$_POST['nowy_towar']==true)
{
    $toward_id= filter_input(INPUT_POST, 'toward_id');
    $edycja_towaru_nazwa=filter_input(INPUT_POST, 'edycja_towaru_nazwa');
    $edycja_towaru_opis=filter_input(INPUT_POST, 'edycja_towaru_opis');
    $edycja_towaru_zapotrzebowanie=filter_input(INPUT_POST, 'edycja_towaru_zapotrzebowanie');
    $edycja_towaru_dostepnosc=filter_input(INPUT_POST, 'edycja_towaru_dostepnosc');
    $edycja_towaru_jednostka_miary=filter_input(INPUT_POST, 'edycja_towaru_jednostka_miary');
    $edycja_kategoria1=filter_input(INPUT_POST, 'edycja_kategoria1');
    $edycja_kategoria2=filter_input(INPUT_POST, 'edycja_kategoria2');
    $edycja_kategoria3=filter_input(INPUT_POST, 'edycja_kategoria3');
    
    if ($edycja_kategoria3!='')
        $podgrupa=$edycja_kategoria3;
    else
        $podgrupa=$edycja_kategoria2;
    
    $query = "INSERT INTO towary SET nazwa='$edycja_towaru_nazwa', opis='$edycja_towaru_opis', zapotrzebowanie='$edycja_towaru_zapotrzebowanie', ile_dostepne='$edycja_towaru_dostepnosc', j_m='$edycja_towaru_jednostka_miary', 	kategorie__glowne_id='$edycja_kategoria1', kategorie__podkategorie_id='$podgrupa' , data='$curr_date_time'";
    $result = mysqli_query($link,$query);
    print true;
    exit;
}
if (@$_POST['get_towar']==true && @$_POST['towar_id']!="")
{
    $query = "SELECT * FROM towary WHERE id='".$_POST['towar_id']."'";
    $result = mysqli_query($link,$query);
    $array = mysqli_fetch_row($result);  
    echo json_encode($array);
    exit;
}

if (@$_POST['autosugest']==true )
{
    $edycja_towaru_keyword=filter_input(INPUT_POST, 'keyword');
    $query = "SELECT nazwa FROM towary WHERE nazwa like '$edycja_towaru_keyword%' UNION SELECT nazwa FROM towary_magazyn WHERE nazwa like '%$edycja_towaru_keyword%' LIMIT 5";
    $result = mysqli_query($link,$query);
    print "<ul class='towary-list' id=\"towary-list\">";
    while($row = mysqli_fetch_array($result)) {
        print "<li onClick=\"selectCountry('$row[nazwa]');\">$row[nazwa]</li>";
    }
    print "</ul>";
    exit;
}
if (@$_POST['get_kategoria_poz2']==true && @$_POST['kategoria_id']!="")
{
    $query = "select * FROM kategorie__podkategorie where kategorie__podkategorie_3poziom=0 and kategorie__glowne_id='".$_POST['kategoria_id']."'";
    $result = mysqli_query($link,$query);
    while($row = mysqli_fetch_array($result)) {    
        $array[$row['id']]=$row['nazwa'];
    }
    echo json_encode($array);
    exit;
}
if (@$_POST['get_kategoria_poz3']==true && @$_POST['kategoria_id']!="")
{
    $query = "select * FROM kategorie__podkategorie where kategorie__podkategorie_3poziom='".$_POST['kategoria_id']."'";
    $result = mysqli_query($link,$query);
    while($row = mysqli_fetch_array($result)) {    
        $array[$row['id']]=$row['nazwa'];
    }
    echo json_encode($array);
    exit;
}
?>


<?php include_once("head.php"); ?>
<?php include_once("nav.php"); ?>
<?php 
    $sql_kategorie__glowne = "SELECT * FROM kategorie__glowne WHERE id = ".$_GET['id_kategorie__glowne']."";
    $result_kategorie__glowne = mysqli_query($link, $sql_kategorie__glowne);
    $wiersz_kategorie__glowne = mysqli_fetch_array($result_kategorie__glowne);
            $nazwa_kategorie__glowne = $wiersz_kategorie__glowne['nazwa']; 



    $sql_kategorie__podkategorie_poziom_0 = "SELECT * FROM kategorie__podkategorie WHERE id = ".$_GET['id_wiersz_kategorie__podkategorie_poziom_0'];
    $result_kategorie__podkategorie_poziom_0 = mysqli_query($link, $sql_kategorie__podkategorie_poziom_0);
    $wiersz_kategorie__podkategorie_poziom_0 = mysqli_fetch_array($result_kategorie__podkategorie_poziom_0);
            $id_kategorie__podkategorie = $wiersz_kategorie__podkategorie_poziom_0['id']; 
            $nazwa_kategorie__podkategorie_poziom_0 = $wiersz_kategorie__podkategorie_poziom_0['nazwa']; 

    if ($_GET['id_wiersz_kategorie__podkategorie_poziom_1'] != ""){
            $sql_kategorie__podkategorie_poziom_1 = "SELECT * FROM kategorie__podkategorie WHERE id = ".$_GET['id_wiersz_kategorie__podkategorie_poziom_1'];
            $result_kategorie__podkategorie_poziom_1 = mysqli_query($link, $sql_kategorie__podkategorie_poziom_1);
            $wiersz_kategorie__podkategorie_poziom_1 = mysqli_fetch_array($result_kategorie__podkategorie_poziom_1);
                    // jeśli warunek jest spełniony $id_kategorie__podkategorie jest nadpisane  
                    $id_kategorie__podkategorie = $wiersz_kategorie__podkategorie_poziom_1['id']; 
                    $nazwa_kategorie__podkategorie_poziom_1 = $wiersz_kategorie__podkategorie_poziom_1['nazwa']; 
    }
    // ustalenie daty ost. aktualizacji
    $sql_towary_data_aktualizacji = "SELECT MAX(data) FROM towary WHERE kategorie__podkategorie_id = ".$id_kategorie__podkategorie;
    $result_towary_data_aktualizacji = mysqli_query($link, $sql_towary_data_aktualizacji);
    $wiersz_towary_data_aktualizacji = mysqli_fetch_array($result_towary_data_aktualizacji);
    $data_aktualizacji = $wiersz_towary_data_aktualizacji[0];
?>
<div class='container'>
<?php //include("carousel.php"); ?>
	<div class='row mt-2'>
		<div class='col-sm-12'>
			<center>
			<h2 class='py-2' style='background-color: #3399ff; color: #FFFFFF'>Edytujesz <?php echo $nazwa_kategorie__glowne.", ".$nazwa_kategorie__podkategorie_poziom_0.", ".$nazwa_kategorie__podkategorie_poziom_1; ?></h2>
			</center>      
		</div>
		<div class='col-sm-12'>
			<center>
			  <h5 style='background-color: #ffa500;'>Stan tych potrzeb na: <?php echo $data_aktualizacji; ?></h5>
			<center>
		</div>
	</div>
	<div class='row mt-4'>
		<div class='col-12 mt-2'>
			<h3></h3>
		</div>
	</div>
	
	<!-- od tą zaczyna sie baza danych -->
	<?php

print "<button type=\"button\" class='btn btn-sm btn-success btn-dodaj_towar'>Dodaj nowy</button>";
print "<div class='row mt-3'>
	    <div class='col-sm-12'>
		    <div class='table_css_responsive' id='results'>
			    <div class='theader'>
				    <div class='table_css_responsive_header'>L.P</div>
				    <div class='table_css_responsive_header'>Nazwa</div>
				    <div class='table_css_responsive_header'>Opis</div>
				    <div class='table_css_responsive_header'>Zapotrzebowanie</div>
				    <div class='table_css_responsive_header'>Ile dostępnych</div>
				    <div class='table_css_responsive_header'>j.m.</div>
				    <div class='table_css_responsive_header'>Akcja</div>
			    </div>";
	
		$sql_towary = "SELECT * FROM towary WHERE kategorie__podkategorie_id = ".$id_kategorie__podkategorie;
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
			print "<div class='table_css_responsive_row'>
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>L.p.:</div>
						    <div class='table_css_responsive_cell'>$lp</div>
				    </div>
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>Nazwa:</div>
						    <div class='table_css_responsive_cell'>$nazwa</div>
				    </div>
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>Opis:</div>
						    <div class='table_css_responsive_cell'>$opis</div>
				    </div>
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>Zapotrzebowanie:</div>
						    <div class='table_css_responsive_cell'>$zapotrzebowanie</div>
				    </div>
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>Ile dostępnych:</div>
						    <div class='table_css_responsive_cell'>$ile_dostepne</div>
				    </div>
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>j.m.:</div>
						    <div class='table_css_responsive_cell'>$j_m</div>
				    </div>          
				    <div class='table_css_responsive_small'>
						    <div class='table_css_responsive_cell'>Akcja:</div>
						    <div class='table_css_responsive_cell'>
							<button type=\"button\" id = 'edytuj_towar' class='edytuj_towar btn btn-info btn-sm' data-towar_id=$id>Edytuj</button>
							<button type=\"button\" id = 'usun_towar' class='usun_towar btn btn-danger btn-sm' data-towar_id=$id data-towar_nazwa='$nazwa'>Kasuj</button>
                                                        <button type=\"button\" id = 'status' class='status btn btn-sm $btn_status' data-towar_status=$status data-towar_id=$id >$btn_pokaz_name</button>    
						    </div>

				    </div>

				</div>";
	    }
	    print "</div></div>";
	?>
	
</div>


<!-- START Modal EDYCJA-->
<div class="modal fade modal_edytuj" tabindex="-1" id="modal_edytuj" tabindex="-1" aria-labelledby="modal_edytuj" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
	<div class="modal-content">
	    <div class="modal-header">
		<h5 class="modal-title"></h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	    </div>
	    <div class="modal-body">
            <?php 
                $select=mysqli_query($link,"select * FROM kategorie__glowne");
            ?>

                <div class="mb-3 row_edycja_kategoria1">
		    <label for="recipient-name" class="col-form-label ">Kategoria 1:</label>
                    <select class="form-select form-control edycja_kategoria1" aria-label="Default select example">
                       <option value=''></option>
                    <?php
                    while($row=mysqli_fetch_array($select))
                    {
			if ($row['id']!="")
                         print "<option value='".$row['id']."'>".$row['nazwa']."</option>";
                    }
                    ?>
                    </select>
		</div>
                <div class="mb-3 row_edycja_kategoria2">
		    <label for="recipient-name" class="col-form-label ">Kategoria 2:</label>
                    <select class="form-select form-control edycja_kategoria2" aria-label="Default select example">
                    </select>
		</div>
                <div class="mb-3 row_edycja_kategoria3">
                   <label for="recipient-name" class="col-form-label ">Kategoria 3:</label>
                    <select class="form-select form-control edycja_kategoria3" aria-label="Default select example">
                    </select>
		</div>
		<div class="mb-3 ">
		    <label for="recipient-name" class="col-form-label ">Nazwa:</label>
		    <input type="text" class="form-control edycja_towaru_nazwa" name="edycja_towaru_nazwa" id="edycja_towaru_nazwa" required>
		    <div id="valid_box" class="valid_box d-none">Musisz wprowadzić nazwę</div>
                    <div id="suggesstion-box"></div>
		    
		</div>
		<div class="mb-3">
		    <label for="message-text" class="col-form-label ">Opis:</label>
		    <textarea class="form-control edycja_towaru_opis" id="message-text"></textarea>
		</div>
		<div class="mb-3">
		    <label for="recipient-name" class="col-form-label ">Zapotrzebowanie:</label>
		    <input type="text" class="form-control edycja_towaru_zapotrzebowanie" id="recipient-name">
		    Nie potrzebuje (0): <input class="form-check-input nie_potrzebuje" type="checkbox" name='zapotrzebowanie_check'  id="nie_potrzebuje" >
		    Bez ograniczeń (-1): <input class="form-check-input bez_ograniczen" type="checkbox" name='zapotrzebowanie_check'  id="bez_ograniczen" >

		</div>
		<div class="mb-3">
		    <label for="recipient-name" class="col-form-label ">Ile dostępnych:</label>
		    <input type="text" class="form-control edycja_towaru_dostepnosc" id="recipient-name">
		</div>
		<div class="mb-3">
		    <label for="recipient-name" class="col-form-label ">Jednostka miary:</label>
                    <select class="form-select edycja_towaru_jednostka_miary" aria-label="Default select example">
                        <option selected value="szt">szt</option>
                        <option value="litr">litr</option>
                        <option value="paleta">paleta</option>
                    </select>
		</div>
	    </div>
	    <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
		<button type="button" class="btn btn-primary zapisz_btn" data-zapisz_towar_id="null" data-towar_akcja="null">Zapisz</button>
	    </div>
	</div>
    </div>
</div>
<div class="modal fade modal_kasuj" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Kasuj Towar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p><center>Czy jesteś pewien że chcesz skasować towar: <b><div class="inline kasuj_towar_nazwa"></div></b></center></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-danger btn-kasuj_submit" data-kasuj_id_towar="null">Kasuj</button>
      </div>
    </div>
  </div>
</div>
<?php include_once("footer.php"); ?>
</body>
</html>
