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
                        <?php //debux($this->session->userdata('id_role')) ?>
                </div>                
            </div>
        
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-checkable order-column table-sm" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Polisi</th>
                        <th>Nama Kendaraan</th>
                        <th>Nama Pemohon</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <!-- <th>Lokasi Tujuan</th>
                        <th>Tujuan Perjalanan</th>
                        <th>Jarak Perjalanan</th> -->
                        <th>Status</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($data_pemesanan as $key => $value):
                    $btn_stat = '';
                    $status_sewa = '';
                    if($value->status_sewa == 1){
                        $status_sewa = '<span class="label label-warning">Menunggu Persetujuan Atasan</span>';
                    }elseif($value->status_sewa == 11){
                        $status_sewa = '<span class="label label-success">Menunggu Persetujuan Admin</span>';
                        $btn_stat = '';
                    }elseif($value->status_sewa == 2){
                        $status_sewa = '<span class="label label-success">Sudah Disetujui Admin</span>';
                        $btn_stat = 'disabled';
                    }elseif($value->status_sewa == 3){
                        $status_sewa = '<span class="label label-info">Dalam Proses Peminjaman</span>';
                    }elseif($value->status_sewa == 4){
                        $status_sewa = '<span class="label label-default">Peminjaman Selesai</span>';
                        $btn_stat = 'disabled';
                    }elseif($value->status_sewa == 5){
                        $status_sewa = '<span class="label label-danger">Permohonan Ditolak</span>';
                        $btn_stat = 'disabled';
                    }elseif($value->status_sewa == 6){
                        $status_sewa = '<span class="label label-danger">Permohonan Dibatalkan Penyewa</span>';
                        $btn_stat = 'disabled';
                    } 


                ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value->no_plat?></td>
                        <td><?=$value->judul?></td>
                        <td><?=$value->nama?></td>
                        <td><?=view_date_hi($value->tgl_sewa)?></td>
                        <td><?=view_date_hi($value->tgl_pinjam)?></td>
                        <td><?=view_date_hi($value->tgl_kembali)?></td>
                        <!-- <td><?=$value->lokasi_tujuan?></td>
                        <td><?=$value->tujuan_perjalanan?></td>
                        <td><?=$value->jarak?></td> -->
                        <td><?=$status_sewa?></td>
                        <td><button class="btn btn-info btn-flat btn-sm" type="button" onclick="modalDetail(<?=$value->id_sewa?>)">Detail <span class="fa fa-eye"></span></button>

                        <?php if($this->session->userdata('id_role') == 2): ?>
                          <button class="btn btn-success btn-flat btn-sm" <?=$btn_stat?> type="button" onClick="modalProsesApprove(<?=$value->id_sewa?>)">Approve <span class="fa fa-check"></span></button>
                          <button class="btn btn-danger btn-flat btn-sm" <?=$btn_stat?> type="button" onClick="modalProsesReject(<?=$value->id_sewa?>)">Reject <span class="fa fa-times"></span></button></td>
                        <?php else: ?>
                          <button class="btn btn-primary btn-flat btn-sm" <?=$btn_stat?> type="button" onClick="modalProsesAdmin(<?=$value->id_sewa?>)">Pilih Supir <span class="fa fa-file-o"></span></button></td>
                        <?php endif; ?>

                          
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
          <input type="hidden" name="id_sewa" id="id_sewa">
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-2">Status Sewa</label>
              <div class="col-md-9">
                
                <select class="form-control" name="status_sewa" id="status_sewa" onchange="change_stat(this.value)" <?=($this->session->userdata('id_role') == 1)?'disabled':'' ?>>
                   <option>--</option>
                    <?php if($this->session->userdata('id_role') == 2): ?>
                      <option value="11">Pemesanan Diterima</option>
                    <?php else: ?>
                      <option value="2">Pemesanan Diterima</option>
                    <?php endif; ?>
                    <option value="5">Pemesanan Ditolak</option>
                </select>

             </div>
           </div>

            <div class="form-group" id="label_supir">
              <label class="control-label col-md-2">Supir</label>
              <div class="col-md-9">
                <select class="form-control" name="id_user" id="id_user">
                    <option>--</option>
                    <?php foreach ($data_supir as $key => $value): ?>
                      <option value="<?=$value->id_user?>"><?=$value->nama?></option>
                    <?php endforeach; ?>
                </select>
             </div>
           </div>

            <div class="form-group" id="label_reject">
              <label class="control-label col-md-2">Keterangan</label>
              <div class="col-md-9">
                <textarea name="ket_reject" id="ket_reject" class="form-control" cols="5" rows="5"></textarea>
             </div>
           </div>

          </div>
         </form>
       </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
        <button type="button" id="btnSave" onclick="proses()" class="btn btn-primary btn-flat">Kirim</button>
      </div>
    </div>
  </div>
</div>
<!--End Bootstrap modal proses -->

<!-- Bootstrap modal detail -->
        <div class="modal fade" id="modal_detail" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
              </div>
              <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                  <input type="hidden" value="" name="id_role"/> 
                  <div class="form-body">

                    <div class="form-group">
                      <label class="control-label col-md-2">Nama Kendaraan</label>
                      <div class="col-md-9">
                        <input name="judul" id="judul" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Deskripsi</label>
                      <div class="col-md-9">
                        <input name="deskripsi" id="deskripsi" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                    <div class="form-group">
                      <label class="control-label col-md-2">Lokasi Tujuan</label>
                      <div class="col-md-9">
                        <input name="lokasi_tujuan" id="lokasi_tujuan" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Jarak</label>
                      <div class="col-md-9">
                        <input name="jarak" id="jarak" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Keperluan Perjalanaan</label>
                      <div class="col-md-9">
                        <input name="tujuan_perjalanan" id="tujuan_perjalanan" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                    <div class="form-group">
                      <label class="control-label col-md-2">Tgl Sewa</label>
                      <div class="col-md-9">
                        <input name="tgl_sewa" id="tgl_sewa" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Tgl Pinjam</label>
                      <div class="col-md-9">
                        <input name="tgl_pinjam" id="tgl_pinjam" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Tgl Kembali</label>
                      <div class="col-md-9">
                        <input name="tgl_kembali" id="tgl_kembali" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                    <!-- <div class="form-group">
                      <label class="control-label col-md-2">Keterangan</label>
                      <div class="col-md-9">
                        <input name="keterangan" id="keterangan" class="form-control" type="text" disabled="true">
                     </div>
                   </div> -->

                  </div>
                 </form>
               </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-flat">Kirim</button> -->
              </div>
            </div>
          </div>
        </div>
        <!--End Bootstrap modal detail-->



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

    function modalProses(id_sewa){
      $('#form1')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Proses Data'); // Set Title to Bootstrap modal title
      $('#id_sewa').val(id_sewa);
      $('#label_supir').hide();
      $('#label_reject').hide();
    }

    function modalProsesApprove(id_sewa){
      swal({
        title: "Konfirmasi Approve Data",
        text: "Apakah anda yakin, ingin Approve Data ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Ya',
        cancelButtonText: "Tidak",
        closeOnConfirm: true,
        closeOnCancel: true
      },
      function(isConfirm){
        if (isConfirm){
          var url;
          url = "<?php echo site_url('transaksi/Sewa/updateStatusSewa')?>";

          var postData = {
            id_sewa:id_sewa,
            status_sewa:11,
            ket_reject:''
          }

           // ajax adding data to database
           $.ajax({
            url : url,
            type: "POST",
            data: postData,
            dataType: "JSON",
            success: function(data)
            {
              if(data.status==true){
                $('#modal_form').modal('hide');
                swal('Pesan','Approve Data Berhasil', 'success');
                setTimeout(function(){  window.location.reload(); }, 2000);
            
              }else{
                $('#modal_form').modal('hide');
                swal('Pesan','Approve Data Gagal', 'error');
              }
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding / update data');
             }
          });

        } else {
          swal("Cancelled", "Data Batal Diapprove", "error");
          return false
        }
      });
    }

    function modalProsesReject(id_sewa){
      swal({
        title: "Konfirmasi Reject Data",
        text: "Apakah anda yakin, ingin Reject Data ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Ya',
        cancelButtonText: "Tidak",
        closeOnConfirm: true,
        closeOnCancel: true
      },
      function(isConfirm){
        if (isConfirm){
          var url;
          url = "<?php echo site_url('transaksi/Sewa/updateStatusSewa')?>";

          var postData = {
            id_sewa:id_sewa,
            status_sewa:5,
            ket_reject:''
          }

           // ajax adding data to database
           $.ajax({
            url : url,
            type: "POST",
            data: postData,
            dataType: "JSON",
            success: function(data)
            {
              if(data.status==true){
                $('#modal_form').modal('hide');
                swal('Pesan','Reject Data Berhasil', 'success');
                setTimeout(function(){  window.location.reload(); }, 2000);
            
              }else{
                $('#modal_form').modal('hide');
                swal('Pesan','Reject Data Gagal', 'error');
              }
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding / update data');
             }
          });

        } else {
          swal("Cancelled", "Data Batal Diapprove", "error");
          return false
        }
      });
    }

    function modalProsesAdmin(id_sewa){
      $('#form1')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Proses Data'); // Set Title to Bootstrap modal title
      $('#id_sewa').val(id_sewa);
      $('#status_sewa').val(2);
      $('#label_supir').show();
      $('#label_reject').hide();
    }

    function change_stat(stat)
    {

      var id_role = "<?=$this->session->userdata('id_role')?>";
     
       if(stat == 2) {

        if(id_role != 2){
          $('#label_supir').show();
          $('#label_reject').hide();
        }else{
          $('#label_supir').hide();
          $('#label_reject').hide();
        }

       }else if(stat == 5){
          $('#label_supir').hide();
          $('#label_reject').show();
       }
    }

    function reload_table()
    {
      $('#table').DataTable().ajax.reload();
    }

    function proses()
    {
      
      var url;
      url = "<?php echo site_url('transaksi/Sewa/updateStatusSewa')?>";
       // ajax adding data to database
       $.ajax({
        url : url,
        type: "POST",
        data: $('#form1').serialize(),
        dataType: "JSON",
        success: function(data)
        {
          if(data.status==true){
            $('#modal_form').modal('hide');
            swal('Pesan','Update Data Berhasil', 'success');
            setTimeout(function(){  window.location.reload(); }, 2000);
            //window.location.reload();
            // reload_table();
        
          }else{
            $('#modal_form').modal('hide');
            swal('Pesan','Update Data Gagal', 'error');
            //window.location.reload();
            // reload_table();           

          }
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
          alert('Error adding / update data');
         }
      });
     }

    const modalDetail = (id_sewa) => {
        $('#modal_detail').modal('show');
         $('.modal-title').text('Detail Data'); // Set Title to Bootstrap modal title

        $.ajax({
        url : "<?php echo site_url('index/getDetailSewaByIdSewa')?>/" + id_sewa,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('#judul').val(data.judul)
            $('#deskripsi').val(data.deskripsi)
            $('#lokasi_tujuan').val(data.lokasi_tujuan)
            $('#tujuan_perjalanan').val(data.tujuan_perjalanan)
            $('#jarak').val(data.jarak)
            $('#tgl_sewa').val(data.tgl_sewa)
            $('#tgl_pinjam').val(data.tgl_pinjam)
            $('#tgl_kembali').val(data.tgl_kembali)
            $('#keterangan').val(data.keterangan)
                   
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });

    }
</script>
