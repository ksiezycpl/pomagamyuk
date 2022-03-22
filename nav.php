    <div class='row'>
<!--		<div class='col-12' id="google_translate_element"></div> -->
        <div class="col-sm-10"></div>
        <div class='col-sm-2'>
            <div class="ct-topbar">
            <!-- <div class="container-sm"> -->
                    <ul class="list-unstyled list-inline ct-topbar__list"> 
                        <li class="ct-language">Język <i class="fa fa-arrow-down"></i>
                            <ul class="list-unstyled ct-language__dropdown">
                                <li><a href="#googtrans(pl|pl)" class="lang-pl lang-select" data-lang="pl"><span class="flag-icon flag-icon-pl"></span></li>
                                <li><a href="#googtrans(pl|uk)" class="lang-en lang-select" data-lang="uk"><span class="flag-icon flag-icon-ua"></span></li>
                                <li><a href="#googtrans(pl|en)" class="lang-es lang-select" data-lang="en"><span class="flag-icon flag-icon-gb"></span></li>
                                <li><a href="#googtrans(pl|de)" class="lang-de lang-select" data-lang="de"><span class="flag-icon flag-icon-de"></span></li>
                                <li><a href="#googtrans(pl|fr)" class="lang-fr lang-select" data-lang="fr"><span class="flag-icon flag-icon-fr"></span></li>
                            </ul>
                        </li>
                    </ul>
                <!--</div>-->
            </div>
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
				    <?php 
					if ($count_towary_gr1>0) 
					    print "<li><a class='dropdown-item px-3' href='potrzebne.php?kategorie__glowne_id=1'> Rzeczy</a></li>";
					if ($count_towary_gr2>0) 
					    print "<li><a class='dropdown-item px-3' href='potrzebne.php?kategorie__glowne_id=2'> Usługi</a></li>";
					if ($count_towary_gr3>0) 
					    print "<li><a class='dropdown-item px-3' href='potrzebne.php?kategorie__glowne_id=3'> Zakwaterowanie</a></li>";
					print "<li><a class='dropdown-item px-3' href='lista.php?kategorie__glowne_id=3&wsk_lista=1'> Pokaż całą listę</a></li>";
				    ?>
                                    </ul>
                            </li>
                            <?php if ( $settings['pokaz_sklepik']=="on"){ ?>
                            <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle text-dark px-3' href='#' role='button' data-bs-toggle='dropdown'><i class="fas fa-clipboard-list"></i> Ogłoszenia różne</a>
                                    <ul class='dropdown-menu'>
				    <?php 
					if ($count_sklepik_gr1>0)
						print "<li><a class='dropdown-item px-3' href='dostepne.php?kategorie__glowne_id=1&wsk_dostepne=1'> Rzeczy</a></li>";
					if ($count_sklepik_gr2>0)
						print "<li><a class='dropdown-item px-3' href='dostepne.php?kategorie__glowne_id=2&wsk_dostepne=1'> Usługi</a></li>";
					if ($count_sklepik_gr3>0)
						print "<li><a class='dropdown-item px-3' href='dostepne.php?kategorie__glowne_id=3&wsk_dostepne=1'> Zakwaterowanie</a></li>";
				    ?>
                                            <li><a class='dropdown-item px-3' href='lista.php?kategorie__glowne_id=3&wsk_dostepne=1&wsk_lista=1'> Pokaż całą listę</a></li>
                                    </ul>
                            </li>
                            <?php } ?>
                            <li class='nav-item'>
                                <a class='nav-link text-dark px-3' href='miejsce_zbiorki.php'><i class='fas fa-balance-scale'></i> Miejsca i godziny zbiórki</a>
                            </li>
                            <li class='nav-item'>
                                    <a class='nav-link text-dark px-3' href='po_co_to.php'><font style='font-size:18px;'><b>?</b></font> Po co to</a>
                            </li>
                            <li class='nav-item'>
                                    <a class='nav-link text-dark px-3' href='certyfikat.php'><i class='far fa-file-alt'></i> Certyfikat</a>
                            </li>
			</ul>
		</div>
<?php
	if (strstr($_SERVER['SCRIPT_FILENAME'],"index.php"))
		echo "
		<div><center>
			<h4>$settings[miasto]</h4>
			Skontaktuj się w celu przekazania darów, wszystkie dane w \"stopce\".<br>
                        Dowiedz się czego potrzeba \"na teraz\".<br>
			Znajdź adresy punktów dystrybucji.<br>
			Zawsze aktualna lista potrzeb.
			</center>
		</div>";
?>
	</div>
</nav>
