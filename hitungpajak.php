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
    $query = mysqli_query($connection, "SELECT max(kdpajak) as kodePajak FROM tbpajak");
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
        <div class="card-header bg-danger text-white text-center">
            Form Input Pajak
        </div>
        <div class="card-body">
            <form method="post" action="hitungpajak_action.php">
                <div class="form-grup">
                    <label>Kode Pajak</label>
                    <input type="text" name="kdPajak" id="kdPajak" class="form-control" value="<?php echo $kodePajak; ?>" readonly>
                </div>
                <div class="form-grup">
                    <label>Nama Hotel</label>
                    <select class="chosen-select form-control" name="kdHotel" required>
                        <option>- Pilih Hotel -</option>
                        <?php
                            $sql = "SELECT * FROM tbwajibpajak";
                            $result = $connection->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row['kdhotel']; ?>"><?php echo $row['namahotel']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-grup">
                    <label>Pendapatan</label>
                    <input type="text" name="pendapatan" id="pendapatan" class="form-control" placeholder="Isi berupa angka" oninput="hitung_pajak(event);">
                </div>
                <div class="form-grup">
                    <label>Pajak %</label>
                    <input type="text" name="pajak" id="pajak" class="form-control" value="10" readonly>
                </div>
                <div class="form-grup">
                    <label>Tarif</label>
                    <input type="text" name="tarif" id="tarif" class="form-control" readonly>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="bhitung">Bayar</button>
            </form>
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