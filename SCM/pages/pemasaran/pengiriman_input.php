<?php
include 'koneksi.php';
$id_penjualan = $_POST['id_penjualan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$tanggal_pembayaran = $_POST['tanggal_pembayaran'];
$jumlah_barang = $_POST['jumlah_barang'];
$jumlah_box = $_POST['jumlah_box'];

$query_ekspedisi =
                "SELECT id_ekspedisi,
                nama_ekspedisi
                FROM ekspedisi
                ;";
$sql_ekspedisi = mysqli_query($koneksi,$query_ekspedisi) or die(mysqli_error());
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tambah Pengiriman</title>
    </head>
    <body>
        <h2 class="page-header">Tambah Pengiriman</h2>
        <div class="row">
            <div class="col-md-6">
                <form action="pengiriman_input_aksi.php" method="post">
                <label class="control-label">Nama Pelanggan     : <?= $nama_pelanggan; ?> </label> <br>
                <label class="control-label">Tanggal Pembayaran : <?= $tanggal_pembayaran; ?> </label> <br>
                <label class="control-label">Jumlah Barang      : <?= $jumlah_barang; ?> </label> <br>
                <label class="control-label">Jumlah Box         : <?= $jumlah_box; ?> </label> <br>
                <label class="control-label">Ekspedisi Pengirim : </label>
                <select name="id_ekspedisi" class="form-control" id="id_ekspedisi">
                  <option value="" disabled="disabled" selected="selected">--Pilih Ekspedisi--</option>
                  <?php while ($data_ekspedisi = mysqli_fetch_array($sql_ekspedisi)) { ?>
                  <option value="<?php echo $data_ekspedisi['id_ekspedisi']; ?>"><?php echo $data_ekspedisi['nama_ekspedisi']; ?></option>
                  <?php } ?>
              </select><br>
                <label class="control-label">Tanggal Kirim : </label><br>
                <input type="date" class="form-control" name="tanggal_kirim" value="tanggal_kirim"><br>
                <input type="hidden" name="id_penjualan" value="<?php echo $id_penjualan; ?>">
                <input type="hidden" name="jumlah_barang" value="<?php echo $jumlah_barang; ?>">
                <input type="hidden" name="jumlah_box" value="<?php echo $jumlah_box; ?>">
                <input type="submit" class="btn btn-primary" Onclick='return Konfirmasi_kirim()' name="submit" value="Lakukan Pengiriman">
                </form>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
  function Konfirmasi_kirim()
  {
    var x = confirm("Apakah Anda yakin ingin mengirimkan produk ?");
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
