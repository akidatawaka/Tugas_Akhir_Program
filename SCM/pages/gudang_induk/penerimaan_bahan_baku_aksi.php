<?php
include 'koneksi.php';
$id_pengadaan = $_POST['id_pengadaan'];
$id_bahanbaku = $_POST['id_bahanbaku'];
$jumlah       = $_POST['jumlah'];

$query_ubahstatus  = "UPDATE pengadaan ";
$query_ubahstatus .= "SET status = 'Diterima' ";
$query_ubahstatus .= "WHERE id_pengadaan = $id_pengadaan";

$query_update_stok  = "UPDATE bahan_baku ";
$query_update_stok .= "SET jumlah = jumlah + $jumlah ";
$query_update_stok .= "WHERE id_bahanbaku = '$id_bahanbaku'";

// var_dump($query_update_stok);
mysqli_query($koneksi,$query_ubahstatus);
mysqli_query($koneksi,$query_update_stok);
header("location:index.php?page=penerimaan_bahan_baku")
?>
