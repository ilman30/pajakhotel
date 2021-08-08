<?php
    include "koneksi.php";

    $kdPajak = $_POST['kdPajak'];
    $kdHotel = $_POST['kdHotel'];
    $pendapatan = $_POST['pendapatan'];
    $pajak = $_POST['pajak'];
    $tarif = $_POST['tarif'];
    $tanggal = date('d-m-y h:i:s');

    // $data = array($kdPajak, $kdHotel, $pendapatan, $pajak, $tarif, $tanggal);
    // print("<pre>".print_r($data,true)."</pre>");
    // die;
    
    $query = mysqli_query($connection, "INSERT INTO tbpajak (kdpajak, kdhotel, pendapatan, pajak, tarif, tanggal)
                                        VALUES ('$kdPajak', '$kdHotel', '$pendapatan', '$pajak', '$tarif', CURRENT_TIMESTAMP)");

    if($query){
        echo "<script>
            alert('Simpan Data Success!');
            document.location='cetak_pajak.php';
            </script>";
    }else{
        echo "<script>
            alert('Simpan Data Gagal!');
            document.location='hitungpajak.php';
            </script>";
    }
    
?>