<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connection,"select * from tbuser where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$_SESSION['username'] = $username;
	$_SESSION['level'] = "admin";
	// alihkan ke halaman dashboard admin
	header("location:index.php");	
	
}else{
	header("location:login.html?pesan=gagal");
}
 
?>