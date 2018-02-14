<?php
include 'koneksi.php';
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];

$res=mysqli_query($koneksi,"INSERT INTO karyawan VALUES('$nik','$nama','$jabatan')");

header("location:index.php?page=pengelolaan_data_karyawan");
?>
