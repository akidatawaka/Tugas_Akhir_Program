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
    $id_pemasok = $_GET['id_pemasok'];
    mysqli_query($koneksi,"DELETE FROM pemasok WHERE id_pemasok='$id_pemasok'") or die(mysqli_error()) ;
    header("location:index.php?page=pengelolaan_data_pemasok");
     ?>
<?php
// }
?>
