<?php 
    include "header.php";
	include "koneksi.php";
	include "footer.php";

	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	
?>
        <h1 class="mb-4 text-center">Aplikasi Perhitungan Pajak Hotel</h1>
