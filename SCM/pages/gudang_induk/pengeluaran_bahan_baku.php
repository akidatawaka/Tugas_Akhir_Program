<?php
include 'koneksi.php';

$query_permintaan = "SELECT permintaan_bahanbaku.tanggal_pengajuan tanggal_pengajuan,
permintaan_bahanbaku.id_bahanbaku id_bahanbaku,
bahan_baku.nama_bahan nama_bahan,
permintaan_bahanbaku.jumlah jumlah,
permintaan_bahanbaku.status_permintaan status_permintaan,
permintaan_bahanbaku.id_permintaan_bb id_permintaan_bb
FROM permintaan_bahanbaku JOIN bahan_baku ON permintaan_bahanbaku.id_bahanbaku = bahan_baku.id_bahanbaku
WHERE status_permintaan = 'MENUNGGU KONFIRMASI'
ORDER BY tanggal_pengajuan ASC
;";

$sql_permintaan = mysqli_query($koneksi,$query_permintaan) or die(mysqli_error());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pengeluaran Bahan Baku</title>
    </head>
    <body>
        <div class="row">
            <h3 class="page-header">Pengeluaran Bahan Baku</h2>
            <div class="col-md-12">
                <table border="1" class="table">
                    <tr class="info">
                        <th>Nomor</th>
                        <th>Tanggal Pengajuan</th>
                        <th>ID Bahan Baku</th>
                        <th>Nama Bahan Baku</th>
                        <th>Jumlah yang Diminta</th>
                        <th>Status Permintaan</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                    $nomor = 1;
                    while ($data_permintaan = mysqli_fetch_array($sql_permintaan)) {
                        $id_permintaan_bb = $data_permintaan['id_permintaan_bb'];
                    ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data_permintaan['tanggal_pengajuan']; ?></td>
                        <td><?php echo $data_permintaan['id_bahanbaku']; ?></td>
                        <td><?php echo $data_permintaan['nama_bahan']; ?></td>
                        <td><?php echo $data_permintaan['jumlah']; ?></td>
                        <td><?php echo $data_permintaan['status_permintaan']; ?></td>
                        <td>
                            <form class="" action="pengeluaran_bahan_baku_aksi.php" method="post">
                                <input type="hidden" name="id_permintaan_bb" value="<?php echo $id_permintaan_bb; ?>">
                                <input type="hidden" name="id_bahanbaku" value="<?php echo $data_permintaan['id_bahanbaku']; ?>">
                                <input type="hidden" name="jumlah_pengeluaran" value="<?php echo $data_permintaan['jumlah']; ?>">
                                <input type="submit" Onclick="return Konfirmasi_keluar_stok()" class="btn btn-primary" name="submit" value="Setujui Pengeluaran Bahan Baku">
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
            //query data permintaan bahan Baku
            $query_data_permintaan = "SELECT permintaan_bahanbaku.tanggal_pengajuan tanggal_pengajuan,
            permintaan_bahanbaku.id_bahanbaku id_bahanbaku,
            bahan_baku.nama_bahan nama_bahan,
            permintaan_bahanbaku.jumlah jumlah,
            permintaan_bahanbaku.status_permintaan status_permintaan
            FROM permintaan_bahanbaku JOIN bahan_baku ON permintaan_bahanbaku.id_bahanbaku = bahan_baku.id_bahanbaku
            ORDER BY tanggal_pengajuan ASC
            ;";

            $sql_data_permintaan = mysqli_query($koneksi,$query_data_permintaan) or die(mysqli_error());
        ?>
        <div class="row">
            <h3 class="page-header">Data Mutasi Bahan Baku</h2>
            <div class="col-md-10">
                <table border="1" class="table">
                    <tr class="info">
                        <th>Nomor</th>
                        <th>Tanggal Pengajuan</th>
                        <th>ID Bahan Baku</th>
                        <th>Nama Bahan Baku</th>
                        <th>Jumlah yang Diminta</th>
                        <th>Status Permintaan</th>
                    </tr>
                    <?php
                    $nomor = 1;
                    while ($data_permintaan2 = mysqli_fetch_array($sql_data_permintaan)) {
                    ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data_permintaan2['tanggal_pengajuan']; ?></td>
                        <td><?php echo $data_permintaan2['id_bahanbaku']; ?></td>
                        <td><?php echo $data_permintaan2['nama_bahan']; ?></td>
                        <td><?php echo $data_permintaan2['jumlah']; ?></td>
                        <td><?php echo $data_permintaan2['status_permintaan']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

<script>
function Konfirmasi_keluar_stok()
{
    var x = confirm("Apakah Anda yakin akan mengeluarkan bahan baku dari Gudang Induk ?");
    if (x)
    {
        return true;
    }
    else
    {
        return false;
    }
}
</script>
