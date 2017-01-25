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
													<th>No.</th>
													<th>PERIODE GAJI</th>
													<th class="center">AKSI</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$query_tampil=mysql_query("SELECT distinct periode_gaji FROM gaji 
										    Order by periode_gaji ASC");
											if ($query_tampil === FALSE) {
											    die(mysql_error());
											}
											$no=1;
											while ($data = mysql_fetch_array($query_tampil)) {
											?>
												<tr class="gradeX">
													<td><?php echo $no; ?></td>
													
													<td><?php echo $data['periode_gaji']; ?></td>
													<td class="center"><a href="cek-bu.php?id_bu=<?php echo $data['periode_gaji'];?>" class="btn btn-info btn-xs"> VIEW</a></td>
													
												</tr>
												<?php 
												$no++;
												} 
												?>
											</tbody>
										</table>
<script type="text/javascript">
$(document).ready(function(){
	var table2 = $('#example2').DataTable();
});
</script>