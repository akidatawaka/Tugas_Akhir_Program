<?php
include 'koneksi.php';
//get data dari pembelian_bahan.php
$tanggal = $_POST['tanggal'];
$id_pemasok = $_POST['id_pemasok'];
$id_bahanbaku = $_POST['id_bahanbaku'];
$jumlah_barang = $_POST['jumlah_barang'];
$harga_satuan = $_POST['hargaSatuan'];
$total_harga = $_POST['totalHarga'];
$id_preko = $_POST['id_preko'];
$jumlah_barang = $_POST['jumlah_barang'];




// $insert_pengadaan = "INSERT INTO pengadaan VALUES
//                     ('','$tanggal','$id_pemasok','$id_bahanbaku','$harga_satuan','$total_harga','Menunggu Kedatangan Barang')"
//                     or die(mysqli_error());


$insert_pengadaan =  "INSERT INTO pengadaan (tanggal,id_pemasok,id_bahanbaku,jumlah,harga,total_harga,status)";
$insert_pengadaan .= " VALUES ('$tanggal','$id_pemasok','$id_bahanbaku','$jumlah_barang','$harga_satuan','$total_harga','Menunggu Kedatangan Barang')";
//var_dump($insert_pengadaan);
 $delete_preko = "DELETE FROM preko WHERE id_preko = '$id_preko'";


// var_dump($insert_pengadaan);
//     if(mysqli_query($koneksi, $delete_preko)){
// if(mysqli_query($koneksi, $insert_pengadaan)){
//         header("location:index.php?page=preko");
//     }
// // }
mysqli_query($koneksi, $insert_pengadaan);
mysqli_query($koneksi, $delete_preko);
header("location:index.php?page=preko");
