<?php 
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
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="css/responsive.css" >
	
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="js/select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="js/uniform/css/uniform.default.min.css" />
	<!-- WIZARD -->
	<link rel="stylesheet" type="text/css" href="js/bootstrap-wizard/wizard.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<!-- DROPZONE -->
	<link rel="stylesheet" type="text/css" href="js/dropzone/dropzone.min.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <!-- select bootstrap -->
	  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
      <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

	  <link rel="stylesheet" href="bootstrap-dist/css/bootstrap-select.min.css" />
      <script src="bootstrap-dist/js/bootstrap-select.min.js"></script>

		
	  <script type="text/javascript" src="jquery.js"></script>
      
      <script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#bu").change(function(){
    var bu = $("#bu").val();
    $.ajax({
        url: "ambilcabang.php",
        data: "bu="+bu,
        cache: false,
        success: function(msg){
            $("#cabang").html(msg);
        }
    });
  });
 
});

</script>
</head>

<body>

	<!-- HEADER -->
	<?php include 'header.php'; ?>
	<!--/HEADER -->
	
	<!-- PAGE -->
	<section id="page">
				<?php include 'menu.php'; ?>
				<!-- /SIDEBAR -->
		<div id="main-content">
			<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Box Settings</h4>
					</div>
					<div class="modal-body">
					  Here goes box setting content.
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
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
										<li>
											<a href="#">Tambah Data Karyawan</a>
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Form Tambah Data Karyawan</h3>
									</div>
									<div class="description">Form Wizard and Validations</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- SAMPLE -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border red" id="formWizard">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>Form Wizard - <span class="stepHeader">Step 1 of 3</h4>
										<div class="tools hidden-xs">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											
										</div>
									</div>
									<div class="box-body form">
										<form id="wizForm" action="insert.php" class="form-horizontal" method="POST" data-toggle="validator" role="form">
										<input type="hidden" name="approval" value="t1">
										<div class="wizard-form">
										   <div class="wizard-content">
											  <ul class="nav nav-pills nav-justified steps">
												 <li>
													<a href="#biodata" data-toggle="tab" class="wiz-step">
													<span class="step-number">1</span>
													<span class="step-name"><i class="fa fa-check"></i> Isi Bidodata </span>   
													</a>
												 </li>

												 <li>
													<a href="#data-karyawan" data-toggle="tab" class="wiz-step active">
													<span class="step-number">2</span>
													<span class="step-name"><i class="fa fa-check"></i>Data Karyawan</span>   
													</a>
												 </li>
												 <li>
													<a href="#lain" data-toggle="tab" class="wiz-step active">
													<span class="step-number">3</span>
													<span class="step-name"><i class="fa fa-check"></i> Lain-lain</span>   
													</a>
												 </li>
												 
											  </ul>
											  <div id="bar" class="progress progress-striped progress-sm active" role="progressbar">
												 <div class="progress-bar progress-bar-warning"></div>
											  </div>
											  <div class="tab-content">
												 <div class="alert alert-danger display-none">
													<a class="close" aria-hidden="true" href="#" data-dismiss="alert">×</a>
													Your form has errors. Please correct them to proceed.
												 </div>
												 <div class="alert alert-success display-none">
													<a class="close" aria-hidden="true" href="#" data-dismiss="alert">×</a>
													Your form validation is successful!
												 </div>
												 <div class="tab-pane active" id="biodata">
												 <div class="form-group">
													   <label class="control-label col-md-3">Nama Karyawan<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="nama_karyawan" placeholder="Isikan Nama Lengkap" required>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Religion<span class="required">*</span></label>
													   <div class="col-md-4">
														  <select name="religion" class="form-control" required>
															 <option value="" disabled="" selected="" style="display:none" ;="">Pilih Agama</option>
															 <option value="Islam">Islam</option>
															 <option value="Kristen Protestan">Kristen Protestan</option>
															 <option value="Katolik">Katolik</option>
															 <option value="Hindu">Hindu</option>
															 <option value="Hindu">Buddha</option>
															 <option value="Kong Hu Cu">Kong Hu Cu</option>
															</select>
														  <span class="error-span"></span>
													   </div>
												</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Birthplace<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="birthplace" placeholder="Isikan Tempat Lahir" required/>
														  <span class="error-span"></span>
													   </div>
													</div>
													
													<div class="form-group">
													   <label class="control-label col-md-3">Birthdate<span class="required">*</span></label>
													   <div class="col-md-4">
														<input  class="form-control datepicker" name="birthdate" type="text" placeholder="Isikan Tgl Lahir" id="datelhr" required>
														</div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">ID Type<span class="required">*</span></label>
													   <div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="id_type" id="ktp" value="1" data-title="KTP" class="uniform" checked="checked" />
															 KTP
															 </label>
														</div>
														<div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="id_type" id="sim" value="2" data-title="SIM" class="uniform"/>
															 SIM
															 </label>	
															 
													   </div>
													
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3" id="lbl_num">ID Number (KTP)<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="id_number" id="id_num" placeholder="Isikan ID Number (KTP)" required/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Education<span class="required">*</span></label>
													   <div class="col-md-4">
														  <select name="education" class="form-control" required>
															 <option value="" disabled="" selected="" style="display:none" ;="">Pilih Pendidikan Terakhir</option>
															 <option value="SD">SD</option>
															 <option value="SMP">SMP</option>
															 <option value="SMK">MA</option>
															 <option value="SMA">SMA</option>
															 <option value="SMK">SMK</option>
															 <option value="SMK">SMU</option>
															 <option value="D1">D1</option>
															 <option value="D3">D3</option>
															 <option value="D3">D4</option>
															 <option value="S1">S1</option>
															 <option value="S1">S2</option>
															 <option value="S1">S3</option>
															</select>
														  <span class="error-span"></span>
													   </div>
												</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Gender<span class="required">*</span></label>
													   <div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="gender" value="L" data-title="Male" class="uniform" checked="checked" />
															 Pria
															 </label>
														</div>
														<div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="gender" value="P" data-title="Female" class="uniform"/>
															 Wanita
															 </label>	
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Home Phone</label>
													   <div class="col-md-4">
														<input  class="form-control" name="home_phone" type="text" placeholder="Isikan No Telp Rumah" >
														</div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Mobile Phone<span class="required">*</span></label>
													   <div class="col-md-4">
														<input  class="form-control" name="mobile_phone" type="text" placeholder="Isikan No Handphone" required>
														</div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Freshgraduate<span class="required">*</span></label>
													   <div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="freshgraduate" value="1" data-title="Freshgraduate" class="uniform" checked="checked" />
															 Freshgraduate
															 </label>
															 </div>
															  <div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="freshgraduate" value="2" data-title="Non Freshgraduate" class="uniform"/>
															 Non Freshgraduate
															 </label>	
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Financial<span class="required">*</span></label>
													   <div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="financial" value="1" data-title="Male" class="uniform" checked="checked" />
															 Financial
															 </label>
														</div>
														<div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="financial" value="2" data-title="Female" class="uniform"/>
															 Non Financial
															 </label>	
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Permanent Address<span class="required">*</span></label>
													   <div class="col-md-4">
														<textarea class="form-control" name="permanent_address"  placeholder="Isikan Alamat sesuai KTP" rows="5" required></textarea>   
														</div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Domisili Address<span class="required">*</span></label>
													   <div class="col-md-4">
														<textarea class="form-control" name="domisili_address"  placeholder="Isikan Alamat Domisili" rows="5" required></textarea> 
														</div>
													</div>
								
												</div>

												 <div class="tab-pane" id="data-karyawan">
													<div class="form-group">
													   <label class="control-label col-md-3">NIK<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="nik" placeholder="Isikan NIK" required>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Virtual NIK<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="virtual_nik" placeholder="Isikan Virtual NIK" required>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">NPWP</label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="npwp" placeholder="Isikan No NPWP" >
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Hire Date<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="hire_date" placeholder="Isikan Tgl Perekrutan" id="hire_date" required>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Posisi / Jabatan<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="position" placeholder="Isikan Posisi/Jabatan" required>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Job Class<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="job_class" placeholder="Isikan Job Class" required>
														  <span class="error-span"></span>
													   </div>
													</div>
													<?php 
											$que=mysql_query("SELECT nama_cabang
										    FROM bu 
										    where id_bu=".$_SESSION['id_bu']."");
											if ($que === FALSE) {
											    die(mysql_error());
											}
											$data = mysql_fetch_array($que);

											?>
													<div class="form-group">
													   <label class="control-label col-md-3">BU</label>
													   <div class="col-md-4">
													   	<input type="text" class="form-control" value="<?php echo "BU ".$_SESSION['id_bu']; ?>" disabled>
													   	<input type="hidden" class="form-control" name="id_bu" value="<?php echo $_SESSION['id_bu']; ?>" >
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Cabang</label>
													   <div class="col-md-4">
													   	<input type="text" class="form-control" value="<?php echo $data['nama_cabang'];?>" disabled>
														  <span class="error-span"></span>
													   </div>
													</div>
												
													<div class="form-group">
													   <label class="control-label col-md-3">Location<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="location" placeholder="Isikan Lokasi" required>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Cabang Induk</label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="cabang_induk" placeholder="Isikan Cabang Induk" >
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Organisasi Name</label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="org_name" placeholder="Isikan Nama Organisasi" >
														  <span class="error-span"></span>
													   </div>
													</div>
													
													<div class="form-group">
													   <label class="control-label col-md-3">Jaminan<span class="required">*</span></label>
													   <div class="col-md-4">
														  <select id="jamin" name="jaminan" class="form-control" required>
															 <option value="" disabled="" selected="" style="display:none" ;="">Pilih Jaminan</option>
															 <option value="1">Ijazah</option>
															 <option value="2">BPKB</option>
															 <option value="3">Ijazah+BPKB</option>
															</select>
														  <span class="error-span"></span>
													   </div>
												</div>
													<div class="form-group">
													   <label class="control-label col-md-3">No Jaminan<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" id="ijazah" name="no_ijazah" placeholder="Isikan No Jaminan Ijazah" required/>
														  <input type="text" class="form-control" id="bpkb" name="no_bpkb" placeholder="Isikan No Jaminan BPKB" required/>
														  
														  <span class="error-span"></span>
													   </div>
													</div>
													
													<div class="form-group">
													   <label class="control-label col-md-3">Kartu BPJS Ketenagakerjaan<span class="required">*</span></label>
													   <div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="kartu_ketenagakerjaan" value="1" data-title="BARU" class="uniform" checked="checked" />
															 BARU
															 </label>
														</div>
														<div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="kartu_ketenagakerjaan" value="2" data-title="LANJUT" class="uniform"/>
															 LANJUT
															 </label>	
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">No BPJS Ketenagakerjaan<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="bpjs_ketenagakerjaan" placeholder="Isikan No BPJS Ketenagakerjaan" required/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Kartu BPJS Kesehatan<span class="required">*</span></label>
													   <div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="kartu_kesehatan" value="1" data-title="BARU" class="uniform" checked="checked" />
															 BARU
															 </label>
														</div>
														<div class="col-md-2">
															 <label class="radio">
																<input type="radio" name="kartu_kesehatan" value="2" data-title="LANJUT" class="uniform"/>
															 LANJUT
															 </label>	
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">No BPJS Kesehatan<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="bpjs_kesehatan" placeholder="Isikan No BPJS Kesehatan" required/>
														  <span class="error-span"></span>
													   </div>
													</div>
													
													<div class="form-group">
													   <label class="control-label col-md-3">Keterangan<span class="required">*</span></label>
													   <div class="col-md-4">
														<textarea class="form-control" name="ket"  placeholder="Isikan Keterangan" rows="5" required></textarea> 
														</div>
													</div>	
												 </div>
												 <div class="tab-pane" id="lain">
												 <div class="col-md-6">
												 <div class="box border orange">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Data Family</h4>
												<div class="tools hidden-xs">
												</div>
											</div>
											<div class="box-body big">
												<div class="form-group">
													   <label class="control-label col-md-4">Mother Name<span class="required">*</span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="mother_name" placeholder="Isikan Nama Ibu" required/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group">
													   <label class="control-label col-md-4">Marital Status<span class="required">*</span></label>
													   <div class="col-md-8">
														<select id="marital" name="marital_status" class="form-control" required>
															 <option value="" disabled="" selected="" style="display:none" ;="">Pilih Status Perkawinan</option>
															 <option value="TK">TK</option>
															 <option value="K0">K0</option>
															 <option value="K1">K1</option>
															 <option value="K2">K2</option>
															 <option value="K3">K3</option>
														</select>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group" id="spouse">
													   <label class="control-label col-md-4">Spouse Name<span class="required">*</span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="spouse_name" placeholder="Isikan Nama Pasangan" required/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group" id="spouse_birth"> 
													   <label class="control-label col-md-4">Spouse Birthdate<span class="required">*</span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="spouse_birthdate" id="spouse_birthdate" placeholder="Isikan Tgl Lahir Pasangan" required/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group" id="child1">
													   <label class="control-label col-md-4">Chile Name 1<span class="required"></span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="chile1_name" placeholder="Isikan nama anak 1"/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group" id="child1_birth">
													   <label class="control-label col-md-4">Chile Birthdate 1<span class="required"></span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="chile1_birthdate" id="chile1_birthdate" placeholder="Isikan Nama Anak 1"/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group" id="child2">
													   <label class="control-label col-md-4">Chile Name 2<span class="required"></span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="chile2_name" placeholder="Isikan nama anak 2"/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group" id="child2_birth">
													   <label class="control-label col-md-4">Chile Birthdate 2<span class="required"></span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="chile2_birthdate" id="chile2_birthdate" placeholder="Isikan Nama Anak 2"/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group" id="child3">
													   <label class="control-label col-md-4">Chile Name 3<span class="required"></span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="chile3_name" placeholder="Isikan nama anak 3"/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group" id="child3_birth">
													   <label class="control-label col-md-4">Chile Birthdate 3<span class="required"></span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="chile3_birthdate" id="chile3_birthdate" placeholder="Isikan Nama Anak 3"/>
														  <span class="error-span"></span>
													   </div>
												</div>
											</div>
										</div>
										</div>
										<div class="col-md-6">
												 <div class="box border blue">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Contract</h4>
												<div class="tools hidden-xs">
												</div>
											</div>
											<div class="box-body big">
												<div class="form-group">
													   <label class="control-label col-md-4">No PKWT<span class="required">*</span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="no_pkwt" placeholder="Isikan No PKWT" required/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group">
													   <label class="control-label col-md-4">Join Date<span class="required">*</span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="join_date" id="join_date" placeholder="Isikan Tgl Awal Kontrak" required/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group">
													   <label class="control-label col-md-4">End Date<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="end_date" id="end_date" placeholder="Isikan Tgl Akhir Kontrak" required/>
														  <span class="error-span"></span>
													   </div>
												</div>
												
										</div>
										</div>
										</div>
										<div class="col-md-6">
												 <div class="box border green">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Rekening</h4>
												<div class="tools hidden-xs">
												</div>
											</div>
											<div class="box-body big">
												<div class="form-group">
													   <label class="control-label col-md-4">Atas Nama<span class="required">*</span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="atas_nama" placeholder="Isikan Atas Nama Rekening" required/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group">
													   <label class="control-label col-md-4">Nama Bank<span class="required">*</span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="nama_bank" placeholder="Isikan Nama Bank" required/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group">
													   <label class="control-label col-md-4">No Rekening<span class="required">*</span></label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="no_rek" placeholder="Isikan No Rekening" required/>
														  <span class="error-span"></span>
													   </div>
												</div>
												
										</div>
										</div>
										</div>
										<div class="col-md-6">
												 <div class="box border red">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Mutasi</h4>
												<div class="tools hidden-xs">
												</div>
											</div>
											<div class="box-body big">
												<div class="form-group">
													   <label class="control-label col-md-4">Mutasi Dari</label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="mutasi_dari" placeholder="Isikan  Mutasi Dari"/>
														  <span class="error-span"></span>
													   </div>
												</div>
												<div class="form-group">
													   <label class="control-label col-md-4">Mutasi Ke</label>
													   <div class="col-md-8">
														  <input type="text" class="form-control" name="mutasi_ke" placeholder="Isikan Mutasi Ke"/>
														  <span class="error-span"></span>
													   </div>
												</div>
												
										</div>
										</div>
										</div>
												</div>
												 <div class="tab-pane" id="submit">
													<h3 class="block">Submit account details</h3>
													<h4 class="form-section">Account Information</h4>
													<div class="well">
														<div class="form-group">
														   <label class="control-label col-md-3">Email:</label>
														   <div class="col-md-4">
															  <p class="form-control-static" data-display="email"></p>
														   </div>
														</div>
														<div class="form-group">
														   <label class="control-label col-md-3">Fullname:</label>
														   <div class="col-md-4">
															  <p class="form-control-static" data-display="fullname"></p>
														   </div>
														</div>
														<div class="form-group">
														   <label class="control-label col-md-3">Gender:</label>
														   <div class="col-md-4">
															  <p class="form-control-static" data-display="gender"></p>
														   </div>
														</div>
														<div class="form-group">
														   <label class="control-label col-md-3">Phone:</label>
														   <div class="col-md-4">
															  <p class="form-control-static" data-display="phone"></p>
														   </div>
														</div>
														<div class="form-group">
														   <label class="control-label col-md-3">Address:</label>
														   <div class="col-md-4">
															  <p class="form-control-static" data-display="address"></p>
														   </div>
														</div>
														<div class="form-group">
														   <label class="control-label col-md-3">Country:</label>
														   <div class="col-md-4">
															  <p class="form-control-static" data-display="country"></p>
														   </div>
														</div>
													</div>
													<h4 class="form-section">Payment Information</h4>
													<div class="well">														
														<div class="form-group">
														   <label class="control-label col-md-3">Card Number:</label>
														   <div class="col-md-4">
															  <p class="form-control-static" data-display="card_number"></p>
														   </div>
														</div>
														<div class="form-group">
														   <label class="control-label col-md-3">CVC:</label>
														   <div class="col-md-4">
															  <p class="form-control-static" data-display="card_cvc"></p>
														   </div>
														</div>
														<div class="form-group">
														   <label class="control-label col-md-3">Expiration:</label>
														   <div class="col-md-4">
															  <p class="form-control-static" data-display="card_expiry_date"></p>
														   </div>
														</div>
														<div class="form-group">
														   <label class="control-label col-md-3">Card Holder Name:</label>
														   <div class="col-md-4">
															  <p class="form-control-static" data-display="card_name"></p>
														   </div>
														</div>
													</div>
												 </div>
											  </div>
										   </div>
										   <div class="wizard-buttons">
											  <div class="row">
												 <div class="col-md-12">
													<div class="col-md-offset-3 col-md-9">
													   <a href="javascript:;" class="btn btn-default prevBtn">
														<i class="fa fa-arrow-circle-left"></i> Back 
													   </a>
													   <a href="javascript:;" class="btn btn-primary nextBtn">
														Continue <i class="fa fa-arrow-circle-right"></i>
													   </a>

													   <input type="hidden" name="id_kandidat" value="1">
														<input class="btn btn-success submitBtn" type="submit" name="submit" value="Simpan" /> 
													                            
													</div>
												 </div>
											  </div>
										   </div>
										</div>
									 </form>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /SAMPLE -->
						<div class="footer-tools">
							<span class="go-top">
								 Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
		</div>
	</section>
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
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- SELECT2 -->
	<script type="text/javascript" src="js/select2/select2.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="js/uniform/jquery.uniform.min.js"></script>
	<!-- WIZARD -->
	<script src="js/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<!-- WIZARD -->
	<script src="js/jquery-validate/jquery.validate.min.js"></script>
	<script src="js/jquery-validate/additional-methods.min.js"></script>
	<!-- BOOTBOX -->
	<script type="text/javascript" src="js/bootbox/bootbox.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- MARKDOWN -->
	<script type="text/javascript" src="js/bootstrap-markdown/js/markdown.js"></script>
	<script type="text/javascript" src="js/bootstrap-markdown/js/to-markdown.js"></script>
	<script type="text/javascript" src="js/bootstrap-markdown/js/bootstrap-markdown.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="js/script.js"></script>
	<script src="js/bootstrap-wizard/form-wizard.min.js"></script>
	
    <script>
        $(function() {
            $( "#datelhr" ).datepicker({
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,
      yearRange: '1950:2026',
      dateFormat: "dd-M-yy"
    });
          $( "#hire_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-M-yy"
    });
          $( "#spouse_birthdate" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-M-yy"
    });
          $( "#chile1_birthdate" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-M-yy"
    });
          $( "#chile2_birthdate" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-M-yy"
    });
          $( "#chile3_birthdate" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-M-yy"
    });
          $( "#join_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-M-yy"
    });
           $( "#end_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-M-yy"
    });
        });
    </script>
    <script>
		jQuery(document).ready(function() {		
			App.setPage("wizards_validations");  //Set current page
			App.init(); //Initialise plugins and elements
			FormWizard.init();
		});
	</script>
	<!-- DROPZONE -->
	<script type="text/javascript" src="js/dropzone/dropzone.min.js"></script>
	
	<script>
		jQuery(document).ready(function() {		
			App.setPage("dropzone_file_upload");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
	 <script type="text/javascript">
	$(function(){
  var ktp = $("#ktp"),
      sim = $("#sim"),
      lbl_num = $("#lbl_num"),
      id_num = $("#id_num");
     
  ktp.change(function () { // listen for change - not click
    if( this.checked ) { // use the "raw" DOM property `checked`
      lbl_num.html("ID Number (KTP)");
  	  id_num.attr("placeholder", "Isikan ID Number (KTP)");
  	 
  }
      });
  sim.change(function () { // listen for change - not click
    if( this.checked ) { // use the "raw" DOM property `checked`
      lbl_num.html("ID Number (SIM)");
  	  id_num.attr("placeholder", "Isikan ID Number (SIM)");
  	 
  }
      });

  var jamin = $("#jamin"),
      ijazah = $("#ijazah"),
      bpkb = $("#bpkb");
  jamin.change(function () { // listen for change - not click
   var jaminan = jamin.val();
    if(jaminan == "1"){
    	ijazah.fadeIn();
    	bpkb.fadeOut();
    	
    }
    if(jaminan == "2"){
    	ijazah.fadeOut();
    	bpkb.fadeIn();
    	
    }
    if(jaminan == "3"){
    	ijazah.fadeIn();
    	bpkb.fadeIn();
    }
    
    });
  var marital = $("#marital"),
      spouse = $("#spouse"),
      spouse_birth = $("#spouse_birth"),
      child1 = $("#child1"),
      child1_birth = $("#child1_birth"),
      child2 = $("#child2"),
      child2_birth = $("#child2_birth"),
      child3 = $("#child3"),
      child3_birth = $("#child3_birth");
     
  marital.change(function () { // listen for change - not click
      var kawin = marital.val();
    if(kawin == "TK"){
    	spouse.fadeOut();
    	spouse_birth.fadeOut();
    	child1.fadeOut();
    	child1_birth.fadeOut();
    	child2.fadeOut();
    	child2_birth.fadeOut();
    	child3.fadeOut();
    	child3_birth.fadeOut();
    }
    if(kawin == "K0"){
    	spouse.fadeIn();
    	spouse_birth.fadeIn();
    	child1.fadeOut();
    	child1_birth.fadeOut();
    	child2.fadeOut();
    	child2_birth.fadeOut();
    	child3.fadeOut();
    	child3_birth.fadeOut();
    }
    if(kawin == "K1"){
    	spouse.fadeIn();
    	spouse_birth.fadeIn();
    	child1.fadeIn();
    	child1_birth.fadeIn();
    	child2.fadeOut();
    	child2_birth.fadeOut();
    	child3.fadeOut();
    	child3_birth.fadeOut();
    }
    if(kawin == "K2"){
    	spouse.fadeIn();
    	spouse_birth.fadeIn();
    	child1.fadeIn();
    	child1_birth.fadeIn();
    	child2.fadeIn();
    	child2_birth.fadeIn();
    	child3.fadeOut();
    	child3_birth.fadeOut();
    }
    if(kawin == "K3"){
    	spouse.fadeIn();
    	spouse_birth.fadeIn();
    	child1.fadeIn();
    	child1_birth.fadeIn();
    	child2.fadeIn();
    	child2_birth.fadeIn();
    	child3.fadeIn();
    	child3_birth.fadeIn();
    }
      });
  
	
    });
	 </script>


<script>
function myFunction() {
    var x = document.getElementById("mySelect");
    var y = document.getElementById("lain").value;
    var option = document.createElement("option");
    option.text = y;
    x.add(option);
}
function myGaji() {
    var a = document.getElementById("gaji_hrp");
    var b = document.getElementById("lain2").value;
    var option = document.createElement("option");
    option.text = b;
    a.add(option);
}
function mySumber() {
    var c = document.getElementById("sumber");
    var d = document.getElementById("lain3").value;
    var option = document.createElement("option");
    option.text = d;
    c.add(option);
}
function myFungsi() {
    
    var fresh = document.getElementById("fresh").value;
    document.getElementById("nm_perusahaan").value = fresh;
}
function myMethod() {
    
    var pernah = document.getElementById("pernah").value;

    document.getElementById("nm_perusahaan").value = pernah;
}

function myPeriod() {
    
    var datep2 = document.getElementById("datep2").value;
    var datep1 = document.getElementById("datep1").value;
    
    var pl = " - ";
    document.getElementById("v_periode").value = datep1+pl+datep2;
}
function myPeriod2() {
    
    var datep2_2 = document.getElementById("datep2_2").value;
    var datep1_2 = document.getElementById("datep1_2").value;
    var p = " - ";
    document.getElementById("v_periode_2").value = datep1_2+p+datep2_2;
}
function myPeriod3() {
    
    var datep2_3 = document.getElementById("datep2_3").value;
    var datep1_3 = document.getElementById("datep1_3").value;
    var l = " - ";
    document.getElementById("v_periode_3").value = datep1_3+l+datep2_3;
}
function f_cabang() {
    
    var cb = document.getElementById("cabang").value;
    document.getElementById("cbn").value = cb;
}


</script>

</body>
</html>
