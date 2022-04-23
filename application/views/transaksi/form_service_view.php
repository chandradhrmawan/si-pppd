<form name="form" id="form" enctype="multipart/form-data" method="post">
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Form Input Data Service</h3>   
      </div>
      <div class="box-body pad">
            <div class="form-group">
              <label>No Polisi</label>
              <select class="form-control" name="no_polisi" id="no_polisi" onchange="getNamaKendaraan(this.value)" readonly>
                <?php foreach ($data_kendaraan as $key => $value): ?>
                  <?php if($value->id_kendaraan == $data_hdr_service->id_kendaraan): ?>
                    <option value="<?=$value->id_kendaraan?>" selected><?=$value->no_plat.'-'.$value->judul?></option>
                  <?php else: ?>
                    <option value="<?=$value->id_kendaraan?>"><?=$value->no_plat.'-'.$value->judul?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label>Nama Kendaraan</label>
              <input type="text" class="form-control" disabled="true" id="judul" value="<?=$data_hdr_service->judul?>">
            </div>

            <div class="form-group">
              <label>Tgl Service</label>
              <input type="text" class="form-control" disabled="true" id="tgl_service" value="<?=view_date_hi($data_hdr_service->tgl_service)?>">
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" name="keperluan" id="keperluan" cols="5" rows="5" readonly="true"><?=$data_hdr_service->note?></textarea>
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
             <!--  <button type="button" onclick="add_row()" id="" class="btn btn-primary btn-flat"> Add Row
                  <i class="fa fa-plus"></i>
              </button> -->
            </div>
            <table class="table table-striped table-hover table-bordered table-sm" id="table1">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Service / Spare Part</th>
                <th>Jumlah (Unit)</th>
                <th>Harga (Rp)</th>
                <th>Sub Total</th>
                <!-- <th>Action</th> -->
              </tr>
              </thead>
              <tbody>
              <?php foreach ($data_dtl_service as $key => $value): ?>
                <tr>
                  <td class="increment"><?=$key+1?></td>
                  <td><input type="text" name="nama_service[]" class="form-control" value="<?=$value->nama_service?>" readonly></td>
                  <td><input type="number" name="jumlah[]" id="jumlah1" onkeyup="lookup(this)" class="form-control" value="<?=$value->jumlah?>" readonly></td>
                  <td><input type="text" name="harga[]" id="harga1" onkeyup="lookup(this)" class="form-control" value="<?=number_format($value->harga)?>" readonly></td>
                  <td><input type="text" name="sub_total[]" id="sub_total1" class="form-control" readonly="true" value="<?=number_format($value->sub_total)?>"></td>
                  <!-- <td></td> -->
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>               
        </div>
        <div class="form-group">
          <button name="cancel" onclick="doCancel()" type="button" id="cancel" class="btn btn-warning btn-flat"><span class="fa fa-arrow-left"></span> Kembali</button>
          <!-- <button name="save" onclick="doSave()" type="button" id="save" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Simpan</button> -->
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>


<script type="text/javascript">

  const getNamaKendaraan = (value) => {
    let vals = $( "#no_polisi option:selected" ).text();
    $('#judul').val(vals)
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



