<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
          </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body pad">
        
            <div class="row tambah">
                <div class="col-md-6">
                    <div class="row tambah">
                      <div class="col-md-6">
                             <button class="btn btn-primary btn-flat btn-sm" type="button" onclick="add()">Tambah <span class="fa fa-plus"></span></button> 
                      </div>                
                    </div>   
                 </div>                
            </div>
        
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-checkable order-column table-sm" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Polisi</th>
                        <th>Tanggal Jadwal Service</th>
                        <th>Tanggal Aktual Service</th>
                        <th>Status Service</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($data_service as $key => $value):
                      $status = "";
                      if($value->status_service == 1){
                        $status = '<span class="label label-warning">Belum Di Service</span>';
                      }else if($value->status_service == 2){
                        $status = '<span class="label label-success">Sudah Di Service</span>';
                      }
                ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value->no_plat?></td>
                        <td><?=viewDateOnly($value->tgl_jadwal_service)?></td>
                        <td><?=viewDateOnly($value->tgl_aktual_service)?></td>
                        <td><?=$status?></td>
                        <td><button class="btn btn-info btn-flat btn-sm" type="button" onclick="modalDetail(<?=$value->id_jadwal?>)">Detail <span class="fa fa-eye"></span></button>
                          </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col-->
</div>
<!-- ./row -->

<!-- Bootstrap modal proses -->
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" style="width: 750px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form1" class="form-horizontal">
          <input type="hidden" name="id_jadwal_add" id="id_jadwal_add">
          <div class="form-body">

           <div class="form-group">
              <label class="control-label col-md-2">No Polisi</label>
              <div class="col-md-9">
                <select id="id_kendaraan_add" class="form-control">
                  <option value="">-- Pilih No Polisi --</option>
                  <?php foreach ($data_kendaraan_service as $key => $value): ?>
                    <option value="<?=$value->id_kendaraan?>"><?=$value->no_plat.' - '.$value->judul?></option>
                  <?php endforeach; ?>
                </select>
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Tanggal Jadwal Service</label>
              <div class="col-md-9">
                <input type="text" id="tgl_jadwal_service_add" class="form-control datepicker" autocomplete="off" />
             </div>
           </div>
         </div>
         </form>
       </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
        <button type="button" id="btnSave" onclick="saveJadwalService()" class="btn btn-primary btn-flat">Kirim</button>
      </div>
    </div>
  </div>
</div>
<!--End Bootstrap modal proses -->

<!-- Bootstrap modal proses -->
<div class="modal fade" id="modal_bayar" role="dialog">
  <div class="modal-dialog" style="width: 750px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form2" class="form-horizontal">
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-2">Nama Kendaraan</label>
              <div class="col-md-9">
                <input type="text" id="judul" class="form-control" disabled="true"/>
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">No Polisi</label>
              <div class="col-md-9">
                <input type="text" id="no_plat" class="form-control" disabled="true"/>
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Tanggal Jadwal Service</label>
              <div class="col-md-9">
                <input type="text" id="tgl_jadwal_service" class="form-control" disabled="true"/>
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Tanggal Aktual Service</label>
              <div class="col-md-9">
                <input type="text" id="tgl_aktual_service" class="form-control" disabled="true"/>
             </div>
           </div>

            <div class="form-group">
              <label class="control-label col-md-2">Status Service</label>
              <div class="col-md-9">
                <input type="text" id="status_service" class="form-control" disabled="true"/>
             </div>
           </div>

          </div>
         </form>
       </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
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

    const add = () => {
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('View Data'); // Set Title to Bootstrap modal title
    }

    const modalDetail = (id_jadwal) => {
              
        $.ajax({
          url : "<?php echo site_url('transaksi/Service/findDataJadwalService/')?>"+id_jadwal,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            $('#judul').val(data.judul)
            $('#no_plat').val(data.no_plat)
            $('#tgl_jadwal_service').val(data.tgl_jadwal_service)
            $('#tgl_aktual_service').val(data.tgl_aktual_service)

            let status = (data.status_service == 1) ? 'Belum Di Service' : 'Sudah Di Service'
            $('#status_service').val(status)

            $('#modal_form').modal('hide');
            $('#modal_bayar').modal('show'); // show bootstrap modal
            $('.modal-title').text('View Data'); // Set Title to Bootstrap modal title
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
    }

    const updateProses = () => {
      var id_hdr_service  = $('#id_hdr_service').val();
      var status          = $('#status').val();
      var keterangan      = $('#keterangan').val();

      $.ajax({
        url : "<?php echo site_url('transaksi/Service/updateData')?>",
        type: "POST",
        data:{"id_hdr_service":id_hdr_service,"status":status,"keterangan":keterangan},
        dataType: "JSON",
      success: function(data)
      {
        if(data.status==true){
          swal('Pesan', 'Data berhasil Diupdate', 'success');
          setTimeout(function(){ window.location.reload() }, 3000);
        }else{
          swal('Pesan', 'Data Gagal Diupdate', 'error');
          setTimeout(function(){ window.location.reload() }, 3000);
        }
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
    }

    const saveJadwalService = () => {
      var id_kendaraan  = $('#id_kendaraan_add').val();
      var tgl_jadwal_service  = $('#tgl_jadwal_service_add').val();

      $.ajax({
        url : "<?php echo site_url('transaksi/Service/doSaveJadwalService')?>",
        type: "POST",
        data:{"id_kendaraan":id_kendaraan,"tgl_jadwal_service":tgl_jadwal_service},
        dataType: "JSON",
      success: function(data)
      {
        if(data.status==true){
          swal('Pesan', 'Data berhasil Disimpan', 'success');
          setTimeout(function(){ window.location.reload() }, 3000);
        }else{
          swal('Pesan', 'Data Gagal Disimpan', 'error');
          setTimeout(function(){ window.location.reload() }, 3000);
        }
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
    }
</script>
