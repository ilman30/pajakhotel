<?php

include "koneksi.php";

if($_GET['hal'] == "hapus"){
        $hapus = mysqli_query($connection, "DELETE FROM tbwajibpajak WHERE kdhotel='$_GET[id]'");
        if($hapus){
            echo "<script>
                alert('Hapus Data Success!');
                document.location='wajibpajak.php';
            </script>";
        }else{
            echo "<script>
                alert('Hapus Data Gagal!');
                document.location='wajibpajak.php';
            </script>";
        }
    }
?>