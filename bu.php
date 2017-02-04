<?php 
include('config.php');
include('cek-login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>PT WOM DK</title>
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
		<section id="page">
				<?php include 'menu.php';?>
				<!-- /SIDEBAR -->
		<div id="main-content">
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="edit_bu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
					<div class="box border primary">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Edit BU</h4>
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
											<form action="edit_bu.php" method="POST" class="form-horizontal" role="form">
											<input type="hidden" id="id_bu">
												<div class="form-group">
													<label class="col-sm-4 control-label"> BU</label>
													<div class="col-sm-8">
													  <select name="bu" class="form-control" required>
						                               <option id="bu"></option>
						                               <?php
						                               for($i=1;$i<=30;$i++){ ?>
						                                <option value="<?php echo $i; ?>"><?php echo "BU ".$i; ?></option>
						                               <?php } ?>
						                            </select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label">Nama Cabang</label>
													<div class="col-sm-8">
													  <input type="text" id="nama_cabang" name="nama_cabang" class="form-control" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label">User / Pengelola</label>
													<div class="col-sm-8">
													  <select name="id_users" class="form-control" required>
						                               <option value="" id="id_users"></option>
						                               <?php 
															$query = mysql_query("
														        SELECT *
														        FROM users
														        Order by users.id_users ASC");
															if ($query === FALSE) {
															    die(mysql_error());
															}
															$no = 1;
															while ($data = mysql_fetch_array($query)) {
									            		?>
						                                <option value="<?php echo $data['id_users']; ?>"><?php echo $data['nama_users']; ?></option>
						                               <?php } ?>
						                            </select>
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
										<h3 class="content-title pull-left">Tabel Manajemen BU</h3>
									</div>
								</div>
							</div>
						</div>
						<!-- EXPORT TABLES -->
						<div class="row">
							<div class="col-md-12">
							<!-- Tabs -->
								<div class="box border purple">
									<div class="box-title">
										<h4><i class="fa ">Data BU</i><span class="hidden-inline-mobile"></span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
										  <ul class="nav nav-tabs">
											 <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-home"></i> <span class="hidden-inline-home">Data BU</span></a></li>
										  </ul>
								<div class="tab-content">
								<div class="tab-pane fade in active" id="box_tab1">

								<a href="#add-bu" data-toggle="modal" class="btn btn-primary"><i class="fa fa-rocket"></i> Tambah BU</a>
									<table id="example1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>No.</th>
													<th class="center">BU</th>
													<th>NAMA CABANG</th>
													<th>PENGELOLA</th>
													<th class="center">AKSI</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$query_tampil=mysql_query("SELECT * FROM bu INNER JOIN users ON bu.id_users = users.id_users where bu.id_users=".$_SESSION['id_users']."
										    Order by bu.nama_cabang ASC");
											if ($query_tampil === FALSE) {
											    die(mysql_error());
											}
											$no=1;
											while ($data = mysql_fetch_array($query_tampil)) {
											?>
												<tr class="gradeX">
													<td><?php echo $no; ?></td>
													<td class="center"><?php echo "BU ".$data['bu']; ?></td>
													<td><?php echo $data['nama_cabang']; ?></td>
													<td><?php echo $data['nama_users']; ?></td>
													<td class="center"><a id="setting" href="#edit_bu" data-toggle="modal" data-id="<?php echo $data['id_bu']; ?>" data-bu="<?php echo $data['bu']; ?>" data-namacabang="<?php echo $data['nama_cabang']; ?>" data-iduser="<?php echo $data['id_users']; ?>" data-namauser="<?php echo $data['nama_users']; ?>" class="btn btn-info btn-xs"> Edit</a></td>
													
												</tr>
												<?php 
												$no++;
												} 
												?>
											</tbody>
										</table>
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

		<div class="modal fade" id="add-bu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
					<div class="box border primary">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Tambah BU</h4>
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
											<form action="add_bu.php" method="POST" class="form-horizontal" role="form">
												<div class="form-group">
													<label class="col-sm-4 control-label"> BU</label>
													<div class="col-sm-8">
													  <select name="bu" class="form-control" required>
						                               <option value="" disabled="" selected="" style="display:none" ;="">Pilih BU</option>
						                               <?php
						                               for($i=1;$i<=30;$i++){ ?>
						                                <option value="<?php echo $i; ?>"><?php echo "BU ".$i; ?></option>
						                               <?php } ?>
						                            </select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label">Nama Cabang</label>
													<div class="col-sm-8">
													  <input type="text" name="nama_cabang" class="form-control" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label">User / Pengelola</label>
													<div class="col-sm-8">
													  <select name="id_users" class="form-control" required>
						                               <option value="" disabled="" selected="" style="display:none" ;="">Pilih User</option>
						                               <?php 
															$query = mysql_query("
														        SELECT *
														        FROM users
														        Order by users.id_users ASC");
															if ($query === FALSE) {
															    die(mysql_error());
															}
															$no = 1;
															while ($data = mysql_fetch_array($query)) {
									            		?>
						                                <option value="<?php echo $data['id_users']; ?>"><?php echo $data['nama_users']; ?></option>
						                               <?php } ?>
						                            </select>
													</div>
												</div>
					 </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 <input class="btn btn-primary" type="submit" name="submit" value="Simpan" />
					</form>
					</div>
				  </div>
				</div>
			  </div> 

			  
	</section>
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
    	$('#example1').DataTable();
	});
    </script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("dynamic_table");  //Set current page
			App.init(); //Initialise plugins and elements
		});

		 $(document).on("click", "#setting", function () {
     var id_bu = $(this).data('id');
     var bu = $(this).data('bu');
     var nama_cabang = $(this).data('namacabang');
     var id_users = $(this).data('iduser');
     var nama_users = $(this).data('namauser');
     $("#id_bu").val( id_bu );
     $("#bu").val( bu );
     $("#bu").html( "BU "+bu );
     $("#nama_cabang").val( nama_cabang );
     $("#id_users").val( id_users );
     $("#id_users").html( nama_users );
     //reset form_add_gaji
});
	</script>
	
 
</body>
</html>
 