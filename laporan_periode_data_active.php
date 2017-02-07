<?php 
include('cek-login.php');
include('config.php');
?>
<?php
$name_cabang = $_POST['name_cabang'];
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Active Cab ".$name_cabang.".xls");
?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<table id="example1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>NO.</th>
													<th>NAMA KARYAWAN</th>
													<th>POSISI</th>
													<th class="hidden-xs">CABANG</th>
													<th>LOKASI</th>
													<th class="hidden-xs">NIK</th>
													<th>VIRTUAL NIK</th>
													<th>BU</th>
													<th>HIRE DATE</th>
													<th>JOIN DATE</th>
													<th>GAJI POKOK</th>
													<th>TUNJANGAN MAINTENANCE</th>
													<th>TUNJANGAN JABATAN</th>
													<th>TUNJANGAN JAGA MALAM</th>
													<th>TUNJANGAN LAIN</th>
													<th>THP</th>
													<th>VENDOR</th>
													<th>TINGKAT</th>
													<th>JENIS</th>
													<th>STATUS</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$from = $_POST['from'];
											$to = $_POST['to'];
											$query_tampil=mysql_query("SELECT karyawan.id_karyawan, karyawan.nama_karyawan, data_karyawan.position, bu.nama_cabang, data_karyawan.location, data_karyawan.nik, data_karyawan.virtual_nik, bu.bu, data_karyawan.hire_date, contract.join1, gaji.gaji_pokok, gaji.tun_maintenance, gaji.tun_jabatan, gaji.tun_jaga_malam, gaji.tun_lain, karyawan.education, karyawan.gender, data_karyawan.status, data_karyawan.id_bu
										    FROM karyawan 
										    inner join data_karyawan on karyawan.id_karyawan=data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										    inner join contract on contract.id_karyawan = karyawan.id_karyawan
										    inner join gaji on gaji.update_gaji = karyawan.update_gaji
										   where data_karyawan.status = '1' && data_karyawan.id_bu=".$_SESSION['id_bu']." && (karyawan.update_active BETWEEN '$from' AND '$to') 
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
													<td class="hidden-xs"><?php echo $data['nama_cabang']; ?></td>
													<td class="center"><?php echo $data['location']; ?></td>
													<td class="center hidden-xs"><?php echo $data['nik']; ?></td>
													<td><?php echo $data['virtual_nik']; ?></td>
													<td><?php echo "BU ".$data['bu']; ?></td>
													<td><?php echo $data['hire_date']; ?></td>
													<td><?php echo $data['join1']; ?></td>
													<td><?php echo $data['gaji_pokok']; ?></td>
													<td><?php echo $data['tun_maintenance']; ?></td>
													<td><?php echo $data['tun_jabatan']; ?></td>
													<td><?php echo $data['tun_jaga_malam']; ?></td>
													<td><?php echo $data['tun_lain']; ?></td>
													<td><?php echo ($data['gaji_pokok']+$data['tun_maintenance']+$data['tun_jabatan']+$data['tun_jaga_malam']+$data['tun_lain']); ?></td>
													<td>PT SINAR JERNIH SUKSESINDO</td>
													<td><?php echo $data['education']; ?></td>
													<td><?php echo $data['gender']; ?></td>
													<td><?php if($data['status']=="1"){echo"Active";}if($data['status']=="2"){echo"Non Active";}?></td>
													
												</tr>
												<?php 
												$no++;
												} 
												?>
											</tbody>
											
										</table>
