<!DOCTYPE html>
<?php
    include 'koneksi.php';
    //get data PREKO
    $query_preko = mysqli_query($koneksi,"SELECT
                                                pre.id_preko id_preko,
                                                pre.tanggal_pengajuan tanggal_pengajuan,
                                                pre.id_bahanbaku id_bahanbaku,
                                                bb.nama_bahan nama_bahan,
                                                pre.jumlah jumlah
                                          FROM preko pre
                                          JOIN bahan_baku bb
                                          ON bb.id_bahanbaku=pre.id_bahanbaku
                                          ")
                                          or die(mysqli_error());
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PREKO</title>
    </head>
    <body>
        <div class="row">
            <h2 class="page-header">PREKO yang Diterima</h2>
            <div class="col-md-6">
                <table border="1" class="table">
                    <tr class="info">
                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>ID Bahan</th>
                        <th>Nama Bahan</th>
                        <th>Jumlah</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                        $nomor = 1;
                        $id_preko;
                        //fetch data dari db ke tabel
                        while ($data_preko = mysqli_fetch_array($query_preko)) {
                    ?>
                    <tr>
                        <?php $id_preko = $data_preko['id_preko']; ?>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data_preko['tanggal_pengajuan']; ?></td>
                        <td><?php echo $data_preko['id_bahanbaku']; ?></td>
                        <td><?php echo $data_preko['nama_bahan']; ?></td>
                        <td><?php echo $data_preko['jumlah']; ?></td>
                        <td><a class="btn btn-success" href="index.php?page=pembelian_bahan&id_preko=<?php echo $id_preko;?>">Lakukan Pembelian</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>

            </div>
        </div>
    </body>
</html>
