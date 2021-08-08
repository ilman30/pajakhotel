<?php
include "koneksi.php";

if (isset($_POST['bsave'])){

    $kdHotel = $_POST['kdHotel'];
    $namaHotel = $_POST['namaHotel'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];

    // $data = array($kdHotel,$namaHotel,$alamat,$notelp);
    // var_dump($data);
    // die;
    
    $simpan = mysqli_query($connection, "INSERT INTO tbwajibpajak (kdhotel, namahotel, alamat, notelp)
                                         VALUES ('$kdHotel','$namaHotel','$alamat','$notelp') ");
    if ($simpan){
    echo "<script>
            alert('Simpan Data Success!');
            document.location='wajibpajak.php';
            </script>";
    }else{
        echo "<script>
        alert('Simpan Data Gagal!');
        document.location='input_wajibpajak.php';
        </script>";
    }
}

?>