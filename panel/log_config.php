<?php
// definiujemy dane do połączenia z bazą danych
define('DBHOST', 'localhost');
define('DBNAME', 'pomagamyzd_pomoc');
define('DBUSER', 'pomagamyzd_pomagamyzd');
define('DBPASS', 'ihWlyAvw');
//echo " <html> <head>  <meta http-equiv='Content-type' content='text/html; charset=utf-8'></head><body>";
function db_connect() {
	// połączenie z mysql
	$link = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die('<h2>ERROR</h2> MySQL Server is not responding');

        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
return $link;
}

function db_close() {
	//mysqli_close($sqli_connect);
}

function clear($link, $text) {
	// jeśli serwer automatycznie dodaje slashe to je usuwamy
	if(get_magic_quotes_gpc()) {
		$text = stripslashes($text);
	}
	$text = trim($text); // usuwamy białe znaki na początku i na końcu
        $text = mysqli_real_escape_string($link,$text); // filtrujemy tekst aby zabezpieczyć się przed sql injection
	//$text = mysqli_real_escape_string($link, 'aa'); // filtrujemy tekst aby zabezpieczyć się przed sql injection
	$text = htmlspecialchars($text); // dezaktywujemy kod html
	return $text;
}

function codepass($password) {
	// kodujemy hasło (losowe znaki można zmienić lub całkowicie usunąć
	//return sha1(md5($password).'de**hDj#G9!!');
        //return crypt($password);
		return password_hash($password, PASSWORD_DEFAULT);
}

// funkcja na sprawdzanie czy user jest zalogowany, jeśli nie to wyświetlamy komunikat
function check_login() {
	if(!$_SESSION['logged_user']) {
	    //die('<p>To jest strefa tylko dla uzytkownikow.</p><p>[<a href="log_login.php">Logowanie</a>] [<a href="log_register.php">Zarejestruj sie</a>]</p>');
            header ("Location: log_login.php");
	}
}

// funkcja na pobranie danych usera
function get_user_data($link, $user_id = -1) {
	// jeśli nie podamy id usera to podstawiamy id aktualnie zalogowanego
	if($user_id == -1) {
		$user_id = $_SESSION[user_id];
	}
	$result = mysqli_query($link, "SELECT * FROM `uzytkownicy` WHERE `user_id` = '{$user_id}' LIMIT 1");
	if(mysqli_num_rows($result) == 0) {
		return false;
	}
	return mysqli_fetch_assoc($result);
}

// startujemy sesje
session_start();

// jeśli nie ma jeszcze sesji "logged" i "user_id" to wypełniamy je domyślnymi danymi
if(!isset($_SESSION['logged_user'])) {
	$_SESSION['logged_user'] = false;
	$_SESSION[user_id] = -1;
//echo "</body></html>";
}
?>