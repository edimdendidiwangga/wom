<?php
include('config.php');
include('cek-login.php');
if (!isset($_SESSION['id_bu']) ) {
	header('location:index.php');
}
$id_gaji = $_POST['id_gaji'];
$id_karyawan = $_POST['id_karyawan'];
$kehadiran = $_POST['kehadiran'];
$ump = $_POST['ump'];
$gaji_pokok = $_POST['gaji_pokok'];
$tun_maintenance = $_POST['tun_maintenance'];
$tun_jabatan = $_POST['tun_jabatan'];
$tun_jaga_malam = $_POST['tun_jaga_malam'];
$tun_lain = $_POST['tun_lain'];
$insentive = $_POST['insentive'];
$overtime = $_POST['overtime'];
$rapel = $_POST['rapel'];
$periode_gaji = $_POST['periode_gaji'];
$update_gaji = date("dd-mm-yy h:i:s");
//simpan data ke database
$que = mysql_query("update gaji set ump = '$ump', gaji_pokok = '$gaji_pokok', tun_maintenance = '$tun_maintenance', tun_jabatan = '$tun_jabatan', tun_jaga_malam = '$tun_jaga_malam', tun_lain = '$tun_lain', insentive = '$insentive', overtime = '$overtime', kehadiran = '$kehadiran', rapel = '$rapel', periode_gaji = '$periode_gaji', update_gaji = '$update_gaji' where id_gaji = '$id_gaji'") or die(mysql_error());
$sql = "select update_gaji from gaji order by id_gaji desc";
 $hasil = mysql_query($sql);
 $row = mysql_fetch_array($hasil);
 $last_update_gaji = $row['update_gaji'];
$query = mysql_query("update karyawan set update_gaji='$last_update_gaji' where id_karyawan='$id_karyawan'") or die(mysql_error());
?>
	<div class="content_gaji">
									<table id="example3" class="table table-striped table-bordered table-hover">
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
											$query_tampil=mysql_query("SELECT karyawan.id_karyawan, karyawan.nama_karyawan, data_karyawan.position, data_karyawan.job_class, bu.nama_cabang, karyawan.marital_status, data_karyawan.nik, data_karyawan.virtual_nik, bu.bu, data_karyawan.status, gaji.kehadiran, gaji.id_gaji, gaji.ump, gaji.gaji_pokok, gaji.tun_maintenance, gaji.tun_jabatan, gaji.tun_jaga_malam, gaji.tun_lain, gaji.rapel, gaji.insentive, gaji.overtime, data_karyawan.org_name, karyawan.gender, data_karyawan.hire_date, data_karyawan.cabang_induk, data_karyawan.bpjs_ketenagakerjaan, data_karyawan.bpjs_kesehatan, gaji.periode_gaji, data_karyawan.id_bu, contract.join1
										    FROM gaji 
										    inner join data_karyawan on gaji.id_karyawan = data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										    inner join karyawan on gaji.id_karyawan = karyawan.id_karyawan
										    inner join contract on contract.id_karyawan = contract.id_karyawan
										   where data_karyawan.status = '1' && data_karyawan.id_bu=".$_SESSION['id_bu']." && gaji.periode_gaji = '".$periode_gaji."' && gaji.update_gaji = (
																							    SELECT max(update_gaji)
																							    FROM gaji
																							)
										   
										    Order by karyawan.id_karyawan DESC");
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
													<td><button id="pengaturan" data-target="#open_modal" data-toggle="modal" data-idgaji="<?php echo $data['id_gaji']; ?>" data-id="<?php echo $data['id_karyawan']; ?>" data-nama="<?php echo $data['nama_karyawan']; ?>" data-nik="<?php echo $data['nik']; ?>" data-kehadiran="<?php echo $data['kehadiran']; ?>" data-ump="<?php echo $data['ump']; ?>" data-gapok="<?php echo $data['gaji_pokok']; ?>" data-maintenance="<?php echo $data['tun_maintenance']; ?>" data-jabatan="<?php echo $data['tun_jabatan']; ?>" data-jalam="<?php echo $data['tun_jaga_malam']; ?>" data-lain="<?php echo $data['tun_lain']; ?>" data-insentive="<?php echo $data['insentive']; ?>" data-overtime="<?php echo $data['overtime']; ?>" data-rapel="<?php echo $data['rapel']; ?>" data-periode="<?php echo $data['periode_gaji']; ?>" class="btn btn-info btn-sm"><i class="fa fa-gear"></i></button></td>
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
										<div class="modal fade" id="open_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Form Edit Gaji</h4>
					</div>
					<div class="modal-body">
					
								<div class="form-horizontal form_edit_gaji">
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
													<button type="submit" id="sbt_edit_gaji" class="btn btn-info">Simpan</button>
													</div>
												  </div>				  
										</div>
								</div>
								<div class="modal-footer">
								<button id="btn-edit" type="button" class="btn btn-info">Edit</button>
								<!-- <a id="btn-hapus" class="btn btn-danger" onclick="return confirm('Yakin Anda ingin Menghapus data ini ?');">Delete</a> -->
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							</div>
						  </div>
<script type="text/javascript">
$(document).ready(function(){

var table3 = $('#example3').DataTable( {
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            leftColumns: 3,
            rightColumns: 1
        }
    });

$(document).on("click", "#pengaturan", function () {
     var id_gaji = $(this).data('idgaji');
     var id_karyawan = $(this).data('id');
     var nama_karyawan = $(this).data('nama');
     var nik = $(this).data('nik');
     var kehadiran = $(this).data('kehadiran');
     var ump = $(this).data('ump');
     var gapok = $(this).data('gapok');
     var maintenance = $(this).data('maintenance');
     var jabatan = $(this).data('jabatan');
     var jalam = $(this).data('jalam');
     var lain = $(this).data('lain');
     var insentive = $(this).data('insentive');
     var overtime = $(this).data('overtime');
     var rapel = $(this).data('rapel');
     var periode = $(this).data('periode');
    $('#input-gaj-id').attr( "value", id_gaji );
    $('#input-kyn-id').attr( "value", id_karyawan );
    $('#kehadiran_ed').val(kehadiran);
  	$('#ump_ed').val(ump);
  	$('#gaji_pokok_ed').val(gapok);
  	$('#tun_maintenance_ed').val(maintenance);
  	$('#tun_jabatan_ed').val(jabatan);
  	$('#tun_jaga_malam_ed').val(jalam);
  	$('#tun_lain_ed').val(lain);
  	$('#insentive_ed').val(insentive);
  	$('#overtime_ed').val(overtime);
  	$('#rapel_ed').val(rapel);
  	$('#periode_gaji_ed').val(periode);
     $("#id_karyawan").html( id_karyawan );
     $(".enik").val( nik );
     $(".nama").val( nama_karyawan);
     $("#input-res-id").attr( "value", id_karyawan );
      //$("#btn-hapus").attr( "href", "delete-payroll.php?id_gaji="+id_gaji );
     //reset form_add_gaji
    $('#kehadiran').val('');
  	$('#ump').val('');
  	$('#gaji_pokok').val('');
  	$('#tun_maintenance').val('');
  	$('#tun_jabatan').val('');
  	$('#tun_jaga_malam').val('');
  	$('#tun_lain').val('');
  	$('#insentive').val('');
  	$('#overtime').val('');
  	$('#rapel').val('');
  	$('#periode_gaji').val('');
});

  $("#sbt_edit_gaji").click(function(){
  	var idgaji = $('#input-gaj-id').val();
  	var id_kyn = $('#input-kyn-id').val();
    var kehadiran_val = $('#kehadiran_ed').val();
  	var ump_val = $('#ump_ed').val();
  	var gaji_pokok_val = $('#gaji_pokok_ed').val();
  	var tun_maintenance_val = $('#tun_maintenance_ed').val();
  	var tun_jabatan_val = $('#tun_jabatan_ed').val();
  	var tun_jaga_malam_val = $('#tun_jaga_malam_ed').val();
  	var tun_lain_val = $('#tun_lain_ed').val();
  	var insentive_val = $('#insentive_ed').val();
  	var overtime_val = $('#overtime_ed').val();
  	var rapel_val = $('#rapel_ed').val();
  	var periode_gaji_val = $('#periode_gaji_ed').val();
  	var data_edit_gaji = {
		id_gaji : idgaji, 
		id_karyawan : id_kyn,
		kehadiran : kehadiran_val,
		ump :ump_val,
		gaji_pokok : gaji_pokok_val, 
		tun_maintenance : tun_maintenance_val,
		tun_jabatan : tun_jabatan_val,
		tun_jaga_malam : tun_jaga_malam_val,
		tun_lain : tun_lain_val,
		insentive : insentive_val,
		overtime : overtime_val,
		rapel : rapel_val,
		periode_gaji : periode_gaji_val
		};
    if(kehadiran_val == null || kehadiran_val == '' || kehadiran_val == undefined) {
       $(".error_kehadiran").fadeIn();
       return false;
    }if(ump_val == null || ump_val == '' || ump_val == undefined) {
       $(".error_ump").fadeIn();
       return false;
    }if(gaji_pokok_val == null || gaji_pokok_val == '' || gaji_pokok_val == undefined) {
       $(".error_gaji_pokok").fadeIn();
       return false;
    }if(tun_maintenance_val == null || tun_maintenance_val == '' || tun_maintenance_val == undefined) {
       $(".error_tun_maintenance").fadeIn();
       return false;
    }if(tun_jabatan_val == null || tun_jabatan_val == '' || tun_jabatan_val == undefined) {
       $(".error_tun_jabatan").fadeIn();
       return false;
    }if(tun_jaga_malam_val == null || tun_jaga_malam_val == '' || tun_jaga_malam_val == undefined) {
       $(".error_tun_jaga_malam").fadeIn();
       return false;
    }if(tun_lain_val == null || tun_lain_val == '' || tun_lain_val == undefined) {
       $(".error_tun_lain").fadeIn();
       return false;
    }if(insentive == null || insentive == '' || insentive == undefined) {
       $(".error_insentive").fadeIn();
       return false;
    }if(overtime == null || overtime == '' || overtime == undefined) {
       $(".error_overtime").fadeIn();
       return false;
    }if(rapel == null || rapel == '' || rapel == undefined) {
       $(".error_rapel").fadeIn();
       return false;
    }if(periode_gaji == null || periode_gaji == '' || periode_gaji == undefined) {
       $(".error_periode_gaji").fadeIn();
       return false;
    }else{
    	$.ajax({
    	type: "POST",
        url: "update_gaji_periode.php",
        data: data_edit_gaji,
        cache: false,
        success: function(msg){
            if(msg == '0'){
        		alert("Gagal Menambah Data Gaji!");
        	}else{
        		$('.content_gaji').html(msg);
	            $('#get_modal').modal('toggle');
       		}
        }
    	});
    }
    
   });
$( "#periode_gaji_ed" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "MM yy"
    });
          $( "#periode_gaji" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "MM yy"
    });

});
</script>