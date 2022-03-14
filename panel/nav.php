	<nav class='navbar navbar-expand-md bg-white'>
		<div class='container'>
			<a class='navbar-brand' href='index.php'>
				<!--<img src='./img/flaga-640.jpg' class='img-fluid'>-->
			</a>
			<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#collapsibleNavbar'>
				<span class='navbar-toggler-icon'>
					<i class='fa fa-bars' style='color:#999; font-size:28px;'></i>
				</span>
			</button>
			<div class='collapse navbar-collapse' id='collapsibleNavbar'>
				<ul class='navbar-nav'>
					<li class='nav-item'>
						<a class='nav-link text-dark px-3' href='index.php'><i class='far fa-address-card'></i> Home</a>
					</li>
				<!--
					<li class='nav-item'>
						<a class='nav-link text-dark px-3' href='index.php'><i class='far fa-edit'></i></a>
					</li>
					<li class='nav-item'>
						<a class='nav-link text-dark px-3' href='firmy.php'><i class='fas fa-chart-line'></i></a>
					</li>  
					<li class='nav-item'>
						<a class='nav-link text-dark px-3' href='kontakt.php'><i class="fas fa-phone"></i></i></a>
					</li> 
				-->
					
					<li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle text-dark px-3' href='#' role='button' data-bs-toggle='dropdown'><i class="fas fa-external-link"></i> Potrzebne są</a>
						<ul class='dropdown-menu'>
							<li><a class='dropdown-item px-3' href='potrzebne.php?kategorie__glowne_id=1'> Towary</a></li>
							<li><a class='dropdown-item px-3' href='potrzebne.php?kategorie__glowne_id=2'> Usługi</a></li>
							<li><a class='dropdown-item px-3' href='potrzebne.php?kategorie__glowne_id=3'> Zakwaterowanie</a></li>
						</ul>
					</li>
					
					
					<li class='nav-item'>
						<a class='nav-link text-dark px-3' href='log_logout.php'><i class="fas fa-phone"></i></i> Wyloguj</a>
					</li> 
				</ul>
			</div>
			<!--<h4 class='display-6'><small>tel. 601 235 456</small></h4>-->
		</div>
	</nav>
