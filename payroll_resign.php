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
					<div class="box border green">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Export Data Gaji Karyawan Resign </h4>
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
											<?php
											$que=mysql_query("SELECT nama_cabang
										    FROM bu 
										    where id_bu=".$_SESSION['id_bu']."");
											if ($que === FALSE) {
											    die(mysql_error());
											}
											$data = mysql_fetch_array($que);
											?>
											<form action="laporan_payroll_resign.php" method="POST" class="form-horizontal" role="form">
												<div class="row">
												<label class="col-xs-3">Data Bulan</label>
												  <div class="col-xs-6">dari
													<input type="text" id="seko" name="from" class="form-control">
														<label for="to">ke</label>
														<input type="text" id="tekan" name="to" class="form-control" required>
														<input type="hidden" id="name_cabang" value="<?php echo $data['nama_cabang'];?>" name="name_cabang">
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

			  <div class="modal fade" id="export-periode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
					<div class="box border blue">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Export Data Gaji Karyawan Resign Per Periode </h4>
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
											<?php
											$que=mysql_query("SELECT nama_cabang
										    FROM bu 
										    where id_bu=".$_SESSION['id_bu']."");
											if ($que === FALSE) {
											    die(mysql_error());
											}
											$data = mysql_fetch_array($que);
											?>
											<form action="laporan_payroll_periode_resign.php" method="POST" class="form-horizontal" role="form">
												<h4>Tekan Tombol Export untuk download ke excel!</h4>
											<input type="hidden" id="periode_bln" name="periode">
											<input type="hidden" id="name_cabang" value="<?php echo $data['nama_cabang'];?>" name="name_cabang">
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
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.php">Home</a>
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Data Gaji Karyawan Resign WOM Cab <?php echo $data['nama_cabang'];?>
										</h3>
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
										<h4 id="tbl_jdl"><i class="fa "></i><span class="hidden-inline-mobile"></span>Data Gaji Terbaru</h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
										  <ul class="nav nav-tabs">
											 <li id="boxs-periode"><a href="#box_tab2" data-toggle="tab"><i class="fa fa-laptop"></i> <span class="hidden-inline-mobile span-periode">Data Gaji Per Periode</span></a></li>
											 <li class="active" id="boxs-terbaru"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-laptop"></i> <span class="hidden-inline-mobile">Data Gaji Terbaru</span></a></li>
										  </ul>
								<div class="tab-content">
								<div class="tab-pane fade in active" id="box_tab1">
									<a href="#export-database" data-toggle="modal" class="btn btn-success"><i class="fa fa-rocket"></i> Export Excel</a>
									<div id="content_gaji">
									<table id="example1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>NO.</th>
													<th>NAMA KARYAWAN</th>
													<th>POSISI</th>
													<th>Jobs Class</th>
													<th class="hidden-xs">CABANG</th>
													<th>MARITAL STATUS</th>
													<th class="hidden-xs">NIK</th>
													<th>VIRTUAL NIK</th>
													<th>BU</th>
													<th>STATUS</th>
													<th>JOIN DATE</th>
													<th>HARI KERJA</th>
													<th>UMP <?php echo date("Y");?></th>
													<th>GAJI POKOK BARU</th>
													<th>TUNJANGAN MAINTENANCE</th>
													<th>TUNJANGAN JABATAN</th>
													<th>TUNJANGAN JAGA MALAM</th>
													<th>TUNJANGAN LAIN</th>
													<th>TOTAL KOMPOSISI GAJI</th>
													<th>GAJI RAPEL</th>
													<th>OVERTIME</th>
													<th>ORGANIZATION NAME</th>
													<th>JENIS KELAMIN</th>
													<th>HIRE DATE</th>
													<th>CABANG INDUK</th>
													<th>NO BPJS TK</th>
													<th>NO BPJS KES</th>
													<th>PERIODE</th>
													<th>AKSI</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$query_tampil=mysql_query("SELECT karyawan.id_karyawan, karyawan.nama_karyawan, data_karyawan.position, data_karyawan.job_class, bu.nama_cabang, karyawan.marital_status, data_karyawan.nik, data_karyawan.virtual_nik, bu.bu, data_karyawan.status,  data_karyawan.org_name, karyawan.gender, data_karyawan.hire_date, data_karyawan.cabang_induk, data_karyawan.bpjs_ketenagakerjaan, data_karyawan.bpjs_kesehatan, data_karyawan.id_bu, contract.join1, gaji.*
										    FROM gaji 
										    inner join data_karyawan on gaji.id_karyawan = data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										    inner join karyawan on gaji.update_gaji= karyawan.update_gaji
										    inner join contract on contract.id_karyawan = karyawan.id_karyawan
										   where data_karyawan.status = '2' && data_karyawan.id_bu=".$_SESSION['id_bu']." 
										    Order by karyawan.id_karyawan ASC");
											if ($query_tampil === FALSE) {
											    die(mysql_error());
											}
											$no=1;
											while ($data = mysql_fetch_array($query_tampil)) {
											?>
												<tr class="gradeX" id="karyawan_<?php echo $data['id_karyawan']; ?>">
													<td><?php echo $no; ?></td>
													<td><?php echo $data['nama_karyawan']; ?></td>
													<td><?php echo $data['position']; ?></td>
													<td class="hidden-xs"><?php echo $data['job_class']; ?></td>
													<td class="center"><?php echo $data['nama_cabang']; ?></td>
													<td class="center hidden-xs"><?php echo $data['marital_status']; ?></td>
													<td><?php echo $data['nik']; ?></td>
													<td><?php echo $data['virtual_nik']; ?></td>
													<td><?php echo "BU ".$data['bu']; ?></td>
													<td><?php if($data['status']=="1"){echo"Active";}if($data['status']=="2"){echo"Non Active";}?></td>
													<td><?php echo $data['join1']; ?></td>
													<td><?php echo $data['kehadiran']; ?></td>
													<td><?php echo $data['ump']; ?></td>
													<td><?php echo $data['gaji_pokok']; ?></td>
													<td><?php echo $data['tun_maintenance']; ?></td>
													<td><?php echo $data['tun_jabatan']; ?></td>
													<td><?php echo $data['tun_jaga_malam']; ?></td>
													<td><?php echo $data['tun_lain']; ?></td>
													<td><?php echo ($data['gaji_pokok']+$data['tun_maintenance']+$data['tun_jabatan']+$data['tun_jaga_malam']+$data['tun_lain']); ?></td>
													<td><?php echo $data['rapel']; ?></td>
													<td><?php echo $data['overtime']; ?></td>
													<td><?php echo $data['org_name']; ?></td>
													<td><?php echo $data['gender']; ?></td>
													<td><?php echo $data['hire_date']; ?></td>
													<td><?php echo $data['cabang_induk']; ?></td>
													<td><?php echo $data['bpjs_ketenagakerjaan']; ?></td>
													<td><?php echo $data['bpjs_kesehatan']; ?></td>
													<td><?php echo $data['periode_gaji']; ?></td>
													<td><button id="setting" data-target="#open" data-toggle="modal" data-idgaji="<?php echo $data['id_gaji']; ?>" data-id="<?php echo $data['id_karyawan']; ?>" data-nama="<?php echo $data['nama_karyawan']; ?>" data-nik="<?php echo $data['nik']; ?>" data-kehadiran="<?php echo $data['kehadiran']; ?>" data-ump="<?php echo $data['ump']; ?>" data-gapok="<?php echo $data['gaji_pokok']; ?>" data-maintenance="<?php echo $data['tun_maintenance']; ?>" data-jabatan="<?php echo $data['tun_jabatan']; ?>" data-jalam="<?php echo $data['tun_jaga_malam']; ?>" data-lain="<?php echo $data['tun_lain']; ?>" data-insentive="<?php echo $data['insentive']; ?>" data-overtime="<?php echo $data['overtime']; ?>" data-rapel="<?php echo $data['rapel']; ?>" data-periode="<?php echo $data['periode_gaji']; ?>" class="btn btn-info btn-sm"><i class="fa fa-gear"></i></button></td>
												</tr>
												<?php 
												$no++;
												} 
												?>
												</tbody>
											<tfoot>
												<tr>
													<th>NO.</th>
													<th>NAMA KARYAWAN</th>
													<th>POSISI</th>
													<th>Jobs Class</th>
													<th class="hidden-xs">CABANG</th>
													<th>MARITAL STATUS</th>
													<th class="hidden-xs">NIK</th>
													<th>VIRTUAL NIK</th>
													<th>BU</th>
													<th>STATUS</th>
													<th>JOIN DATE</th>
													<th>HARI KERJA</th>
													<th>UMP <?php echo date("Y");?></th>
													<th>GAJI POKOK BARU</th>
													<th>TUNJANGAN MAINTENANCE</th>
													<th>TUNJANGAN JABATAN</th>
													<th>TUNJANGAN JAGA MALAM</th>
													<th>TUNJANGAN LAIN</th>
													<th>TOTAL KOMPOSISI GAJI</th>
													<th>GAJI RAPEL</th>
													<th>OVERTIME</th>
													<th>ORGANIZATION NAME</th>
													<th>JENIS KELAMIN</th>
													<th>HIRE DATE</th>
													<th>CABANG INDUK</th>
													<th>NO BPJS TK</th>
													<th>NO BPJS KES</th>
													<th>PERIODE</th>
													<th>AKSI</th>
												</tr>
											</tfoot>
										</table>
											
										</div>
									</div>
									<div class="tab-pane fade box-periode" id="box_tab2">
									
									</div>
									<div class="tab-pane fade box-result" id="box_tab3">
									
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
					  <h4 class="modal-title">Form Tambah Gaji</h4>
					</div>
					<div class="modal-body">
					<div class="form-horizontal form_add_gaji">
												   <div class="form-group">
													<label class="col-sm-4 control-label">Nama Karyawan</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control nama" disabled>
													</div>
													<div class="col-sm-3">
													  <input type="text" class="form-control enik" disabled>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Hari Kerja</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control" id="kehadiran" name="kehadiran" placeholder="Isikan hari kerja" required>
													  <span class="error_kehadiran" style="opacity:1; color: red; display: none;">Hari Kerja Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">UMP <?php echo date("Y");?></label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="ump" name="ump" placeholder="Isikan UMP Terbaru" required>
													  <span class="error_ump" style="opacity:1; color: red; display: none;">UMP Tidak Boleh Kosong!</span>
													</div>
												  </div>
												   <div class="form-group">
													<label class="col-sm-4 control-label">Gaji Pokok</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="Rp" required>
													  <span class="error_gaji_pokok" style="opacity:1; color: red; display: none;">Gaji Pokok Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Tunjangan Maintenance</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="tun_maintenance" name="tun_maintenance" placeholder="Rp" required>
													  <span class="error_tun_maintenance" style="opacity:1; color: red; display: none;">Tunjangan Maintenance Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Tunjangan Jabatan</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="tun_jabatan" name="tun_jabatan" placeholder="Rp" required>
													  <span class="error_tun_jabatan" style="opacity:1; color: red; display: none;">Tunjangan Jabatan Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Tunjangan Jaga Malam</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="tun_jaga_malam" name="tun_jaga_malam" placeholder="Rp" required>
													  <span class="error_tun_jaga_malam" style="opacity:1; color: red; display: none;">Tunjangan Jaga Malam Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Tunjangan Lain</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="tun_lain" name="tun_lain" placeholder="Rp" required>
													  <span class="error_tun_lain" style="opacity:1; color: red; display: none;">Tunjangan Lain Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label"> Insentive</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="insentive" name="insentive" placeholder="Rp" required>
													   <span class="error_insentive" style="opacity:1; color: red; display: none;">Insentive Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Overtime </label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="overtime" name="overtime" placeholder="Rp" required>
													  <span class="error_overtime" style="opacity:1; color: red; display: none;">Overtime Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label"> Rapel</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="rapel" name="rapel" placeholder="Rp" required>
													  <span class="error_rapel" style="opacity:1; color: red; display: none;">Rapel Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label"> Periode Gaji</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" name="periode_gaji" id="periode_gaji" placeholder="Isikan Periode Gaji" required>
													  <span class="error_periode_gaji" style="opacity:1; color: red; display: none;">Periode Gaji Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label"></label>
													<div class="col-sm-8">
													<input type="hidden" id="input-res-id">
													<button type="submit" id="sbt-gaji" class="btn btn-success">Simpan</button>
													</div>
												  </div>
								</div>
								<div class="form-horizontal form_edit_gaji" style="display: none;">
								<div class="form-group">
													<label class="col-sm-4 control-label">Nama Karyawan</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control nama" disabled>
													</div>
													<div class="col-sm-3">
													  <input type="text" class="form-control enik" disabled>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Hari Kerja</label>
													<div class="col-sm-5">
													  <input type="text" class="form-control" id="kehadiran_ed" name="kehadiran" placeholder="Isikan hari kerja" required>
													  <span class="error_kehadiran" style="opacity:1; color: red; display: none;">Hari Kerja Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">UMP <?php echo date("Y");?></label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="ump_ed" name="ump" placeholder="Isikan UMP Terbaru" required>
													  <span class="error_ump" style="opacity:1; color: red; display: none;">UMP Tidak Boleh Kosong!</span>
													</div>
												  </div>
												   <div class="form-group">
													<label class="col-sm-4 control-label">Gaji Pokok</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="gaji_pokok_ed" name="gaji_pokok" placeholder="Rp" required>
													  <span class="error_gaji_pokok" style="opacity:1; color: red; display: none;">Gaji Pokok Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Tunjangan Maintenance</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="tun_maintenance_ed" name="tun_maintenance" placeholder="Rp" required>
													  <span class="error_tun_maintenance" style="opacity:1; color: red; display: none;">Tunjangan Maintenance Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Tunjangan Jabatan</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="tun_jabatan_ed" name="tun_jabatan" placeholder="Rp" required>
													  <span class="error_tun_jabatan" style="opacity:1; color: red; display: none;">Tunjangan Jabatan Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Tunjangan Jaga Malam</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="tun_jaga_malam_ed" name="tun_jaga_malam" placeholder="Rp" required>
													  <span class="error_tun_jaga_malam" style="opacity:1; color: red; display: none;">Tunjangan Jaga Malam Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Tunjangan Lain</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="tun_lain_ed" name="tun_lain" placeholder="Rp" required>
													  <span class="error_tun_lain" style="opacity:1; color: red; display: none;">Tunjangan Lain Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label"> Insentive</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="insentive_ed" name="insentive" placeholder="Rp" required>
													   <span class="error_insentive" style="opacity:1; color: red; display: none;">Insentive Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label">Overtime </label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="overtime_ed" name="overtime" placeholder="Rp" required>
													  <span class="error_overtime" style="opacity:1; color: red; display: none;">Overtime Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label"> Rapel</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" id="rapel_ed" name="rapel" placeholder="Rp" required>
													  <span class="error_rapel" style="opacity:1; color: red; display: none;">Rapel Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label"> Periode Gaji</label>
													<div class="col-sm-8">
													  <input type="text" class="form-control" name="periode_gaji" id="periode_gaji_ed" placeholder="Isikan Periode Gaji" required>
													  <span class="error_periode_gaji" style="opacity:1; color: red; display: none;">Periode Gaji Tidak Boleh Kosong!</span>
													</div>
												  </div>
												  <div class="form-group">
													<label class="col-sm-4 control-label"></label>
													<div class="col-sm-8">
													<input type="hidden" id="input-gaj-id">
													<input type="hidden" id="input-kyn-id">
													<button type="submit" id="sbt_edit_gaji" class="btn btn-info">Simpan</button>
													</div>
												  </div>				  
										</div>
								</div>
								<div class="modal-footer">
								<button id="btn-gaji" type="button" class="btn btn-success">Tambah Gaji</button>
								<button id="btn-edit" type="button" class="btn btn-info">Edit</button>
								<!-- <a id="btn-hapus" class="btn btn-danger" style="display: none;">Delete</a> -->
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
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
	<script src="js/app_payroll_resign.js"></script>
	<script src="js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("dynamic_table");  
			App.init();
		});
	</script>
	 
</body>
</html>