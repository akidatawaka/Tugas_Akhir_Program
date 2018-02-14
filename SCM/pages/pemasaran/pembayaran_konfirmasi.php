<?php
include 'koneksi.php';
$id_penjualan = $_POST['id_penjualan'];

$query_update_penjualan = "UPDATE penjualan
            SET status_pembayaran = 'SUDAH DIBAYAR',
                tanggal_bayar = CURDATE(),
                status_pengiriman = 'BELUM DIKIRIM'
            WHERE id_penjualan = '$id_penjualan';
";

$sql_update_penjualan = mysqli_query($koneksi,$query_update_penjualan) or die(mysqli_error());

header("location:index.php?page=pengelolaan_data_pembayaran");
?>
