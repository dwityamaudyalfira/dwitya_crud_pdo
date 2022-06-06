<?php
require_once('koneksi.php');
// untuk Hapus salah satu data buku berdasarkan ISBN
$isbn = $_GET['isbn'];
$sql = "DELETE FROM tabel_buku WHERE isbn= ?";
$row = $koneksi->prepare($sql);
$row->execute(array($isbn));

echo '<script>alert("Berhasil Hapus Data Buku");window.location="index.php"</script>';
?>