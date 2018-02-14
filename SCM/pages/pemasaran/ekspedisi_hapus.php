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
    $id_ekspedisi = $_GET['id_ekspedisi'];
    mysqli_query($koneksi,"DELETE FROM ekspedisi WHERE id_ekspedisi='$id_ekspedisi'") or die(mysqli_error()) ;
    header("location:index.php?page=pengelolaan_data_ekspedisi");
     ?>
<?php
// }
?>
