<?php
    $user = "pomagamyzd_pomagamyzd1";  //Login do bazy danych
    $password = "12ihWlyAvw1";	//Hasło do bazy danych
    $database = "pomagamyzd_pomoc1"; // Nazwa bazy danych
    $link = mysqli_connect('localhost',$user,$password,$database);
    $zmiana_na_utf8 = mysqli_query($link, "SET NAMES utf8");
?>
