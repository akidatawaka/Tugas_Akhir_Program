<?php
include 'koneksi.php';

//mengambil data dari pengiriman_input.php
$id_penjualan = $_POST['id_penjualan'];
$jumlah_barang = $_POST['jumlah_barang'];
$jumlah_box = $_POST['jumlah_box'];
$tanggal_kirim = $_POST['tanggal_kirim'];
$id_ekspedisi = $_POST['id_ekspedisi'];

$query_pengiriman = "INSERT INTO pengiriman
                    VALUES ('','$id_ekspedisi','$id_penjualan','$jumlah_barang',$jumlah_box,'$tanggal_kirim')";

$sql_pengiriman = mysqli_query($koneksi,$query_pengiriman) or die(mysqli_error());

$query_ubahstatus = "UPDATE penjualan
                SET status_pengiriman = 'SUDAH DIKIRIM'
                WHERE id_penjualan = '$id_penjualan';
";

$sql_ubahstatus = mysqli_query($koneksi,$query_ubahstatus) or die(mysqli_error());

header("location:index.php?page=pengelolaan_data_pengiriman");
?>
