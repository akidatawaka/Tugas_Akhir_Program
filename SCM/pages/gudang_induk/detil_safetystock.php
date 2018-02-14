<?php
date_default_timezone_set("Asia/Jakarta");
include 'koneksi.php';

//get data dari monitoring_persediaan.php
$id_rencana = $_GET["id_rencana"];
$id_produk = $_GET["id_produk"];
$safety_stock_produk = 148;
$rencana_produksi;

$query_rencana = mysqli_query($koneksi,"SELECT rencana_produksi.id_rencana as id_rencana,
        rencana_produksi.tanggal_rencana as tanggal,
        rencana_produksi.id_produk as id_produk,
        produk.nama_produk as nama_produk,
        rencana_produksi.jumlah as jumlah,
        rencana_produksi.status_rencana as status_rencana
        FROM produk INNER JOIN rencana_produksi ON produk.id_produk=rencana_produksi.id_produk
        WHERE id_rencana ='$id_rencana'
        ORDER BY tanggal DESC")
        or die(mysqli_error());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Detil Safety Stock</title>
    </head>
    <body>
    <div class="row">
        <h1 class="page-header">Monitoring Persediaan Permintaan Bahan Baku</h1>
            <div class="col-md-6">
                <?php
                    while ($data = mysqli_fetch_array($query_rencana)) {
                        # code...
                        $rencana_produksi = $data['jumlah'];
                ?>
                <label class="control-label">Tanggal Perencanaan    : <?php echo $data['tanggal']; ?> </label><br>
                <label class="control-label">ID Produk              : <?php echo $data['id_produk']; ?></label><br>
                <label class="control-label">Nama Produk            : <?php echo $data['nama_produk']; ?></label><br>
                <label class="control-label">Jumlah                 : <?php echo $data['jumlah']; ?> Unit</label><br>
                <label class="control-label">Safety Stock Produk    : <?php echo $safety_stock_produk; ?></label>
                <?php
                    }
                ?>
            </div>
    </div>
    <?php
        //ambil data bahan baku dengan komposisi dari database
        $query_safety = mysqli_query($koneksi,
                        "SELECT bb.id_bahanbaku id_bahanbaku,
                                bb.nama_bahan nama_bahan,
                                kom.jumlah jumlah_komposisi,
                                bb.jumlah jumlah_stok
                        FROM bahan_baku bb
                        JOIN komposisi kom
                        ON bb.id_bahanbaku=kom.id_bahanbaku
                        WHERE kom.id_produk = '$id_produk'")
                        or die(mysqli_error());
    ?>
    <div class="row">
        <h1 class="page-header">Kebutuhan Bahan Baku</h1>
            <div class="col-md-12">
                <table border="1" class="table">
                    <tr class="info">
                        <th>No</th>
                        <th>ID Bahan</th>
                        <th>Nama Bahan</th>
                        <th>Komposisi (Gram) </th>
                        <th>Kebutuhan Bahan Baku (Kilogram)</th>
                        <th>Safety Stock Bahan Baku (Kilogram)</th>
                        <th>Stok Gudang Induk (Kilogram)</th>
                        <th>Jumlah Bahan Baku Yang Harus Dibeli (Kilogram)</th>
                    </tr>
                    <?php
                        $nomor =1;
                        $kebutuhan_bahan_baku;
                        $jumlah_komposisi;
                        $safety_stock_bb;
                        $jumlah_stok_bb;
                        $bahanbaku_harus_beli;
                        //membuat array untuk menampung data di tabel sejumlah bahan baku
                        $temp_array = array();
                        while ($data_bb = mysqli_fetch_array($query_safety)) {
                            # code...

                            //Hitung Jumlah Kebutuhan Bahan Baku
                                //memasukkan jumlah komposisi ke variabel
                                $jumlah_komposisi = $data_bb['jumlah_komposisi'];
                                //hitung jumlah kebutuhan bahan baku
                                $kebutuhan_bahan_baku = $rencana_produksi * ($jumlah_komposisi/1000);

                            //Hitung Safety Stock Bahan Baku
                                //menghitung safety stock bahan baku
                                $safety_stock_bb = $safety_stock_produk * ($jumlah_komposisi/1000);

                            //mengembalikan nilai body casing
                                if ($data_bb['id_bahanbaku'] == 'BB06' || $data_bb['id_bahanbaku'] == 'BB07') {
                                    # code...
                                    $kebutuhan_bahan_baku = $kebutuhan_bahan_baku * 1000;
                                    $safety_stock_bb = $safety_stock_bb * 1000;
                                }
                                $kebutuhan_bahan_baku = ceil($kebutuhan_bahan_baku);
                                $safety_stock_bb = ceil($safety_stock_bb);

                            //memasukkan jumlah stok gudang ke variabel
                                $jumlah_stok_bb = $data_bb['jumlah_stok'];

                            //menghitung jumlah bahan baku yang harus dibeli
                                $bahanbaku_harus_beli = $kebutuhan_bahan_baku + $safety_stock_bb - $jumlah_stok_bb;

                            //jika bahan baku harus beli bernilai minus maha harus dibikin 0
                                if ($bahanbaku_harus_beli < 0) {
                                    # code...
                                    $bahanbaku_harus_beli = 0;
                                } else {
                                    //membuat array untuk menampung data id bahan baku dan jumlah beli
                                    $data_temp_array = array();
                                    $data_temp_array['id_bahanbaku'] = $data_bb['id_bahanbaku'];
                                    $data_temp_array['jumlah_beli'] = $bahanbaku_harus_beli;

                                    //memasukkan data_temp array ke dalam array temp_array
                                    $temp_array[] = $data_temp_array;
                                }



                    ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data_bb['id_bahanbaku']; ?></td>
                        <td><?php echo $data_bb['nama_bahan']; ?></td>
                        <td><?php echo $jumlah_komposisi ?></td>
                        <td><?php echo $kebutuhan_bahan_baku; ?></td>
                        <td><?php echo $safety_stock_bb; ?></td>
                        <td><?php echo $jumlah_stok_bb ?></td>
                        <td><?php echo $bahanbaku_harus_beli; ?></td>
                        <?php
                            }

                        //get tanggal hari ini
                        $tanggal = date("Y-m-d");
                        //isset dari button submit
                        // $btn_ajukan_preko = isset($_POST['btn_ajukan_preko']) ? $_POST['btn_ajukan_preko'] : false;
                        // //jika button btn_ajukan_preko di klik
                        // if ($btn_ajukan_preko) {
                        //
                        //     // for ($i=0; $i < count($temp_array); $i++) {
                        //     //     $id_bahanbaku = $temp_array[$i]['id_bahanbaku'];
                        //     //     $jumlah_beli = $temp_array[$i]['jumlah_beli'];
                        //     //     // lakuin insert
                        //     //     $query = mysqli_query($koneksi,"INSERT INTO preko (tanggal_pengajuan,id_bahanbaku,jumlah,status)
                        //     //                                     VALUES ('$tanggal','$id_bahanbaku','$jumlah_beli','Diajukan')");
                        //     //
                        //     // }
                        //     // header("location:index.php?page=monitoring_persediaan");
                        //     echo "Test Test";
                        // }
                        ?>
                    </tr>
                </table>
                    <button type="button" id="btn_ajukan_preko" class="btn btn-default">Ajukan PREKO</button>
                            </div>

    </div>
    </body>
</html>
<!-- <?php var_dump($temp_array); ?><br>
<?php var_dump($tanggal); ?> -->
<script type="text/javascript">
    $('#btn_ajukan_preko').click(function(){
        var data = <?php echo json_encode($temp_array); ?>;
        $.ajax({
           url: "http://localhost/scm/lib/api_preko.php",
           type:"post",
           dataType: "json",
           data: {
               "action": "insert_preko",
               "data": data,
           },
           success: function(hasil){
              console.log(hasil);
              if(hasil){
                 document.location="http://localhost/scm/pages/gudang_induk/index.php?page=monitoring_persediaan";
                 alert("PREKO Berhasil Diajukan");
              }
              else{
                 alert("Error !!");
              }
           },
           error: function (jqXHR, textStatus, errorThrown){
              console.log(jqXHR, textStatus, errorThrown);
           }
        })
        // alert('test');
    });
</script>
