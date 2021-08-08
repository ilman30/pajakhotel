<?php 
include "koneksi.php";
include "header.php";


if (isset($_POST['bupdate'])){
            $edit = mysqli_query($connection, "UPDATE tbuser set
                    namalengkap = '$_POST[namal]', username = '$_POST[user]', password = '$_POST[pass]', level = '$_POST[level]'
                    WHERE id_admin = '$_GET[id]'");
            if ($edit){
            echo "<script>
                alert('Edit Data Success!');
                document.location='user.php';
                </script>";
            }else{
            echo "<script>
                alert('Edit Data Gagal!');
                document.location='edit_user.php';
                </script>";
            }
    }
if(isset($_GET['hal'])){
    
    if($_GET['hal'] == "edit"){
        $tampil = mysqli_query($connection, "SELECT * FROM tbuser WHERE id_admin = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data){
            $vid = $data['id_admin'];
            $vnamal = $data['namalengkap'];
            $vuser = $data['username'];
            $vpass = $data['password'];
            $vlevel = $data['level'];
        }
    }
}
?>

<html>
    <head>
        <title>Form Edit Data User</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            Form Edit Data User
        </div> 
        <div class="card-body">
            <form method="post">
            <div class="form-grup">
                    <label>Id Admin</label>
                    <input type="text" name="idadmin" value = "<?=$vid?>" class="form-control">
                </div>
                <div class="form-grup">
                    <label>Nama Lengkap</label>
                    <input type="text" name="namal" value = "<?=$vnamal?>" class="form-control" required>
                </div>
                <div class="form-grup">
                    <label>Username</label>
                    <input type="text" name="user" value = "<?=$vuser?>" class="form-control" required>
                </div>
                <div class="form-grup">
                    <label>Password</label>
                    <input type="text" name="pass" value = "<?=$vpass?>" class="form-control" required>
                </div>
                <div class="form-grup">
                    <label>Level</label>
                    <input type="text" name="level" value = "<?=$vlevel?>" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="bupdate">Update</button>
                <a href="user.php" class="btn btn-danger mt-3">Cancel</a>
            </form>
        </div>
        </div>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</html>
<?include "footer.php";?>