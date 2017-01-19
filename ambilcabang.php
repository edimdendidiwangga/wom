<?php
include('config.php');
include('cek-login.php');

$bu = $_GET['bu'];
$cab = mysql_query("SELECT * FROM bu WHERE bu='$bu' && id_users=".$_SESSION['id_users']." order by nama_cabang id_kabupaten");
echo "<option value="" disabled="" selected="" style="display:none" ;="">Pilih Nama Cabang</option>";
while($k = mysql_fetch_array($cab)){
     echo "<option value=\"".$k['id_bu']."\">".$k['nama_cabang']."</option>\n";
}
?>
