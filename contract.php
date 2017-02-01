<?php 
include('config.php');
include('cek-login.php');
if (!isset($_SESSION['id_bu']) ) {
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>PT SJS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="js/hubspot-messenger/css/messenger.min.css" />
	<link rel="stylesheet" type="text/css" href="css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="css/responsive.css" >
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- JQUERY UI-->
	<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css" />
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="css/animatecss/animate.min.css" />
	<!-- DATE RANGE PICKER -->
	<!-- <link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" /> -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- DATA TABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css" />
	<!-- <link rel="stylesheet" type="text/css"  href="bootstrap-dist/css/bootstrap.min.css">  -->
	<!-- FONTS -->
	<link rel="stylesheet" type="text/css" href="js/hubspot-messenger/css/messenger.min.css" />
	<link rel="stylesheet" type="text/css" href="js/hubspot-messenger/css/messenger-theme-flat.min.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
   <style type="text/css">
     th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
   li.hov a:hover {background-color: #fbcc42 !important;}
   </style>

</head>
<body>
	<?php include 'header.php';?>
	<!-- PAGE -->
	<section id="page">
				<?php include 'menu.php';?>
		<div id="main-content">
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="export-database" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
					<div class="box border primary">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Export Database</h4>
												<div class="tools hidden-xs">
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="collapse">
														<i class="fa fa-chevron-up"></i>
													</a>
												</div>
											</div>
											<div class="box-body big">
											<form action="laporan-database.php" method="POST" class="form-horizontal" role="form">
												<div class="row">
												<label class="col-xs-3">Data Bulan</label>
												  <div class="col-xs-6">
													<input type="text" id="dari" name="from" class="form-control" required>
														<label for="to">to</label>
														<input type="text" id="ke" name="to" class="form-control" required>
												  </div>
												</div>
											</div>
										</div>
					 </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 <input class="btn btn-primary" type="submit" name="submit" value="Export" />
					</form>
					</div>
				  </div>
				</div>
			  </div> 
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="export-pengiriman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
					<div class="box border green">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Export Database Interview Pengiriman</h4>
												<div class="tools hidden-xs">
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="collapse">
														<i class="fa fa-chevron-up"></i>
													</a>
												</div>
											</div>
											<div class="box-body big">
											<form action="laporan-menunggu.php" method="POST" class="form-horizontal" role="form">
												<div class="row">
												<label class="col-xs-3">Data Bulan</label>
												  <div class="col-xs-6">
													<input type="text" id="dari1" name="from" class="form-control" required>
														<label for="to">to</label>
														<input type="text" id="ke1" name="to" class="form-control" required>
												  </div>
												</div>
											</div>
										</div>
					 </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 <input class="btn btn-success" type="submit" name="submit" value="Export" />
					</form>
					</div>
				  </div>
				</div>
			  </div>
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.php">Home</a>
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Data Contract Karyawan WOM Cab 
										<?php 
											$que=mysql_query("SELECT nama_cabang
										    FROM bu 
										    where id_bu=".$_SESSION['id_bu']."");
											if ($que === FALSE) {
											    die(mysql_error());
											}
											$data = mysql_fetch_array($que);
											echo $data['nama_cabang'];
											?>
										</h3>
									</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DATA TABLES -->
						
						<!-- EXPORT TABLES -->
						<div class="row">
							<div class="col-md-12">
							<!-- Tabs -->
								<div class="box border purple">
									<div class="box-title">
										<h4 id="tbl_jdl"><i class="fa "></i><span class="hidden-inline-mobile"></span>Data Contract Karyawan</h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
										  <ul class="nav nav-tabs">
											 <li id="boxs-resign"><a href="#box_tab2" data-toggle="tab"><i class="fa fa-users"></i> <span class="hidden-inline-mobile">Data Contract Resign</span></a></li>
											 <li class="active" id="boxs-active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-laptop"></i> <span class="hidden-inline-mobile">Data Contract Active</span></a></li>
										  </ul>
								<div class="tab-content">
								<div class="tab-pane fade in active" id="box_tab1">
									<a href="#export-database" data-toggle="modal" class="btn btn-primary"><i class="fa fa-rocket"></i> Export</a>
									<div id="content-karyawan">
									<table id="example1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th rowspan="2">NO.</th>
													<th rowspan="2">NAMA KARYAWAN</th>
													<th rowspan="2">POSISI</th>
													<th rowspan="2" class="hidden-xs">CABANG</th>
													<th rowspan="2">LOKASI</th>
													<th rowspan="2" class="hidden-xs">NIK</th>
													<th rowspan="2">VIRTUAL NIK</th>
													<th rowspan="2">BU</th>
													<th colspan="3" class="center">PMK 1</th>
													<th colspan="3" class="center">PMK 2</th>
													<th colspan="3" class="center">PMK 3</th>
													<th colspan="3" class="center">PMK 4</th>
													<th colspan="3" class="center">PMK 5</th>
													<th colspan="3" class="center">PMK 6</th>
													<th colspan="3" class="center">PMK 7</th>
													<th colspan="3" class="center">PMK 8</th>
													<th colspan="3" class="center">PMK 9</th>
													<th colspan="3" class="center">PMK 10</th>
													<th colspan="3" class="center">PMK 11</th>
													<th colspan="3" class="center">PMK 12</th>
													<th colspan="3" class="center">PMK 13</th>
													<th colspan="3" class="center">PMK 14</th>
													<th colspan="3" class="center">PMK 15</th>
													<th rowspan="2">Aksi</th>
												</tr>
												<tr>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>

												</tr>
											</thead>
											<tbody>
											<?php 
											$query=mysql_query("SELECT karyawan.id_karyawan, karyawan.nama_karyawan, data_karyawan.position, bu.nama_cabang, data_karyawan.location, data_karyawan.nik, data_karyawan.virtual_nik, bu.bu, data_karyawan.status, data_karyawan.id_bu, contract.*
										    FROM contract 
										    inner join karyawan on karyawan.id_karyawan = contract.id_karyawan
										    inner join data_karyawan on karyawan.id_karyawan = data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										    
										   where data_karyawan.status = '1' && data_karyawan.id_bu=".$_SESSION['id_bu']." 
										   group by karyawan.nama_karyawan, data_karyawan.nik, data_karyawan.virtual_nik
										    Order by karyawan.id_karyawan DESC");

											if ($query === FALSE) {
											    die(mysql_error());
											}
											
											$no=1;
											while ($data = mysql_fetch_array($query)) {
												
											?>
												<tr class="gradeX" id="karyawan_<?php echo $data['id_karyawan']; ?>">
													<td><?php echo $no; ?></td>
													<td><?php echo $data['nama_karyawan']; ?></td>
													<td><?php echo $data['position']; ?></td>
													<td class="hidden-xs"><?php echo $data['nama_cabang']; ?></td>
													<td class="center"><?php echo $data['location']; ?></td>
													<td class="center hidden-xs"><?php echo $data['nik']; ?></td>
													<td><?php echo $data['virtual_nik']; ?></td>
													<td><?php echo "BU ".$data['bu']; ?></td>         
													<td><?php echo $data['join1']; ?></td>
													<td><?php echo $data['end1']; ?></td>
													<td><?php echo $data['no_pkwt1']; ?></td> 
													<td><?php echo $data['join2']; ?></td>
													<td><?php echo $data['end2']; ?></td>
													<td><?php echo $data['no_pkwt2']; ?></td> 
													<td><?php echo $data['join3']; ?></td>
													<td><?php echo $data['end3']; ?></td>
													<td><?php echo $data['no_pkwt3']; ?></td>
													<td><?php echo $data['join4']; ?></td>
													<td><?php echo $data['end4']; ?></td>
													<td><?php echo $data['no_pkwt4']; ?></td>
													<td><?php echo $data['join5']; ?></td>
													<td><?php echo $data['end5']; ?></td>
													<td><?php echo $data['no_pkwt5']; ?></td>
													<td><?php echo $data['join6']; ?></td>
													<td><?php echo $data['end6']; ?></td>
													<td><?php echo $data['no_pkwt6']; ?></td>
													<td><?php echo $data['join7']; ?></td>
													<td><?php echo $data['end7']; ?></td>
													<td><?php echo $data['no_pkwt7']; ?></td>
													<td><?php echo $data['join8']; ?></td>
													<td><?php echo $data['end8']; ?></td>
													<td><?php echo $data['no_pkwt8']; ?></td>
													<td><?php echo $data['join9']; ?></td>
													<td><?php echo $data['end9']; ?></td>
													<td><?php echo $data['no_pkwt9']; ?></td>
													<td><?php echo $data['join10']; ?></td>
													<td><?php echo $data['end10']; ?></td>
													<td><?php echo $data['no_pkwt10']; ?></td>
													<td><?php echo $data['join11']; ?></td>
													<td><?php echo $data['end11']; ?></td>
													<td><?php echo $data['no_pkwt11']; ?></td>
													<td><?php echo $data['join12']; ?></td>
													<td><?php echo $data['end12']; ?></td>
													<td><?php echo $data['no_pkwt12']; ?></td>
													<td><?php echo $data['join13']; ?></td>
													<td><?php echo $data['end13']; ?></td>
													<td><?php echo $data['no_pkwt13']; ?></td>
													<td><?php echo $data['join14']; ?></td>
													<td><?php echo $data['end14']; ?></td>
													<td><?php echo $data['no_pkwt14']; ?></td>
													<td><?php echo $data['join15']; ?></td>
													<td><?php echo $data['end15']; ?></td>
													<td><?php echo $data['no_pkwt15']; ?></td>
													
													<td><button id="setting" data-target="#open" data-toggle="modal" data-id="<?php echo $data['id_karyawan']; ?>" data-nama="<?php echo $data['nama_karyawan']; ?>" data-nik="<?php echo $data['nik']; ?>" class="btn btn-info btn-sm"><i class="fa fa-gear"></i></button></td>
												</tr>
												<?php 
												$no++;
												} 
												?>
											</tbody>
											<tfoot>
												<tr>
													<th rowspan="2">NO.</th>
													<th rowspan="2">NAMA KARYAWAN</th>
													<th rowspan="2">POSISI</th>
													<th rowspan="2" class="hidden-xs">CABANG</th>
													<th rowspan="2">LOKASI</th>
													<th rowspan="2" class="hidden-xs">NIK</th>
													<th rowspan="2">VIRTUAL NIK</th>
													<th rowspan="2">BU</th>
													<th colspan="3" class="center">PMK 1</th>
													<th colspan="3" class="center">PMK 2</th>
													<th colspan="3" class="center">PMK 3</th>
													<th colspan="3" class="center">PMK 4</th>
													<th colspan="3" class="center">PMK 5</th>
													<th colspan="3" class="center">PMK 6</th>
													<th colspan="3" class="center">PMK 7</th>
													<th colspan="3" class="center">PMK 8</th>
													<th colspan="3" class="center">PMK 9</th>
													<th colspan="3" class="center">PMK 10</th>
													<th colspan="3" class="center">PMK 11</th>
													<th colspan="3" class="center">PMK 12</th>
													<th colspan="3" class="center">PMK 13</th>
													<th colspan="3" class="center">PMK 14</th>
													<th colspan="3" class="center">PMK 15</th>
													<th rowspan="2">Aksi</th>
												</tr>
												<tr>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
												</tr>
											</tfoot>
										</table>
										</div>
									</div>
								<!-- /BOX -->
									<div class="tab-pane fade box-resign" id="box_tab2">
									
									</div>
									</div>
								<!-- /BOX -->
											 </div>
										  </div>
									   </div>
									</div>
								</div>
								<!-- /Tabs -->
							</div>
						</div>
						<!-- /EXPORT TABLES -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
		</div>
	</section>

	<div class="modal fade" id="open" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Form Update Contract</h4>
					</div>
					<div class="modal-body">
					<div class="form-horizontal">
												   <div class="form-group">
													<label class="col-sm-4 control-label">Nama Karyawan</label>
													<div class="col-sm-8">
													  <input type="text" id="nama_karyawan" class="form-control" disabled>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">PKWT</label>
													<div class="col-sm-8">
													  <select name="pkwt" id="pkwt" class="form-control" required>
															 <option value="" disabled="" selected="" style="display:none" ;="">Pilih PKWT</option>
															 <?php
															 for($i=1;$i<=15;$i++){ ?>
															 	<option value="<?php echo $i; ?>"><?php echo "PKWT ".$i; ?></option>
															 <?php } ?>
														</select>
													  <div class="error-pkwt" style="opacity:1; color: red;display: none;">PKWT Tidak boleh kosong</div>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">NO PKWT</label>
													<div class="col-sm-8">
													  <input type="text" id="no_pkwt" name="no_pkwt" class="form-control" placeholder="Isikan NO PKWT">
													  <div class="error-nopkwt" style="opacity:1; color: red; display: none;">No PKWT Harus Diisi</div>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Start Date</label>
													<div class="col-sm-8">
													  <input type="text" name="start_date" id="start_date" class="form-control" placeholder="Isikan Tgl Awal Kontrak">
													  <div class="error-start" style="opacity:1; color: red; display: none;">Tgl Awal Kontrak Harus Diisi</div>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">End Date</label>
													<div class="col-sm-8">
													  <input type="text" name="start_date" id="end_date" class="form-control" placeholder="Isikan Tgl Awal Kontrak">
													  <div class="error-end" style="opacity:1; color: red; display: none;">Tgl Akhir Kontrak Harus Diisi</div>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label"></label>
													<div class="col-sm-8">
													<input type="hidden" id="input-res-id">
													<button type="submit" id="sbt-contract" class="btn btn-info">UPDATE</button>
													</div>
												  </div>
										</div>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							</div>
						  </div>
	<!-- JQUERY -->
	<script src="js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="bootstrap-dist/js/bootstrap.min.js"></script>
	<!-- DATE RANGE PICKER -->
	<!-- <script src="js/bootstrap-daterangepicker/moment.min.js"></script>
	<script src="js/bootstrap-daterangepicker/daterangepicker.min.js"></script> -->
	<!-- FULL CALENDAR -->
	<!-- <script type="text/javascript" src="js/fullcalendar/fullcalendar.min.js"></script> -->
	<!-- TIMEAGO -->
	<!-- <script type="text/javascript" src="js/timeago/jquery.timeago.min.js"></script> -->
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- DATA TABLES -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
	<!-- COOKIE -->
	<!-- HUBSPOT MESSENGER -->
	<script type="text/javascript" src="js/hubspot-messenger/js/messenger.min.js"></script>
	<script type="text/javascript" src="js/hubspot-messenger/js/messenger-theme-flat.js"></script>
	<script type="text/javascript" src="js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<link rel="stylesheet" type="text/css" href="js/hubspot-messenger/css/messenger.min.css" />
	<link rel="stylesheet" type="text/css" href="js/hubspot-messenger/css/messenger-theme-flat.min.css" />
	<script src="js/app_contract.js"></script>
	<script src="js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("dynamic_table");  //Set current page
			App.init(); //Initialise plugins and elements
		});

	</script>
	
</body>
</html>