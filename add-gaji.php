<?php
include('config.php');
include('cek-login.php');
if (!isset($_SESSION['id_bu']) ) {
	header('location:index.php');
}
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
$update_gaji = date("d-m-y h:i:s");
//simpan data ke database
$que = mysql_query("insert into gaji (id_gaji, id_karyawan, ump, gaji_pokok, tun_maintenance, tun_jabatan, tun_jaga_malam, tun_lain, insentive, overtime, kehadiran, rapel, periode_gaji, update_gaji) values('', '$id_karyawan', '$ump', '$gaji_pokok', '$tun_maintenance', '$tun_jabatan', '$tun_jaga_malam', '$tun_lain', '$insentive', '$overtime', '$kehadiran', '$rapel', '$periode_gaji', '$update_gaji' )") or die(mysql_error());
$sql = "select update_gaji from gaji order by id_gaji desc";
 $hasil = mysql_query($sql);
 $row = mysql_fetch_array($hasil);
 $last_update_gaji = $row['update_gaji'];
$query = mysql_query("update karyawan set update_gaji='$last_update_gaji' where id_karyawan='$id_karyawan'") or die(mysql_error());
?>
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
											$query_tampil=mysql_query("SELECT karyawan.id_karyawan, karyawan.nama_karyawan, data_karyawan.position, data_karyawan.job_class, bu.nama_cabang, karyawan.marital_status, data_karyawan.nik, data_karyawan.virtual_nik, bu.bu, data_karyawan.status, gaji.kehadiran, gaji.ump, gaji.gaji_pokok, gaji.tun_maintenance, gaji.tun_jabatan, gaji.tun_jaga_malam, gaji.tun_lain, gaji.rapel, gaji.insentive, gaji.overtime, data_karyawan.org_name, karyawan.gender, data_karyawan.hire_date, data_karyawan.cabang_induk, data_karyawan.bpjs_ketenagakerjaan, data_karyawan.bpjs_kesehatan, gaji.periode_gaji, data_karyawan.id_bu, contract.join1
										    FROM gaji 
										    inner join data_karyawan on gaji.id_karyawan = data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										    inner join karyawan on gaji.update_gaji = karyawan.update_gaji
										    inner join contract on contract.id_karyawan = contract.id_karyawan
										   where data_karyawan.status = '1' && data_karyawan.id_bu=".$_SESSION['id_bu']." 
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
													<td><button id="setting" data-target="#open" data-toggle="modal" data-id="<?php echo $data['id_karyawan']; ?>" data-nama="<?php echo $data['nama_karyawan']; ?>" data-nik="<?php echo $data['nik']; ?>" data-kehadiran="<?php echo $data['kehadiran']; ?>" data-ump="<?php echo $data['ump']; ?>" data-gapok="<?php echo $data['gaji_pokok']; ?>" data-maintenance="<?php echo $data['tun_maintenance']; ?>" data-jabatan="<?php echo $data['tun_jabatan']; ?>" data-jalam="<?php echo $data['tun_jaga_malam']; ?>" data-lain="<?php echo $data['tun_lain']; ?>" data-insentive="<?php echo $data['insentive']; ?>" data-overtime="<?php echo $data['overtime']; ?>" data-rapel="<?php echo $data['rapel']; ?>" data-periode="<?php echo $data['periode_gaji']; ?>" class="btn btn-info btn-sm"><i class="fa fa-gear"></i></button></td>
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

<script type="text/javascript">
$(document).ready(function(){
	var table = $('#example1').DataTable( {
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            leftColumns: 3,
            rightColumns: 1
        }
    });
});
</script>