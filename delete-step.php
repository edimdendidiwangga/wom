<?php 
include('config.php');

$id = $_POST['id_karyawan'];
$query1 = mysql_query("delete from karyawan where id_karyawan='$id'") or die(mysql_error());
$query2 = mysql_query("delete from data_karyawan where id_karyawan='$id'") or die(mysql_error());
$query3 = mysql_query("delete from gaji where id_karyawan='$id'") or die(mysql_error());
$query4 = mysql_query("delete from contract where id_karyawan='$id'") or die(mysql_error());
$query5 = mysql_query("delete from keluarga where id_karyawan='$id'") or die(mysql_error());
$query6 = mysql_query("delete from rekening where id_karyawan='$id'") or die(mysql_error());
$query7 = mysql_query("delete from mutasi where id_karyawan='$id'") or die(mysql_error());

if($query7) {
	echo "1";
}else {
	echo "0";
}
?>