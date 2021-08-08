<?php
    include "koneksi.php";
    include "header.php";
    include "footer.php";

?>
<html>
<head>
    <title>Menghitung PPh Pasal 21</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-chosen.css">
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
</head>
<body>
    <?php
    $query = mysqli_query($koneksi, "SELECT max(kdpajak) as kodePajak FROM tbpajak");
    $data = mysqli_fetch_array($query);
    $kodePajak = $data['kodePajak'];
     
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodePajak, 3, 3);
     
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
     
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "PHO";
    $kodePajak = $huruf . sprintf("%03s", $urutan);
    
    ?>
    <div class="card mt-3">
        <div class="card-header bg-primary text-white text-center">
            Invoice
        </div>
        <div class="card-body">
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
            <a href="cetak_pajak_invoice.php" class="btn btn-info float-right mb-1"><i class="fa fa-print"> Cetak</i></a>
        </div>
    </div>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="js/my.js"></script>
    <script>
        $(function () {
            $('.chosen-select').chosen();
        });
    </script>
    <script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script>
        function autofill() {
            var jabatan = $("#jabatan").val();
            $.ajax({
                url: 'auto_proses.php', // file proses penginputan
                data: 'jabatan=' + jabatan,
            }).success(function (data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#gaji').val(obj.gaji);
            });
        }
    </script>
    <script>
        function hitung_pajak(evt) {
            var pendapatan = document.getElementById('pendapatan').value;
            var pajak = document.getElementById('pajak').value;
            var tarif = document.getElementById('tarif').value;
            document.getElementById('tarif').value = parseFloat(pendapatan) * (parseFloat(pajak) / 100);
            if(pendapatan == null || pendapatan == ''){
                document.getElementById('tarif').value = 0;
            }
        }
    </script>
    <script type="text/javascript">
        var rupiah = document.getElementById('tarif').value;
        rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
        function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
    </script>
</body>

</html>