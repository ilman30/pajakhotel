<?php

include "koneksi.php";
include "header.php";
include "footer.php";
?>
<html>
    <head>
        <title>Input Data Wajibpajak</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">

    <div class="card mt-3">
        <div class="card-header bg-danger text-white">
            Form Input Data Wajibpajak
        </div> 
        <div class="card-body">
            <?php
                $query = mysqli_query($connection, "SELECT max(kdhotel) as kodeHotel FROM tbwajibpajak");
                $data = mysqli_fetch_array($query);
                $kodeHotel = $data['kodeHotel'];
                
                // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                // dan diubah ke integer dengan (int)
                $urutan = (int) substr($kodeHotel, 3, 3);
                
                // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                $urutan++;
                
                // membentuk kode barang baru
                // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                $huruf = "HTL";
                $kodeHotel = $huruf . sprintf("%03s", $urutan);
                
            ?>
            <form method="post" action="input_wajibpajak_action.php">
            <div class="form-grup">
                    <label>Kode Hotel</label>
                    <input type="text" name="kdHotel" class="form-control" value="<?php echo $kodeHotel; ?>" readonly>
                </div>
                <div class="form-grup">
                    <label>Nama Hotel</label>
                    <input type="text" name="namaHotel" class="form-control" placeholder="Input Nama Disini">
                </div>
                <div class="form-grup">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="Input Alamat Disini" required></textarea>
                </div>
                <div class="form-grup">
                    <label>No Telp</label>
                    <input type="text" name="notelp" class="form-control" placeholder="Input No Telp Disini" required>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="bsave">Save</button>
                <a href="wajibpajak.php" class="btn btn-danger mt-3">Cancel</a>
            </form>
        </div>
    </div>

    </div>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js" type="text/javascript">
    
    
    </script>
    </body>
</html>