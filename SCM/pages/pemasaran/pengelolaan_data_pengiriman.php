<?php
include 'koneksi.php';
//memanggil data pembayaran yang sudah DIBAYAR
$query_pembayaran =
            "SELECT pelanggan.nama_pelanggan nama_pelanggan,
            penjualan.tanggal_bayar tanggal_bayar,
            SUM(detil_penjualan.jumlah) jumlah_barang,
            penjualan.status_pembayaran status_pembayaran,
            penjualan.status_pengiriman status_pengiriman,
            penjualan.id_penjualan id_penjualan
            FROM penjualan JOIN pelanggan ON penjualan.id_pelanggan = pelanggan.id_pelanggan
            JOIN detil_penjualan on penjualan.id_penjualan = detil_penjualan.id_penjualan
            WHERE status_pembayaran = 'SUDAH DIBAYAR'
            AND status_pengiriman = 'BELUM DIKIRIM'
            GROUP BY id_penjualan
            ORDER BY tanggal_bayar ASC;

";
$sql_pembayaran = mysqli_query($koneksi,$query_pembayaran) or die(mysqli_error());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pengelolaan Data Pengiriman</title>
    </head>
    <body>
        <h2 class="page-header">Pengelolaan Data Pengiriman</h2>
        <div class="row">
            <h3 class="page-header">Barang Yang Harus Dikirim</h3>
            <div class="col-md-9">
                <table border="1" class="table">
                    <tr class="info">
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Jumlah Barang</th>
                        <th>Jumlah Box</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                        //fetch sql query ke tabel
                        $id_penjualan;
                        $nomor_pembayaran = 1;
                        while ($data_pembayaran = mysqli_fetch_array($sql_pembayaran)) {
                            $jumlah_barang = $data_pembayaran['jumlah_barang'];
                            $jumlah_box = ceil($jumlah_barang / 10);
                            $id_penjualan = $data_pembayaran['id_penjualan'];
                    ?>
                    <tr>
                        <td><?php echo $nomor_pembayaran++; ?></td>
                        <td><?php echo $data_pembayaran['nama_pelanggan']; ?></td>
                        <td><?php echo $data_pembayaran['tanggal_bayar']; ?></td>
                        <td><?php echo $jumlah_barang; ?></td>
                        <td><?php echo $jumlah_box; ?></td>
                        <td>
                            <form action="index.php?page=pengiriman_input" method="post">
                                <input type="hidden" name="id_penjualan" value="<?php echo $id_penjualan; ?>">
                                <input type="hidden" name="nama_pelanggan" value="<?php echo $data_pembayaran['nama_pelanggan']; ?>">
                                <input type="hidden" name="tanggal_pembayaran" value="<?php echo $data_pembayaran['tanggal_bayar']; ?>">
                                <input type="hidden" name="jumlah_barang" value="<?php echo $jumlah_barang; ?>">
                                <input type="hidden" name="jumlah_box" value="<?php echo $jumlah_box; ?>">
                                <input type="submit" class="btn btn-primary" name="submit" value="Lakukan Pengiriman">
                            </form>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php
        // $query_pengiriman =
        //             "SELECT pelanggan.nama_pelanggan nama_pelanggan,
        //             penjualan.tanggal_bayar tanggal_bayar,
        //             pengiriman.jumlah_barang jumlah_barang,
        //             penjualan.status_pengiriman status_pengiriman,
        //             penjualan.status_pembayaran status_pembayaran
        //             FROM penjualan JOIN pelanggan ON penjualan.id_pelanggan = pelanggan.id_pelanggan
        //             JOIN pengiriman on penjualan.id_penjualan = pengiriman.id_penjualan
        //             WHERE status_pembayaran = 'SUDAH DIBAYAR'
        //             ORDER BY tanggal_bayar ASC;
        //
        // ";

        $query_pengiriman = "SELECT pelanggan.nama_pelanggan nama_pelanggan,
                            penjualan.tanggal_bayar tanggal_bayar,
                            SUM(detil_penjualan.jumlah) jumlah_barang,
                            penjualan.status_pembayaran status_pembayaran,
                            penjualan.status_pengiriman status_pengiriman,
                            penjualan.id_penjualan id_penjualan
                            FROM penjualan JOIN pelanggan ON penjualan.id_pelanggan = pelanggan.id_pelanggan
                            JOIN detil_penjualan on penjualan.id_penjualan = detil_penjualan.id_penjualan
                            WHERE status_pembayaran = 'SUDAH DIBAYAR'
                            GROUP BY id_penjualan
                            ORDER BY tanggal_bayar ASC;
        ";

        $sql_pengiriman = mysqli_query($koneksi,$query_pengiriman) or die(mysqli_error());
        ?>
        <div class="row">
            <h3 class="page-header">Data Pengiriman Barang</h3>
            <div class="col-md-9">
                <table border="1" class="table">
                    <tr class="info">
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Jumlah Barang</th>
                        <th>Jumlah Box</th>
                        <th>Status Pengiriman</th>
                    </tr>
                    <?php
                        //fetch sql query ke tabel
                        $id_penjualan_kirim;
                        $nomor_pengiriman = 1;
                        while ($data_pengiriman = mysqli_fetch_array($sql_pengiriman)) {
                            $jumlah_barang_pengiriman = $data_pengiriman['jumlah_barang'];
                            $jumlah_box_pengiriman = ceil($jumlah_barang_pengiriman / 10);
                    ?>
                    <tr>
                        <td><?php echo $nomor_pengiriman++; ?></td>
                        <td><?php echo $data_pengiriman['nama_pelanggan']; ?></td>
                        <td><?php echo $data_pengiriman['tanggal_bayar']; ?></td>
                        <td><?php echo $jumlah_barang_pengiriman; ?></td>
                        <td><?php echo $jumlah_box_pengiriman; ?></td>
                        <td><?php echo $data_pengiriman['status_pengiriman']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
