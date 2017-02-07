<?php
//koneksi ke database, username,password  dan namadatabase menyesuaikan 
include('config.php');

//memanggil file excel_reader
require "excel_reader.php";

//jika tombol import ditekan
if(isset($_POST['submit'])){

    $target = basename($_FILES['filepegawaiall']['name']) ;
    move_uploaded_file($_FILES['filepegawaiall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
    if($drop == 1){
//             kosongkan tabel pegawai
             $truncate ="TRUNCATE TABLE pegawai";
             mysql_query($truncate);
    };
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=3; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-3 sd terakhir)
      $nama_karyawan            = $data->val($i, 1);
      $nik                      = $data->val($i, 2);
      $virtual_nik              = $data->val($i, 3);
      $nama_cabang              = $data->val($i, 4);
      $bu                       = $data->val($i, 5);
      $hire_date                = $data->val($i, 6);
      $join_date                = $data->val($i, 7);
      $quit_date                = $data->val($i, 8);
      $position                 = $data->val($i, 9);
      $job_class                = $data->val($i, 10);
      $birthplace               = $data->val($i, 11);
      $birthdate                = $data->val($i, 12);
      $id_type                  = $data->val($i, 13);
      $id_number                = $data->val($i, 14);
      $education                = $data->val($i, 15);
      $gender                   = $data->val($i, 16);
      $religion                 = $data->val($i, 17);
      $marital_status           = $data->val($i, 18);
      $mother_name              = $data->val($i, 19);
      $spouse_name              = $data->val($i, 20);
      $spouse_birthdate         = $data->val($i, 21);
      $chile1_name              = $data->val($i, 22);
      $chile1_birthdate         = $data->val($i, 23);
      $chile2_name              = $data->val($i, 24);
      $chile2_birthdate         = $data->val($i, 25);
      $chile3_name              = $data->val($i, 26);
      $chile3_birthdate         = $data->val($i, 27);
      $permanent_address        = $data->val($i, 28);
      $domisili_address         = $data->val($i, 29);
      $home_phone               = $data->val($i, 30);
      $mobile_phone             = $data->val($i, 31);
      $join1                    = $data->val($i, 32);
      $end1                     = $data->val($i, 33);
      $no_pkwt1                 = $data->val($i, 34);
      $join2                    = $data->val($i, 35);
      $end2                     = $data->val($i, 36);
      $no_pkwt2                 = $data->val($i, 37);
      $join3                    = $data->val($i, 35);
      $end3                     = $data->val($i, 36);
      $no_pkwt3                 = $data->val($i, 37);
      $join4                    = $data->val($i, 35);
      $end4                     = $data->val($i, 36);
      $no_pkwt4                 = $data->val($i, 37);
      $join5                    = $data->val($i, 35);
      $end5                     = $data->val($i, 36);
      $no_pkwt5                 = $data->val($i, 37);
      $join6                    = $data->val($i, 35);
      $end6                     = $data->val($i, 36);
      $no_pkwt6                 = $data->val($i, 37);
      $join7                    = $data->val($i, 35);
      $end7                     = $data->val($i, 36);
      $no_pkwt7                 = $data->val($i, 37);
      $join8                    = $data->val($i, 35);
      $end8                     = $data->val($i, 36);
      $no_pkwt8                 = $data->val($i, 37);
      $join9                    = $data->val($i, 35);
      $end9                     = $data->val($i, 36);
      $no_pkwt9                 = $data->val($i, 37);
      $join10                   = $data->val($i, 35);
      $end10                    = $data->val($i, 36);
      $no_pkwt10                = $data->val($i, 37);
      $join11                   = $data->val($i, 35);
      $end11                    = $data->val($i, 36);
      $no_pkwt11                = $data->val($i, 37);
      $join12                   = $data->val($i, 35);
      $end12                    = $data->val($i, 36);
      $no_pkwt12                = $data->val($i, 37);
      $join13                   = $data->val($i, 35);
      $end13                    = $data->val($i, 36);
      $no_pkwt13                = $data->val($i, 37);
      $join14                   = $data->val($i, 35);
      $end14                    = $data->val($i, 36);
      $no_pkwt14                = $data->val($i, 37);
      $join15                   = $data->val($i, 35);
      $end15                    = $data->val($i, 36);
      $no_pkwt15                = $data->val($i, 37);
      $mutasi1_dari             = $data->val($i, 37);
      $mutasi1_ke               = $data->val($i, 37);
      $mutasi2_dari             = $data->val($i, 37);
      $mutasi2_ke               = $data->val($i, 37);
      $mutasi3_dari             = $data->val($i, 37);
      $mutasi3_ke               = $data->val($i, 37);
      $tgl_sp1                  = $data->val($i, 37);
      $berlaku_sp1              = $data->val($i, 37);
      $tgl_sp2                  = $data->val($i, 37);
      $berlaku_sp2              = $data->val($i, 37);
      $tgl_sp3                  = $data->val($i, 37);
      $berlaku_sp3              = $data->val($i, 37);
      $jaminan                  = $data->val($i, 37);
      $no_jaminan               = $data->val($i, 37);
      $freshgraduate            = $data->val($i, 37);
      $financial                = $data->val($i, 37);
      $bpjs_ketenagakerjaan     = $data->val($i, 37);
      $kartu_ketenagakerjaan    = $data->val($i, 37);
      $bpjs_kesehatan           = $data->val($i, 37);
      $kartu_kesehatan          = $data->val($i, 37);
      $keterangan               = $data->val($i, 37);
      $status                   = $data->val($i, 37);
      $no_rek                   = $data->val($i, 37);
      $nama_bank                = $data->val($i, 37);
      $atas_nama                = $data->val($i, 37);

//      setelah data dibaca, masukkan ke tabel pegawai sql
      $query = "INSERT into kandidat(id_kandidat, nama, tempat_lahir, tgl_lahir, usia, alamat, kota, no_telp, no_hp, jenkel, hijab, agama, status_kawin, t_bdn, b_bdn, kebangsaan, perusahaan, jns_perusahaan, posisi, periode, pendidikan, jurusan, nama_sekolah, thn_lulus, dilamar, no_aplikasi, interviewer, sumber, ket, date, status_pengiriman, tgl_pengiriman, status, tgl_efektif) 
  values('', '$nama', '$tempat_lahir', '$tgl_lahir', '$usia', '$alamat', '$kota', '$no_telp', '$no_hp', '$jenkel', '$hijab', '$agama', '$status_kawin', '$t_bdn', '$b_bdn', '$kebangsaan', '$perusahaan', '$jns_perusahaan', '$position', '$periode', '$pendidikan', '$jurusan', '$nama_sekolah', '$thn_lulus', '$dilamar', '$no_aplikasi', '$interviewer', '$sumber', '$ket', '$date', '$status_pengiriman', '$tgl_pengiriman', '$status', '$tgl_efektif')";
      $hasil = mysql_query($query);
      //simpan data ke database
$sql = "select max(id_kandidat) as last_id from kandidat limit 1";
 $hasil = mysql_query($sql);
 $row = mysql_fetch_array($hasil);
 $lastd = $row['last_id'];

$query = mysql_query("insert into penilaian (id_nilai, id_kandidat) 
	values('', '$lastd')") or die(mysql_error());

$sql = "select max(id_kandidat) as last_id from kandidat limit 1";
 $hasil = mysql_query($sql);
 $row = mysql_fetch_array($hasil);
 $lastId2 = $row['last_id'];
 
$query = mysql_query("insert into kelengkapan (id_lengkap, id_kandidat) 
	values('', '$lastId2')") or die(mysql_error());
    }
    


    if(!$hasil){
//          jika import gagal
          die(mysql_error());
      }else{
//          jika impor berhasil
          echo "<script>
		alert('DATA BERHASIL di IMPORT!');
		window.location='index.php';
		</script>";
    }
    
//    hapus file xls yang udah dibaca
    unlink($_FILES['filepegawaiall']['name']);
}

?>