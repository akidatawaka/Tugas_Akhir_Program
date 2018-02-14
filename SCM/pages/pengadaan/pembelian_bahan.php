<?php
    date_default_timezone_set("Asia/Jakarta");
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        //get dari JavaScript
        $id_pemasokterpilih = $_GET['id_pemasok_terpilih'];
        $harga_terpilih = $_GET['harga_terpilih'];

        //get id PREKO
        $id_preko = $_GET['id_preko'];
        var_dump($id_preko);
        $satuan;
        $query_preko = mysqli_query($koneksi,"SELECT
                                                    pre.id_preko id_preko,
                                                    pre.tanggal_pengajuan tanggal_pengajuan,
                                                    pre.id_bahanbaku id_bahanbaku,
                                                    bb.nama_bahan nama_bahan,
                                                    pre.jumlah jumlah
                                              FROM preko pre
                                              JOIN bahan_baku bb
                                              ON bb.id_bahanbaku=pre.id_bahanbaku
                                              WHERE id_preko='$id_preko'
                                              ")
                                              or die(mysqli_error());

        //load data Pemasok
        $query_pemasok = mysqli_query($koneksi,"SELECT
                                                        pem.id_pemasok id_pemasok,
                                                        pem.nama_pemasok nama_pemasok,
                                                        dtl.harga harga
                                                FROM pemasok pem
                                                JOIN detil_bahanbaku dtl
                                                ON pem.id_pemasok = dtl.id_pemasok
        ")
        or die(mysqli_error());
        ?>
        <div class="row">
            <?php
            while ($data_preko = mysqli_fetch_array($query_preko)) {
                if ($data_preko['id_bahanbaku']=="BB06" || $data_preko['id_bahanbaku']=="BB07") {
                    $satuan = "Set";
                } else {
                    $satuan = "Kilogram";
                }
                $jumlah = $data_preko['jumlah'];
            ?>
            <h2 class="page-header">Pembelian Bahan Baku</h2>
            <label>ID Bahan Baku            : <?php echo $data_preko['id_bahanbaku']; ?> </label><br>
            <label>Nama Bahan               : <?php echo $data_preko['nama_bahan']; ?></label><br>
            <label>Jumlah                   : <?php echo $data_preko['jumlah'];?>  <?php echo $satuan;?></label><br>
            <label>Pemasok yang Dipilih     : </label>
            <select name="pemasok" id="pemasok" onchange="hitungTotal()">
              <option value="" disabled="disabled" selected="selected">--Pilih Pemasok--</option>
              <?php while ($data_pemasok = mysqli_fetch_array($query_pemasok))
                {
                    $id_pemasokterpilih = $data_pemasok['id_pemasok'];
                    $harga_satuannya = $data_pemasok['harga'];
              ?>
              <option value="<?php echo $id_pemasokterpilih.' | '.$harga_satuannya?>"><?php echo $data_pemasok['nama_pemasok'].' - '.$data_pemasok['harga'];?></option>
              <?php }

              ?>
          </select><br>
            <!-- <label>Harga Satuan             : <?php echo $harga_terpilih; ?> </label><br>
            <label>Total Harga              : Rp. <?php echo $harga_terpilih * $jumlah; ?></label><br> -->
            <form action="pembelian_bahan_aksi.php" method="post">
                <?php
                //get tanggal hari ini
                $tanggal = date("Y-m-d");
                ?>
                <input type="hidden" name="id_preko" value="<?php echo $id_preko; ?>">
                <input type="hidden" name="jumlah_barang" value="<?php echo $jumlah; ?>">
                <input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>">
                <input type="hidden" name="id_pemasok" id="id_pemasok" value="">
                <input type="hidden" name="id_bahanbaku" value="<?php echo $data_preko['id_bahanbaku'];?>">
                <label>Harga Satuan: </label> <input type="text" readonly id="hargaSatuan" name="hargaSatuan">
                <br>
                <label>Total Harga: </label> <input type="text" readonly id="totalHarga" name="totalHarga"><br>
                <input type="submit" name="submit" value="Beli Bahan Baku">
            </form>

        <?php
            }
        ?>
        </div>
    </body>
</html>
<script>
    // onchange select pemasok
    var selectPemasok = document.getElementById("pemasok");

    selectPemasok.onchange = function(){
        var array = selectPemasok.value.split(" | ");
        document.getElementById("hargaSatuan").value = array[1];
        document.getElementById("totalHarga").value = hitungTotal(array);

        document.getElementById("id_pemasok").value = array[0];
    };

    function hitungTotal(nilai) {
        // var pemasok = document.getElementById("pemasok").value;
        // var array = pemasok.split(" | ");
        // var id_preko = "<?php echo $id_preko ?>"
        // var id_pemasok_terpilih = array[0];
        // var harga_terpilih = array[1];
        // window.location.href = "index.php?page=pembelian_bahan&&id_pemasok_terpilih=" + id_pemasok_terpilih "&&harga_terpilih=" + harga_terpilih + "&&id_preko="+ id_preko;
        var jumlah = "<?php echo $jumlah ?>";
        return parseInt(nilai[1]) * parseInt(jumlah);
    }
</script>
