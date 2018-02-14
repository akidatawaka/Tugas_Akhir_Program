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
    $username = $_GET['username'];
    $res1= mysqli_query($koneksi,"DELETE FROM p_karyawan WHERE username='$username'") or die(mysqli_error()) ;
    $res2= mysqli_query($koneksi,"DELETE FROM pengguna WHERE username='$username'") or die(mysqli_error()) ;
    header("location:index.php?page=pengelolaan_data_pengguna_karyawan");
     ?>
<?php
// }
?>
