<?php
include 'koneksi.php';

$id_permintaan_bb = $_POST['id_permintaan_bb'];
$jumlah_pengeluaran = $_POST['jumlah_pengeluaran'];
$id_bahanbaku = $_POST['id_bahanbaku'];

$query_update_status = "UPDATE permintaan_bahanbaku
SET status_permintaan = 'DITERIMA'
WHERE id_permintaan_bb = '$id_permintaan_bb';";

$query_update_stok = "UPDATE bahan_baku
SET jumlah = jumlah - $jumlah_pengeluaran
WHERE id_bahanbaku = '$id_bahanbaku'
;";

$sql_update_status = mysqli_query($koneksi,$query_update_status) or die(mysqli_error());
$sql_update_stok = mysqli_query($koneksi,$query_update_stok) or die(mysqli_error());

header("location:index.php?page=pengeluaran_bahan_baku")
?>
