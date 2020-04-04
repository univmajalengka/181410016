<?php 
	include 'koneksi.php';
	$kode_barang = $_POST["kode_barang"];
	$nama_barang = $_POST["nama_barang"];
	$harga_beli = $_POST["harga_beli"];
	$harga_jual = $_POST["harga_jual"];
	$stok = $_POST["stok"];
	$query = mysqli_query($koneksi, "INSERT INTO barang VALUES('$kode_barang','$nama_barang','$harga_beli','$harga_jual','$stok')");
	header("location:databarang.php");
?>