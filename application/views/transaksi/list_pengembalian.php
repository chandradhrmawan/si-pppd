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
        <?php if($this->session->userdata('id_role') == 4): ?>
            <div class="row tambah">
                <div class="col-md-6">
                       <button class="btn btn-primary btn-flat btn-sm" type="button" onclick="add()">Kembalikan <span class="fa fa-plus"></span></button> 
                </div>                
            </div>
        <?php endif; ?>
        
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-checkable order-column table-sm" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Polisi</th>
                        <th>Nama Kendaraan</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Nama Pengemudi</th>
                        <th>Total Biaya</th>
                        <th>Lampiran</th>
                        <th>Status</th>
                        <th style="width: 250px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($data_pengembalian as $key => $value): 
                      if(!empty($value->lampiran)){
                        $img = "<img src='".base_url()."uploads/pengembalian/".$value->lampiran."' width='100' height='100'>";
                      }else{
                        $img = "<img src='".base_url()."assets/img/no_img.png' width='100' height='100'>";
                      }

                      $status = "";
                      if($value->status == 1){
                        $status = '<span class="label label-warning">Menunggu Persetujuan</span>';
                      }else if($value->status == 2){
                         $status = '<span class="label label-success">Diterima</span>';
                      }else if($value->status == 3){
                         $status = '<span class="label label-danger">Ditolak</span>';
                      }

                ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value->no_plat?></td>
                        <td><?=$value->judul?></td>
                        <td><?=view_date_hi($value->tgl_pinjam)?></td>
                        <td><?=view_date_hi($value->tgl_pengembalian)?></td>
                        <td><?=$value->nama?></td>
                        <td>Rp. <?=number_format($value->total_biaya)?></td>
                        <td><?=$img?></td>
                        <td><?=$status?></td>
                        <td>
                          
                          <?php if($this->session->userdata('id_role') == 4): ?>
                            <button class="btn btn-success btn-flat btn-sm" type="button" onclick="modalSuratJalan(<?=$value->id_sewa?>)">Cetak Nota Perjalanan <span class="fa fa-floppy-o"></span></button>
                          <?php else: ?>
                            <button class="btn btn-primary btn-flat btn-sm" type="button" onclick="modalSuratJalanProses(<?=$value->id_pengembalian?>)">Proses Nota <span class="fa fa-floppy-o"></span></button>
                            <button class="btn btn-success btn-flat btn-sm" type="button" onclick="modalSuratJalan(<?=$value->id_sewa?>)">Cetak Nota Perjalanan <span class="fa fa-floppy-o"></span></button>
                          <?php endif; ?>

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
                  <input type="hidden" name="id_sewa" id="id_sewa" value="">
                  <input type="hidden" name="id_supir" id="id_supir" value="">

                  <div class="form-body">

                    <div class="form-group">
                      <label class="control-label col-md-2">No Polisi</label>
                      <div class="col-md-9">
                        <select class="form-control" name="no_polisi" id="no_polisi" onchange="fillDataSewa(this.value)">
                            <option value=""> -- Pilih No Polisi</option>
                            <?php foreach ($data_sewa as $key => $value): ?>
                              <option value="<?=$value->id_sewa?>"><?=$value->no_plat?></option>
                            <?php endforeach; ?>
                        </select>
                     </div>
                   </div>

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
                      <label class="control-label col-md-2">Tujuan Perjalanan</label>
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

                   <!--  <div class="form-group">
                      <label class="control-label col-md-2">Keterangan</label>
                      <div class="col-md-9">
                        <input name="keterangan" id="keterangan" class="form-control" type="text" disabled="true">
                     </div>
                   </div> -->

                   <div class="form-group">
                      <label class="control-label col-md-2">Km Awal</label>
                      <div class="col-md-9">
                        <input name="km_awal" id="km_awal" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Km Akhir</label>
                      <div class="col-md-9">
                        <input name="km_selesai" id="km_selesai" class="form-control" type="text" placeholder="input km terakir kendaraan">
                     </div>
                   </div>

                    <div class="form-group">
                      <label class="control-label col-md-2">Total Biaya Perjalanan</label>
                      <div class="col-md-9">
                        <input name="total_biaya" id="total_biaya" class="form-control" type="text" placeholder="input total biaya operasional">
                     </div>
                   </div>

                    <div class="form-group">
                      <label class="control-label col-md-2">Upload Lampiran Bukti</label>
                      <div class="col-md-9">
                        <input name="bukti" id="bukti" class="form-control" type="file">
                     </div>
                   </div>

                  </div>
                 </form>
               </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSave" onclick="savePengembalian()" class="btn btn-primary btn-flat">Kirim</button>
              </div>
            </div>
          </div>
        </div>
        <!--End Bootstrap modal detail-->


<!-- Bootstrap modal detail -->
<div class="modal fade" id="modal_print" role="dialog">
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

<!-- Bootstrap modal detail -->
<div class="modal fade" id="modal_surat_jalan_proses" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
        <form action="#" id="form1" class="form-horizontal">
        <div class="modal-body form">
        <input type="hidden" name="id_pengembalian" id="id_pengembalian">

          <div class="form-group">
            <label class="control-label col-md-2">Status</label>
            <div class="col-md-9">
              <select name="status_proses" id="status_proses" class="form-control">
                <option value="2">Diterima</option>
                <option value="3">Ditolak</option>
              </select>
           </div>
          </div>

      
        <div class="modal-footer">
        <button type="button" id="btnSave" onclick="updatePengembalian()" class="btn btn-primary btn-flat">Update</button>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
      </div>
      </form>
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

    const add = () => {
      $('#modal_detail').modal('show');
      $('.modal-add').text('Tambah Data');
    }

    const fillDataSewa = (id_sewa) => {

      if(id_sewa == ""){
        return false
      }

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
          $('#km_awal').val(data.km_akhir+' Km')
          $('#id_sewa').val(id_sewa)
          $('#id_supir').val(data.id_supir)
                
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get data from ajax');
        }
      });
    }

    const modalKembali = (id_sewa) => {
        $('#modal_detail').modal('show');
        $('.modal-title').text('Detail Data'); // Set Title to Bootstrap modal title
    }

  const savePengembalian = () => {

    let msg = "";
    let stat = true
    if($('#no_polisi').val() == ""){
        msg += 'Kendaraan Tidak Boleh Kosong\n'
        stat = false
    }
    if($('#km_selesai').val() == ""){
      msg+= 'Km Selesai Tidak Boleh Kosong\n'
      stat = false
    }

    if(stat){
      var form = $("#form");
      var formData = new FormData(form[0]);
      var url = "<?php echo site_url('transaksi/Pengembalian/doSavePengembalian')?>"

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

          //console.log(data);
          if(data.status==true){
            $('#modal_detail').modal('hide');
            swal('Pesan','Simpan Data Berhasil', 'success');
            setTimeout(function(){  window.location.reload() }, 2000);
        
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
     }else{
       swal('Pesan',msg, 'error');    
     }
  }

  const modalSuratJalan = (id_sewa) => {
        $('#modal_print').modal('show');
        $('.modal-title').text('Cetak Nota Perjalanan'); // Set Title to Bootstrap modal title
        $("#id_sewa").val(id_sewa);

        let iframe = '<iframe src="<?php echo site_url('transaksi/Pengembalian/file/')?>'+id_sewa+'" height="500" width="870" title="Iframe Example"></iframe>'
        $("#surat-jalan").html(iframe).fadeIn();   
  }

  const openNewTab = () => {
      let id_sewa = $("#id_sewa").val();
      let url = '<?php echo site_url('transaksi/Pengembalian/file/')?>'+id_sewa+''
      window.open(url, '_blank');
  }

  const modalSuratJalanProses = (id_pengembalian) => {
      $('#modal_surat_jalan_proses').modal('show');
      $('.modal-title').text('Proses'); // Set Title to Bootstrap modal title
      $("#id_pengembalian").val(id_pengembalian);
  }

  const updatePengembalian = () => {
    let postData = {
      id_pengembalian:$('#id_pengembalian').val(),
      status_proses:$('#status_proses').val()
    }

    $.ajax({
        url : "<?php echo site_url('transaksi/Pengembalian/updatePengembalianStatus')?>",
        type: "POST",
        dataType: "JSON",
        data:postData,
        success: function(data)
        {
          swal('Pesan','Simpan Data Berhasil', 'success');
          setTimeout(function(){  window.location.reload() }, 2000);  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get data from ajax');
        }
      });
  }

</script>
