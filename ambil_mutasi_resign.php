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
													<th colspan="2" class="center">Mutasi 1</th>
													<th colspan="2" class="center">Mutasi 2</th>
													<th colspan="2" class="center">Mutasi 3</th>
													<th rowspan="2">Aksi</th>
												</tr>
												<tr>
													<th>( Dari ) </th>
													<th>( Ke ) </th>
													<th>( Dari ) </th>
													<th>( Ke ) </th>
													<th>( Dari ) </th>
													<th>( Ke ) </th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$query=mysql_query("SELECT karyawan.id_karyawan, karyawan.nama_karyawan, data_karyawan.position, bu.nama_cabang, data_karyawan.location, data_karyawan.nik, data_karyawan.virtual_nik, bu.bu, data_karyawan.status, data_karyawan.id_bu, mutasi.*
										    FROM mutasi 
										    inner join karyawan on karyawan.id_karyawan = mutasi.id_karyawan
										    inner join data_karyawan on karyawan.id_karyawan = data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										   where data_karyawan.status = '2' && data_karyawan.id_bu=".$_SESSION['id_bu']." 
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
													<td><?php echo $data['mutasi1_dari']; ?></td>
													<td><?php echo $data['mutasi1_ke']; ?></td>
													<td><?php echo $data['mutasi2_dari']; ?></td> 
													<td><?php echo $data['mutasi2_ke']; ?></td>
													<td><?php echo $data['mutasi3_dari']; ?></td>
													<td><?php echo $data['mutasi3_ke']; ?></td>
													
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
													<th colspan="2" class="center">Mutasi 1</th>
													<th colspan="2" class="center">Mutasi 2</th>
													<th colspan="2" class="center">Mutasi 3</th>
													<th rowspan="2">Aksi</th>
												</tr>
												<tr>
													<th>( Dari ) </th>
													<th>( Ke ) </th>
													<th>( Dari ) </th>
													<th>( Ke ) </th>
													<th>( Dari ) </th>
													<th>( Ke ) </th>
												</tr>
											</tfoot>
										</table>
<script type="text/javascript">
$(document).ready(function(){
	var table2 = $('#example2').DataTable( {
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:   {
            rightColumns: 1
        }
    });

  
});
</script>
   