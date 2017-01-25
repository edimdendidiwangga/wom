<?php 
include('config.php');
include('cek-login.php');
if (!isset($_SESSION['id_bu']) ) {
	header('location:index.php');
}
$periode_gaji = $_POST['periode_gaji'];
?>
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
											$query_tampil=mysql_query("SELECT */*karyawan.id_karyawan, karyawan.nama_karyawan, data_karyawan.position, bu.nama_cabang, data_karyawan.location, data_karyawan.nik, data_karyawan.virtual_nik, bu.bu, data_karyawan.hire_date, contract.join_date, gaji.gaji_pokok, gaji.tun_maintenance, gaji.tun_jabatan, gaji.tun_jaga_malam, gaji.tun_lain, karyawan.education, karyawan.gender, data_karyawan.status, data_karyawan.id_bu*/
										    FROM gaji 
										    inner join data_karyawan on gaji.id_karyawan = data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										    inner join karyawan on gaji.id_karyawan = karyawan.id_karyawan
										    inner join contract on contract.id_karyawan = karyawan.id_karyawan
										   where data_karyawan.status = '1' && data_karyawan.id_bu=".$_SESSION['id_bu']." && gaji.periode_gaji = '".$periode_gaji."'
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
													<td><?php echo $data['join_date']; ?></td>
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
													<td><button id="setting" data-target="#open" data-toggle="modal" data-id="<?php echo $data['id_karyawan']; ?>" data-nama="<?php echo $data['nama_karyawan']; ?>" data-nik="<?php echo $data['nik']; ?>" class="btn btn-info btn-sm"><i class="fa fa-gear"></i></button></td>
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

var table3 = $('#example3').DataTable( {
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