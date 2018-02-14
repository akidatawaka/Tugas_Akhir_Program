<?php
/*

session_start();
if (empty($_SESSION['username'])) {
  header("location:../../index.php?pesan=belum_login");
}
else {
  $username = $_SESSION['username'];
*/
error_reporting(1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detil Penjualan - PT. Multi Instrumentasi</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php $id_penjualan = $_GET["id_penjualan"];
    ?>
        <h1 class="page-header">Detil Penjualan </h1>
                <script type="text/javascript">
                  function Konfirmasi_hapus()
                  {
                    var x = confirm("Apakah Anda yakin ingin menghapus data ?");
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

                <div class="col-lg-12">
                  <table border="1" class="table">
                    <tr class="info">
                      <th>No</th>
                      <th>ID Produk</th>
                      <th>Nama Produk</th>
                      <th>Jumlah</th>
                      <th>Sub Total</th>
                      <th>Opsi</th>
                    </tr>
                    <?php
                    include 'koneksi.php';
                    $query_mysql = mysqli_query($koneksi,"SELECT produk.id_produk id_produk,
                            produk.nama_produk nama_produk, detil_penjualan.jumlah jumlah,
                            detil_penjualan.subtotal subtotal
                            FROM produk INNER JOIN detil_penjualan ON produk.id_produk=detil_penjualan.id_produk
                            WHERE detil_penjualan.id_penjualan='$id_penjualan'") or die(mysqli_error());


                    //mengecek pencarian data
                    $nomor = 1;
                    $cek = mysqli_num_rows($query_mysql);
                    if ($cek < 1) {
                    ?>
                    <h3>Data Tidak Ditemukan</h3>
                    <?php } else {
                        while ($data = mysqli_fetch_array($query_mysql)) {
                    ?>
                    <tr>
                      <td><?php echo $nomor++; ?></td>
                      <td><?php echo $data['id_produk']; ?></td>
                      <td><?php echo $data['nama_produk']; ?></td>
                      <td><?php echo $data['jumlah']; ?></td>
                      <td><?php echo $data['subtotal']; ?></td>
                      <td>
                        <a class="btn btn-primary" href="index.php?page=komposisi_edit&&id_bahan=<?php echo $data['id_bahan'];?>&&id_produk=<?php echo $id_produk;?>">Edit Data</a>
                        <a class="btn btn-warning" Onclick="return Konfirmasi_hapus()" href="index.php?page=komposisi_hapus&&id_bahan=<?php echo $data['id_bahan'];?>&&id_produk=<?php echo $id_produk;?>">Hapus Data</a>
                      </td>
                    </tr>
                  <?php    } }?>
                  </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php //} ?>
