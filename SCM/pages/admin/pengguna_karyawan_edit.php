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

    <title>Edit Data Pengguna Karyawan - PT. Multi Instrumentasi</title>

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
  <script type="text/javascript">
            function validasi_form()
            {
              var username = document.forms["Form"]["username"].value;
              var password = document.forms["Form"]["password"].value;
              var x = confirm("Apakah Anda yakin ingin mengubah data ini ?");
              if (namakaryawan==null || namakaryawan=="",jabatan==null"")
              {
                alert("Semua Kolom Harus Terisi");
                return false;
              }
              else
              {
                if (x)
                {
                  return true;
                }
                else
                {
                  return false;
                }
              }
            }
          </script>
          <?php
          include 'koneksi.php';
          $nik = $_GET["nik"];
          $query_mysql  = mysqli_query($koneksi,"SELECT karyawan.nik AS nik,karyawan.nama_karyawan AS nama_karyawan, pengguna.username AS username,
             pengguna.password AS password, pengguna.hak_akses AS hak_akses
             FROM pengguna INNER JOIN p_karyawan ON pengguna.username=p_karyawan.username
             INNER JOIN karyawan ON p_karyawan.nik=karyawan.nik WHERE karyawan.nik = '$nik'") or die(mysqli_error());
          $nomor = 1;
          while ($data = mysqli_fetch_array($query_mysql)) {
          ?>

                      <h1 class="page-header">Ubah Data Pengguna Karyawan</h1>
                    <form action="pengguna_karyawan_edit_aksi.php" method="post" name="Form">
                      <h4>NIK : <?php echo $data['nik']; ?></h4>
                      <h4>Nama Karyawan : <?php echo $data['nama_karyawan']; ?></h4>
                      <div class="form-group">
                          <label>Username</label>
                          <input type="hidden" name="username_lama" value="<?php echo $data['username']; ?>">
                          <input type="hidden" name="nik" value="<?php echo $data['nik']; ?>">
                          <input class="form-control" type="text" name="username" value="<?php echo $data['username']; ?>">
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input class="form-control" type="password" name="password" value="<?php echo $data['password']; ?>">
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
                      <input type="submit" value="Ubah" Onclick="return validasi_form()" class="btn btn-default">
                    </form>



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
<?php } ?>
