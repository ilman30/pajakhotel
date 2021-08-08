<?php
include "koneksi.php";
$query = mysqli_query($connection,"SELECT * FROM tbjabatan WHERE nama_jabatan='$_GET[id]'");
$user = mysqli_fetch_array($query);
$data = array(
    'gaji' => $user['gaji']);
    echo json_encode($data);
 ?>