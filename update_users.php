<?php
include('config.php');

//tangkap data dari form
$id = $_POST['id_users'];
$nama_users = $_POST['nama_users'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

//update data di database sesuai user_id
$query = mysql_query("update users set nama_users='$nama_users', username='$username', password='$password', level='$level' where id_users='$id'") or die(mysql_error());


if ($query) {
	echo "<script>
		alert('DATA BERHASIL DITAMBAHKAN');
		window.location='admin.php';
		</script>";
}else{
echo "<script>
		alert('GAGAL MENYIMPAN DATA');
		window.location='admin.php';
		</script>";
}
?>