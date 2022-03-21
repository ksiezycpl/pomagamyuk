<?php 
    include_once("sesja.php"); 
    include_once("../connect.php");
    $curr_date_time=date("Y-m-d h:i:s");

if (@$_POST['kasuj_user']==true)
{
    $edycja_login_id=filter_input(INPUT_POST, 'user_id');
    $query = "DELETE FROM uzytkownicy WHERE user_id='$edycja_login_id'";
    $result = mysqli_query($link,$query);
    print true;
    exit;
}

if (@$_POST['update_user']==true)
{
    $edycja_login_id=filter_input(INPUT_POST, 'login_id');
    $edycja_towaru_login=filter_input(INPUT_POST, 'edycja_towaru_login');
    $edycja_towaru_haslo=filter_input(INPUT_POST, 'edycja_towaru_haslo');
    $edycja_towaru_haslo= password_hash($edycja_towaru_haslo, PASSWORD_DEFAULT);
    $query = "UPDATE uzytkownicy SET user_name='$edycja_towaru_login', user_password='$edycja_towaru_haslo', data='$curr_date_time'  WHERE user_id='$edycja_login_id'";
    $result = mysqli_query($link,$query);
    print true;
    exit;
}
if (@$_POST['nowy_user']==true)
{
    $login_id= filter_input(INPUT_POST, 'login_id');
    $edycja_towaru_login=filter_input(INPUT_POST, 'edycja_towaru_login');
    $edycja_towaru_haslo=password_hash(filter_input(INPUT_POST, 'edycja_towaru_haslo'), PASSWORD_DEFAULT);
   
    $query = "INSERT INTO uzytkownicy SET user_name='$edycja_towaru_login', user_password='$edycja_towaru_haslo', data='$curr_date_time'";
    $result = mysqli_query($link,$query);
    print true;
    exit;
}

    include_once("head.php");
    include_once("nav.php");
?>

<div class='container'>
<h4 class="mt-3 mb-3">Konfiguracja kont użytkowników</h4>
<?php
print "<button type=\"button\" class='btn btn-sm btn-success btn-dodaj_user'>Dodaj nowy konto</button>";
print "<div class='row mt-3'>
	    <div class='col-sm-12'>
		    <div class='table_css_responsive' id='results'>
			    <div class='theader'>
				<div class='table_css_responsive_header'>L.P</div>
				<div class='table_css_responsive_header'>Login</div>
				<div class='table_css_responsive_header'>Opis</div>
				<div class='table_css_responsive_header'>Akcja</div>
			    </div>";


    $sql_user = "SELECT * FROM uzytkownicy";
    $result_user = mysqli_query($link, $sql_user);
    $lp = 0;
    while ($wiersz_user = mysqli_fetch_array($result_user)){
	$lp++;
	$id = $wiersz_user['user_id']; 
	$user_name = $wiersz_user['user_name']; 
	$user_password = $wiersz_user['user_password']; 
	$description = $wiersz_user['description']; 
	$data = $wiersz_user['data']; 

	print "<div class='table_css_responsive_row'>
		    <div class='table_css_responsive_small'>
				    <div class='table_css_responsive_cell'>L.p.:</div>
				    <div class='table_css_responsive_cell'>$lp</div>
		    </div>
		    <div class='table_css_responsive_small'>
				    <div class='table_css_responsive_cell'>Login:</div>
				    <div class='table_css_responsive_cell'>$user_name</div>
		    </div>
		    <div class='table_css_responsive_small'>
				    <div class='table_css_responsive_cell'>Opis:</div>
				    <div class='table_css_responsive_cell'>$description</div>
		    </div>   
		    <div class='table_css_responsive_small'>
				    <div class='table_css_responsive_cell'>Akcja:</div>
				    <div class='table_css_responsive_cell'>
					<button type=\"button\" id = 'edytuj_user' class='edytuj_user btn btn-info btn-sm' data-user_id=$id data-user_nazwa='$user_name'>Edytuj</button>
					<button type=\"button\" id = 'usun_user' class='usun_user btn btn-danger btn-sm' data-user_id=$id data-user_nazwa='$user_name'>Kasuj</button>
				    </div>
		    </div>
		</div>";
    }
print "</div></div>";
?>

</div>

<div class="modal fade modal_edytuj_user" tabindex="-1" id="modal_edytuj_user" tabindex="-1" aria-labelledby="modal_edytuj_user" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
	<div class="modal-content">
	    <div class="modal-header">
		<h5 class="modal-title"></h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	    </div>
	    <div class="modal-body">
		<div class="mb-3">
		    <label for="message-text" class="col-form-label ">Login:</label>
		    <input type="text"  class="form-control edycja_user_login" id="message-text">
		    <div id="valid_box_login" class="valid_box valid_box_login d-none">Musisz wprowadzić login,  który ma więcej niż 3 znaki.</div>
		</div>
		<div class="mb-3">
		    <label for="recipient-name" class="col-form-label ">Hasło:</label>
		    <input type="password" class="form-control edycja_user_haslo" id="recipient-name">
		    <div id="valid_box_haslo" class="valid_box valid_box_haslo d-none">Musisz wprowadzić haslo, które ma więcej niż 3 znaki.</div>
		</div>
			    </div>
	    <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
		<button type="button" class="btn btn-primary zapisz_btn_edytuj_user" data-zapisz_user_id="null" data-user_akcja="null">Zapisz</button>
	    </div>
	</div>
    </div>
</div>

<div class="modal fade modal_kasuj_user" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Kasuj użytkownika</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p><center>Czy jesteś pewien że chcesz skasować użytkownika: <b><div class="inline kasuj_user_nazwa"></div></b></center></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-danger btn-kasuj_user_submit" data-kasuj_id_user="null">Kasuj</button>
      </div>
    </div>
  </div>
</div>

<?php include_once("footer.php"); ?>
</body>


</html>