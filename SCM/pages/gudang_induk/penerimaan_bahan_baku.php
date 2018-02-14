<!DOCTYPE html>
<?php
include 'koneksi.php';
$query_pengadaan  = "SELECT
                    peng.id_pengadaan id_pengadaan,
                    peng.tanggal tanggal,
                    peng.id_bahanbaku id_bahanbaku,
                    pem.nama_pemasok nama_pemasok,
                    bb.nama_bahan nama_bahan,
                    peng.jumlah jumlah,
                    peng.status status
               FROM pengadaan peng
               JOIN pemasok pem
               ON peng.id_pemasok = pem.id_pemasok
               JOIN bahan_baku bb
               ON peng.id_bahanbaku = bb.id_bahanbaku
               WHERE status = 'Menunggu Kedatangan Barang'
               ";
$sql_pengadaan = mysqli_query($koneksi,$query_pengadaan);
//navicat
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Penerimaan Bahan Baku</title>
    </head>
    <body>
        <div class="row">
            <div class="col-md-8">
                <h2 class="page-header">Penerimaan Bahan Baku</h2>
                <table border="1" class="table">
                    <tr class="info">
                        <td>No</td>
                        <td>Tanggal Pembelian</td>
                        <td>Nama Pemasok</td>
                        <td>Nama Barang</td>
                        <td>Jumlah Barang</td>
                        <td>Status Pembelian</td>
                        <td>Opsi</td>
                    </tr>
                    <?php
                        $nomor = 1;
                        $id_pengadaan;
                        while ($data_pengadaan = mysqli_fetch_array($sql_pengadaan)) {
                            $id_pengadaan = $data_pengadaan['id_pengadaan'];
                            $id_bahanbaku = $data_pengadaan['id_bahanbaku'];
                            $jumlah = $data_pengadaan['jumlah'];
                    ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data_pengadaan['tanggal']; ?></td>
                        <td><?php echo $data_pengadaan['nama_pemasok']; ?></td>
                        <td><?php echo $data_pengadaan['nama_bahan']; ?></td>
                        <td><?php echo $data_pengadaan['jumlah']; ?></td>
                        <td><?php echo $data_pengadaan['status']; ?></td>
                        <td>
                            <form action="penerimaan_bahan_baku_aksi.php" method="post">
                                <input type="hidden" name="id_pengadaan" value="<?php echo $id_pengadaan; ?>">
                                <input type="hidden" name="id_bahanbaku" value="<?php echo $id_bahanbaku; ?>">
                                <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                                <input type="submit" name="submit" Onclick="return Konfirmasi_tambah_stok()" value="Konfirmasi Terima Barang">
                            </form>
                        </td>
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
function Konfirmasi_tambah_stok()
{
    var x = confirm("Apakah Anda yakin akan menambahkan stok barang ke dalam Gudang Induk ?");
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
