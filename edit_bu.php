<?php
include('config.php');

//tangkap data dari form
$id_bu = $_POST['id_bu'];
$bu = $_POST['bu'];
$nama_cabang = $_POST['nama_cabang'];
$id_users = $_POST['id_users'];

//update data di database sesuai user_id
$query = mysql_query("update bu set bu='$bu', nama_cabang='$nama_cabang', id_users='$id_users' where id_bu='$id_bu'") or die(mysql_error());

if ($query) {
	echo "<script>
		alert('DATA BERHASIL DITAMBAHKAN');
		window.location='bu.php';
		</script>";
}else{
echo "<script>
		alert('GAGAL MENYIMPAN DATA');
		window.location='bu.php';
		</script>";
}
?>