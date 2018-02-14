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
    $id_bahanbaku = $_GET['id_bahanbaku'];
    mysqli_query($koneksi,"DELETE FROM bahan_baku WHERE id_bahanbaku='$id_bahanbaku'") or die(mysqli_error()) ;
    header("location:index.php?page=pengelolaan_data_bahanbaku");
     ?>
<?php
// }
?>
