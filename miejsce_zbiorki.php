<?php include_once("head.php"); ?>
<?php include_once("nav.php"); ?>

<div class='container-fluid'>
	<div class='row mt-4'>
		<div>
			<center>
				<h4 class='py-2' style='background-color: #3399ff; color: #FFFFFF'>Miejsce zbiórki i składowania potrzebnych rzeczy</h4>
			</center>
		</div>
	</div>
	<div class='row mt-2'>
            <div class='col-sm-3'></div>
		<div class='col-sm-6'>
                    <center>
			<?php print $settings['miejsce_zbiorki']; ?>
                    </center>
		</div>
            <div class='col-sm-3'></div>

	</div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
