<?php
include('config.php');

$nama_users = $_POST['nama_users'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];
//simpan data ke database
$query = mysql_query("insert into users (id_users, nama_users, username, password, level) values('', '$nama_users', '$username', '$password', '$level')") or die(mysql_error());
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