<?php 
include '../class/video.php';

$db= new video();

$aksi = $_GET['aksi'];
 if($aksi == "tambah"){
 	$db->add( $_POST['judul'],$_POST['deskripsi'],$_POST['url']);
 	header("location:admin.php#ajax/data_video.php");

 }elseif($aksi == "hapus"){ 	
 	$db->delete($_GET['id']);
	header("location:admin.php#ajax/data_video.php");

}elseif($aksi == "update"){
 	$db->update($_POST['id'],$_POST['judul'],$_POST['deskripsi'],$_POST['url']);
 	header("location:admin.php#ajax/data_video.php");
 }
?>