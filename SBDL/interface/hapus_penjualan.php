<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$no_nota  = $_GET['no_nota'];
// query SQL untuk insert data
$query="DELETE from penjualan where no_nota='$no_nota'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:penjualan.php");
?>