<!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4 mt-4"  style='background-color: #ffa500;'>
  <!-- Footer Links -->
  <div class="container text-center text-md-left">
    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-6 col-lg-6 mr-auto my-md-4 my-0 mt-4 mb-1">
        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mb-4">Zapraszamy do biura</h5>
        <p>Wszelkich informacji dowiecie się<br>na miejscu lub telefonicznie.</p>
        <p>Za wszelką pomoc bardzo dziękujemy<br>w imieniu całego zespołu <?php print $settings['page_name']; ?></p>
      </div>
      <!-- Grid column -->
      <div class="col-md-6 col-lg-6 mx-auto my-md-4 my-0 mt-4 mb-1">
        <!-- Contact details -->
        <h5 class="font-weight-bold text-uppercase mb-4">Adres</h5>
        <ul class="list-unstyled">
          <li>
            <p>
              <i class="fas fa-home mr-3"></i> ul. <?php print $settings['address_footer'].",  ".$settings['miasto_footer']; ?></p>
          </li>
          <li>
            <p>
              <i class="fas fa-envelope mr-3"></i> <?php print $settings['email_footer']; ?></p>
          </li>
          <li>
            <p>
              <i class="fas fa-phone mr-3"></i><a href='tel: <?php print $settings['telefon_footer']; ?>' class='text-decoration-none text-dark'> <?php print $settings['telefon_footer']; ?></a></p>
          </li>
        </ul>
      </div>
    </div>
    <!-- Grid row -->
  </div>
  <!-- Footer Links -->
</footer>
<!-- Footer -->
<div class="container-fluid">
	<div class='row'>
		<div class='col-12'>
			<center><a href='https://ksiezyc.pl/kontakt.php' style='text-decoration: none' target='_new'><small>Powered by ksiezyc.pl</small></a></center>
		</div>
	</div>
</div>