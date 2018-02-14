<?php
include 'koneksi.php';

$action = isset($_POST['action']) ? $_POST['action'] : false;

switch (strtolower($action)) {

   case 'tambah_penjualan':
      tambah_penjualan($koneksi);
      break;

   default:
      # code...
      break;
}

function tambah_penjualan($koneksi){
    $data_penjualan = isset($_POST['data_penjualan']) ? $_POST['data_penjualan'] : false;
    $detil_penjualan = isset($_POST['detil_penjualan']) ? $_POST['detil_penjualan'] : false;

    // insert ke produk
    $tanggal = $data_penjualan['tanggal'];
    $id_pelanggan = $data_penjualan['id_pelanggan'];
    $query_autoincrement  = "SELECT `AUTO_INCREMENT` auto FROM INFORMATION_SCHEMA.TABLES ";
    $query_autoincrement .= "WHERE TABLE_SCHEMA = 'pt_mi' AND TABLE_NAME = 'penjualan'";

    $sql_autoincrement = mysqli_query($koneksi,$query_autoincrement);
    while ($data_autoincrement = mysqli_fetch_array($sql_autoincrement)) {
        $var_auto = $data_autoincrement['auto'];
    }

    if(mysqli_query($koneksi,"INSERT INTO penjualan (id_penjualan,tanggal,id_pelanggan,status_pembayaran) VALUES('','$tanggal', '$id_pelanggan','BELUM DIBAYAR')")){
       // pecah array utamanya
       foreach($detil_penjualan as $index => $array){
          // cek yang bukan statusnya hapus
          if($detil_penjualan[$index]['status'] != "hapus"){
             // get data komposisi
             foreach($detil_penjualan[$index] as $key => $value){
                $dataInsert[$key] = $value;
             }
             // insert datanya ke komposisi
             $id_produk = $dataInsert['id_produk'];
             $jumlah = $dataInsert['jumlah'];
             $subtotal = $dataInsert['sub_total'];

             mysqli_query($koneksi,"INSERT INTO detil_penjualan VALUES('$var_auto','$id_produk','$jumlah','$subtotal')");
          }
       }
       $status = true;
    }
    else{
       $status = false;
    }

    // $output = array(
    //     'data_penjualan' => $data_penjualan,
    //     'detil_penjualan' => $detil_penjualan,
    // );

    echo json_encode($status);
}
