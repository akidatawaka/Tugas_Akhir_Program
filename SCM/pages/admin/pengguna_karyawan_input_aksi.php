<?php
include 'koneksi.php';
$nik = $_POST['nik'];
$username = $_POST['username'];
$password = $_POST['password'];
$hak_akses = $_POST['hak_akses'];

$res1=mysqli_query($koneksi,"INSERT INTO pengguna VALUES('$username','$password','$hak_akses')");
$res2=mysqli_query($koneksi,"INSERT INTO p_karyawan VALUES('$nik','$username')");

header("location:index.php?page=pengelolaan_data_pengguna_karyawan");
?>
