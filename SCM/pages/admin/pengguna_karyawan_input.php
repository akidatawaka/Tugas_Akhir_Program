<?php
/*
error_reporting(1);
session_start();
if (empty($_SESSION['username'])) {
  header("location:../../index.php?pesan=belum_login");
}
else {
  $username = $_SESSION['username'];
*/
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Data Pengguna Karyawan - PT. Multi Instrumentasi</title>

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
  <?php
  include 'koneksi.php';
  $query_mysql = mysqli_query($koneksi,"SELECT * FROM karyawan;");
   ?>
                <h1 class="page-header">Tambah Data Pengguna Karyawan</h1>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                  <form action="pengguna_karyawan_input_aksi.php" method="post">
                    <div class="form-group">
                      <label>Nama Karyawan</label>
                      <select name="nik" class="form-control">
                        <option value="" disabled="disabled" selected="selected">--Pilih Karyawan--</option>
                        <?php while ($data = mysqli_fetch_array($query_mysql)) { ?>
                        <option value="<?php echo $data['nik']; ?>"><?php echo $data['nama_karyawan']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input class="form-control" type="text" name="username">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input class="form-control" type="password" name="password">
                    </div>
                    <div class="form-group">
                      <label>Hak Akses</label>
                      <select name="hak_akses" class="form-control">
                        <option value="" disabled="disabled" selected="selected">--Pilih Hak Akses--</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Pengadaan">Pengadaan</option>
                        <option value="Gudang_Induk">Gudang Induk</option>
                        <option value="Produksi">Produksi</option>
                        <option value="Pemasaran">Pemasaran</option>
                        <option value="Keuangan">Keuangan</option>
                        <option value="Direktur">Direktur</option>
                      </select>
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-default">
                  </form>
                </div>

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
<?php// } ?>
