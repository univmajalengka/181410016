<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$kode_suplier   = $_GET['kode_suplier'];
// query SQL untuk insert data
$query="DELETE from suplier where kode_suplier='$kode_suplier'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:suplier.php");
?>