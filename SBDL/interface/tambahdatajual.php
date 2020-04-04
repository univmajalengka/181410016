<?php 
	include 'koneksi.php';
	$no_nota = $_POST["no_nota"];
    $date = date("Y-m-d");
	$kode_barang = $_POST["radioBarang"];
	$harga_jual = $_POST["harga_jual"];
    $jumlah_barang = $_POST["total"];
    $total = $_POST["total"];
    $user = 'admin';//$_POST["user"];
	$query = mysqli_query($koneksi, "INSERT INTO penjualan VALUES('$no_nota','$date','$kode_barang','$harga_jual','$jumlah_barang','$total','$user')");
	header("location:penjualan.php");
?>