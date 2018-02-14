<?php
include 'koneksi.php';
$id_bahanbaku = $_POST['id_bahanbaku'];
$nama_bahan = $_POST['nama_bahan'];

mysqli_query($koneksi,"UPDATE bahan_baku SET nama_bahan='$nama_bahan' WHERE id_bahanbaku='$id_bahanbaku';");
header("location:index.php?page=pengelolaan_data_bahanbaku");
 ?>
