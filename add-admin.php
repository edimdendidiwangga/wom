<?php
//panggil file config.php untuk menghubung ke server
include('config.php');

//tangkap data dari form
$id_karyawan = $_POST['id_karyawan'];
$kehadiran = $_POST['kehadiran'];
$ump = $_POST['ump'];
$gaji_pokok = $_POST['gaji_pokok'];
$tun_maintenance = $_POST['tun_maintenance'];
$tun_jabatan = $_POST['tun_jabatan'];
$tun_jaga_malam = $_POST['tun_jaga_malam'];
$tun_lain = $_POST['tun_lain'];
$insentive = $_POST['insentive'];
$overtime = $_POST['overtime'];
$rapel = $_POST['rapel'];
$periode_gajis = $_POST['periode_gaji'];
//simpan data ke database
$query = mysql_query("insert into user (user_id, username, password) values('', '$username', '$password')") or die(mysql_error());

if ($query) {
	echo "<script>
	alert('Data berhasil Disimpan');
	window.location='admin.php';
	</script>";
}else {
	echo "<script>
	alert('Data GAGAL Disimpan !');
	window.location='admin.php';
	</script>";
}

?>