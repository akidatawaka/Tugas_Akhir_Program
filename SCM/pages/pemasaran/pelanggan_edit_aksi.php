<?php
include 'koneksi.php';
$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi,"UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', no_telepon='$no_telepon' WHERE id_PELANGGAN='$id_pelanggan';");
header("location:index.php?page=pengelolaan_data_pelanggan");
 ?>
