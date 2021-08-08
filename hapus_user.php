<?php

include "koneksi.php";

if($_GET['hal'] == "hapus"){
        $hapus = mysqli_query($connection, "DELETE FROM tbuser WHERE id_admin='$_GET[id]'");
        if($hapus){
            echo "<script>
                alert('Hapus Data Success!');
                document.location='user.php';
            </script>";
        }
    }
?>