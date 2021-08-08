<html>
<head>
	<title>Cetak PPh Pasal 21</title>
</head>
<body> 
	<?php 
	include 'koneksi.php';
	?>
 
    <center>
            <img src="images/bapenda.jpg" width="7%">  
            <h2>Laporan Pajak</h2>
            <h3>BAPENDA Kabupaten Bandung Barat</h3>
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
        </center>
 
	<script>
		window.print();
	</script>
 
</body>
</html>













