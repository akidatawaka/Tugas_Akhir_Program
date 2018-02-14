<?php
include 'koneksi.php';
$username_lama = $_POST['username_lama'];
$nik = $_POST['nik'];
$username = $_POST['username'];
$password = $_POST['password'];
$hak_akses = $_POST['hak_akses'];

$res1 = mysqli_query($koneksi,"UPDATE p_karyawan SET username ='$username' WHERE nik='$nik';");
$res2 = mysqli_query($koneksi,"UPDATE pengguna SET username ='$username',password = '$password', hak_akses='$hak_akses' WHERE username='$username_lama';");
header("location:index.php?page=pengelolaan_data_pengguna_karyawan");
 ?>
