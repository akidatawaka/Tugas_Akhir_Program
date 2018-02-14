<?php
    //mengambil data produk
    include 'koneksi.php';
    $query_mysql = mysqli_query($koneksi,"SELECT * FROM produk;");
    $id_produk = "";
    $periode_peramalan = "";
    // $submit = (!empty($_POST["submit"]));

    $btn_hitung_perencanaan = isset($_POST['btn_hitung_perencanaan']) ? $_POST['btn_hitung_perencanaan'] : false;
    if($btn_hitung_perencanaan){ // jika btn hitung di klik
       $id_produk = $_POST['id_produk'];
       $periode_peramalan = $_POST['periode_peramalan'];
       //get data nama produk
       $query_nama = mysqli_query($koneksi, "SELECT nama_produk from produk
                                             WHERE id_produk='$id_produk'");
       $nama_produk = mysqli_fetch_assoc($query_nama);

    // menghitung peramalan
       //get bulan sebelumnya
       $bulansebelumnya = date('Y-m-d', strtotime('-1 months', strtotime($periode_peramalan)));

       //get bulan sebelumnya yang 4 bulan (bulan pertama)
       $bulanPertama = date('Y-m-d', strtotime('-4 months', strtotime($periode_peramalan)));

       //query sql
       $query = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah_periode
                                        FROM rencana_produksi WHERE (tanggal_rencana BETWEEN
                                        '$bulanPertama' AND '$bulansebelumnya') AND id_produk = '$id_produk'
                                        GROUP BY YEAR(tanggal_rencana), MONTH(tanggal_rencana) ORDER BY YEAR(tanggal_rencana) ASC, MONTH(tanggal_rencana) ASC");

       $temp = 0;
       $jumlah_bulan = 0;
       while($angka_rencana = mysqli_fetch_array($query)){
          $temp += $angka_rencana['jumlah_periode'];
          $jumlah_bulan++;
       }
       // var_dump($temp);

       //hitung Peramalan
       $hasil_peramalan = ceil($temp/$jumlah_bulan);

       //MENGHITUNG KOMPOSISI
       $querykomposisi = mysqli_query($koneksi,"SELECT
                                                bb.id_bahanbaku id_bahanbaku,
                                                bb.nama_bahan nama_bahan,
                                                k.jumlah jumlah
                                                FROM komposisi k
                                                JOIN bahan_baku bb ON k.id_bahanbaku=bb.id_bahanbaku
                                                WHERE k.id_produk='$id_produk'");

        // var_dump(mysqli_fetch_array($querykomposisi));
        $array_komposisi = array();
        while($data_komposisi = mysqli_fetch_array($querykomposisi)){
           $row = array();
           $row['id_bahanbaku'] = $data_komposisi['id_bahanbaku'];
           $row['nama_bahan'] = $data_komposisi['nama_bahan'];
           $row['jumlah'] = $data_komposisi['jumlah'];

           $array_komposisi[] = $row;
        }

        // var_dump($array_komposisi);

    }

    //menghitung button input btn_input_perencanaan
    // $btn_input_perencanaan = isset($_POST['btn_input_perencanaan']) ? $_POST['btn_input_perencanaan'] : false;
    // if ($btn_input_perencanaan) { //jika tombol input perencanaan di klik
    //     # code...
    //
    // }
?>

<!-- Bootstrap Datepicker  -->
<link href="http://localhost/scm/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script src="http://localhost/scm/dist/js/bootstrap-datepicker.min.js"></script>


<h1 class="page-header">Perencanaan Produksi</h1>
<div class="row">
         <div class="col-md-4">
               <h2 class="page-header">Tambah Perencanaan Produksi</h1>
               <form class="style-form" role="form" id="perencanaan_produksi" action="" method="post">
                   <!-- panel 1 -->
                     <div class="form-group">
                       <label class="control-label">Perencanaan Bulan</label>
                       <input class="form-control datepicker" id="periode_peramalan" type="text" name="periode_peramalan">
                       <label>Nama Produk</label>
                       <select name="id_produk" class="form-control" id="id_produk">
                           <option value="" disabled="disabled" selected="selected">--Pilih Produk--</option>
                           <?php while ($data = mysqli_fetch_array($query_mysql)) { ?>
                           <option value="<?php echo $data['id_produk']; ?>"><?php echo $data['nama_produk']; ?></option>
                           <?php } ?>
                        </select>
                        <button type="submit" id="btn_hitung_perencanaan" name="btn_hitung_perencanaan" value="hitung_perencanaan" class="btn btn-default">Hitung</button>
                     </div>
               </form>
         </div>
         <div class="col-md-8">
               <h2 class="page-header">Hasil Peramalan Perencanaan Produksi</h2>
               <div class="form-group">
                  <label class="control-label">ID Produk             : <?= $id_produk; ?> </label><br>
                  <label class="control-label">Nama Produk           : <?= $nama_produk['nama_produk']; ?> </label><br>
                  <label class="control-label">Bulan yang Diramalkan : <?= $periode_peramalan; ?></label><br>
                  <label class="control-label">Hasil Peramalan       : <?=$hasil_peramalan ?></label>
               </div>
               <table border="1" class="table">
                   <tr class="info">
                       <td>No</td>
                       <td>ID Bahan Baku</td>
                       <td>Nama Bahan Baku</td>
                       <td>Komposisi (Gram/Set) </td>
                       <td>Rencana Produksi</td>
                       <td>Kebutuhan Bahan Baku (Kilogram/Set)</td>
                   </tr>

                   <?php $nomor = 1;
                         $kebutuhan_bahan_baku = 0;
                         $jumlah_bahan = 0;
                         for($i=0; $i<count($array_komposisi); $i++){
                             //mengubah satuan jumlah gram menjadi kilogram
                             // $jumlah_bahan = ceil($array_komposisi[$i]['jumlah']/1000);
                             //menghitung kebutuhan bahan baku
                             if ($array_komposisi[$i]['id_bahanbaku'] =='BB06' || $array_komposisi[$i]['id_bahanbaku']=='BB07') {
                                 # code...
                                 $kebutuhan_bahan_baku = ceil(($array_komposisi[$i]['jumlah'] * $hasil_peramalan));
                             } else {
                                 # code...
                                 $kebutuhan_bahan_baku = ceil(($array_komposisi[$i]['jumlah'] * $hasil_peramalan)/1000);
                             }
                             echo "<tr>";
                             echo "<td>".$nomor."</td>";
                             echo "<td>".$array_komposisi[$i]['id_bahanbaku']."</td>";
                             echo "<td>".$array_komposisi[$i]['nama_bahan']."</td>";
                             echo "<td>".$array_komposisi[$i]['jumlah']."</td>";
                             echo "<td>".$hasil_peramalan."</td>";
                             echo "<td>".$kebutuhan_bahan_baku."</td>";
                             echo "</tr>";
                             $nomor++;
                         }
                    ?>
               </table>
               <a class="btn btn-default" href="perencanaan_input_aksi.php?id_produk=<?php echo $id_produk; ?>&&hasil_peramalan=<?php echo $hasil_peramalan;?>&&periode_peramalan=<?php echo $periode_peramalan;?>">Tambah Rencana Produksi</a>
               <!-- <button type="submit"  id="btn_input_perencanaan" name="btn_input_perencanaan" value="input_perencanaan" class="btn btn-default">Input Perencanaan</button> -->
               <!-- href="index.php?page=input_perencanaan&&id_produk=<?php echo $id_produk; ?>&&hasil_peramalan=<?php echo $hasil_peramalan;?>&&periode_peramalan=<?php echo $periode_peramalan;?>"  -->


         </div>
</div>

         <div class="row">
            <div class="col-md-10">
               <h1 class="page-header">Data Perencanaan Produksi</h1>
               <table border="1" class="table">
                 <tr class="info">
                   <th>No</th>
                   <th>Tanggal Rencana Produksi</th>
                   <th>ID Produk</th>
                   <th>Nama Produk</th>
                   <th>Jumlah</th>
                   <th>Status Produksi</th>
                   <th>Opsi</th>
                 </tr>
                 <?php
                 include 'koneksi.php';
                 $query_mysql2 = mysqli_query($koneksi,"SELECT rencana_produksi.id_rencana as id_rencana ,
                         rencana_produksi.tanggal_rencana as tanggal,
                         rencana_produksi.id_produk as id_produk,
                         produk.nama_produk as nama_produk,
                         rencana_produksi.jumlah as jumlah,
                         rencana_produksi.status_rencana as status_rencana
                         FROM produk INNER JOIN rencana_produksi ON produk.id_produk=rencana_produksi.id_produk
                         ORDER BY tanggal DESC")
                         or die(mysqli_error());

                 //inisialisasi nomor
                 $nomor = 1;
                 $id_rencana = 0;
                 ?>
              <?php
                  while ($data = mysqli_fetch_array($query_mysql2)) {
              ?>
                 <tr>
                    <?php $id_rencana = $data['id_rencana']; ?>
                   <td><?php echo $nomor++; ?></td>
                   <td><?php echo $data['tanggal']; ?></td>
                   <td><?php echo $data['id_produk']; ?></td>
                   <td><?php echo $data['nama_produk']; ?></td>
                   <td><?php echo $data['jumlah']; ?></td>
                   <?php
                   $status_rencana = $data['status_rencana'];
                   $warna;
                   if ($status_rencana == "Sudah") {
                       $warna="success";
                   } elseif ($status_rencana == "Belum") {
                       $warna="danger";
                   }
                   ?>
                   <td class="<?php echo $warna ?>"><?php echo $status_rencana; ?></td>
                   <td><a class="btn btn-warning" Onclick="return Konfirmasi_hapus()" href="perencanaan_hapus.php?id_rencana=<?php echo $id_rencana; ?>">Hapus Data</a></td>
                 </tr>
             <?php } ?>
               </table>
           </div>
         </div>


<script type="text/javascript">
   $('#periode_peramalan').datepicker({
      format: "yyyy-mm-dd",
      startView: "months",
      minViewMode: "months",
      autoclose: true,
      todayHighlight: true
   });
</script>

<script type="text/javascript">
  function Konfirmasi_hapus()
  {
    var x = confirm("Apakah Anda yakin ingin menghapus data ?");
    if (x)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
</script>
