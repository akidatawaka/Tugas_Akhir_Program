<?php
include 'koneksi.php';
$nama_pemasok = $_POST['nama_pemasok'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];

$res=mysqli_query($koneksi,"INSERT INTO pemasok VALUES('','$nama_pemasok','$alamat','$no_telepon')");

header("location:index.php?page=pengelolaan_data_pemasok");
?>
