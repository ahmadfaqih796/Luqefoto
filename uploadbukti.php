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
	<title>Wede Official</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

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

			<?php include("header.php") ?>

			<!-- end:header-top -->

			<div id="fh5co-tours" class="fh5co-section-gray">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Upload Bukti Pembayaran</h3>
							<p>Satu langkah lagi untuk liburan anda yang menyenangkan</p>
						</div>
					</div>

					<div class="row animate-box">
						<div class="container grid">
							<div class="row">
								<div class="span5">
									<legend>Upload Bukti Pembayaran</legend>
									</p><br />
									<p>Upload bukti bahwa anda telah melakukan pembayaran. Bukti yang diupload hanya berupa gambar (jpg, png, gif).</p>
									<form action="proses_upload.php?aksi=input" method="post" enctype="multipart/form-data">
										<div class="input-control text" data-role="input-control">
											<p> <input type="hidden" name="id_pesan" value="<?php echo $_GET['id'];  ?>">
												<input type="file" name="file" required>
											</p>
										</div>
										<input type="submit" value="Upload" class="btn btn-primary">
									</form>
									<?php
									$koneksi = new mysqli("localhost", "root", "", "luqefoto");
									$tampil_bukti = mysqli_query(
										$koneksi,
										'SELECT * from tbl_bukti where id_pesan= ' . $_GET['id']
									);
									$data = mysqli_fetch_array($tampil_bukti); ?>
									<?php if (!$data) { ?>
										<img src="images/bukti-pembayaran/no-img.png" alt="kosong" style="width: 300px; margin: 0 auto; display: block;">
									<?php
									} else { ?>
										<img src="images/bukti-pembayaran/<?= $data["file"]; ?>" alt="<?= $data["file"]; ?>" style="width: 300px; margin: 0 auto; display: block;">
									<?php
									} ?>

								</div>
							</div>
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