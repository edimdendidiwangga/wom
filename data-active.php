<?php 
include('config.php');
include('cek-login.php');
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
	<link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	
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
			<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			  <!-- Modal for Edit button -->
    
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Import Database</h4>
					</div>
					<div class="modal-body">
					  <div class="form-group">
               <form class="form-control" name="myForm" id="myForm" onSubmit="return validateForm()" action="index.php" method="post" enctype="multipart/form-data">
    			<input type="file" id="filepegawaiall" name="filepegawaiall" />
  	
			<!--  <input type="checkbox" name="drop" value="1" />  -->
			<br>
			<p>File Harus Berekstensi .xls</p> 
              </div>
          
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 <input class="btn btn-warning" type="submit" name="submit" value="Import" />
					 </form>

					</div>
				  </div>
				</div>
			  </div> 
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
			
			<div class="modal fade" id="export-diterima" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
					<div class="box border pink">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Export Database Interview Diterima</h4>
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
											<form action="laporan-diterima.php" method="POST" class="form-horizontal" role="form">
												<div class="row">
												<label class="col-xs-3">Data Bulan</label>
												  <div class="col-xs-6">
													<input type="text" id="dari2" name="from" class="form-control" required>
														<label for="to">to</label>
														<input type="text" id="ke2" name="to" class="form-control" required>
												  </div>
												</div>
											</div>
										</div>
					 </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 <input class="btn btn-pink" type="submit" name="submit" value="Export" />
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
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.php">Home</a>
										</li>
										
										
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Tabel Kandidat</h3>
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
										<h4><i class="fa "></i><span class="hidden-inline-mobile"></span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
										  <ul class="nav nav-tabs">
											 <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-users"></i> <span class="hidden-inline-mobile">Data resign</span></a></li>
											 <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-laptop"></i> <span class="hidden-inline-mobile">Data active</span></a></li>
										  </ul>
								<div class="tab-content">
								<div class="tab-pane fade in active" id="box_tab1">
											
									<a href="index-step.php" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Data</a>
									<a href="#table-modal" data-toggle="modal" class="btn btn-success"><i class="fa fa-search"></i> Search Data</a>
									<a href="#myModal" data-toggle="modal" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
									<a href="#export-database" data-toggle="modal" class="btn btn-primary"><i class="fa fa-rocket"></i> Export</a>
									
									<table id="example1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>Aksi</th>
													<th>No.</th>
													<th>nama karyawan</th>
													<th>posisi</th>
													<th class="hidden-xs">cabang</th>
													<th>lokasi</th>
													<th class="hidden-xs">nik</th>
													<th>virtual nik</th>
													<th>bu</th>
													<th>hire date</th>
													<th>join date</th>
													<th>gaji pokok</th>
													<th>tunjangan maintenance</th>
													<th>tunjangan jabatan</th>
													<th>tunjangan jaga malam</th>
													<th>tunjangan lain</th>
													<th>thp</th>
													<th>vendor</th>
													<th>tingkat</th>
													<th>jenis</th>
													<th>status</th>
													
												</tr>
											</thead>
											<tbody>
											<?php 
											$query_tampil=mysql_query("SELECT *
										    FROM karyawan 
										    inner join data_karyawan on karyawan.id_karyawan=data_karyawan.id_karyawan
										   /* where data_karyawan.status = '1'*/
										    Order by karyawan.id_karyawan DESC");
											if ($query_tampil === FALSE) {
											    die(mysql_error());
											}
											$no=1;
											while ($data = mysql_fetch_array($query_tampil)) {
											?>
												<tr class="gradeX">
													<td>
												<div class="btn-group dropdown">
											<button class="btn btn-info">
											<i class="fa fa-gear"></i>
											<span class="caret"></span>
											</button>
										  </div>
												</td>
													<td><?php echo $no; ?></td>
													<td><?php echo $data['nama_karyawan']; ?></td>
													<td><?php echo $data['position']; ?></td>
													<td class="hidden-xs"><?php echo $data['nama_cabang']; ?></td>
													<td class="center"><?php echo $data['location']; ?></td>
													<td class="center hidden-xs"><?php echo $data['nik']; ?></td>
													<td><?php echo $data['virtual_nik']; ?></td>
													<td><?php echo $data['bu']; ?></td>
													<td><?php echo $data['hire_date']; ?></td>
													<td><?php echo $data['join_date']; ?></td>
													<td><?php echo $data['gaji_pokok']; ?></td>
													<td><?php echo $data['tun_maintenance']; ?></td>
													<td><?php echo $data['tun_jabatan']; ?></td>
													<td><?php echo $data['tun_jaga_malam']; ?></td>
													<td><?php echo $data['tun_lain']; ?></td>
													<td><?php echo $data['status']; ?></td>
													<td><?php echo ($data['gaji_pokok']+$data['tun_maintenance']+$data['tun_jabatan']+$data['tun_jaga_malam']+$data['tun_lain']); ?></td>
													<td>PT SINAR JERNIH SUKSESINDO</td>
													<td><?php echo $data['education']; ?></td>
													<td><?php echo $data['gender']; ?></td>
												</tr>
												<?php 
												$no++;
												} 
												?>
												
											</tbody>
										
											<tfoot>
												
											</tfoot>
										</table>
									</div>
				
								</div>
								
								<!-- /BOX -->
											 <div class="tab-pane fade" id="box_tab2">
									
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

	<div class="modal fade" id="table-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
							  <div class="modal-content modal-table">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								  <h4 class="modal-title"></h4>
								</div>
								<div class="modal-body">
								 <div class="box border primary">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Search Data</h4>
												<div class="tools hidden-xs">
													<a href="#box-config" data-toggle="modal" class="config">
														<i class="fa fa-cog"></i>
													</a>
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="collapse">
														<i class="fa fa-chevron-up"></i>
													</a>
													
												</div>
											</div>
											<div class="box-body big">
												
												<form action="result.php" method="post" class="form-horizontal" role="form">
												  
												   <div class="form-group">
													<label class="col-sm-4 control-label">Jenis Kelamin</label>
													<div class="col-sm-8">
													  <select class="form-control" name="jenkel" required>
													  <option></option>
													  <option value="Pria">Pria</option>
													  <option value="Wanita">Wanita</option>
													  </select>
													</div>
												  </div>
												  
												  <div class="form-group"> 
													<label class="col-sm-4 control-label">Posisi yang dilamar</label>
													<div class="col-sm-8">
													   <select name="dilamar1" class="form-control" required>
													   <option value="" disabled="" selected="" style="display:none" ;="">Pilih Posisi</option>
													   <?php
													   $query = mysql_query("
										        SELECT * 
										        FROM posisi order by nama_posisi asc");
											while ($cs = mysql_fetch_array($query)) {
											?>
													   <option value="<?php echo $cs['nama_posisi']; ?>"><?php echo $cs['nama_posisi']; ?>
													   
											<?php } ?>		   
													</select>	
													 <select name="sub_posisi" class="form-control">
													   <option value="" disabled="" selected="" style="display:none" ;="">Pilih Sub Posisi</option>
													   <?php
													   $query = mysql_query("
										        SELECT * 
										        FROM sub_posisi order by nama_sub_posisi asc");
											
											
											while ($cs = mysql_fetch_array($query)) {
											?>
													   <option value="<?php echo $cs['nama_sub_posisi']; ?>"><?php echo $cs['nama_sub_posisi']; ?>
													   
											<?php } ?>		   
													</select>	
													</div>
													</div>
													
												  <div class="form-group">
													<label class="col-sm-4 control-label">Pendidikan</label>
													<div class="col-sm-8">
													   <select class="form-control" name="pendidikan" required>
															   <option value="" disabled="" selected="" style="display:none" ;=""></option>
															   <option value="S3">S3</option>
															   <option value="S2">S2</option>
															   <option value="S1">S1</option>
															   <option value="D3">D3</option>
															   <option value="D1">D1</option>
															   <option value="SMK">SMK</option>
															   <option value="SMA">SMA</option>
															   <option value="SMP">SMP</option>
															  
														   </select>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Kabupaten/Kota</label>
													<div class="col-sm-8">
													   <input type="text" name="kota" class="form-control">
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Usia</label>
													<div class="col-sm-8">
													   <select class="form-control" name="usia" required>
															<option value="" disabled="" selected="" style="display:none" ;=""></option>
															<option value="19-25">19-25</option>
															<option value="26-30">26-30</option>
															<option value="30-40">30-40</option>
															<option value="40-99">>= 40</option>
															<option value="10-99">Semua Umur</option>
														</select>
													</div>
				
												  </div>
												   <div class="form-group">
													<label class="col-sm-4 control-label">Data Bulan</label>
													<div class="col-sm-8">
													  <input type="text" id="from" name="from" class="form-control" required>
														<label for="to">to</label>
														<input type="text" id="to" name="to" class="form-control" required>
													</div>
												  </div>
											</div> 
								</div>
								<div class="modal-footer">
								<input type="submit" value="Search" class="btn btn-info">
								<input type="reset" value="Reset" class="btn btn-warning">
								  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
								</form>
							  </div>
							</div>
						  </div>
						<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
						
	<!--/PAGE -->

	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="bootstrap-dist/js/bootstrap.min.js"></script>
	<!-- DATE RANGE PICKER -->
	<script src="js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- FULL CALENDAR -->
	<script type="text/javascript" src="js/fullcalendar/fullcalendar.min.js"></script>
	<!-- TIMEAGO -->
	<script type="text/javascript" src="js/timeago/jquery.timeago.min.js"></script>
	
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
	
	<script src="js/script.js"></script>
	<script type="text/javascript">
            $(document).ready(function() {
    var table = $('#example1').DataTable( {
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            leftColumns: 1,
        }
    } );
} );

    $('#example2').dataTable();

        </script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("dynamic_table");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }

        if(!hasExtension('filepegawaiall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>
	<script>
  $( function() {
    var dateFormat = "yy-mm-dd",
      from = $( "#from" )
        .datepicker({
          dateFormat: "yy-mm-dd",
          changeMonth: true,
          changeYear: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
      	dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    
  } );
  </script>
  <script>
  $( function() {
    var dateFormat = "yy-mm-dd",
      from = $( "#dari" )
        .datepicker({
          dateFormat: "yy-mm-dd",
          changeMonth: true,
          changeYear: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#ke" ).datepicker({
      	dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    
  } );
  </script>
 
</body>
</html>
 