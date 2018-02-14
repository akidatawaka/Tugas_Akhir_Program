<?php
    include 'koneksi.php';
    //melakukan pencarian bahan Baku
    $query_bahanbaku = "SELECT * FROM bahan_baku;";
    $sql_bahanbaku = mysqli_query($koneksi,$query_bahanbaku) or die(mysqli_error());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Permintaan Bahan Baku</title>
    </head>
    <body>
        <div class="row">
            <h2 class="page-header">Permintaan Bahan Baku</h2>
            <div class="col-md-6">
                <form class="" action="permintaan_bahanbaku_aksi.php" method="post">
                    <label>Tanggal Pengajuan</label>
                    <input type="date" class="form-control" name="tanggal_pengajuan" value="tanggal_pengajuan"><br>
                    <label>Bahan Baku yang diajukan</label>
                    <select name="id_bahanbaku" class="form-control" id="id_bahanbaku">
                      <option value="" disabled="disabled" selected="selected">--Pilih Bahan Baku--</option>
                      <?php while ($data_bahanbaku = mysqli_fetch_array($sql_bahanbaku)) { ?>
                      <option value="<?php echo $data_bahanbaku['id_bahanbaku']; ?>"><?php echo $data_bahanbaku['nama_bahan']; ?></option>
                      <?php } ?>
                    </select><br>
                    <label>Jumlah Bahan Baku</label><br>
                    <input type="number" class="form-control" name="jumlah_bahanbaku" placeholder="Jumlah Bahan Baku yang Diajukan"><br>
                    <input type="submit" class="btn btn-primary" name="submit" value="Ajukan Permintaan">
                </form>
            </div>
        </div>
        <?php
            //query data permintaan bahan Baku
            $query_permintaan = "SELECT permintaan_bahanbaku.tanggal_pengajuan tanggal_pengajuan,
            permintaan_bahanbaku.id_bahanbaku id_bahanbaku,
            bahan_baku.nama_bahan nama_bahan,
            permintaan_bahanbaku.jumlah jumlah,
            permintaan_bahanbaku.status_permintaan status_permintaan
            FROM permintaan_bahanbaku JOIN bahan_baku ON permintaan_bahanbaku.id_bahanbaku = bahan_baku.id_bahanbaku
            ORDER BY tanggal_pengajuan ASC
            ;";

            $sql_permintaan = mysqli_query($koneksi,$query_permintaan) or die(mysqli_error());
        ?>
        <div class="row">
            <h2 class="page-header">Data Permintaan Bahan Baku</h2>
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
                    while ($data_permintaan = mysqli_fetch_array($sql_permintaan)) {
                    ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data_permintaan['tanggal_pengajuan']; ?></td>
                        <td><?php echo $data_permintaan['id_bahanbaku']; ?></td>
                        <td><?php echo $data_permintaan['nama_bahan']; ?></td>
                        <td><?php echo $data_permintaan['jumlah']; ?></td>
                        <td><?php echo $data_permintaan['status_permintaan']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
