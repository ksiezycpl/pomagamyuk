<?php
if ($_POST[pass] != ""){
	echo $_POST[pass]."<br><br>";
	echo "crypt()<br>";
	echo crypt($_POST[pass]);
	echo "<br><br>";
	echo "password_hash()<br>";
	echo password_hash($_POST[pass], PASSWORD_DEFAULT);
	echo "<br><br>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action='crypt.php' method='POST'>
		<input type='password' name='pass'>
		<input type='submit' value='Koduj'>
	</form>
</body>
</html>