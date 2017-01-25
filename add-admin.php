<?php
include('config.php');

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
$periode_gaji = $_POST['periode_gaji'];
$update_gaji = date("d-m-y h:i:s");
//simpan data ke database
$que = mysql_query("insert into gaji (id_gaji, id_karyawan, ump, gaji_pokok, tun_maintenance, tun_jabatan, tun_jaga_malam, tun_lain, insentive, overtime, kehadiran, rapel, periode_gaji, update_gaji) values('', '$id_karyawan', '$ump', '$gaji_pokok', '$tun_maintenance', '$tun_jabatan', '$tun_jaga_malam', '$tun_lain', '$insentive', '$overtime', '$kehadiran', '$rapel', '$periode_gaji', '$update_gaji' )") or die(mysql_error());
$sql = "select update_gaji from gaji order by id_gaji desc";
 $hasil = mysql_query($sql);
 $row = mysql_fetch_array($hasil);
 $last_update_gaji = $row['update_gaji'];
$query = mysql_query("update karyawan set update_gaji='$last_update_gaji' where id_karyawan='$id_karyawan'") or die(mysql_error());

if ($query) {
	echo "1";
}else {
	echo "0";
}

?>