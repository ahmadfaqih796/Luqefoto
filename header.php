<header id="fh5co-header-section" class="sticky-banner">
	<div class="container">
		<div class="nav-header">
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
			<a href="index.php">
				<img src="images/logo/Logo Hitam.png" alt="" style="width: 90px; margin-top: 20px;">
			</a>
			<!-- START #fh5co-menu-wrap -->
			<nav id="fh5co-menu-wrap" role="navigation">
				<ul class="sf-menu" id="fh5co-primary-menu">
					<li><a href="index.php">Fotography</a></li>
					<li>
						<a href="videography.php" class="fh5co-sub-ddown">Videography</a>
					</li>
					<li>
						<a href="paket.php" class="fh5co-sub-ddown">Paket</a>
					</li>
					<li><a href="about.php">About</a></li>
					<!-- <li><a href="#">Package</a>
						<ul class="fh5co-sub-menu">
							<li><a href="#">Menu 1</a></li>
							<li><a href="#">Menu 2</a></li>
							<li><a href="#">Menu 3</a></li>
						</ul>
					</li> -->
					<?php session_start();
					if (isset($_SESSION['nama_user'])) {
					?> <li><a href="order.php">Order</a></li>

						<li>
							<a href="#" class="fh5co-sub-ddown"><?php echo "$_SESSION[nama_user]"; ?></a>
							<ul class="fh5co-sub-menu">
								<li><a href="profil.php">Profil</a></li>
								<li><a href="orderlist.php">OrderList</a></li>
								<li><a href="logout.php">Log Out</a></li>
							</ul>
						</li>
						<li><img src="images/user/<?php echo "$_SESSION[foto]"; ?>" width='50px' height='50px' /></li>
					<?php
					} else {
					?>
						<li><a href="login.php">Order</a></li>
					<?php
					}
					?>
				</ul>
			</nav>
		</div>
	</div>
</header>