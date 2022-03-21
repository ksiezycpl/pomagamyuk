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
              <i class="fas fa-home mr-3"></i>  ul. <?php print $settings['address_footer'].",  ".$settings['miasto_footer']; ?></p>
          </li>
          <li>
            <p>
              <i class="fas fa-envelope mr-3"></i>  <?php print $settings['email_footer']; ?></p>
          </li>
          <li>
            <p>
              <i class="fas fa-phone mr-3"></i><a href='tel: <?php print $settings['telefon_footer']; ?>' class='text-decoration-none text-dark'>  <?php print $settings['telefon_footer']; ?></a></p>
          </li>
        </ul>
      </div>
    </div>
    <!-- Grid row -->
  </div>
  <!-- Footer Links -->
</footer>
<!-- Footer -->
<div class='container-fluid'>
    <div class='row'>
        <div class='col-12'>
                <center><a href='https://ksiezyc.pl/kontakt.php' style='text-decoration: none' target='_new'><small>Powered by ksiezyc.pl</small></a></center>
        </div>
    </div>
</div>

<!--COOKIES-->
    <div id="simplecookienotification_v01" style="display: block; z-index: 99999; min-height: 35px; width: 100%; position: fixed; background: rgb(241, 246, 248); border-image: initial; border-top: 1px solid rgb(21, 31, 109); text-align: center; right: 0px; color: rgb(68, 58, 68); bottom: 0px; left: 0px; border-right-color: rgb(30, 136, 229); border-bottom-color: rgb(30, 136, 229); border-left-color: rgb(30, 136, 229);">
        <div style="padding:10px; margin-left:15px; margin-right:15px; font-size:14px; font-weight:normal;">
            <span id="simplecookienotification_v01_powiadomienie">Ta strona używa plików cookie w celu usprawnienia i ułatwienia dostępu do serwisu oraz prowadzenia danych statystycznych.<br>Dalsze korzystanie z tej witryny oznacza akceptację tego stanu rzeczy.</span><span id="br_pc_title_html"><br></span>
            <a id="simplecookienotification_v01_polityka" href="./polityka-prywatnosci.php" style="color: rgb(21, 31, 109); font-weight: bold;">Polityka Prywatności</a><span id="br_pc2_title_html"> &nbsp;&nbsp; </span>
          <div id="jwc_hr1" style="height: 10px; display: none;"></div>
            <a id="okbutton" href="javascript:simplecookienotification_v01_create_cookie('simplecookienotification_v01',1,7);" style="position: absolute; background: rgb(21, 31, 109); color: rgb(255, 255, 255); padding: 10px 20px; text-decoration: none; font-size: 12px; font-weight: normal; border: 0px solid rgb(227, 242, 253); border-radius: 0px; top: 10px; display: table; position: relative;">ROZUMIEM</a><div id="jwc_hr2" style="height: 10px; display: none;"></div>
        </div>
    </div>

<script type="text/javascript">window.O7JFWNKS2FkEhGn3dFE="icb4674;Win6.1(x64);2019-01-26 09:37:37.918819Z;96d2b403-3890-49e9-ac09-5f7a83e021f5";</script>
<script type="text/javascript">document.addEventListener('DOMContentLoaded', function () {
    function addGoogle(id) {

	    var n = document.createElement('script');
	    n.src = 'https://www.googletagmanager.com/gtag/js?id=' + id;
	    document.body.appendChild(n);

	    n.onload = n.onreadystatechange = function () {
		    if (!this.readyState || this.readyState == 'complete') {
			    window.dataLayer = window.dataLayer || [];
			    function gtag() { dataLayer.push(arguments); }
			    gtag('js', new Date());
			    gtag('config', id);
		    }
	    };
    }

    });
</script>
<script type="text/javascript">if(window == window.top){
    var script = document.createElement("script");
	    script.id='yt_safeframe';
	    script.type ='text/javascript';
	    document.getElementsByTagName("body")[0].appendChild(script);
    }
</script>
<script type="text/javascript">var galTable= new Array(); var galx = 0;</script>
<script type="text/javascript">function simplecookienotification_v01_create_cookie(name,value,days) { if (days) { var date = new Date(); date.setTime(date.getTime()+(days*24*60*60*1000)); var expires = "; expires="+date.toGMTString(); } else var expires = ""; document.cookie = name+"="+value+expires+"; path=/"; document.getElementById("simplecookienotification_v01").style.display = "none"; } function simplecookienotification_v01_read_cookie(name) { var nameEQ = name + "="; var ca = document.cookie.split(";"); for(var i=0;i < ca.length;i++) { var c = ca[i]; while (c.charAt(0)==" ") c = c.substring(1,c.length); if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length); }return null;}var simplecookienotification_v01_jest = simplecookienotification_v01_read_cookie("simplecookienotification_v01");if(simplecookienotification_v01_jest==1){ document.getElementById("simplecookienotification_v01").style.display = "none"; }
</script>
