<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$kode_barang   = $_GET['kode_barang'];
// query SQL untuk insert data
$query="DELETE from barang where kode_barang='$kode_barang'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:databarang.php");
?>