<?php session_start();
if (empty($_SESSION)) {
	header("Location: index.php");
} ?>
<?php
include '../../class/acara.php';
$db = new acara();
?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Cek Transaksi</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-upload"></i>
					<span>Status Transaksi </span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th>Tanggal Acara</th>
                     <th>Tempat Acara</th>
                     <th>Nama</th>
                     <th>Paket</th>
                     <th>Status</th>
						</tr>
					</thead>
					<tbody>
						<!-- Start: list_row -->
						<?php
						$no = 1;
						foreach ($db->tampil_acara() as $x) {
							$now = date("Y-m-d");
						?>
							<tr>
								<td><?php echo $x['tgl_tour']; ?></td>
								<td><?php echo $x['alamat_acara']; ?></td>
								<td><?php echo $x['nama_user']; ?></td>
								<td><?php echo $x['nama_paket']; ?></td>
								<td><?= $x['status'] === "S2" ? "Lunas" : "Belum Lunas"; ?></td>
							</tr>
						<?php
						}


						?>
						<!-- End: list_row -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include('../modal/modal_delete.php');
?>
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="ModalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
			$.ajax({
				url: "ajax/edit_transaksi.php",
				type: "GET",
				data: {
					id_pesan: m,
				},
				success: function(ajaxData) {
					$("#ModalEdit").html(ajaxData);
					$("#ModalEdit").modal('show', {
						backdrop: 'true'
					});
				}
			});
		});
	});
</script>
<script type="text/javascript">
	// Run Datables plugin and create 3 variants of settings
	function AllTables() {
		TestTable1();
		TestTable2();
		TestTable3();
		LoadSelect2Script(MakeSelect2);
	}

	function MakeSelect2() {
		$('select').select2();
		$('.dataTables_filter').each(function() {
			$(this).find('label input[type=text]').attr('placeholder', 'Search');
		});
	}
	$(document).ready(function() {
		// Load Datatables and run plugin on tables 
		LoadDataTablesScripts(AllTables);
		// Add Drag-n-Drop feature
		WinMove();
	});
</script>