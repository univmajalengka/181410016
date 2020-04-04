<?php 
	session_start();
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = mysqli_query($koneksi, "SELECT * FROM user where username='$username' and password='$password'");
	$cek = mysqli_num_rows($query);

	if($cek > 0){
		$_SESSION['username'] = $username;
		header("location:index.php");
	} else {
		header("location:login.php");
	}
 ?>