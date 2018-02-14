<?php
include 'koneksi.php';
get_bahanbaku($koneksi);
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
      // foreach ($data_bahanbaku as $row) {
      //       $data_row = array();
      //       $data_row['value'] = $row['id_bahanbaku'];
      //       $data_row['text'] = $row['nama_bahan'];
      //       $data[] = $data_row;
      // }
      echo json_encode($data);
}
