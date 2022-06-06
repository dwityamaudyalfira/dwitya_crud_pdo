<?php
require_once('koneksi.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Membuat API endpoint CRUD Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <br/>
            <a href="create.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> CREATE</a>
            <table class="table table-hover table-bordered" style="margin-top: 10px">
                <tr class="success">
                    <th width="50px">No</th>
                    <th style="text-align: center;">ISBN</th>
                    <th style="text-align: center;">Judul Buku</th>
                    <th style="text-align: center;">Nama Pengarang</th>
                    <th style="text-align: center;">Jumlah Halaman</th>
                    <th style="text-align: center;">Tanggal Masuk</th>
                    <th style="text-align: center;">Abstrak</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
                <?php
                $sql = "SELECT * FROM tabel_buku";
                $row = $koneksi->prepare($sql);
                $row->execute();
                $hasil = $row->fetchAll();
                $a =1;
                foreach($hasil as $isi){
                    ?>
                    <tr>
                        <td><?php echo $a ?></td>
                        <td><?php echo $isi['isbn']?></td>
                        <td><?php echo $isi['judul']?></td>
                        <td><?php echo $isi['pengarang'];?></td>
                        <td><?php echo $isi['jumlah'];?></td>
                        <td><?php echo $isi['tanggal'];?></td>
                        <td><?php echo $isi['abstrak'];?></td>
                        <td style="text-align: center;">
                            <a href="update.php?isbn=<?php echo $isi['isbn'];?>" class="btn btn-success btn-md">
                                <span class="fa fa-edit"></span></a>
                            <a onclick="return confirm('Apakah yakin data buku ini akan dihapus?')" href="delete.php?isbn=<?php echo $isi['isbn'];?>"
                               class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php
                    $a++;
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
