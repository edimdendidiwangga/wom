<?php 
include('config.php');
include('cek-login.php');
if (!isset($_SESSION['id_bu']) ) {
	header('location:index.php');
}
?>
<a href="#export-database" data-toggle="modal" class="btn btn-primary"><i class="fa fa-rocket"></i> Export</a>
<table id="example2" class="table table-striped table-bordered table-hover">
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
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$query_tampil=mysql_query("SELECT karyawan.id_karyawan, karyawan.nama_karyawan, data_karyawan.position, bu.nama_cabang, data_karyawan.location, data_karyawan.nik, data_karyawan.virtual_nik, bu.bu, data_karyawan.hire_date, contract.join_date, gaji.gaji_pokok, gaji.tun_maintenance, gaji.tun_jabatan, gaji.tun_jaga_malam, gaji.tun_lain, karyawan.education, karyawan.gender, data_karyawan.status, data_karyawan.id_bu
										    FROM karyawan 
										    inner join data_karyawan on karyawan.id_karyawan=data_karyawan.id_karyawan
										    inner join bu on bu.id_bu = data_karyawan.id_bu
										    inner join contract on contract.update_contract = karyawan.update_contract
										    inner join gaji on gaji.update_gaji = karyawan.update_gaji
										   where data_karyawan.status = '2' && data_karyawan.id_bu=".$_SESSION['id_bu']."
										    Order by karyawan.id_karyawan DESC");
											if ($query_tampil === FALSE) {
											    die(mysql_error());
											}
											$no=1;
											while ($data = mysql_fetch_array($query_tampil)) {
											?>
												<tr class="gradeX" id="employee_<?php echo $data['id_karyawan']; ?>">
													<td><?php echo $no; ?></td>
													<td><?php echo $data['nama_karyawan']; ?></td>
													<td><?php echo $data['position']; ?></td>
													<td class="hidden-xs"><?php echo $data['nama_cabang']; ?></td>
													<td class="center"><?php echo $data['location']; ?></td>
													<td class="center hidden-xs"><?php echo $data['nik']; ?></td>
													<td><?php echo $data['virtual_nik']; ?></td>
													<td><?php echo "BU ".$data['bu']; ?></td>
													<td><?php echo $data['hire_date']; ?></td>
													<td><?php echo $data['join_date']; ?></td>
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
													<td><a id="hapus" data-id="<?php echo $data['id_karyawan']; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
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
													<th>Aksi</th>
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

  $("#hapus").click(function(){
  	var id = $(this).data('id');
    var r = confirm("Yakin Anda ingin Menghapus data ini ?");
    var table = $("#example2").DataTable();
    if (r) {
        $.ajax({
        type: "POST",
        url: "delete-step.php",
        data: "id_karyawan="+id,
        cache: false,
        success: function(msg){
        	if(msg == '0'){
        		alert("Gagal Menghapus Data!");
        	}else{
            	$("#employee_"+id_krywn).fadeOut();
            	table.destroy();
        		table = $('#example2').DataTable( {
		        scrollX:        true,
		        scrollCollapse: true,
		        paging:         true
		    });
       		}
        }
    });
    } else {
       return false;
    }
 });
});
</script>

   