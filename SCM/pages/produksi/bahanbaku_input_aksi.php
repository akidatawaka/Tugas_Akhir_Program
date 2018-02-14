<?php
include 'koneksi.php';
$id_bahanbaku = $_POST['id_bahanbaku'];
$nama_bahan = $_POST['nama_bahan'];

$query_bb = "INSERT INTO bahan_baku(id_bahanbaku,nama_bahan) VALUES('$id_bahanbaku','$nama_bahan')";

var_dump($query_bb);

mysqli_query($koneksi,$query_bb);
header("location:index.php?page=pengelolaan_data_bahanbaku");
?>
