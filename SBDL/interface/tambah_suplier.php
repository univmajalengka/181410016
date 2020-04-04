<?php 
	include 'koneksi.php';
	$kode_suplier = $_POST["kode_suplier"];
	$nama_suplier = $_POST["nama_suplier"];
	$alamat = $_POST["alamat"];
	$no_telp = $_POST["no_telp"];
	$query = mysqli_query($koneksi, "INSERT INTO suplier VALUES('$kode_suplier','$nama_suplier','$alamat','$no_telp')");
	header("location:suplier.php");
?>