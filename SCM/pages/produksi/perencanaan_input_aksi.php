<?php
include 'koneksi.php';
$id_produk = $_GET["id_produk"];
$hasil_peramalan = $_GET["hasil_peramalan"];
$periode_peramalan = $_GET["periode_peramalan"];

$res = mysqli_query($koneksi,"INSERT INTO rencana_produksi VALUES ('','$periode_peramalan','$id_produk','$hasil_peramalan','Belum')");

header("location:index.php?page=perencanaan_produksi");
?>
