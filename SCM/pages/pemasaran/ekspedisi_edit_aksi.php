<?php
include 'koneksi.php';
$id_ekspedisi = $_POST['id_ekspedisi'];
$nama_ekspedisi = $_POST['nama_ekspedisi'];
$no_telepon = $_POST['no_telepon'];

mysqli_query($koneksi,"UPDATE ekspedisi SET nama_ekspedisi='$nama_ekspedisi',no_telepon='$no_telepon' WHERE id_ekspedisi='$id_ekspedisi';");
header("location:index.php?page=pengelolaan_data_ekspedisi");
 ?>
