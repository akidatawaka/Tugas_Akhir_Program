<?php
include 'koneksi.php';
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];

$res=mysqli_query($koneksi,"INSERT INTO pelanggan VALUES('','$nama_pelanggan','$alamat')");

header("location:index.php?page=pengelolaan_data_pelanggan");
?>
