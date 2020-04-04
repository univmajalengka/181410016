<?php
	$koneksi = mysqli_connect('localhost', 'root', '', 'sbdl_nurikhsanimanudin');
	if (!$koneksi){
		echo "GAGAL TERHUBUNG KE DATABASE" . mysqli_error();
	}
 ?>