<?php
include('config.php');

$bu = $_POST['bu'];
$nama_cabang = $_POST['nama_cabang'];
$id_users = $_POST['id_users'];
//simpan data ke database
$query = mysql_query("insert into bu (id_bu, bu, nama_cabang, id_users) values('', '$bu', '$nama_cabang', '$id_users')") or die(mysql_error());
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