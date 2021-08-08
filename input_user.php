<?php

include "koneksi.php";
include "header.php";


if (isset($_POST['bsave'])){

        $simpan = mysqli_query($connection, "INSERT INTO tbuser (id_admin, namalengkap, username, password, level)
            values ('$_POST[idadmin]','$_POST[nml]', '$_POST[user]', '$_POST[pass]', '$_POST[level]')");
    if ($simpan){
    echo "<script>
            alert('Simpan Data Success!');
            document.location='user.php';
            </script>";
    }else{
    echo '<div class="alert alert-warning">Simpan Data Gagal!!</div>';
    }
}
?>
<html>
    <head>
        <title>Input Data User</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">

    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            Form Input Data User
        </div> 
        <div class="card-body">
            <form method="post" action="">
            <div class="form-grup">
                    <label>Id Admin</label>
                    <input type="text" name="idadmin" class="form-control" required>
                </div>
                <div class="form-grup">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nml" class="form-control" placeholder="Input Nama Disini" required>
                </div>
                <div class="form-grup">
                    <label>Username</label>
                    <input type="text" name="user" class="form-control" placeholder="Input Username Disini" required>
                </div>
                <div class="form-grup">
                    <label>Password</label>
                    <input type="text" name="pass" class="form-control" placeholder="Input Password Disini" required>
                </div>
                <div class="form-grup">
                    <label>Level</label>
                    <input type="text" name="level" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="bsave">Save</button>
                <a href="user.php" class="btn btn-danger mt-3">Cancel</a>
            </form>
        </div>
    </div>
    </div>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</html>
<?include "footer.php";?>