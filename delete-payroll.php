<?php 
include('config.php');
include('cek-login.php');
if (!isset($_SESSION['id_bu']) ) {
	header('location:index.php');
}

$id = $_GET['id_gaji'];
$id_karyawan = $_GET['id_karyawan'];

$query = mysql_query("delete from gaji where id_gaji='$id'") or die(mysql_error());

$sql = "select update_gaji from gaji where id_karyawan='$id_karyawan' order by id_gaji desc";
 $hasil = mysql_query($sql);
 $row = mysql_fetch_array($hasil);
 $last_update_gaji = $row['update_gaji'];

$query = mysql_query("update karyawan set update_gaji='$last_update_gaji' where id_karyawan='$id'") or die(mysql_error());

if ($query) {
	echo "<script>
		alert('DATA BERHASIL DIHAPUS');
		window.location='payroll.php';
		</script>";
}else{
echo "<script>
		alert('GAGAL MENGHAPUS DATA');
		window.location='payroll.php';
		</script>";
}

?>
