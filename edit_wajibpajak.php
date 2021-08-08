<?php 
include "koneksi.php";
include "header.php";

if (isset($_POST['bupdate'])){

    // $kdHotel = $_POST['kdHotel'];
    $namaHotel = $_POST['namaHotel'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];

    // $data = array($namaHotel, $alamat, $notelp);
    // var_dump($data);
    // die;
    
    $edit = mysqli_query($connection, "UPDATE tbwajibpajak SET 
            namahotel = '$namaHotel', 
            alamat = '$namaHotel', 
            notelp = '$notelp' 
            WHERE kdhotel = '$_GET[id]'");
    if ($edit){
    echo "<script>
        alert('Edit Data Success!');
        document.location='wajibpajak.php';
        </script>";
    }else{
    echo "<script>
        alert('Edit Data Gagal!');
        document.location='edit_wajibpajak.php';
        </script>";
    }
    }
if(isset($_GET['hal'])){
    
    if($_GET['hal'] == "edit"){
        $tampil = mysqli_query($connection, "SELECT * FROM tbwajibpajak WHERE kdhotel = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data){
            $kdHotel = $data['kdhotel'];
            $namaHotel = $data['namahotel'];
            $alamat = $data['alamat'];
            $notelp = $data['notelp'];
        }
    }
}
?>

<html>
    <head>
        <title>Form Edit Data Karyawan</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
    <div class="card mt-3">
        <div class="card-header bg-danger text-white">
            Form Edit Data Karyawan
        </div> 
        <div class="card-body">
            <form method="post">
            <div class="form-grup">
                    <label>Kode Hotel</label>
                    <input type="text" name="kdHotel" value = "<?=$kdHotel?>" class="form-control" placeholder="Input Kode Disini">
                </div>
                <div class="form-grup">
                    <label>Nama Hotel</label>
                    <input type="text" name="namaHotel" value = "<?=$namaHotel?>" class="form-control" placeholder="Input Nama Disini" required>
                </div>
                <div class="form-grup">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="Input Alamat Disini" required><?=$alamat?></textarea>
                </div>
                <div class="form-grup">
                    <label>No Telp</label>
                    <input type="text" name="notelp" value = "<?=$notelp?>" class="form-control" placeholder="Input No Telp Disini" required>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="bupdate">Update</button>
                <a href="wajibpajak.php" class="btn btn-danger mt-3">Cancel</a>
            </form>
        </div>
        </div>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</html>