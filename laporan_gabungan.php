<?php 
include('cek-login.php');
include('config.php');
?>
<?php
$name_cabang = $_POST['name_cabang'];
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Gabungan Cab ".$name_cabang.".xls");
?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<table id="example1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th rowspan="2">NO.</th>
													<th rowspan="2">NAMA_KARYAWAN</th>
													<th rowspan="2">NIK</th>
													<th rowspan="2" class="hidden-xs">VIRTUAL_NIK</th>
													<th rowspan="2">VENDOR NAME</th>
													<th rowspan="2" class="hidden-xs">CABANG_NAME</th>
													<th rowspan="2">REGION</th>
													<th rowspan="2">HIREDATE</th>
													<th rowspan="2">JOIN_DATE</th>
													<th rowspan="2">QUIT_DATE</th>
													<th rowspan="2">POSITION</th>
													<th rowspan="2">JOB_CLASS</th>
													<th rowspan="2">BIRTHPLACE</th>
													<th rowspan="2">BIRTHDATE</th>
													<th rowspan="2">ID_TYPE</th>
													<th rowspan="2">ID_NUMBER</th>
													<th rowspan="2">EDUCATION</th>
													<th rowspan="2">GENDER</th>
													<th rowspan="2">RELIGION</th>
													<th rowspan="2">MARITAL_STATUS</th>
													<th rowspan="2">MOTHER_NAME</th>
													<th colspan="2" class="center">SPOUSE_NAME </th>
													<th colspan="2" class="center">CHILD_NAME I</th>
													<th colspan="2" class="center">CHILD_NAME II</th>
													<th colspan="2" class="center">CHILD_NAME III</th>

													<th rowspan="2">PERMANENT_ADDRESS</th>
													<th rowspan="2">DOMISILI_ADDRESS</th>
													<th rowspan="2">HOME_PHONE</th>
													<th rowspan="2">MOBILE_PHONE</th>
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
						                          <th colspan="2" class="center">Mutasi 1</th>
												  <th colspan="2" class="center">Mutasi 2</th>
												  <th colspan="2" class="center">Mutasi 3</th>
												  <th colspan="2" class="center">SP 1</th>
													<th colspan="2" class="center">SP 2</th>
													<th colspan="2" class="center">SP 3</th>
													<th rowspan="2">Jaminan</th>
													<th rowspan="2">No Jaminan</th>
													<th rowspan="2">Fresh Graduate/Non</th>
													<th rowspan="2">Financial/Non Financial</th>
													<th rowspan="2">NO BPJS TENAGA KERJA</th>
													<th rowspan="2">KARTU</th>
													<th rowspan="2">NO BPJS KESEHATAN</th>
													<th rowspan="2">KARTU</th>
													<th rowspan="2">KETERANGAN</th>
													<th rowspan="2">STATUS</th>
													<th rowspan="2">NO_REKENING</th>
													<th rowspan="2">NAMA_BANK</th>
													<th rowspan="2">ATAS_NAMA</th>
												</tr>
												<tr>
													<th class="center">NAME </th>
													<th class="center">BIRTHDATE </th>
													<th class="center">NAME </th>
													<th class="center">BIRTHDATE </th>
													<th class="center">NAME </th>
													<th class="center">BIRTHDATE </th>
													<th class="center">NAME </th>
													<th class="center">BIRTHDATE </th>
												
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>Start </th>
							                          <th>END </th>
							                          <th>NO_PKWT</th>
							                          <th>( Dari ) </th>
													  <th>( Ke ) </th>
													  <th>( Dari ) </th>
													  <th>( Ke ) </th>
													  <th>( Dari ) </th>
													  <th>( Ke ) </th>
													  <th>Tgl SP </th>
													<th>Masa_Berlaku </th>
													<th>Tgl_SP </th>
													<th>Masa_Berlaku </th>
													<th>Tgl_SP </th>
													<th>Masa_Berlaku </th>
                        					</tr>
											</thead>
											<tbody>
											<!-- && (karyawan.update_active BETWEEN '$from' AND '$to')  -->
											<?php 
											$from = $_POST['from'];
											$to = $_POST['to'];
											$query_tampil=mysql_query("SELECT *
										    FROM karyawan 
										    inner join data_karyawan on karyawan.id_karyawan=data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										    inner join contract on contract.id_karyawan = karyawan.id_karyawan
										    inner join gaji on gaji.update_gaji = karyawan.update_gaji
										    inner join mutasi on mutasi.id_karyawan = karyawan.id_karyawan
										    inner join keluarga on keluarga.id_karyawan = karyawan.id_karyawan
										    inner join rekening on rekening.id_karyawan = karyawan.id_karyawan
										   where data_karyawan.status = '1' && data_karyawan.id_bu=".$_SESSION['id_bu']." 
										    Order by karyawan.id_karyawan ASC");
											if ($query_tampil === FALSE) {
											    die(mysql_error());
											}
											$no=1;
											while ($data = mysql_fetch_array($query_tampil)) {
											?>
												<tr class="gradeX">
													<td><?php echo $no; ?></td>
													<td><?php echo $data['nama_karyawan']; ?></td>
													<td><?php echo $data['nik']; ?></td>
													<td class="hidden-xs"><?php echo $data['virtual_nik']; ?></td>
													<td class="center">SINAR JERNIH SUKSESINDO</td>
													<td class="center hidden-xs"><?php echo $data['nama_cabang']; ?></td>
													<td><?php echo "BU ".$data['bu']; ?></td>
													<td><?php echo $data['hire_date']; ?></td>
													<td><?php echo $data['join1']; ?></td>
													<td><?php echo $data['quit_date']; ?></td>
													<td><?php echo $data['position']; ?></td>
													<td><?php echo $data['job_class']; ?></td>
													<td><?php echo $data['birthplace']; ?></td>
													<td><?php echo $data['birthdate']; ?></td>
													<td><?php if($data['id_type']==1){echo "KTP";}else if ($data['id_type']==2) { echo "SIM";} ?></td>
													<td><?php echo $data['id_number']; ?></td>
													<td><?php echo $data['education']; ?></td>
													<td><?php echo $data['gender']; ?></td>
													<td><?php echo $data['religion']; ?></td>
													<td><?php echo $data['marital_status']; ?></td>
													<td><?php echo $data['mother_name']; ?></td>
													<td><?php echo $data['spouse_name']; ?></td>
													<td><?php echo $data['spouse_birthdate']; ?></td>
													<td><?php echo $data['chile1_name']; ?></td>
													<td><?php echo $data['chile1_birthdate']; ?></td>
													<td><?php echo $data['chile2_name']; ?></td>
													<td><?php echo $data['chile2_birthdate']; ?></td>
													<td><?php echo $data['chile3_name']; ?></td>
													<td><?php echo $data['chile3_birthdate']; ?></td>
													<td><?php echo $data['permanent_address']; ?></td>
													<td><?php echo $data['domisili_address']; ?></td>
													<td><?php echo $data['home_phone']; ?></td>
													<td><?php echo $data['mobile_phone']; ?></td>
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
						                          <td><?php echo $data['mutasi1_dari']; ?></td>
													<td><?php echo $data['mutasi1_ke']; ?></td>
													<td><?php echo $data['mutasi2_dari']; ?></td> 
													<td><?php echo $data['mutasi2_ke']; ?></td>
													<td><?php echo $data['mutasi3_dari']; ?></td>
													<td><?php echo $data['mutasi3_ke']; ?></td>
													<td><?php echo $data['tgl_sp1']; ?></td> 
													<td><?php echo $data['berlaku_sp1']; ?></td>
													<td><?php echo $data['tgl_sp2']; ?></td> 
													<td><?php echo $data['berlaku_sp2']; ?></td>
													<td><?php echo $data['tgl_sp3']; ?></td> 
													<td><?php echo $data['berlaku_sp3']; ?></td>
													<td><?php if($data['jaminan']=="1"){echo"Ijazah";}elseif ($data['jaminan']=="2") {echo"BPKB";}elseif ($data['jaminan']=="3") {echo"Ijazah+BPKB";} ?></td>
													<td><?php echo $data['no_jaminan']; ?></td>
													<td><?php if($data['freshgraduate']==1){echo "FRESHGRADUATE";}else if ($data['freshgraduate']==2) { echo "NON FRESHGRADUATE";} ?></td>
													<td><?php if($data['financial']==1){echo "FINANCIAL";}else if ($data['financial']==2) { echo "NON FINANCIAL";} ?></td>
													
													<td><?php if($data['kartu_ketenagakerjaan']==1){echo "BARU";}else if ($data['kartu_ketenagakerjaan']==2) { echo "LANJUT";} ?></td>
													<td><?php echo $data['bpjs_ketenagakerjaan']; ?></td>
													
													<td><?php if($data['kartu_kesehatan']==1){echo "BARU";}else if ($data['kartu_kesehatan']==2) { echo "LANJUT";} ?></td>
													<td><?php echo $data['bpjs_kesehatan']; ?></td>
													<td><?php echo $data['ket']; ?></td>
													<td><?php if($data['status']=="1"){echo"Active";}if($data['status']=="2"){echo"Non Active";}?></td>
													
													<td><?php echo $data['no_rek']; ?></td>
													<td><?php echo $data['nama_bank']; ?></td>
													<td><?php echo $data['atas_nama']; ?></td>
													
												</tr>
												<?php 
												$no++;
												} 
												?>
											</tbody>
											
										</table>
