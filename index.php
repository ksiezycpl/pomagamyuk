<?php include("head.php"); ?>
<?php include("nav.php"); ?>
<div class='container-fluid'>
	<?php //include("carousel.php"); ?>
	<div class='row mt-1'>
		<div class='col-sm-12'>
			<center>
			<h4 class='py-2 text-white' style='background-color: #3399ff;'>Kliknij poniżej i sprawdź czego potrzebujemy</h4>
			<center>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-4 mt-2'>
			<center>
				<h1 class='display-6'><small>Towary</small></h1>
			</center>
			<a href='potrzebne.php?kategorie__glowne_id=1'><img src='img/towary.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
		<div class='col-sm-4 mt-2'>
			<center>
				<h1 class='display-6'><small>Usługi</small></h1>
			</center>
			<a href='potrzebne.php?kategorie__glowne_id=2'><img src='img/uslugi.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
		<div class='col-sm-4 mt-2'>
			<center>
				<h1 class='display-6'><small>Zakwaterowanie</small></h1>
			</center> 
			<a href='potrzebne.php?kategorie__glowne_id=3'><img src='img/nocleg.jpg' class='img-fluid mx-auto d-block'></a>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
