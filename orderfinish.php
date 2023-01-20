<!DOCTYPE html>
<html lang="en">
<?php
session_start();
function rupiah($angka)
{
	$hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
	return $hasil_rupiah;
}
$peserta = $_SESSION['id_user'];
if (!$peserta) {
	header("location:login.php");
}
if (isset($peserta)) {
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
				-webkit-print-color-adjust: exact !important;
				print-color-adjust: exact !important;
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

			p {
				width: 100%;
				font-family: Arial, Helvetica, sans-serif;
				margin-left: -5px;
				color: white;
				position: absolute;
				transform: translate(-50%, -50%);
			}

			p.nama-order {
				top: 39%;
				left: 50%;
				font-size: 16pt;
			}

			p.nama-paket {
				top: 42.5%;
				left: 50%;
				font-size: 16pt;
			}

			p.tgl_pemesanan {
				top: 46%;
				left: 50%;
				font-size: 16pt;
			}

			p.tgl_pemotretan {
				top: 49.5%;
				left: 50%;
				font-size: 16pt;
			}

			p.alamat {
				top: 53.5%;
				left: 50%;
				font-size: 16pt;
			}

			p.total-harga {
				top: 64.8%;
				left: 50%;
				font-size: 16pt;
			}

			p.total-pembayaran {
				top: 70.8%;
				left: 62%;
				color: black;
				font-size: 14pt;
			}

			@font-face {
				font-family: sertifikat;
				src: url("AdineKirnberg-Alternate.ttf");
			}

			img {
				display: block;
				position: absolute;
				z-index: -1;
				width: 100%;
				height: 100%;
			}

			a,
			.pesan {
				display: none;
			}

			@media print {
				@page {
					size: A4 portrait;
					margin: 1cm;
					width: 21cm;
					height: 29.7cm;
				}
			}
		</style>
	</head>

	<body>
		<page>
			<img src="/images/bg-cetak/form-cetak.jpg" alt="Cetak">
			<p class="nama-order">Nama Pemesanan : <?= $data['nama_user'] ?></p>
			<p class="nama-paket">Nama Paket : <?= $data['nama_paket'] ?></p>
			<p class="tgl_pemesanan">Tgl Pemesanan : <?= $data['tgl_pesan'] ?></p>
			<p class="tgl_pemotretan">Tgl Pemotretan : <?= $data['tgl_tour'] ?></p>
			<p class="alamat">Alamat Acara : <?= $data['alamat_acara'] ?></p>
			<p class="total-harga">Total Harga : <?= rupiah($data['harga_paket']) ?></p>
			<p class="total-pembayaran">Total Pembayaran : <?= rupiah($data['harga_paket']) ?></p>
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