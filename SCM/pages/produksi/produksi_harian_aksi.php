<?php
include 'koneksi.php';

$tanggal_produksi = $_POST['tanggal_produksi'];
$id_produk = $_POST['id_produk'];
$jumlah_produksi = $_POST['jumlah_produksi'];

//menambah data produksi
$query_produksi = "INSERT INTO produksi (id_produksi,id_produk,tanggal,jumlah)
                   VALUES ('','$id_produk','$tanggal_produksi','$jumlah_produksi');
";

//update stok produk
$query_stok_produk = "UPDATE produk
SET jumlah = jumlah + $jumlah_produksi
WHERE id_produk = '$id_produk'
;";

$sql_produksi = mysqli_query($koneksi,$query_produksi) or die(mysqli_error());
$sql_stok_produk = mysqli_query($koneksi,$query_stok_produk) or die(mysqli_error());

header("location:index.php?page=produksi_harian")
?>
