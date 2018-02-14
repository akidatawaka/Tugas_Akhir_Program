<?php
include 'koneksi.php';
$id_rencana = $_GET["id_rencana"];

$res = mysqli_query($koneksi,"DELETE FROM rencana_produksi WHERE id_rencana='$id_rencana'") or die(mysqli_error());
header("location:index.php?page=perencanaan_produksi");

 ?>
