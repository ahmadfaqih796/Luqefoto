<?php     session_start();
if(empty($_SESSION)){
	header("Location: index.php");
} ?>
<?php 

include '../../class/wisata.php';

$db= new wisata();


?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a    href="ajax/edit_member.php">Member</a></li>
			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-usd"></i>
					<span>Member</span>

				</div>
				<div class="box-icons">
				<a href="#"  data-target="#ModalAdd" data-toggle="modal"><button type="button" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Data"><b class="glyphicon glyphicon-plus"></b></button></a>
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
	<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">

					<thead>
					
						<tr>

		<th>ID</th>
		<th>Pemotretan</th>
		<th>Keterangan</th>
		<th>Gambar</th>
		<th>Opsi</th>
		
						</tr>
					</thead>

					<tbody>
									<?php
	$no = 1;
	foreach($db->tampil_data() as $x){
	?>
		
					<!-- Start: list_row -->
					</tr>
						<tr>
							<td ><?php echo $x['id']; ?></td>
							<td><?php echo $x['nama']; ?></td>
		<td><?php echo $x['konten']; ?></td>
				<td><img class="img-rounded" src="../images/<?php echo $x['gambar']; ?>" alt=""></td>
							
		
		<td>
			

			  <a href="#" class='btn btn-warning open_modal' id='<?php echo $x['id']; ?>'><span class="glyphicon glyphicon-pencil"></span></a>
			      <a href="#" onclick="confirm_modal('prosesWisata.php?id=<?php echo $x['id']; ?>&aksi=hapus');"><button type="button" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Data"><i class="fa fa-trash-o"></i></button></a>
		</td>
						</tr>
						
						    
						
						
					<!-- End: list_row -->
					<?php 
	}


	?>
	
					</tbody>
					<tfoot>
						<tr>
									
		<th>ID</th>
		<th>Pemotretan</th>
		<th>Keterangan</th>
		<th>Gambar</th>
		<th>Opsi</th>
						</tr>
					</tfoot>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>

 <?php include ('../modal/modal_delete.php');
 include ('../modal/modal_tambah_wisata.php');


 ?>

<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>

        <div id="ModalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>

        
        <script type="text/javascript">
            $(document).ready(function (){
                $(".open_modal").click(function (e){
                    var m = $(this).attr("id");
                    $.ajax({
                        url: "ajax/edit_wisata.php",
                        type: "GET",
                        data : {id: m,},
                        success: function (ajaxData){
                            $("#ModalEdit").html(ajaxData);
                            $("#ModalEdit").modal('show',{backdrop: 'true'});
                        }
                    });
                });
            });
        </script>



<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
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
