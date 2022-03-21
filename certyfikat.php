<?php include("head.php"); ?>
<?php include("nav.php"); ?>
<div class='container-fluid'>
    <div class='row mt-4'>
	    <div>
		    <center>
			    <h4 class='py-2' style='background-color: #3399ff; color: #FFFFFF'>Certyfikat autentyczności</h4>
		    </center>
	    </div>
    </div>
 <div class="row ">
     <div class="col-sm-3"></div>
<?php if (file_exists('img/certyfikat.jpg')) {?>
    <div class="col-sm-6 ">
        <img src="img/certyfikat.jpg" alt="Thumbnail" class='img-fluid mx-auto d-block'>
    </div>
<?php }?>
    <div class="col-sm-3"></div>
 </div>
 <div class="row ">       
    <div class="col-sm-3"></div>
    <div class="col-sm-6 text-center">
      <?php print $settings['certyfikat_text']; ?>
    </div>
    <div class="col-sm-3"></div>
 </div>


</div>
<?php include("footer.php"); ?>
</body>
</html>
