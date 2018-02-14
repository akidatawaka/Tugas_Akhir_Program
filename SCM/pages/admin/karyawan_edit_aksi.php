<?php
include 'koneksi.php';
$nik = $_POST['nik'];
$nama_karyawan = $_POST['nama_karyawan'];
$jabatan = $_POST['jabatan'];

mysqli_query($koneksi,"UPDATE karyawan SET nama_karyawan='$nama_karyawan', jabatan='$jabatan' WHERE nik='$nik';");
header("location:index.php?page=pengelolaan_data_karyawan");
 ?>
