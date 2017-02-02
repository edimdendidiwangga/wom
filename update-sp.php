<?php
include('config.php');
include('cek-login.php');
if (!isset($_SESSION['id_bu']) ) {
	header('location:index.php');
}
$id = $_POST['id_karyawan'];
$sp = $_POST['sp'];
$tgl_sp = $_POST['tgl_sp'];
$berlaku_sp = $_POST['berlaku_sp'];

$query = mysql_query("update mutasi set tgl_sp".$sp."='$tgl_sp', berlaku_sp".$sp."='$berlaku_sp' where id_karyawan='$id'") or die(mysql_error());
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
													<th colspan="2" class="center">SP 1</th>
													<th colspan="2" class="center">SP 2</th>
													<th colspan="2" class="center">SP 3</th>
													<th rowspan="2">Aksi</th>
												</tr>
												<tr>
													<th>Tgl SP </th>
													<th>Masa Berlaku </th>
													<th>Tgl SP </th>
													<th>Masa Berlaku </th>
													<th>Tgl SP </th>
													<th>Masa Berlaku </th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$query=mysql_query("SELECT karyawan.id_karyawan, karyawan.nama_karyawan, data_karyawan.position, bu.nama_cabang, data_karyawan.location, data_karyawan.nik, data_karyawan.virtual_nik, bu.bu, data_karyawan.status, data_karyawan.id_bu, mutasi.*
										    FROM mutasi 
										    inner join karyawan on karyawan.id_karyawan = mutasi.id_karyawan
										    inner join data_karyawan on karyawan.id_karyawan = data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										    
										   where data_karyawan.status = '1' && data_karyawan.id_bu=".$_SESSION['id_bu']." 
										   
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
													<td><?php echo $data['tgl_sp1']; ?></td> 
													<td><?php echo $data['berlaku_sp1']; ?></td>
													<td><?php echo $data['tgl_sp2']; ?></td> 
													<td><?php echo $data['berlaku_sp2']; ?></td>
													<td><?php echo $data['tgl_sp3']; ?></td> 
													<td><?php echo $data['berlaku_sp3']; ?></td>
													
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
													<th colspan="2" class="center">SP 1</th>
													<th colspan="2" class="center">SP 2</th>
													<th colspan="2" class="center">SP 3</th>
													<th rowspan="2">Aksi</th>
												</tr>
												<tr>
													<th>Tgl SP </th>
													<th>Masa Berlaku </th>
													<th>Tgl SP </th>
													<th>Masa Berlaku </th>
													<th>Tgl SP </th>
													<th>Masa Berlaku </th>
												</tr>
											</tfoot>
										</table>
<script type="text/javascript">
$(document).ready(function(){
	var table = $('#example2').DataTable( {
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