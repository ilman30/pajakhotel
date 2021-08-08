<?php
    include "koneksi.php";
    include "header.php";

?>

<html>
    <head>
        <title>Laporan</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-chosen.css">
    </head>
    <body>
        <h2 class="text-center">Laporan</h2>
        <div class="card-body">
		<a href="cetak_semua.php" class="btn btn-info float-right mb-1"><i class="fa fa-print"> Cetak</i></a>
            <table class="table table-bordered table-striped table-hover mt-1">
                <tr class="text-center">
                    <th>Kode Pajak</th>
                    <th>Nama Hotel</th>
                    <th>Pendapatan</th>
                    <th>Pajak %</th>
                    <th>Tarif</th>
					<th>Tanggal</th>
                </tr>
                <?php
                    $tampil = mysqli_query($connection, "SELECT a.kdpajak, a.kdhotel, a.pendapatan, a.pajak, a.tarif, a.tanggal, a.tanggal, b.namahotel 
                                                         FROM tbpajak a JOIN tbwajibpajak b ON b.kdhotel = a.kdhotel order by a.tanggal DESC");
                    while($data = mysqli_fetch_array($tampil)) :
                ?>
                <tr class="text-center">
                    <td><?=$data['kdpajak']?></td>
                    <td><?=$data['namahotel']?></td>
                    <td><?=$data['pendapatan']?></td>
                    <td><?=$data['pajak']?> %</td>
                    <td><?=$data['tarif']?></td>
					<td><?=$data['tanggal']?></td>
                        
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