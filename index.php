<?php 
include('config.php');
include('cek-login.php');

unset($_SESSION['id_bu']);
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
	
	<!-- PAGE -->
	<section id="page">
				<div id="sidebar" class="sidebar">
					<div class="sidebar-menu nav-collapse">
						<div class="divide-20"></div>
						<!-- SEARCH BAR -->
						<div id="search-bar">
							<input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
						</div>
						<ul>
							
							<li>
								<a href="index.php">
								<i class="fa fa-home fa-fw"></i> <span class="menu-text">Dashboard</span>
								<span class="selected"></span>
								</a>					
							</li>
							<?php if ($_SESSION['level']=="1") { 
								echo'
								<li>
								<a href="bu.php">
								<i class="fa fa-sitemap fa-fw"></i> <span class="menu-text">Manajemen BU</span>
								<span class="selected"></span>
								</a>					
							</li>
							<li>
								<a href="admin.php">
								<i class="fa fa-users fa-fw"></i> <span class="menu-text">Manajemen User</span>
								<span class="selected"></span>
								</a>					
							</li>

						';}?>
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
				<!-- /SIDEBAR -->
		<div id="main-content">
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
										<h3 class="content-title pull-left">Tabel BU</h3>
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
											
									<table id="example1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>No.</th>
													<th class="center">BU</th>
													<th>NAMA CABANG</th>
													<th class="center">Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$query_tampil=mysql_query("SELECT * FROM bu where id_users=".$_SESSION['id_users']."
										    Order by nama_cabang ASC");
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
													<td class="center"><a href="cek-bu.php?id_bu=<?php echo $data['id_bu'];?>" class="btn btn-info btn-xs"> VIEW</a></td>
													
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
	</script>
	
 
</body>
</html>
 