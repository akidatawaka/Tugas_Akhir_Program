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
    $id_produk = $_GET['id_produk'];
    $res1 = mysqli_query($koneksi,"DELETE FROM komposisi WHERE id_produk='$id_produk'") or die(mysqli_error()) ;
    $res2 = mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$id_produk'") or die(mysqli_error()) ;
    header("location:index.php?page=pengelolaan_data_produk");
     ?>
<?php
// }
?>
