<?php
require_once('koneksi.php');

// berikut script untuk proses update buku ke database
if(!empty($_POST['isbn'])){
    // menangkap data post
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $abstrak = $_POST['abstrak'];
    $isbn = $_POST['isbn'];

    $data[] = $judul;
    $data[] = $pengarang;
    $data[] = $jumlah;
    $data[] = $tanggal;
    $data[] = $abstrak;
    $data[] = $isbn;

    // simpan data buku

    $sql = 'UPDATE tabel_buku SET judul=?,pengarang=?,jumlah=?,tanggal=?, abstrak=? WHERE isbn=?';
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    // redirect
    echo '<script>alert("Berhasil Update Data Buku");window.location="index.php"</script>';
}
// untuk menampilkan data buku berdasarkan isbn
$isbn = $_GET['isbn'];
$sql = "SELECT * FROM tabel_buku WHERE isbn=?";
$row = $koneksi->prepare($sql);
$row->execute(array($isbn));
$hasil = $row->fetch();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Update Buku - <?php echo $hasil['isbn'];?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <br/>
    <h3>Update Buku - <?php echo $hasil['isbn'];?></h3>
    <br/>
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" value="<?php echo $hasil['judul'];?>" class="form-control" name="judul">
                </div>
                <div class="form-group">
                    <label>Nama Pengarang</label>
                    <input type="text" value="<?php echo $hasil['pengarang'];?>" class="form-control" name="pengarang">
                </div>
                <div class="form-group">
                    <label>Jumlah Halaman</label>
                    <input type="number" value="<?php echo $hasil['jumlah'];?>" class="form-control" name="jumlah">
                </div>
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" value="<?php echo $hasil['tanggal'];?>" class="form-control" name="tanggal">
                </div>
                <div class="form-group">
                    <label>Abstrak</label>
                    <input type="text" value="<?php echo $hasil['abstrak'];?>" class="form-control" name="abstrak">
                </div>
                <input type="hidden" value="<?php echo $hasil['isbn'];?>" name="isbn">
                <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>