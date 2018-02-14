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
    $id_pelanggan = $_GET['id_pelanggan'];
    mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id_PELANGGAN='$id_pelanggan'") or die(mysqli_error()) ;
    header("location:index.php?page=pengelolaan_data_pelanggan");
     ?>
<?php
// }
?>
