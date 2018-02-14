<?php
include 'koneksi.php';

$action = isset($_POST['action']) ? $_POST['action'] : false;
$data = isset($_POST['data']) ? $_POST['data'] : false;

switch (strtolower($action)) {
   case 'insert_preko':
      insert_preko($koneksi, $data);
      break;

   default:
      # code...
      break;
}


function insert_preko($koneksi, $data){
    date_default_timezone_set("Asia/Jakarta");

    $tanggal = date("Y-m-d");
    for ($i=0; $i < count($data); $i++) {
        $id_bahanbaku = $data[$i]['id_bahanbaku'];
        $jumlah_beli = $data[$i]['jumlah_beli'];
        // lakuin insert
        $query = mysqli_query($koneksi,"INSERT INTO preko (tanggal_pengajuan,id_bahanbaku,jumlah,status)
                                        VALUES ('$tanggal','$id_bahanbaku','$jumlah_beli','Diajukan')");

        if(!$query) $cek = false;
        else $cek = true;
    }

    echo json_encode($cek);
}
