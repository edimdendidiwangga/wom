<?php 
include('config.php');
include('cek-login.php');
if (!isset($_SESSION['id_bu']) ) {
	header('location:index.php');
}
?>
									<table id="example2" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th rowspan="2">NO.</th>
													<th rowspan="2">NAMA KARYAWAN</th>
													<th rowspan="2">POSISI</th>
													<th rowspan="2" class="hidden-xs">CABANG</th>
													<th rowspan="2">LOKASI</th>
													<th rowspan="2" class="hidden-xs">NIK</th>
													<th rowspan="2">VIRTUAL NIK</th>
													<th rowspan="2">BU</th>
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
													<th rowspan="2">Aksi</th>
												</tr>
												<tr>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$query=mysql_query("SELECT karyawan.id_karyawan, karyawan.nama_karyawan, data_karyawan.position, bu.nama_cabang, data_karyawan.location, data_karyawan.nik, data_karyawan.virtual_nik, bu.bu, data_karyawan.status, data_karyawan.id_bu, contract.*
										    FROM contract 
										    inner join karyawan on karyawan.id_karyawan = contract.id_karyawan
										    inner join data_karyawan on karyawan.id_karyawan = data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										    
										   where data_karyawan.status = '2' && data_karyawan.id_bu=".$_SESSION['id_bu']." 
										   group by karyawan.nama_karyawan, data_karyawan.nik, data_karyawan.virtual_nik
										    Order by karyawan.id_karyawan DESC");

											if ($query === FALSE) {
											    die(mysql_error());
											}
											
											$no=1;
											while ($data = mysql_fetch_array($query)) {
												
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
													
													<td><button id="setting" data-target="#open" data-toggle="modal" data-id="<?php echo $data['id_karyawan']; ?>" data-nama="<?php echo $data['nama_karyawan']; ?>" data-nik="<?php echo $data['nik']; ?>" class="btn btn-info btn-sm"><i class="fa fa-gear"></i></button></td>
												</tr>
												<?php 
												$no++;
												} 
												?>
											</tbody>
											<tfoot>
												<tr>
													<th rowspan="2">NO.</th>
													<th rowspan="2">NAMA KARYAWAN</th>
													<th rowspan="2">POSISI</th>
													<th rowspan="2" class="hidden-xs">CABANG</th>
													<th rowspan="2">LOKASI</th>
													<th rowspan="2" class="hidden-xs">NIK</th>
													<th rowspan="2">VIRTUAL NIK</th>
													<th rowspan="2">BU</th>
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
													<th rowspan="2">Aksi</th>
												</tr>
												<tr>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
													<th>Start </th>
													<th>END </th>
													<th>NO PKWT</th>
												</tr>
											</tfoot>
										</table>
<script type="text/javascript">
$(document).ready(function(){
	var table2 = $('#example2').DataTable( {
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:   {
            leftColumns: 3,
            rightColumns: 1
        }
    });

  
});
</script>
   