<?php
include('config.php');

$id = $_POST['id_karyawan'];
$quit_date = $_POST['quit_date'];

$query = mysql_query("update data_karyawan set quit_date='$quit_date', status='2' where id_karyawan='$id'") or die(mysql_error());

if($query) {
	echo "1";
}else {
	echo "0";
}
?>