<?php
    include 'koneksi.php';
    //melakukan pencarian bahan Baku
    $query_produk = "SELECT * FROM produk;";
    $sql_produk = mysqli_query($koneksi,$query_produk) or die(mysqli_error());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Produksi Harian</title>
    </head>
    <body>
        <div class="row">
            <h2 class="page-header">Produksi Harian Produk</h2>
            <div class="col-md-6">
                <form class="" action="produksi_harian_aksi.php" method="post">
                    <label>Tanggal Produksi</label>
                    <input type="date" class="form-control" name="tanggal_produksi" value="tanggal_produksi"><br>
                    <label>Produk yang di Produksi</label>
                    <select name="id_produk" class="form-control" id="id_produk">
                      <option value="" disabled="disabled" selected="selected">--Pilih Produk--</option>
                      <?php while ($data_produk = mysqli_fetch_array($sql_produk)) { ?>
                      <option value="<?php echo $data_produk['id_produk']; ?>"><?php echo $data_produk['nama_produk']; ?></option>
                      <?php } ?>
                    </select><br>
                    <label>Jumlah Produksi</label><br>
                    <input type="number" class="form-control" name="jumlah_produksi" placeholder="Jumlah Produk yang Diproduksi"><br>
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
                </form>
            </div>
        </div>
        <?php
            //query data permintaan bahan Baku
            $query_produksi = "SELECT produk.id_produk id_produk,
            produksi.tanggal tanggal_produksi,
            produksi.jumlah jumlah_produksi,
            produk.nama_produk nama_produk
            FROM produk JOIN produksi ON produk.id_produk = produksi.id_produk
            ORDER BY tanggal_produksi ASC
            ;";

            $sql_produksi = mysqli_query($koneksi,$query_produksi) or die(mysqli_error());
        ?>
        <div class="row">
            <h2 class="page-header">Data Produksi Harian</h2>
            <div class="col-md-10">
                <table border="1" class="table">
                    <tr class="info">
                        <th>Nomor</th>
                        <th>Tanggal Produksi</th>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Produksi</th>
                    </tr>
                    <?php
                    $nomor = 1;
                    while ($data_produksi = mysqli_fetch_array($sql_produksi)) {
                    ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data_produksi['tanggal_produksi']; ?></td>
                        <td><?php echo $data_produksi['id_produk']; ?></td>
                        <td><?php echo $data_produksi['nama_produk']; ?></td>
                        <td><?php echo $data_produksi['jumlah_produksi']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
