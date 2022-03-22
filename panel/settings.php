<?php 
    include_once("sesja.php"); 
    include_once("../connect.php");
    include_once("head.php");
    include_once("nav.php");
?>

<div class='container'>
<?php

if (filter_input(INPUT_POST, 'zaladuj_cert')=="zapisz")
{
      $errors= array();
      $file_name = $_FILES['cert_file']['name'];
      $file_size =$_FILES['cert_file']['size'];
      $file_tmp =$_FILES['cert_file']['tmp_name'];
      $file_type=$_FILES['cert_file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['cert_file']['name'])));
      
      $extensions= array("jpeg","jpg");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="Nie wspierany format pliku. Akceptuje tylko .jpg.";
      }
      
      if($file_size > 2097152){
         $errors[]='Plik nie może być większy niż 2MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../img/certyfikat.jpg");
        
      }else{
         print_r($errors);
      }

}
if (filter_input(INPUT_POST, 'zapisz')=="zapisz")
{
    $sql_page_name=base64_encode(filter_input(INPUT_POST, 'sql_page_name'));
    $sql_miasto=base64_encode(filter_input(INPUT_POST, 'sql_miasto'));
    $sql_address_footer=base64_encode(filter_input(INPUT_POST, 'sql_address_footer'));
    $sql_miasto_footer=base64_encode(filter_input(INPUT_POST, 'sql_miasto_footer'));
    $sql_email_footer=base64_encode(filter_input(INPUT_POST, 'sql_email_footer'));
    $sql_telefon_footer=base64_encode(filter_input(INPUT_POST, 'sql_telefon_footer'));
    $sql_miejsce_zbiorki=base64_encode(filter_input(INPUT_POST, 'sql_miejsce_zbiorki'));
    $sql_pokaz_form_kontakt=filter_input(INPUT_POST, 'sql_pokaz_form_kontakt');
    
    if ($sql_pokaz_form_kontakt=='on')
	$sql_pokaz_form_kontakt=base64_encode('on');
    else
	$sql_pokaz_form_kontakt=base64_encode('off');
    
    $sql_pokaz_ogloszenia=filter_input(INPUT_POST, 'sql_pokaz_ogloszenia');
   
    if ($sql_pokaz_ogloszenia=='on')
	$sql_pokaz_ogloszenia=base64_encode('on');
    else
	$sql_pokaz_ogloszenia=base64_encode('off');

    $sql_certyfikat_tekst=base64_encode(filter_input(INPUT_POST, 'sql_certyfikat_tekst'));
    $query = "UPDATE settings SET wartosc='$sql_page_name' WHERE nazwa='page_name'";
    $result = mysqli_query($link,$query);
    $query = "UPDATE settings SET wartosc='$sql_miasto' WHERE nazwa='miasto'";
    $result = mysqli_query($link,$query);
    $query = "UPDATE settings SET wartosc='$sql_address_footer' WHERE nazwa='address_footer'";
    $result = mysqli_query($link,$query);
    $query = "UPDATE settings SET wartosc='$sql_miasto_footer' WHERE nazwa='miasto_footer'";
    $result = mysqli_query($link,$query);
    $query = "UPDATE settings SET wartosc='$sql_email_footer' WHERE nazwa='email_footer'";
    $result = mysqli_query($link,$query);
    $query = "UPDATE settings SET wartosc='$sql_telefon_footer' WHERE nazwa='telefon_footer'";
    $result = mysqli_query($link,$query);
    $query = "UPDATE settings SET wartosc='$sql_pokaz_form_kontakt' WHERE nazwa='pokaz_form_kontakt'";
    $result = mysqli_query($link,$query);
    $query = "UPDATE settings SET wartosc='$sql_pokaz_ogloszenia' WHERE nazwa='pokaz_ogloszenia'";
    $result = mysqli_query($link,$query);
    $query = "UPDATE settings SET wartosc='$sql_miejsce_zbiorki' WHERE nazwa='miejsce_zbiorki'";
    $result = mysqli_query($link,$query);
    $query = "UPDATE settings SET wartosc='$sql_certyfikat_tekst' WHERE nazwa='certyfikat_text'";
    $result = mysqli_query($link,$query);
}

    $sql_settings = "SELECT * FROM settings ";
    $result_settings = mysqli_query($link, $sql_settings);
    $lp = 0;

    while ($wiersz_settings = mysqli_fetch_array($result_settings))
    {
	$settings[$wiersz_settings['nazwa']]= base64_decode($wiersz_settings['wartosc']); 
    }

    if ($settings['pokaz_form_kontakt']=='off')
    {
	$check_pokaz_formularz_kontaktowy='';
    }
    else {
	$check_pokaz_formularz_kontaktowy='checked';
    }
    
    if ($settings['pokaz_ogloszenia']=='off')
    {
	$check_pokaz_ogloszenia='';
    }
    else {
	$check_pokaz_ogloszenia='checked';
    }

    ?>

<h3 class="mt-3 mb-3">Konfiguracja strony</h3>
<form id="settings_form" method="post" action=''>
    <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Nazwa strony:</label>
	<input type="text" class="form-control sql_page_name" name="sql_page_name" id="sql_miasto" placeholder="" value='<?php print $settings['page_name']; ?>'>
    </div>
    <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Twoje miejsce (np. Miasto lub Miasto i nazwa organizacji itp.):</label>
	<input type="text" class="form-control sql_miasto" name="sql_miasto" id="sql_miasto" placeholder="" value='<?php print $settings['miasto']; ?>'>
    </div>
    <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Addres stopka:</label>
	<input type="text" class="form-control sql_address_footer" name="sql_address_footer" id="sql_address_footer" placeholder="" value='<?php print $settings['address_footer']; ?>'>
    </div>    
    <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Miasto stopka:</label>
	<input type="text" class="form-control sql_miasto_footer" name="sql_miasto_footer" id="sql_miasto_footer" placeholder="" value='<?php print $settings['miasto_footer']; ?>'>
    </div>    
    <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Email stopka:</label>
	<input type="email" class="form-control sql_email_footer" name="sql_email_footer" id="sql_email_footer" placeholder=""value='<?php print $settings['email_footer']; ?>'>
    </div>    
    <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Telefon stopka:</label>
	<input type="tel" class="form-control sql_telefon_footer" name="sql_telefon_footer" id="sql_telefon_footer" placeholder="" value='<?php print $settings['telefon_footer']; ?>'>
    </div>    
    <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Pokaż panel "Ogłoszenia różne" (w panelu tym ogłaszasz różne dostępne produkty, których nie możesz przechowywac w sklepiku, bo np. nie masz mijsca lub usługi, które swiadczą inni, a może też  "dam pracę" - jeśli ktoś zgłosi taką ofertę lub "podejmą pracę"): </label>
	<input class="form-check-input" style='width: 30px; height: 30px;' type="checkbox" name='sql_pokaz_ogloszenia' id="sql_pokaz_ogloszenia" <?php print $check_pokaz_ogloszenia; ?>>
    </div>    
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label ">Opis miejsca i godzin zbiórki darów:</label>
      <textarea class="sql_miejsce_zbiorki" name="sql_miejsce_zbiorki" id="sql_miejsce_zbiorki" rows="3" rows="12" cols='10'><?php print $settings['miejsce_zbiorki']; ?></textarea>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label ">Tekst na stronie certyfikatu:</label>
      <textarea class="sql_certyfikat_tekst" name="sql_certyfikat_tekst" id="sql_certyfikat_tekst" rows="3" rows="12" cols='10'><?php print $settings['certyfikat_text']; ?></textarea>
    </div>
     <button name='zapisz' id='zapisz' type="submit" class="btn btn-primary mb-3" value='zapisz'>Zapisz</button>
</form>



<form id="cert_form" method="post" action='' enctype="multipart/form-data">
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label ">Certyfikat autentyczności portalu np. skan dokumentu, który podpisze ktoś ważny (tylko plik w formacie jpg):</label>
	  <div class="row g5">	
	      <div class="col-auto">
		  <input class="form-control cert_file" name='cert_file' type="file" id="cert_file"> 
	      </div>
	      <div class="col-auto">
		  <button name='zaladuj_cert' id='zaladuj_cert' type="submit" class="zaladuj_cert btn btn-primary mb-3" value='zapisz'>Załaduj plik</button>
	      </div>
	      <div class="col-auto">
		  <img src="../img/certyfikat.jpg" style='width: 200px;'>
	      </div>
	  </div>
    </div>
</form>

</div>
<?php include_once("footer.php"); ?>
</body>

<script>
    ClassicEditor
        .create( document.querySelector( '#sql_miejsce_zbiorki' ),{
	})
        .catch( error => {
            console.error( error );
        } );
	    ClassicEditor
        .create( document.querySelector( '#sql_certyfikat_tekst' ),{
	})
        .catch( error => {
            console.error( error );
        } );
</script>
</html>