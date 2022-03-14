<div class='container-fluid'>
	<div class='row'>
		<center>
		<div class='col-12' id="google_translate_element"></div>
		</center>
	</div>
</div>
<nav class='navbar navbar-expand-md bg-white'> 
	<div class='container-fluid'>
		<a class='navbar-brand' href='index.php'>
			<img src='./img/flaga-400.jpg' class='img-fluid img-thumbnail'>
		</a>
		<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#collapsibleNavbar'>
			<span class='navbar-toggler-icon'>
				<i class='fa fa-bars' style='color:#999; font-size:28px;'></i>
			</span>
		</button>
		<div class='collapse navbar-collapse' id='collapsibleNavbar'>
			<ul class='navbar-nav'>
				<li class='nav-item'>
					<a class='nav-link text-dark px-3' href='index.php'><i class='fas fa-home'></i> Home</a>
				</li>
				<li class='nav-item dropdown'>
					<a class='nav-link dropdown-toggle text-dark px-3' href='#' role='button' data-bs-toggle='dropdown'><i class="fas fa-clipboard-list"></i> Potrzebne są</a>
					<ul class='dropdown-menu'>
						<li><a class='dropdown-item px-3' href='potrzebne.php?kategorie__glowne_id=1'> Towary</a></li>
						<li><a class='dropdown-item px-3' href='potrzebne.php?kategorie__glowne_id=2'> Usługi</a></li>
						<li><a class='dropdown-item px-3' href='potrzebne.php?kategorie__glowne_id=3'> Zakwaterowanie</a></li>
					</ul>
				</li>
				<li class='nav-item'>
					<a class='nav-link text-dark px-3' href='certyfikat.php'><i class='far fa-file-alt'></i> Certyfikat</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link text-dark px-3' href='kontakt.php'><i class='fas fa-phone-alt'></i> Kontakt </a>
				</li>
			</ul>
		</div>
<?php
	if ($_SERVER['SCRIPT_FILENAME'] == "/home/pomagamyzd/domains/pomagamyzdw.pl/private_html/index.php")
		echo "
		<div><center>
			<h4>Zduńska Wola</h4>
			Dowiedz się czego potrzeba \"na teraz\"<br>
			Znajdź adresy punktów dystrybucji<br>
			Sprawdź z kim się można kontaktować<br>
			Zawsze aktualna lista potrzeb
			</center>
		</div>";
?>
	</div>
</nav>
