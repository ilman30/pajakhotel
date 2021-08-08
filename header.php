<!doctype html>
<html lang="en">

<head>
  <title>Main Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-3" style="background-image: url(images/bapenda.jpg);"></a>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="index.php"><i class="fa fa-home mr-2"></i>Home</a>
          </li>
          <li>
            <a href="wajibpajak.php"><span class="fa fa-list mr-2"></span>Data Wajib Pajak</a>
          </li>
          <li>
            <a href="hitungpajak.php"><span class="fa fa-money mr-2"></span>Penghitungan Pajak</a>
          </li>
          <li>
            <a href="laporan_pajak.php"><span class="fa fa-file mr-2"></span>Laporan</a>
          </li>
          <li>
            <a href="logout.php" onclick="return confirm('Apakah Yakin Akan Keluar?')"><span
                class="fa fa-user mr-2"></span>Log Out</a>
          </li>
        </ul>


        <div class="footer">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> by Milla </p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          <p>STMIK Mardira Indonesia</p>
        </div>

      </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-2 p-md-3">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-secondary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>
          <h2>BAPENDA Kabupaten Bandung Barat</h2>
        </div>
      </nav>
</body>

</html>