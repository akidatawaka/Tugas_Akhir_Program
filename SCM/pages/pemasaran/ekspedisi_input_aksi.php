<?php
include 'koneksi.php';
$nama_ekspedisi = $_POST['nama_ekspedisi'];
$no_telepon = $_POST['no_telepon'];

$res=mysqli_query($koneksi,"INSERT INTO ekspedisi VALUES('','$nama_ekspedisi','$no_telepon')");

header("location:index.php?page=pengelolaan_data_ekspedisi");
?>
