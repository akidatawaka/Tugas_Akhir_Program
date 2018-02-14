<?php
include 'koneksi.php';
$id_pemasok = $_POST['id_pemasok'];
$nama_pemasok = $_POST['nama_pemasok'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];

mysqli_query($koneksi,"UPDATE pemasok SET nama_pemasok='$nama_pemasok', alamat='$alamat', no_telepon='$no_telepon' WHERE id_pemasok='$id_pemasok';");
header("location:index.php?page=pengelolaan_data_pemasok");
 ?>
