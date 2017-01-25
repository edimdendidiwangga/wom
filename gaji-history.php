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
											$query_tampil=mysql_query("SELECT distinct periode_gaji FROM gaji where periode_gaji != ''
										    Order by id_gaji DESC");
											if ($query_tampil === FALSE) {
											    die(mysql_error());
											}
											$no=1;
											while ($data = mysql_fetch_array($query_tampil)) {
											?>
												<tr class="gradeX">
													<td><?php echo $no; ?></td>
													
													<td><?php echo $data['periode_gaji']; ?></td>
													<td class="center"><a id="btn-view" data-periode="<?php echo $data['periode_gaji']; ?>" class="btn btn-info btn-xs"> VIEW</a></td>
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

	$("#btn-view").click(function(){
		var periode = $(this).data('periode');
		$('#tbl_jdl').html("Data Gaji Bulan "+periode);
	    $.ajax({
	    	type: "POST",
	        url: "gaji_periode.php",
	        data: {periode_gaji:periode},
	        cache: false,
	        success: function(msg){
	            $(".box-periode").html(msg);
	        }
	    });
	});
});
</script>