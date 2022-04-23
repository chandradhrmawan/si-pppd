<form name="form" id="form" enctype="multipart/form-data" method="post">
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Form Input Data Service</h3>   
      </div>
      <div class="box-body pad">
            <div class="form-group">
              <label>Pilih Kendaraan Dari Jadwal Service</label>
              <br/>
              <button type="button" class="btn btn-info btn-sm btn-flat" onclick="modalJadwalKendaraan()">Pilih Kendaraan <span class="fa fa-search"></span></button>
            </div>

            <div class="form-group">
              <label>No Polisi</label>
              <input type="text" class="form-control" disabled="true" id="no_plat">
              <input type="hidden" name="no_polisi" id="no_polisi" value="">
              <input type="hidden" name="id_jadwal" id="id_jadwal" value="">
            </div>

            <div class="form-group">
              <label>Nama Kendaraan</label>
              <input type="text" class="form-control" disabled="true" id="judul">
            </div>

            <div class="form-group">
              <label>Tgl Service</label>
              <input type="text" class="form-control" disabled="true" id="tgl_service" value="<?=date('d-m-Y')?>">
            </div>
            <div class="form-group">
              <label>Keterangan Service</label>
              <textarea class="form-control" name="keperluan" id="keperluan" cols="5" rows="5"> </textarea>
            </div>
      </div>
    </div>
  </div>
    
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Form Input Data Service</h3>   
        </div>
        <div class="box-body pad">
          <div class="table-responsive">
            <div class="btn-group">
              <button type="button" onclick="add_row()" id="" class="btn btn-primary btn-flat"> Add Row
                  <i class="fa fa-plus"></i>
              </button>
            </div>
            <table class="table table-striped table-hover table-bordered table-sm" id="table1">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Service / Spare Part</th>
                <th>Jumlah (Unit)</th>
                <th>Harga (Rp)</th>
                <th>Sub Total</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td class="increment">1</td>
                <td><input type="text" name="nama_service[]" class="form-control"></td>
                <td><input type="number" name="jumlah[]" id="jumlah1" onkeyup="lookup(this)" class="form-control"></td>
                <td><input type="number" name="harga[]" id="harga1" onkeyup="lookup(this)" class="form-control"></td>
                <td><input type="text" name="sub_total[]" id="sub_total1" class="form-control" readonly="true"></td>
                <td></td>
              </tr>
              </tbody>
            </table>               
        </div>
        <div class="form-group">
          <button name="cancel" onclick="doCancel()" type="button" id="cancel" class="btn btn-warning btn-flat"><span class="fa fa-times"></span> Batal</button>
          <button name="save" onclick="doSave()" type="button" id="save" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>

  
<!-- Bootstrap modal proses -->
<div class="modal fade" id="modal_table" role="dialog">
  <div class="modal-dialog" style="width: 750px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form1" class="form-horizontal">
          <table class="table table-striped table-bordered table-hover table-checkable order-column table-sm" id="table">
            <thead>
              <tr>
                <th>No</th>
                <th>No Plat</th>
                <th>Nama Kendaraan</th>
                <th>Tgl Service</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data_service as $key => $value): ?>
                <tr>
                  <td><?=$key+1?></td>
                  <td><?=$value->no_plat?></td>
                  <td><?=$value->judul?></td>
                  <td><?=view_date_hi($value->tgl_jadwal_service)?></td>
                  <td><button class="btn btn-info btn-sm btn-flat" type="button" onclick="choseCar(<?=$value->id_kendaraan.','.$value->id_jadwal?>)">Pilih <span class="fa fa-check"></span> </button></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
         </form>
       </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
        <!-- <button type="button" id="btnSave" onclick="updateProses()" class="btn btn-primary btn-flat">Kirim</button> -->
      </div>
    </div>
  </div>
</div>
<!--End Bootstrap modal proses -->


<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>


<script type="text/javascript">

  var save_method; //for save method string
  var table;

  $(document).ready(function() { 
    //TAMPIL DATA TABLE SERVER SIDE
    table = $('#table').DataTable({ 
      "processing": true, //Feature control the processing indicator.
      "serverSide": false //Feature control DataTables' server-side processing mode.
    });
  });

  const modalJadwalKendaraan = () =>{
    $('#modal_table').modal('show'); // show bootstrap modal
    $('.modal-title').text('Pilih Kendaraan Dari Jadwal Service');
  }

  const choseCar = (id_kendaraan,id_jadwal) => {
    var url = "<?php echo site_url('transaksi/Service/getDetailByIdkendaraan/')?>"+id_kendaraan
       $.ajax({
        url : url,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('#judul').val(data.judul)
          $('#no_plat').val(data.no_plat)
          $('#no_polisi').val(data.id_kendaraan)
          $('#id_jadwal').val(id_jadwal)
          $('#modal_table').modal('hide');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
        }
      });
  }


  const add_row = () => {

    let $this = $("table#table1 tbody tr");
    let $current_num = $this.find("td:first").length;
    let $incremented =parseInt($("#table1").find('td.increment').last().html())+1;

      $('#table1').append(`<tr id='myTableRow${$incremented}'>
      <td class='increment'>${$incremented}</td> 
      <td><input type='text' name='nama_service[]' class='form-control'></td> 
      <td><input type='number' name='jumlah[]' id='jumlah${$incremented}'  onkeyup='lookup(this)' class='form-control'></td> 
      <td><input type='number' name='harga[]' id='harga${$incremented}'  onkeyup='lookup(this)' class='form-control'></td>
      <td><input type="text" name="sub_total[]" id="sub_total${$incremented}" readonly='true' class="form-control"></td> 
      <td><button type='button' onclick='remove_row(${$incremented})' class='btn btn-danger btn-flat'><i class='fa fa-trash'></i></button></td></tr>`);
    }

  const remove_row = (i) =>{
    $('#myTableRow'+i).remove();
  }

  const lookup = (arg) =>{
     var id = arg.getAttribute('id');
     var value = arg.value;
     var last = id.substr(id.length - 1);

     let harga = $(`#harga${last}`).val() || 0;
     let jumlah = $(`#jumlah${last}`).val() || 0;
     
     let total = (harga * jumlah);
     $(`#sub_total${last}`).val(total)
  }

  const doSave = () => {
    var form = $("#form");
    var formData = new FormData(form[0]);
    var url = "<?php echo site_url('transaksi/Service/doSaveService')?>"
       $.ajax({
        url : url,
        type: "POST",
        data: formData,
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        success: function(data)
        {
          if(data.status==true){
            $('#modal_detail').modal('hide');
            swal('Pesan','Simpan Data Berhasil', 'success');
            setTimeout(()=>{
              doCancel() 
            },1000);
        
          }else{
            $('#modal_detail').modal('hide');
            swal('Pesan','Simpan Data Gagal', 'error');           
          }
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
          alert('Error adding / update data');
         }
      });
  }

  const doCancel = () => {
    var url = "<?php echo site_url('transaksi/Service/index')?>"
    window.location.href = url
  }

</script>



