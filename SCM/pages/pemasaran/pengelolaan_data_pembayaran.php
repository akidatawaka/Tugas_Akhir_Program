<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pengelolaan Data Pembayaran</title>
    </head>
    <body>
        <h1 class="page-header">Pengelolaan Data Pembayaran</h2>
        <!-- DATA KONFIRMASI PEMBAYARAN  -->
        <div class="row">
            <h3 class="page-header">Konfirmasi Pembayaran</h2>
            <div class="col-md-9">
                <table border="1" class="table">
                    <tr class="info">
                        <th>No</th>
                        <th>Tanggal Penjualan</th>
                        <th>Nama Pelanggan</th>
                        <th>Status Pembayaran</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                        include 'koneksi.php';
                        $query_konfirmasi  = "SELECT penjualan.id_penjualan id_penjualan,
                                penjualan.tanggal tanggal_penjualan,
                                pelanggan.nama_pelanggan nama_pelanggan,
                                penjualan.status_pembayaran status_pembayaran
                                FROM pelanggan JOIN penjualan ON pelanggan.id_pelanggan = penjualan.id_pelanggan
                                WHERE status_pembayaran = 'BELUM DIBAYAR'
                                ;
                        ";
                        $sql_konfirmasi = mysqli_query($koneksi,$query_konfirmasi) or die(mysqli_error());
                        //inisialisasi nomor
                        $nomor_konfirmasi = 1;
                        $id_penjualan = 0;
                    ?>
                    <?php
                        while ($data_konfirmasi = mysqli_fetch_array($sql_konfirmasi)) {
                    ?>
                    <tr>
                        <?php $id_penjualan = $data_konfirmasi['id_penjualan'];  ?>
                        <td><?php echo $nomor_konfirmasi++; ?></td>
                        <td><?php echo $data_konfirmasi['tanggal_penjualan']; ?></td>
                        <td><?php echo $data_konfirmasi['nama_pelanggan']; ?></td>
                        <td class="danger"><?php echo $data_konfirmasi['status_pembayaran']; ?></td>
                        <td>
                        <form action="pembayaran_konfirmasi.php" method="post">
                            <input type="hidden" name="id_penjualan" id="id_penjualan" value="<?php echo $id_penjualan; ?>">
                            <input type="submit" class="btn btn-primary" Onclick="return Konfirmasi_bayar()" name="submit" value="Konfirmasi Pembayaran">
                        </form>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>
        </div>
        <!-- DATA PEMBAYARAN  -->
        <div class="row">
            <h3 class="page-header">Data Pembayaran</h3>
            <div class="col-md-9">
            <form action="index.php?page=pengelolaan_data_pembayaran" method="post">
            <div class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" name="katakunci" class="form-control" placeholder="Pencarian Data Penjualan">
                <span class="input-group-btn">
                <input class="btn btn-default" type="submit" name="submit">
                    <i class="fa fa-search"></i>
                </input>
            </span>
            </div>
            <br>
            <!-- /input-group
          </div>
          </form> -->
          </div>
          </div>
      </div>

          <div class="row">
            <div class="col-md-9">
                <table border="1" class="table">
                    <tr class="info">
                        <th>No</th>
                        <th>Tanggal Penjualan</th>
                        <th>Nama Pelanggan</th>
                        <th>Status Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                    </tr>
                    <?php
                        $katakunci = $_POST['katakunci'];
                        $submit = $_POST['submit'];
                        if ($submit) {
                            //jika kata kunci tidak sama dengan kosong
                            if ($katakunci != "") {
                                $query_pembayaran = "SELECT penjualan.id_penjualan id_penjualan,
                                        penjualan.tanggal tanggal_penjualan,
                                        pelanggan.nama_pelanggan nama_pelanggan,
                                        penjualan.status_pembayaran status_pembayaran,
                                        penjualan.tanggal_bayar tanggal_pembayaran
                                        FROM pelanggan JOIN penjualan ON pelanggan.id_pelanggan = penjualan.id_pelanggan
                                        WHERE nama_pelanggan LIKE '%$katakunci%'
                                ";
                            } else {
                                $query_pembayaran = "SELECT penjualan.id_penjualan id_penjualan,
                                        penjualan.tanggal tanggal_penjualan,
                                        pelanggan.nama_pelanggan nama_pelanggan,
                                        penjualan.status_pembayaran status_pembayaran,
                                        penjualan.tanggal_bayar tanggal_pembayaran
                                        FROM pelanggan JOIN penjualan ON pelanggan.id_pelanggan = penjualan.id_pelanggan
                                ";
                            }
                        } else {
                            $query_pembayaran  = "SELECT penjualan.id_penjualan id_penjualan,
                                    penjualan.tanggal tanggal_penjualan,
                                    pelanggan.nama_pelanggan nama_pelanggan,
                                    penjualan.status_pembayaran status_pembayaran,
                                    penjualan.tanggal_bayar tanggal_pembayaran
                                    FROM pelanggan JOIN penjualan ON pelanggan.id_pelanggan = penjualan.id_pelanggan
                            ";
                        }
                    $sql_pembayaran = mysqli_query($koneksi,$query_pembayaran) or die(mysqli_error());
                    //inisialisasi nomor
                    $nomor_pembayaran = 1;
                    $status_pembayaran;
                    $tanggal_pembayaran;
                    $warna_status ;
                    ?>
                    <?php
                        while ($data_pembayaran = mysqli_fetch_array($sql_pembayaran)) {
                            $status_pembayaran = $data_pembayaran['status_pembayaran'];
                            $tanggal_pembayaran = $data_pembayaran['tanggal_pembayaran'];
                            if ($status_pembayaran != "SUDAH DIBAYAR") {
                                $tanggal_pembayaran = "-";
                                $warna_status = "danger";
                            } else {
                                $warna_status = "success";
                            }
                    ?>
                    <tr>
                        <td><?php echo $nomor_pembayaran++; ?></td>
                        <td><?php echo $data_pembayaran['tanggal_penjualan']; ?></td>
                        <td><?php echo $data_pembayaran['nama_pelanggan']; ?></td>
                        <td class="<?php echo $warna_status; ?>"><?php echo $status_pembayaran; ?></td>
                        <td><?php echo $tanggal_pembayaran; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
  function Konfirmasi_bayar()
  {
    var x = confirm("Apakah Anda yakin akan konfirmasi transaksi ini ?");
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
