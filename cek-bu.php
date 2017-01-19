<?php 
session_start();

$_SESSION['id_bu'] = $_GET['id_bu'];
if (!isset($_SESSION['id_bu']) ) {
	header('location:index.php');
}else{
	header('location:data-active.php');
}
?>