<!--Start Breadcrumb-->
<?php     session_start();
if(empty($_SESSION)){
	header("Location: index.php");
} ?>
<?php 

include '../../class/order.php';

$db= new order();


?>
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li><a href="#">Dashboard</a></li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 1-->
<div id="dashboard-header" class="row">
	<div class="col-xs-10 col-sm-2">
		<h3>Selamat Datang..., Admin</h3>
	</div>
	
	
	</div>
</div>
<!--End Dashboard 1-->
<!--Start Dashboard 2-->
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-upload"></i>
					<span>Bukti Pembayaran yang Ter-Upload</span>

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

								<th>Nama User</th>
		<th>ID Pesan</th>
		<th>Tanda Bukti</th>
		
						</tr>
					</thead>

					<tbody>
	<?php
	$no = 1;
	foreach($db->tampil_bukti() as $x){
	?>
		
					<!-- Start: list_row -->
					</tr>
						<tr>
								<td><?php echo $x['nama_user']; ?></td>
							<td ><?php echo $x['id_pesan']; ?></td>
							<td><a href="../images/<?php echo $x['file'];?>" target="_blank"><img  class="img-rounded" src="../images/<?php echo $x['file']; ?>" alt=""> </a>


							</td>
					

	
						</tr>
						
						    
						
						
					<!-- End: list_row -->
					<?php 
	}


	?>
	
					</tbody>
					<tfoot>
						<tr>
										<th>Nama User</th>
		<th>ID Pesan</th>
		<th>Tanda Bukti</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<!--End Dashboard 2 -->
<div style="height: 40px;"></div>
<script type="text/javascript">
// Array for random data for Sparkline
var sparkline_arr_1 = SparklineTestData();
var sparkline_arr_2 = SparklineTestData();
var sparkline_arr_3 = SparklineTestData();
$(document).ready(function() {
	// Make all JS-activity for dashboard
	DashboardTabChecker();
	// Load Knob plugin and run callback for draw Knob charts for dashboard(tab-servers)
	LoadKnobScripts(DrawKnobDashboard);
	// Load Sparkline plugin and run callback for draw Sparkline charts for dashboard(top of dashboard + plot in tables)
	LoadSparkLineScript(DrawSparklineDashboard);
	// Load Morris plugin and run callback for draw Morris charts for dashboard
	LoadMorrisScripts(MorrisDashboard);
	// Make beauty hover in table
	$("#ticker-table").beautyHover();
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

