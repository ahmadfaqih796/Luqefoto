<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$peserta = $_SESSION['id_user'];
if(!$peserta){
	header("location:login.php");
}
echo $peserta;
if (isset($peserta)) {
	echo $_GET['id'];
	$koneksi = new mysqli("localhost", "root", "", "luqefoto");
	$tampil_sertifikat = mysqli_query(
		$koneksi,
		"SELECT * from tbl_pesan, tbl_paket, tbl_user 
		WHERE tbl_pesan.id_user=tbl_user.id_user 
		AND tbl_pesan.id_paket=tbl_paket.id_paket 
		AND id_pesan=" . $_GET['id']
	);
	$data = mysqli_fetch_array($tampil_sertifikat);
?>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,maximum-scale=1.0">
		<?php echo "<title>LUQEFOTO_" . $data['id_user'] . "_" . $data['tgl_pesan'] . "</title>" ?>
		<link rel="stylesheet" href="css/tiket.css">
		<style type="text/css" media="print">
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}

			body {
				background-image: none;
			}

			.teks {
				position: absolute;
				top: 32.5%;
				width: 28.6cm;
				height: 100px;
				display: flex;
				align-items: center;
				left: 0.6cm;
			}

			h3 {
				width: 100%;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 24pt;
				position: absolute;
				color: #ffffff;
			}
			h3.text-pesan {
				top: 6%;
			}

			p {
				width: 100%;
				font-family: 'sertifikat';
				color: #000;
				font-weight: 700;
				font-size: 50pt;
				letter-spacing: 1px;
				text-align: center;
			}

			@font-face {
				font-family: sertifikat;
				src: url("AdineKirnberg-Alternate.ttf");
			}

			img {
				display: block;
				width: 29.7cm;
				height: 19cm;
			}

			a,
			.pesan {
				display: none;
			}

			@media print {
				@page {
					size: A4 landscape;
					margin: 1cm;
					width: 29.7cm;
					height: 21cm;
				}
			}
		</style>
	</head>

	<body>
		<page>
			<!-- <img src="../../assets/gambar/sertifikat/Workshop Hack the Game.jpg" alt=""> -->

			<h3><?= $data['nama_user'] ?></h3>
			<h3 class="text-pesan"><?= $data['tgl_pesan'] ?></h3>
		</page>
		<div class="pesan">
			<h2>Gunakan Web Browser Firefox atau Chrome, ukuran kertas A4 dengan orientasi Landscape untuk cetak atau juga
				bisa simpan dengan format PDF dan jika nama tidak muncul di menu print maka tekan cancel lalu pilih cetak
				kembali</h2>
			<a href="javascript:window.print();">Cetak</a>
		</div>
	</body>
<?php
}
?>

</html>