<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2" style="background-color: #f98b88;">
				<a href="index.html">LUQEFOTO</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					
					<div class="col-xs-4 col-sm-12 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="../images/user/<?= $_SESSION["foto"] ?>" class="img-rounded" alt="Avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<span><?php echo "$_SESSION[nama]"; ?></span>
									</div>
								</a>
								<ul class="dropdown-menu">


									<li>
										<a href="logout.php">
											<i class="fa fa-power-off"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>