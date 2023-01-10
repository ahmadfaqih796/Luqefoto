<?php
function tampil_konten()
{
	$koneksi = new mysqli("localhost", "root", "", "luqefoto");
	$tampil_konten = mysqli_query(
		$koneksi,
		"SELECT * FROM tbl_konten"
	);
	while ($row = mysqli_fetch_array($tampil_konten)) {
		$hasil[] = $row;
	}
	return $hasil;
}
?>

<link rel="stylesheet" href="../../css/animate.css">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="../../css/icomoon.css">
<!-- Bootstrap  -->
<link rel="stylesheet" href="../../css/bootstrap.css">
<!-- Superfish -->
<link rel="stylesheet" href="../../css/superfish.css">
<!-- Magnific Popup -->
<link rel="stylesheet" href="../../css/magnific-popup.css">
<!-- Date Picker -->
<link rel="stylesheet" href="../../css/bootstrap-datepicker.min.css">
<!-- CS Select -->
<link rel="stylesheet" href="../../css/cs-select.css">
<link rel="stylesheet" href="../../css/cs-skin-border.css">
<script type="text/javascript" src='../js/jquery/jquery-3.4.1.min.js'></script>

<link rel="stylesheet" href="css/style.css">
<script src="../../js/modernizr-2.6.2.min.js"></script>
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Data Galeri</h4>
			</div>
			<div class="modal-body">
				<form action="prosesGaleri.php?aksi=tambah" method="post" enctype="multipart/form-data">
					<div class="col-md-6">
						<div class="form-group">
							<label for="class">Kategori</label>
							<select required name="id_konten">
								<option value="" disabled selected>Pilih</option>
								<?php foreach (tampil_konten() as $x) {
								?>
									<option value="<?= $x['id']; ?>"><?= $x['nama']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Gambar</label>
							<input type="file" class="form-control" name="gambar[]" multiple>
						</div>
					</div>
					<input type="submit" value="Upload" class="btn btn-success">
				</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
					Cancel
				</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../plugins/bootstrap/bootstrap.min.js"></script>
<script src="../plugins/justified-gallery/jquery.justifiedgallery.min.js"></script>
<script src="../plugins/tinymce/tinymce.min.js"></script>
<script src="../plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- Google Map -->