<?php
//panggil file config.php untuk menghubung ke server
error_reporting(0);
include "config.php";

//karyawan
$nama_karyawan = trim(addslashes(ucwords($_POST['nama_karyawan'])));
$religion = $_POST['religion'];
$birthplace = trim(addslashes(ucwords($_POST['birthplace'])));
$birthdate = trim($_POST['birthdate']);
$id_type = $_POST['id_type'];
$id_number = trim($_POST['id_number']);
$education = $_POST['education'];
$gender = $_POST['gender'];
$marital_status = $_POST['marital_status'];
$permanent_address = trim(addslashes(ucwords($_POST['permanent_address'])));
$domisili_address = trim(addslashes(ucwords($_POST['domisili_address'])));
$home_phone = trim($_POST['home_phone']);
$mobile_phone = trim($_POST['mobile_phone']);
$freshgraduate = $_POST['freshgraduate'];
$financial = $_POST['financial'];
//data_karyawan
$id_bu = $_POST['id_bu'];
$nik = trim(addslashes(strtoupper($_POST['nik'])));
$virtual_nik = trim(addslashes(strtoupper($_POST['virtual_nik'])));
$npwp = trim(addslashes(strtoupper($_POST['npwp'])));
$hire_date = trim($_POST['hire_date']);
$quit_date = trim($_POST['quit_date']);
$position = trim(addslashes(strtoupper($_POST['position'])));
$job_class = trim(addslashes(strtoupper($_POST['job_class'])));
$location = trim(addslashes(strtoupper($_POST['location'])));
$cabang_induk = trim(addslashes(strtoupper($_POST['cabang_induk'])));
$org_name = trim(addslashes(strtoupper($_POST['org_name'])));
$jaminan = $_POST['jaminan'];
$no_ijazah = $_POST['no_ijazah'];
$no_bpkb = $_POST['no_bpkb'];
if(isset($no_ijazah)){
	$no_jaminan = $no_ijazah;
}else if (isset($no_bpkb)) {
	$no_jaminan = $no_bpkb;
}else if (isset($no_bpkb) && isset($no_bpkb)) {
	$no_jaminan = $no_ijazah." / ".$no_bpkb;
}
$no_jaminan = trim(addslashes(strtoupper($_POST['no_jaminan'])));
$kartu_ketenagakerjaan = $_POST['kartu_ketenagakerjaan'];
$bpjs_ketenagakerjaan = trim(addslashes(strtoupper($_POST['bpjs_ketenagakerjaan'])));
$kartu_kesehatan = $_POST['kartu_kesehatan'];
$bpjs_kesehatan = trim(addslashes(strtoupper($_POST['bpjs_kesehatan'])));
$ket = trim(addslashes($_POST['ket']));
//keluarga
$mother_name = trim(addslashes(ucwords($_POST['mother_name'])));
$spouse_name = trim(addslashes(ucwords($_POST['spouse_name'])));
$spouse_birthdate = trim($_POST['spouse_birthdate']);
$chile1_name = trim(addslashes(ucwords($_POST['chile1_name'])));
$chile1_birthdate = trim($_POST['chile1_birthdate']);
$chile2_name = trim(addslashes(ucwords($_POST['chile2_name'])));
$chile2_birthdate = trim($_POST['chile2_birthdate']);
$chile3_name = trim(addslashes(ucwords($_POST['chile3_name'])));
$chile3_birthdate = trim($_POST['chile3_birthdate']);
//contract
$pkwt = $_POST['pkwt'];
$no_pkwt = trim(addslashes(strtoupper($_POST['no_pkwt'])));
$join_date = trim($_POST['join_date']);
$end_date = trim($_POST['end_date']);
//rekening
$atas_nama = trim(addslashes(strtoupper($_POST['atas_nama'])));
$nama_bank = trim(addslashes(strtoupper($_POST['nama_bank'])));
$no_rek = trim(addslashes($_POST['no_rek']));
//mutasi&sp
$mutasi = trim(addslashes(strtoupper($_POST['mutasi'])));
$mutasi_dari = trim(addslashes(strtoupper($_POST['mutasi_dari'])));
$mutasi_ke = trim(addslashes(strtoupper($_POST['mutasi_ke'])));
$sp = $_POST['sp'];
$tgl_sp = trim($_POST['tgl_sp']);
$masa_berlaku = trim(addslashes($_POST['masa_berlaku']));
$date = date("d-m-y h:i:s");
//simpan data ke database
$query = mysql_query("insert into karyawan(id_karyawan, nama_karyawan, religion, birthplace, birthdate, id_type, id_number, education, gender, marital_status, permanent_address, domisili_address, home_phone, mobile_phone, freshgraduate, financial) 
	values('', '$nama_karyawan', '$religion', '$birthplace', '$birthdate', '$id_type', '$id_number', '$education', '$gender', '$marital_status', '$permanent_address', '$domisili_address', '$home_phone', '$mobile_phone', '$freshgraduate', '$financial')") or die(mysql_error());
//simpan data ke karyawan 
$sql = "select max(id_karyawan) as last_id from karyawan limit 1";
 $hasil = mysql_query($sql);
 $row = mysql_fetch_array($hasil);
 $last_id = $row['last_id'];
//simpan data ke data_karyawan 
$query = mysql_query("insert into data_karyawan (id_data_karyawan, id_karyawan, id_bu, nik, virtual_nik, npwp, hire_date, quit_date, position, job_class, location, cabang_induk, org_name, jaminan, no_jaminan, kartu_ketenagakerjaan, bpjs_ketenagakerjaan, kartu_kesehatan, bpjs_kesehatan, ket, status) 
	values('', '$last_id', '$id_bu', '$nik', '$virtual_nik', '$npwp', '$hire_date', '$quit_date', '$position', '$job_class', '$location', '$cabang_induk', '$org_name', '$jaminan', '$no_jaminan', '$kartu_ketenagakerjaan', '$bpjs_ketenagakerjaan', '$kartu_kesehatan', '$bpjs_kesehatan', '$ket', '1')") or die(mysql_error());
//simpan data ke keluarga 
$query = mysql_query("insert into keluarga (id_keluarga, id_karyawan, mother_name, spouse_name, spouse_birthdate, chile1_name, chile1_birthdate, chile2_name, chile2_birthdate, chile3_name, chile3_birthdate) 
	values('', '$last_id', '$mother_name', '$spouse_name', '$spouse_birthdate', '$chile1_name', '$chile1_birthdate', '$chile2_name', '$chile2_birthdate', '$chile3_name', '$chile3_birthdate')") or die(mysql_error());

$query = mysql_query("insert into rekening (id_rekening, id_karyawan, atas_nama, nama_bank, no_rek) 
	values('', '$last_id', '$atas_nama', '$nama_bank', '$no_rek')") or die(mysql_error());

$query = mysql_query("insert into mutasi (id_mutasi, id_karyawan, mutasi, mutasi_dari, mutasi_ke, sp, tgl_sp, masa_berlaku) 
	values('', '$last_id', '$mutasi', '$mutasi_dari', '$mutasi_ke', '$sp', '$tgl_sp', '$masa_berlaku')") or die(mysql_error());
//simpan data ke contract
$query = mysql_query("insert into contract (id_contract, id_karyawan, pkwt, no_pkwt, join_date, end_date, update_contract) 
	values('', '$last_id', '$pkwt', '$no_pkwt', '$join_date', '$end_date', '$date')") or die(mysql_error());
//simpan data ke gaji
$query = mysql_query("insert into gaji (id_gaji, id_karyawan, ump, gaji_pokok, tun_maintenance, tun_jabatan, tun_jaga_malam, tun_lain, insentive, overtime, kehadiran, rapel, update_gaji) 
	values('', '$last_id', '$ump', '$gaji_pokok', '$tun_maintenance', '$tun_jabatan', '$tun_jaga_malam', '$tun_lain', '$insentive', '$overtime', '$kehadiran', '$rapel', '$date')") or die(mysql_error());
//simpan data ke karyawan 
$sql = "select update_contract from contract order by id_contract desc";
 $hasil = mysql_query($sql);
 $row = mysql_fetch_array($hasil);
 $last_update_contract = $row['update_contract'];
 //simpan data ke karyawan 
$sql = "select update_gaji from gaji order by id_gaji desc";
 $hasil = mysql_query($sql);
 $row = mysql_fetch_array($hasil);
 $last_update_gaji = $row['update_gaji'];

$query = mysql_query("update karyawan set update_contract='$last_update_contract', update_gaji='$last_update_gaji' where id_karyawan='$last_id'") or die(mysql_error());

if ($query) {
	echo "<script>
		alert('DATA BERHASIL DITAMBAHKAN');
		window.location='data-active.php';
		</script>";
}else{
echo "<script>
		alert('GAGAL MENYIMPAN DATA');
		window.location='data-active.php';
		</script>";
}

?>
