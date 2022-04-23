<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
          <!-- <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button> -->
         <?php /*debux($data_pemesanan);*/ ?>
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body pad">
        <input type="hidden" name="lon" id="lon">
        <input type="hidden" name="lat" id="lat">
            <div class="row tambah">
                <div class="col-md-6">
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
                        <th>No Handphone</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status Berangkat</th>
                        <th>Status</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($data_pemesanan as $key => $value):
                    $btn_stat = '';
                    $status_sewa = '';
                    $dis_btn = '';
                    if($value->status_sewa == 1){
                        $status_sewa = '<span class="label label-warning">Menunggu Persetujuan Atasan</span>';
                    }if($value->status_sewa == 11){
                        $status_sewa = '<span class="label label-warning">Menunggu Persetujuan Admin</span>';
                    }elseif($value->status_sewa == 2){
                        $status_sewa = '<span class="label label-success">Sudah Disetujui Admin</span>';
                    }elseif($value->status_sewa == 3){
                        $status_sewa = '<span class="label label-info">Dalam Proses Peminjaman</span>';
                    }elseif($value->status_sewa == 4){
                        $status_sewa = '<span class="label label-default">Peminjaman Selesai</span>';
                        $dis_btn = 'disabled';
                    }elseif($value->status_sewa == 5){
                        $status_sewa = '<span class="label label-danger">Permohonan Ditolak</span>';
                    }elseif($value->status_sewa == 6){
                        $status_sewa = '<span class="label label-danger">Permohonan Dibatalkan</span>';
                    } 

                ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value->no_plat?></td>
                        <td><?=$value->judul?></td>
                        <td><?=$value->nama?></td>
                        <td><?=$value->no_hp?></td>
                        <td><?=view_date_hi($value->tgl_sewa)?></td>
                        <td><?=view_date_hi($value->tgl_pinjam)?></td>
                        <td><?=view_date_hi($value->tgl_kembali)?></td>
                        <td>

                          <?php if($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 1): ?>
                            <select disabled <?=$dis_btn?> class="form-control" id="status_jalan" onchange="updateStatusJalan(this.value,<?=$value->id_sewa?>)">
                              <option value="0" <?=($value->status_perjalanan == 0) ? 'selected' : ''?>>Belum</option>
                              <option value="1" <?=($value->status_perjalanan == 1) ? 'selected' : ''?>>Ya</option>
                            </select> 
                          <?php else: ?>
                            <select <?=$dis_btn?> <?=($value->status_perjalanan == 1) ? 'disabled' : '' ?> class="form-control" id="status_jalan" onchange="updateStatusJalan(this.value,<?=$value->id_sewa?>)">
                              <option value="0" <?=($value->status_perjalanan == 0) ? 'selected' : ''?>>Belum</option>
                              <option value="1" <?=($value->status_perjalanan == 1) ? 'selected' : ''?>>Ya</option>
                            </select> 
                          <?php endif; ?>

                        </td>
                        <td><?=$status_sewa?></td>
                        <td align="center">
                          <button class="btn btn-primary btn-flat btn-sm" type="button" onClick="modalSuratJalan(<?=$value->id_sewa?>)">Cetak <span class="fa fa-file-o"></span></button></td>
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

<!-- Bootstrap modal detail -->
  <div class="modal fade" id="modal_detail" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body form">
          <input type="hidden" name="id_sewa" id="id_sewa">
         <div id="surat-jalan">
         </div>
         </div>
          <div class="modal-footer">
          <button type="button" id="btnSave" onclick="openNewTab()" class="btn btn-primary btn-flat">Buka</button>
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
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
      getLocation()

    });


    const getLocation = () => {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((e)=>{
          let lon      = e.coords.longitude
          let lat      = e.coords.latitude
          
          $('#lon').val(lon)
          $('#lat').val(lat)

        });
      } else { 
        alert("Geolocation is not supported by this browser.");
      }
    }

    function modalProses(id_sewa){
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Proses Data'); // Set Title to Bootstrap modal title
      $('#id_sewa').val(id_sewa);
      $('#label_supir').hide();
      $('#label_reject').hide();
    }

    function change_stat(stat)
    {
       if(stat == 2) {
          $('#label_supir').show();
          $('#label_reject').hide();
       }else if(stat == 5){
          $('#label_supir').hide();
          $('#label_reject').show();
       }
    }

    function reload_table()
    {
      $('#table').DataTable().ajax.reload();
    }

    const modalSuratJalan = (id_sewa) => {
        $('#modal_detail').modal('show');
        $('.modal-title').text('Cetak Surat Jalan'); // Set Title to Bootstrap modal title
        $("#id_sewa").val(id_sewa);

        let iframe = '<iframe src="<?php echo site_url('transaksi/Surat_jalan/file/')?>'+id_sewa+'" height="500" width="870" title="Iframe Example"></iframe>'
        $("#surat-jalan").html(iframe).fadeIn();   
    }

    const openNewTab = () => {
      let id_sewa = $("#id_sewa").val();
      let url = '<?php echo site_url('transaksi/Surat_jalan/file/')?>'+id_sewa+''
      window.open(url, '_blank');
    }

    const updateStatusJalan = (status,id_sewa) => {
          let lon = $('#lon').val()
          let lat = $('#lat').val()
          $.ajax({
            url : "<?php echo site_url('transaksi/Surat_jalan/updateStatusJalan')?>",
            type: "POST",
            data:{"status":status,"id_sewa":id_sewa,"lon":lon,"lat":lat},
            dataType: "JSON",
          success: function(data)
          {
            if(data.status==true){
              swal('Pesan', 'Data berhasil diubah', 'success');
              setTimeout(function(){  window.location.reload() }, 2000);
            }else{
              swal('Pesan', 'Data Gagal diubah', 'error');
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
        
    }

</script>
