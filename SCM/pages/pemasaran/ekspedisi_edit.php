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

    <title>Ubah Data Ekspedisi - PT. Multi Instrumentasi</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!-- <link href="../vendor/morrisjs/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
              var nama_ekspedisi = document.forms["Form"]["nama_ekspedisi"].value;
              var no_telepon = document.forms["Form"]["no_telepon"].value;
              var x = confirm("Apakah Anda yakin ingin mengubah data ini ?");
              if (namabahan==null)
              {
                alert("Nama Bahan Harus Terisi");
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
          $id_ekspedisi = $_GET["id_ekspedisi"];
          $query_mysql = mysqli_query($koneksi,"SELECT * FROM ekspedisi WHERE id_ekspedisi='$id_ekspedisi'") or die(mysqli_error());
          $nomor = 1;
          while ($data = mysqli_fetch_array($query_mysql)) {
          ?>

                      <h1 class="page-header">Ubah Data Ekspedisi</h1>
                    <form action="ekspedisi_edit_aksi.php" method="post" name="Form">
                      <div class="form-group">
                          <input type="hidden" name="id_ekspedisi" value="<?php echo $data['id_ekspedisi']; ?>">
                      </div>
                      <div class="form-group">
                          <label>Nama Ekspedisi</label>
                          <input class="form-control" type="text" name="nama_ekspedisi" value="<?php echo $data['nama_ekspedisi']; ?>">
                      </div>
                      <div class="form-group">
                          <label>Nomor Telepon</label>
                          <input class="form-control" type="number" name="no_telepon" value="<?php echo $data['no_telepon']; ?>">
                      </div>
                      <input type="submit" value="Ubah" Onclick="return validasi_form()" class="btn btn-default">
                    </form>



    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="../vendor/bootstrap/js/bootstrap.min.js"></script> -->

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <!-- <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php } ?>
