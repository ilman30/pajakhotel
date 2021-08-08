<html>
<head>
	<title>Cetak Pajak</title>
</head>
<body> 
	<?php 
	include 'koneksi.php';
	?>
 
    <center>
            <img src="images/bapenda.jpg" width="7%">  
            <h2>Invoice Pajak</h2>
            <h3>BAPENDA Kabupaten Bandung Barat</h3>
            <table>
                <?php
                    $tampil = mysqli_query($connection, "SELECT a.kdpajak, a.kdhotel, a.pendapatan, a.pajak, a.tarif, a.tanggal, a.tanggal, b.namahotel 
                                                         FROM tbpajak a JOIN tbwajibpajak b ON b.kdhotel = a.kdhotel order by a.tanggal DESC LIMIT 1");
                    while($data = mysqli_fetch_array($tampil)) {
                    
                ?>
                <tr>
                    <td>Kode Pajak</td>
                    <td>:</td>
                    <td><?php echo $data['kdpajak'] ?></td>
                </tr>
                <tr>
                    <td>Nama Hotel</td>
                    <td>:</td>
                    <td><?php echo $data['namahotel'] ?></td>
                </tr>
                <tr>
                    <td>Pendapatan</td>
                    <td>:</td>
                    <td><?php echo $data['pendapatan'] ?></td>
                </tr>
                <tr>
                    <td>Pajak</td>
                    <td>:</td>
                    <td><?php echo $data['pajak'] ?></td>
                </tr>
                <tr>
                    <td>Tarif</td>
                    <td>:</td>
                    <td><?php echo $data['tarif'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?php echo $data['tanggal'] ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </center>
 
	<script>
		window.print();
	</script>
 
</body>
</html>













