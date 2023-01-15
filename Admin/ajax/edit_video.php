<?php
include '../../class/video.php';
$db = new video();
?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Data Video</h4>
		</div>
		<div class="modal-body">
			<form action="prosesVideo.php?aksi=update" method="post" enctype="multipart/form-data">
				<?php
				foreach ($db->detail($_GET['id']) as $d) {
				?>
					<input type="hidden" name="id" value="<?php echo $d['id'] ?>">
					<div class="col-md-6">
						<label>Judul</label>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="judul video" name="judul" value="<?= $d['judul']; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<label>Link</label>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="link video" name="url" value="<?= $d['url']; ?>">
						</div>
					</div>
					<div class="col-md-12">
						<label>Deskripsi</label>
						<div class="form-group">
							<textarea name="deskripsi" class="form-control" cols="30" rows="7" placeholder="deskripsi video">
								<?= $d['deskripsi']; ?>
							</textarea>
						</div>
					</div>
					<input type="submit" value="Simpan" class="btn btn-success">
		</div>
		<div class="modal-footer">
			<button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
				Cancel
			</button>
		</div>
	<?php } ?>
	</form>
	</div>
</div>
</div>

<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		plugins: [
			"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"table contextmenu directionality emoticons template textcolor paste textcolor "
		],
		toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor code | inserttime preview | forecolor backcolor",
		toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks restoredraft",
		menubar: false,
		toolbar_items_size: 'small',
		image_advtab: true,
		style_formats: [{
				title: 'Bold text',
				inline: 'b'
			},
			{
				title: 'Red text',
				inline: 'span',
				styles: {
					color: '#ff0000'
				}
			},
			{
				title: 'Red header',
				block: 'h1',
				styles: {
					color: '#ff0000'
				}
			},
			{
				title: 'Example 1',
				inline: 'span',
				classes: 'example1'
			},
			{
				title: 'Example 2',
				inline: 'span',
				classes: 'example2'
			},
			{
				title: 'Table styles'
			},
			{
				title: 'Table row 1',
				selector: 'tr',
				classes: 'tablerow1'
			}
		]
	});
</script>