<?php
include 'koneksi.php';
$tanggal_pengajuan = $_POST['tanggal_pengajuan'];
$id_bahanbaku = $_POST['id_bahanbaku'];
$jumlah_bahanbaku = $_POST['jumlah_bahanbaku'];

$query_pengajuan = "INSERT INTO permintaan_bahanbaku
(id_permintaan_bb,tanggal_pengajuan,id_bahanbaku,jumlah,status_permintaan)
VALUES ('','$tanggal_pengajuan','$id_bahanbaku','$jumlah_bahanbaku','MENUNGGU KONFIRMASI');
";

$sql_pengajuan = mysqli_query($koneksi,$query_pengajuan) or die(mysqli_error());

header("location:index.php?page=permintaan_bahanbaku");
?>
