<?php
include 'koneksi.php';

$action = isset($_POST['action']) ? $_POST['action'] : false;

switch (strtolower($action)) {
   case 'get_bahan_baku':
    get_bahanbaku($koneksi);
    break;

   case 'proses_tambah_produk':
    tambah_produk($koneksi);
    break;

  case 'getharga':
    $id_produk = isset($_POST['id_produk']) ? $_POST['id_produk'] : false;
    getharga($koneksi,$id_produk);
    break;


   default:
      # code...
      break;
}


function get_bahanbaku($koneksi){
      $query_mysql = mysqli_query($koneksi,"SELECT * FROM bahan_baku") or die(mysqli_error());

      $data = array(
         array(
            'value' => "",
            'text' => "-- Pilih Bahan Baku -- ",
         ),
      );

      while($data_bahanbaku = mysqli_fetch_array($query_mysql)){
         $data_row = array();
         $data_row['value'] = $data_bahanbaku['id_bahanbaku'];
         $data_row['text'] = $data_bahanbaku['nama_bahan'];
         $data[] = $data_row;
      }

      echo json_encode($data);
}

function getharga($koneksi,$id_produk){
    $query_harga_produk = "SELECT harga FROM produk WHERE id_produk = '$id_produk'";
    $sql_harga_produk = mysqli_query($koneksi,$query_harga_produk) or die(mysqli_error());
    while($data_harga_produk = mysqli_fetch_array($sql_harga_produk)){
        $harga_produk = $data_harga_produk['harga'];
    }
    echo json_encode($harga_produk);
}


function tambah_produk($koneksi){
   $data_produk = isset($_POST['data_produk']) ? $_POST['data_produk'] : false;
   $data_komposisi = isset($_POST['data_komposisi']) ? $_POST['data_komposisi'] : false;

   // insert ke produk
   $id_produk = $data_produk['id_produk'];
   $nama_produk = $data_produk['nama_produk'];
   $harga = $data_produk['harga_produk'];

   if(mysqli_query($koneksi,"INSERT INTO produk(id_produk,nama_produk,harga) VALUES('$id_produk','$nama_produk', '$harga')")){
      // pecah array utamanya
      foreach($data_komposisi as $index => $array){
         // cek yang bukan statusnya hapus
         if($data_komposisi[$index]['status'] != "hapus"){
            // get data komposisi
            $dataInsert['id_produk']= $data_produk['id_produk'];
            foreach($data_komposisi[$index] as $key => $value){
               $dataInsert[$key] = $value;
            }
            // insert datanya ke komposisi
            $id_produk_komposisi = $dataInsert['id_produk'];
            $id_bahan_baku_komposisi = $dataInsert['id_bahanbaku'];
            $jumlah_komposisi = $dataInsert['jumlah'];

            mysqli_query($koneksi,"INSERT INTO komposisi VALUES('$id_produk_komposisi','$id_bahan_baku_komposisi','$jumlah_komposisi')");
         }
      }
      $status = true;
   }
   else{
      $status = false;
   }

   echo json_encode($status);
}
