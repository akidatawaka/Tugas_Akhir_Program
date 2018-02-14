<!DOCTYPE html>
<?php
include 'koneksi.php';

 ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Monitoring Persediaan</title>
    </head>
    <body>
        <div class="row">
        <h1 class="page-header">Persediaan Bahan Baku</h1>
        <!-- Panel Persediaan Bahan Baku  -->
        <div class="col-md-6">
            <table border="1" class="table">
                <tr class="info">
                    <th>No</th>
                    <th>ID Bahan Baku</th>
                    <th>Nama Bahan</th>
                    <th>Jumlah Di Gudang Induk</th>
                </tr>
                <?php
                //memasukkan tabel persediaan
                $query_sql = mysqli_query($koneksi, "SELECT * FROM bahan_baku");
                $nomor = 1;
                while ($data = mysqli_fetch_array($query_sql)) {
                ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $data['id_bahanbaku']; ?></td>
                    <td><?php echo $data['nama_bahan']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        </div>

        <div class="row">
        <h1 class="page-header">Permintaan Bahan Baku</h1>
            <div class="col-md-9">
                <table border="1" class="table">
                    <tr class="info">
                        <th>No</th>
                        <th>Tanggal Perencanaan</th>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Perencanaan </th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                        //memasukkan tabel rencana produksi
                        $query_rencana = mysqli_query($koneksi,"SELECT rencana_produksi.id_rencana as id_rencana,
                                rencana_produksi.tanggal_rencana as tanggal,
                                rencana_produksi.id_produk as id_produk,
                                produk.nama_produk as nama_produk,
                                rencana_produksi.jumlah as jumlah,
                                rencana_produksi.status_rencana as status_rencana
                                FROM produk INNER JOIN rencana_produksi ON produk.id_produk=rencana_produksi.id_produk
                                WHERE status_rencana='Belum'
                                ORDER BY tanggal DESC")
                                or die(mysqli_error());
                        $nomor = 1;
                        while ($data2 = mysqli_fetch_array($query_rencana)) {
                            $id_rencana = $data2['id_rencana'];
                            $id_produk  = $data2['id_produk'];
                    ?>
                    <tr>

                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data2['tanggal'];?></td>
                        <td><?php echo $data2['id_produk'];?></td>
                        <td><?php echo $data2['nama_produk'];?></td>
                        <td><?php echo $data2['jumlah'];?></td>
                        <td><?php echo $data2['status_rencana'];?></td>
                        <td><a class="btn btn-success" href="index.php?page=detil_safetystock&&id_rencana=<?php echo $id_rencana; ?>&&id_produk=<?php echo $id_produk ?>">Ajukan Pengadaan Bahan Baku</a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </body>
</html>
