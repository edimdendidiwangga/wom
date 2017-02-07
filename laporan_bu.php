<?php 
include('cek-login.php');
include('config.php');
?>
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data BU.xls");
?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<table id="example1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>No.</th>
													<th class="center">BU</th>
													<th>NAMA CABANG</th>
													<th>PENGELOLA</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$query_tampil=mysql_query("SELECT * FROM bu INNER JOIN users ON bu.id_users = users.id_users
										    Order by bu.nama_cabang ASC");
											if ($query_tampil === FALSE) {
											    die(mysql_error());
											}
											$no=1;
											while ($data = mysql_fetch_array($query_tampil)) {
											?>
												<tr class="gradeX">
													<td><?php echo $no; ?></td>
													<td class="center"><?php echo "BU ".$data['bu']; ?></td>
													<td><?php echo $data['nama_cabang']; ?></td>
													<td><?php echo $data['nama_users']; ?></td>
												</tr>
												<?php 
												$no++;
												} 
												?>
											</tbody>
										</table>