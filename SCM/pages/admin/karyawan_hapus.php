<?php
/*session_start();
if (empty($_SESSION['username'])) {
  header("location:login.php?pesan=belum_login");
}
else {
*/
 ?>
    <?php
    include 'koneksi.php';
    $nik = $_GET['nik'];
    mysqli_query($koneksi,"DELETE FROM karyawan WHERE nik='$nik'") or die(mysqli_error()) ;
    header("location:index.php?page=pengelolaan_data_karyawan");
     ?>
<?php
// }
?>
