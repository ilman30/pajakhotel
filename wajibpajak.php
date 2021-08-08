<?php
    include "koneksi.php";
    include "header.php";
?>

<html>
    <head>
        <title>Data Wajib Pajak</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-chosen.css">
    </head>
    <body>
        <h2 class="text-center">Data Wajib Pajak</h2>
        <div class="card-body">
        <a href="input_wajibpajak.php" class="btn btn-info"><i class="fa fa-plus"> Input</i></a>
            <table class="table table-bordered table-striped table-hover mt-1">
                <tr class="text-center">
                    <th>No</th>
                    <th>Kode Hotel</th>
                    <th>Nama Hotel</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Action</th>
                </tr>
                <?php
                    $no = 1;
                    $tampil = mysqli_query($connection, "SELECT * from tbwajibpajak order by kdhotel");
                    while($data = mysqli_fetch_array($tampil)) :
                ?>
                <tr class="text-center">
                    <td><?=$no++;?></td>
                    <td><?=$data['kdhotel']?></td>
                    <td><?=$data['namahotel']?></td>
                    <td><?=$data['alamat']?></td>
                    <td><?=$data['notelp']?></td>

                    <td>
                        <a href="edit_wajibpajak.php?hal=edit&id=<?=$data['kdhotel']?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_wajibpajak.php?hal=hapus&id=<?=$data['kdhotel']?>"
                            onclick="return confirm('Apakah Yakin Akan Dihapus?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                        
                </tr>
                <?php endwhile; ?>
            </table>
        </div>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
    <script>
        $(function(){
            $('.chosen-select').chosen();
        });
    </script>
    </body>
</html>
<?php include "footer.php";?>