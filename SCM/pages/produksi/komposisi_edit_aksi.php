<?php
include 'koneksi.php';
$id_bahan = $_POST['id_bahan'];
$id_produk = $_POST['id_produk'];
$jumlah = $_POST['jumlah'];

mysqli_query($koneksi,"UPDATE komposisi SET jumlah='$jumlah' WHERE id_produk='$id_produk' AND id_bahanbaku='$id_bahanbaku' ;");
header("location:index.php?page=pengelolaan_data_produk");
 ?>
