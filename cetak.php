<html>
<head>
	<title>Cetak PPh Pasal 21 Karyawan</title>
</head>
<body>

	<?php 
	include 'koneksi.php';

	$id_cetak = $_GET['id'];

	$sql = "SELECT * FROM tbpph where tgl = '$id_cetak'";
	$result = mysqli_query($connection, $sql);
	$data = mysqli_fetch_array($result);

	if(!$result){
		die ('Query Error :'. mysqli_error($connection));
	}
	?>

<center>
		<img src="images/pt.jpg" width="7%" >
		<h2 width="80%">PPh Pasal 21 Karyawan</h2>
		<h3 width="80%">PT PRIDHANA EKA</h3>
			<table width="80%">
				<tr>
					<td width="20%">Tanggal</td>
					<td width="1">:</td>
					<td width="79%"><?=$data['tgl']?></td>
				</tr>
				<tr>
					<td>Nama Karyawan</td>
					<td>:</td>
					<td><?=$data['namakaryawan']?></td>
				</tr>
				<tr>
					<td>Gaji Pokok</td>
					<td>:</td>
					<td><?=$data['gaji_pokok']?></td>
				</tr>
				<tr>
					<td>Penghasilan Bruto</td>
					<td>:</td>
					<td><?=$data['bruto']?></td>
				</tr>
				<tr>
					<td>Jumlah PTKP</td>
					<td>:</td>
					<td><?=$data['ptkp']?></td>
				</tr>
				<tr>
					<td>PKP</td>
					<td>:</td>
					<td><?=$data['pkp']?></td>
				</tr>
				<tr>
					<td>PPh Setahun</td>
					<td>:</td>
					<td><?=$data['pphsetahun']?></td>
				</tr>
				<tr>
					<td>PPh Sebulan</td>
					<td>:</td>
					<td><?=$data['pphsebulan']?></td>
				</tr>
			</table></center>
			<br>
            <br>
            <br>
            <table width="80%">
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%"></td>
                <td><center><?php echo date("D, d F Y"); ?></center></td>
            </tr>
            </table>
            <br>
            <br>
            <br>
            <table width="80%">
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%"></td>  
                <td><center>Staff Pajak</center></td>
            </tr>
            </table>
			
		

	<script>
		window.print();
	</script>

</body>
</html>













