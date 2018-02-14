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

    <title>Pengolahan Data Karyawan - PT. Multi Instrumentasi</title>

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
  $katakunci = (!empty($_POST["katakunci"]));
  $submit = (!empty($_POST["submit"]));
  /*
  $katakunci = "";
  $submit = "";
   */?>
        <h1 class="page-header">Pengelolaan Data Pengguna Karyawan</h1>
                <div class="col-lg-12">
                    <form action="index.php?page=pengelolaan_data_karyawan" method="post">
                    <div class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" name="katakunci" class="form-control" placeholder="Pencarian Data Pengguna">
                        <span class="input-group-btn">
                        <input class="btn btn-default" type="submit" name="submit">
                            <i class="fa fa-search"></i>
                        </input>

                    </span>
                    </div>
                    <!-- /input-group -->
                  </div>
                  </form>
                </div>

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
                  <h5><a href="index.php?page=pengguna_karyawan_input"> + Tambah Data Pengguna Karyawan</a> | <a href="index.php?page=pengelolaan_data_pengguna"> Tampilkan Keseluruhan Data</a></h5>
                  <table border="1" class="table">
                    <tr class="info">
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama Karyawan</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Hak Akses</th>
                      <th>Opsi</th>
                    </tr>
                    <?php
                    include 'koneksi.php';

                    $katakunci = $_POST["katakunci"];
                    $submit = $_POST["submit"];
                    if ($submit) {
                      //jika kata kunci tidak sama dengan kosong
                      if ($katakunci !="") {
                        $query_mysql = mysqli_query($koneksi,"SELECT karyawan.nik AS nik, karyawan.nama_karyawan AS nama_karyawan , pengguna.username AS username ,
                           pengguna.password AS password , pengguna.hak_akses AS hak_akses
                           FROM pengguna INNER JOIN p_karyawan ON pengguna.username=p_karyawan.username
                           INNER JOIN karyawan ON p_karyawan.nik=karyawan.nik
                           WHERE nama_karyawan LIKE '%$katakunci%'") or die(mysqli_error());
                      } else {
                      $query_mysql = mysqli_query($koneksi,"SELECT karyawan.nik AS nik, karyawan.nama_karyawan AS nama_karyawan, pengguna.username AS username,
                           pengguna.password AS password, pengguna.hak_akses AS password
                           FROM pengguna INNER JOIN p_karyawan ON pengguna.username=p_karyawan.username
                           INNER JOIN karyawan ON p_karyawan.nik=karyawan.nik") or die(mysqli_error());
                      }
                    } else {
                      $query_mysql = mysqli_query($koneksi,"SELECT karyawan.nik AS nik,karyawan.nama_karyawan, pengguna.username,
                         pengguna.password, pengguna.hak_akses
                         FROM pengguna INNER JOIN p_karyawan ON pengguna.username=p_karyawan.username
                         INNER JOIN karyawan ON p_karyawan.nik=karyawan.nik") or die(mysqli_error());
                    }

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
                      <td><?php echo $data['nik']; ?></td>
                      <td><?php echo $data['nama_karyawan']; ?></td>
                      <td><?php echo $data['username']; ?></td>
                      <td><?php echo $data['password']; ?></td>
                      <td><?php echo $data['hak_akses']; ?></td>
                      <td>
                        <a class="btn btn-primary" href="index.php?page=pengguna_karyawan_edit&&nik=<?php echo $data['nik']; ?>">Edit Data</a>
                        <a class="btn btn-warning" Onclick="return Konfirmasi_hapus()" href="pengguna_karyawan_hapus.php?username=<?php echo $data['username']; ?>">Hapus Data</a>
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
