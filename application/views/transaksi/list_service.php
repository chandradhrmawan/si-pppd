<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
          <!-- <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button> -->
         
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body pad">
        
            <div class="row tambah">
                <div class="col-md-6">
                  <?php if($this->session->userdata('id_role') != 1){ ?>
                    <div class="row tambah">
                      <div class="col-md-6">
                             <button class="btn btn-primary btn-flat btn-sm" type="button" onclick="add()">Tambah <span class="fa fa-plus"></span></button> 
                      </div>                
                    </div>   
                  <?php  } ?>
                </div>                
            </div>
        
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-checkable order-column table-sm" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mekanik</th>
                        <th>Nomor Polisi</th>
                        <th>Nama Kendaraan</th>
                        <th>Tanggal Service</th>
                        <th>Total</th>
                        <th>Note</th>
                        <!-- <th>Status</th> -->
                        <th>Status Lunas</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($data_service as $key => $value):
                      $status = "";
                      if($value->status == 1){
                        $status = '<span class="label label-warning">Belum Lunas</span>';
                      }else if($value->status == 2){
                        $status = '<span class="label label-success">Lunas</span>';
                      }else if($value->status == 3){
                        $status = '<span class="label label-danger">Ditolak</span>';
                      }

                      if($value->status_lunas == 0){
                        $status_lunas = '<span class="label label-warning">Belum Lunas</span>';
                      }else{
                        $status_lunas = '<span class="label label-success">Lunas</span>';
                      }
                ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value->nama?></td>
                        <td><?=$value->no_plat?></td>
                        <td><?=$value->judul?></td>
                        <td><?=view_date_hi($value->tgl_service)?></td>
                        <td>Rp.<?=($value->total)?$value->total:0?></td>
                        <td><?=$value->note?></td>
                        <!-- <td><?=$status?></td> -->
                        <td><?=$status_lunas?></td>
                        <td><button class="btn btn-info btn-flat btn-sm" type="button" onclick="modalDetail(<?=$value->id_hdr_service?>)">Detail <span class="fa fa-eye"></span></button>
                            <button class="btn btn-primary btn-flat btn-sm" type="button" onclick="modalCetak(<?=$value->id_hdr_service?>)">Cetak <span class="fa fa-file-o"></span></button>
                        <?php if($this->session->userdata('id_role') == 1){ ?>
                            <!-- <button class="btn btn-warning btn-flat btn-sm" type="button" onclick="modalProses(<?=$value->id_hdr_service?>)">Proses <span class="fa fa-floppy-o"></span></button> -->
                            <button class="btn btn-success btn-flat btn-sm" type="button" onclick="modalProsesBayar(<?=$value->id_hdr_service?>)">Proses Pembayaran <span class="fa fa-money"></span></button>
                        <?php  } ?>


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
          <input type="hidden" name="id_hdr_service" id="id_hdr_service">
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-2">Status</label>
              <div class="col-md-9">
                
                <select class="form-control" name="status" id="status">
                   <option>--</option>
                    <option value="2">Diterima</option>
                    <option value="3">Ditolak</option>
                </select>

             </div>
           </div>

            <div class="form-group" id="label_reject">
              <label class="control-label col-md-2">Keterangan</label>
              <div class="col-md-9">
                <textarea name="keterangan" id="keterangan" class="form-control" cols="5" rows="5"></textarea>
             </div>
           </div>

          </div>
         </form>
       </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
        <button type="button" id="btnSave" onclick="updateProses()" class="btn btn-primary btn-flat">Kirim</button>
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
          <input type="hidden" name="id_hdr_service1" id="id_hdr_service1">
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-2">Status</label>
              <div class="col-md-9">
                
                <select class="form-control" name="status1" id="status1">
                   <option>--</option>
                    <option value="0">Belum Lunas</option>
                    <option value="1">Lunas</option>
                </select>

             </div>
           </div>

          </div>
         </form>
       </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
        <button type="button" id="btnSave" onclick="doUpdateStatusLunas()" class="btn btn-primary btn-flat">Kirim</button>
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

    function modalCetak(id_hdr_service){
      let url  = "<?php echo site_url('transaksi/Service/printService/')?>"+id_hdr_service;
      window.location.href=url;
    }

    const add = () => {
      let url  = "<?php echo site_url('transaksi/Service/formAdd')?>";
      window.location.href=url;
    }

    const modalDetail = (id_hdr_service) => {
        let url  = "<?php echo site_url('transaksi/Service/detail/')?>"+id_hdr_service;
        window.location.href=url;
    }

    const modalProses = (id_hdr_service) => {
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Proses Data'); // Set Title to Bootstrap modal title
      $('#id_hdr_service').val(id_hdr_service);
    }

    const modalProsesBayar = (id_hdr_service) => {
      $('#modal_bayar').modal('show'); // show bootstrap modal
      $('.modal-title').text('Proses Data'); // Set Title to Bootstrap modal title
      $('#id_hdr_service1').val(id_hdr_service);
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

    const doUpdateStatusLunas = () => {
      var id_hdr_service  = $('#id_hdr_service1').val();
      var status          = $('#status1').val();

      $.ajax({
        url : "<?php echo site_url('transaksi/Service/updateStatusLunas')?>",
        type: "POST",
        data:{"id_hdr_service":id_hdr_service,"status_lunas":status},
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
</script>
