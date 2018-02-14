<?php
include 'koneksi.php';
$id_bahanbaku = $_POST['id_bahanbaku'];
$nama_bahan = $_POST['nama_bahan'];

$res=mysqli_query($koneksi,"INSERT INTO bahan_baku VALUES('$id_bahanbaku','$nama_bahan')");

header("location:index.php?page=pengelolaan_data_bahanbaku");
?>
