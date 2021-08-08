<?php
    include "koneksi.php";
    include "header.php";

?>

<html>
    <head>
        <title>Data User</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-chosen.css">
    </head>
    <body>
    <div class="container mb-4">
        <div class="card mt-3">
        <div class="card-header bg-success text-white text-center">
            Data User
        </div> 
        <div class="card-body">
        <a href="input_user.php" class="btn btn-info"><i class="fa fa-plus"> Input Data User</i></a>
            <table class="table table-bordered table-striped mt-3">
                <tr class="text-center">
                    <th>Id Admin</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
                <?php
                    $tampil = mysqli_query($connection, "SELECT * from tbuser order by id_admin");
                    while($data = mysqli_fetch_array($tampil)) :
                ?>
                <tr class="text-center">
                    <td><?=$data['id_admin']?></td>
                    <td><?=$data['namalengkap']?></td>
                    <td><?=$data['username']?></td>
                    <td><?=$data['password']?></td>
                    <td><?=$data['level']?></td>
                    <td>
                        <a href="edit_user.php?hal=edit&id=<?=$data['id_admin']?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_user.php?hal=hapus&id=<?=$data['id_admin']?>"
                            onclick="return confirm('Apakah Yakin Akan Dihapus?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                        
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>

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