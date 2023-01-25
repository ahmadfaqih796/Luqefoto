<?php

include 'class/combo.php';

$pw = new combo();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LUQEFOTO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="website luqefoto" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="Apriyanto" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">

	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<div id="fh5co-wrapper">
		<div id="fh5co-page">
			<?php include("header.php");
			$user = "$_SESSION[id_user]";
			if (!$user) {
				header("location:login.php");
			}
			?>
			<!-- end:header-top -->
			<div class="fh5co-hero">
				<div class="fh5co"></div>
				<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/coverOrder.jpg);">
					<div class="desc">
						<div class="container">
							<div class="row">
								<div class="col-sm-5 col-md-5">
									<div class="tabulation animate-box">
										<!-- Nav tabs -->
										<!-- Tab panes -->
									</div>
								</div>
								<div class="desc2 animate-box">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="fh5co-tours" class="fh5co-section-gray">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Order</h3>
							<p>Lengkapi Form Berikut</p>
						</div>
					</div>

					<form action="proses.php?aksi=tambah_order" method="post" enctype="multipart/form-data">
						<div class="row animate-box">
							<div class="col-md-6">
								<h3 class="section-title">Ketentuan Pemesanan</h3>
								<ul class="section-title">
									<li>Jika ada perubahan paket atau tanggal pemotretan silahkan hubungi contact person kami yang ada di website.</li>
									<li>Pembatalan acara dapat dilakukan 7 hari sebelum tanggal pemotretan, biaya yang telah ditransfer akan di kembalikan dengan potongan 20% dari total biaya dan harus melakukan konfirmasi terdahulu melalui contact person kami.</li>
								</ul><br>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Nama</label>
										<div class="form-group">
											<input type="hidden" name="id_user" value="<?php echo "$_SESSION[id_user]"; ?>" class="form-control" readonly>
											<input type="text" name="nama_user" value="<?php echo "$_SESSION[nama_user]"; ?>" class="form-control" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<label>Pilih Paket Foto</label>
										<div class="form-group">
											<select name="id_paket" class="form-control" required>
												<option value="">--Pilih Paket Pemotretan-</option>
												<?php
												$a = 1;
												foreach ($pw->tampil_paket() as $x) : $a++ ?>
													<option value="<?php echo $x['id_paket'] ?>"><?php echo $x['nama_paket'] ?>
													</option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="input-field">
											<label for="date-start">Tgl Pemotretan</label>
											<input type="text" class="form-control" id="date-start" name="tgl_tour" required/>
										</div>
									</div>

									<div class="col-md-6">
										<label>Tgl Pemesanan</label>
										<div class="form-group">
											<input type="date" name="tgl_pesan" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
										</div>
									</div>

									<div class="col-md-6">
										<label>Alamat Acara</label>
										<div class="form-group">
											<input type="text" name="alamat_acara"  class="form-control" required>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<input type="submit" value="Lanjut" class="btn btn-primary">
										</div>
									</div>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- fh5co-blog-section -->

	<?php include("footer.php") ?>



	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	<script src="js/classie.js"></script>
	<script src="js/selectFx.js"></script>

	<!-- Main JS -->
	<script src="js/main.js"></script>

</body>

</html>