<h1 class="page-header">Tambah Data Produk</h1>
<form class="style-form" role="form" id="form_produk">
  <div class="row">
    <!-- panel 1 -->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label">ID Produk</label>
        <input class="form-control" id="id_produk" type="text" name="idproduk">
      </div>
      <div class="form-group">
        <label class="control-label">Nama Produk</label>
        <input class="form-control" id="nama_produk" type="text" name="namaproduk">
      </div>

      <div class="form-group">
        <label class="control-label">Harga Produk</label>
        <input class="form-control" id="harga_produk" type="text" name="hargaprod">
      </div>
    </div>

    <!-- panel 2 -->
    <div class="col-md-6">
      <!-- form bahan baku -->
      <div class="row">
        <!-- field bahan baku -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Bahan Baku</label>
            <select class="form-control" id="nama_bahanbaku" name="nama_bahanbaku">
            </select>
          </div>
        </div>

        <!-- field jumlah -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Jumlah</label>
            <div class="input-group">
                <input class="form-control" id="jumlah_bahanbaku" type="text" name="jumlah_bahanbaku">
                <span class="input-group-btn">
                  <button type="button" id="add_list" class="btn btn-round btn-primary" data-original-title="Toggle Navigation">+</button>
                </span>
            </div>
          </div>
        </div>
      </div>
      <!-- tabel bahan baku -->
      <div class="row">
        <div class="col-md-12">
          <table id="tabel_komposisi" class="table table-hover">
            <thead>
              <tr>
                  <th>NO</th>
                  <th>Bahan Baku</th>
                  <th>Jumlah</th>
                  <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <button type="submit" id="btn_submit_produk" value="proses_tambah_produk" class="btn btn-default">Proses</button>
    </div>
  </div>
</form>
<script>
var list_item=[];
var index_item=0;
</script>

<script>
$(document).ready(function(){
   set_select_bahanbaku();
   $("#add_list").click(function(){
         add_list();
   });

   $("#form_produk").submit(function(e){
      e.preventDefault();
      submit();
      return false;
   })

});

function add_list(){
   var index = index_item++;
   var id_bahanbaku = $("#nama_bahanbaku").val();
   var nama_bahanbaku = $("#nama_bahanbaku option:selected").text();
   var jumlah_bahanbaku = parseFloat($("#jumlah_bahanbaku").val());
   var id_produk = $("#id_produk").val();
   var data_item = {
      aksi: "tambah", status: "", index: index_item,
      id_bahanbaku: id_bahanbaku, nama_bahanbaku: nama_bahanbaku,
      jumlah: jumlah_bahanbaku, id_produk: id_produk
   };
   console.log(data_item);

   list_item.push(data_item);
   console.log(list_item);
   $("#tabel_komposisi > tbody:last-child").append(
      "<tr>"+
         "<td></td>"+
         "<td>"+nama_bahanbaku+"</td>"+
         "<td>"+field_jumlah(jumlah_bahanbaku, index)+"</td>"+
         "<td>"+button_aksi()+"</td>"+
      "</tr>"

   );
   number_list();
}

function getdataform(){
      var data_produk = {
         id_produk: $("#id_produk").val(),
         nama_produk: $("#nama_produk").val(),
         harga_produk: parseInt($("#harga_produk").val()),
      };
      var data = {
         "action": $("#btn_submit_produk").val(),
         "data_produk": data_produk,
      };
      return data;
}


function submit(){
   var data = getdataform();
   data.data_komposisi = list_item;

   console.log(data);
   $.ajax({
      url: "http://localhost/scm/lib/api_produk.php",
      type:"post",
      dataType: "json",
      data: data,
      success: function(hasil){
         console.log(hasil);
         if(hasil){
            document.location="http://localhost/scm/pages/produksi/index.php?page=pengelolaan_data_produk";
         }
         else{
            alert("Error !!");
         }
      },
      error: function (jqXHR, textStatus, errorThrown){
         console.log(jqXHR, textStatus, errorThrown);
      }
   })
}

function number_list(){
   $('#tabel_komposisi tbody tr').each(function (index){
      $(this).children("td:eq(0)").html(index+ 1);
   })
};

function field_jumlah(jumlah, index){
   var field = '<input type="number" min="0" step=0.01 onchange="onchange_qty('+index+', this)" style="width: 5em" class"form-control value="'+jumlah+'">';
   return field;
};

function button_aksi(index){
   var button = '<button type="button" class="button btn-danger btn-sm" onclick="delList('+index+',this)"><i class="fa fa-trash"></button>';
   return button;
}

function set_select_bahanbaku(){
   $.ajax({
      url: "http://localhost/scm/lib/api_produk.php",
      type:"post",
      dataType: "json",
      data: {"action": "get_bahan_baku"},
      success: function(data){
         $.each(data, function(index,item){
            var option = new Option(item.text, item.value);
            $("#nama_bahanbaku").append(option);
         });
      },
      error: function (jqXHR, textStatus, errorThrown){
         console.log(jqXHR, textStatus, errorThrown);
      }
   })
}

</script>
