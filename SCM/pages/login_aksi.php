<?php
include 'koneksi.php';
//membuat variabel
$username = $_POST['username'];
$password = $_POST['password'];

//menyesuaikan dengan data di database
 $query = "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'";
 $hasil = mysqli_query($koneksi,$query);
 if (mysqli_num_rows($hasil)>0) {
 $row = mysqli_fetch_array($hasil);
 $hak_akses =  $row['hak_akses'];
 session_start();
   if ($hak_akses == "Administrator") {
    //  session_start();
     $_SESSION['username']=$username;
     header("location:admin/index.php");
   } else if ($hak_akses == "Pemasok") {
    //  session_start();
     $_SESSION['username']=$username;
     header("location:pemasok/index.php");
   } else if ($hak_akses == "Produksi") {
    //  session_start();
     $_SESSION['username']=$username;
     header("location:produksi/index.php");
   } else if ($hak_akses == "Pemasaran") {
    //  session_start();
     $_SESSION['username']=$username;
     header("location:pemasaran/index.php");
   } else if ($hak_akses == "Direktur") {
    //  session_start();
     $_SESSION['username']=$username;
     header("location:direktur/index.php");
   } else if ($hak_akses == "Pengadaan") {
    //  session_start();
     $_SESSION['username']=$username;
     header("location:pengadaan/index.php");
   } else if ($hak_akses == "Gudang_Induk") {
    //  session_start();
     $_SESSION['username']=$username;
     header("location:gudang_induk/index.php");
   } else if ($hak_akses == "Pemasok") {
    //  session_start();
     $_SESSION['username']=$username;
     header("location:pemasok/index.php");
   }
   $_SESSION['hak_akses']=$hak_akses;
 }
 else {
   header("location:index.php?pesan=salah");
 }
 ?>
