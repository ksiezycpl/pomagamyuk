<?php
include './log_config.php';
$link=db_connect();
include("naglowek_log_login.php");
$body_page .= "
<div class='container mt-3'> 
	<div class='row'>
		<div class='col-4'></div>
		<div class='col-4'>
			<img src='../img/flaga-640.jpg' class='mx-auto d-block mb-4 img-fluid'>"; 
// sprawdzamy czy user nie jest przypadkiem zalogowany
if(!$_SESSION['logged_user']) {
    // jeśli zostanie naciśnięty przycisk "Zaloguj"
    if(isset($_POST['name'])) {
		// filtrujemy dane...
		$_POST['name'] = clear($link, $_POST['name']);
		$_POST['password'] = clear($link,$_POST['password']);
		// szukamy w tabeli użytkownika o podanym loginie i znajdujemy id oraz hasło
		$result = mysqli_query($link, "SELECT `user_id`, `user_password`, `user_name` FROM `uzytkownicy` WHERE `user_name` = '{$_POST['name']}' LIMIT 1");
		if(mysqli_num_rows( $result) == 1) { //nie > 0, bo w tabeli uzytkowników moze być tylko jeden rekord z taka nazwą
			// jeśli tak to ustawiamy sesje "logged" na true oraz do sesji "user_id" wstawiamy id usera
			$row = mysqli_fetch_assoc($result);
			//if ($row['user_password'] == crypt($_POST['password'], $row['user_password'])) { // dopiero teraz sprawdzamy poprawność hasła
			if (password_verify($_POST['password'], $row['user_password'])) {
					$_SESSION['logged_user'] = true;
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['user_password'] = $_POST['password'];
					//echo '<p>Zostałeś poprawnie zalogowany! Możesz teraz przejść na <a href="index.php">stronę główną</a>.</p>';
					header ("Location: index.php");
			} else
				$body_page .= '<p>Podany login i/lub hasło jest nieprawidłowe <a href="log_login.php">Logowanie</a></p>';
		} else
			$body_page .= '<p>Podany login i/lub hasło jest nieprawidłowe <a href="log_login.php">Logowanie</a></p>';
    } else {
	// wyświetlamy komunikat na zalogowanie się
	$body_page .= '<form method="post" action="log_login.php">
		<p style="font-family: verdana">
			Login: <input type="text" value="'.$_POST['name'].'" name="name" class="form_login form_mobile_login_640 form_mobile_login_360">
		</p>
		<p style="font-family: verdana">
			Hasło: <input type="password" value="'.$_POST['password'].'" name="password" class="form_login form_mobile_login_640 form_mobile_login_360">
		</p>
		<center>
			<p>
				<input type="submit" value="Zaloguj" class="btn btn-info">
			</p>
		</center>
	</form>';
    }
} else 
    $body_page .= '<p>Jesteś już zalogowany, więc nie możesz się zalogować ponownie.</p><p>[<a href="log_login.php">Powrót</a>]</p>';

$body_page .= "
		</div>
		<div class='col-4'></div>
	</div>
</div>
</body>
</html>
";

echo $body_page;
db_close();
?>