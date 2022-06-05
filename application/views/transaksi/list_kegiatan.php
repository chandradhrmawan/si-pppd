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
                  
                        <a href="#" onclick="add()">
                          <button id="" class="btn btn-info" style="border-radius: 0;"> Add New
                            <i class="fa fa-plus"></i>
                        </button></a>
                    
                </div>                
            </div>
        
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-checkable order-column table-sm" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat Tugas</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Jenis Kegiatan</th>
                        <th>Lokasi</th>
                        <th>Tingak Lanjut</th>
                        <th>Keterangan</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($data_kegiatan as $key => $value):
                ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value->nomor_surat_tugas?></td>
                        <td><?=view_date_hi($value->tanggal_kegiatan)?>
                        <td><?=$value->jenis_kegiatan?></td>
                        <td><?=$value->lokasi?></td>
                        <td><?=$value->tindak_lanjut?></td>
                        <td style="text-align: center;">
                          <?php 
                            if($value->keterangan == null || $value->keterangan == ''){
                              echo '<img src="'.base_url().'uploads/not_found.jpg" width="50" height="50">';
                            }else{
                              echo '<a href="'.base_url().'uploads/kegiatan/'.$value->keterangan.'" target="__blank"><img src="'.base_url().'uploads/kegiatan/'.$value->keterangan.'" width="50" height="50"></a>';
                            }
                          ?>
                        </td>
                        <td style="text-align:center;">
                          <button class="btn btn-primary btn-flat btn-sm" type="button" onclick="modalEdit(<?=$value->id_kegiatan?>)">Ubah <span class="fa fa-edit"></span></button>
                          <button class="btn btn-danger btn-flat btn-sm" type="button" onclick="modalDelete(<?=$value->id_kegiatan?>)">Hapus <span class="fa fa-trash"></span></button>
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

<!--Start Bootstrap modal tambah-->
<div class="modal fade" id="modal_tambah" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" id="id_kegiatan"/> 
          <input type="hidden" value="" id="type"/>
          <div class="form-body">
            

            <div class="form-group">
              <label class="control-label col-md-2">Dasar Kegiatan</label>
              <div class="col-md-9">
                <select name="id_surat_tugas" class="form-control" id="id_surat_tugas">
                  <option value="">--Pilih Surat Tugas--</option>
                  <?php foreach ($data_tugas as $key => $value): ?>
                    <option value="<?=$value->id_surat_tugas?>"><?=$value->nomor_surat_tugas?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Hari Tanggal</label>
              <div class="col-md-9">
                <input name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control" type="date">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Jenis Kegiatan</label>
              <div class="col-md-9">
                <input name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" type="text">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-2">Lokasi</label>
              <div class="col-md-9">
                <input name="lokasi" id="lokasi" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Tindak Lanjut</label>
              <div class="col-md-9">
                <!-- <input name="tindak_lanjut" id="tindak_lanjut" class="form-control" type="text"> -->
                <textarea id="tindak_lanjut" name="tindak_lanjut" rows="10" cols="80"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Keterangan</label>
              <div class="col-md-9">
                <input name="keterangan" id="keterangan" class="form-control" type="file">
              </div>
            </div>

          </div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Tutup</button>
        <button type="button" id="btnSave" onclick="save()" class="btn btn-success btn-flat">Kirim</button>
      </div>
    </div>
  </div>
</div>
<!--End Bootstrap modal tambah-->

<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
    var save_method; //for save method string
    var table;

    let dataKegiatan = <?=$data_kegiatan_json?>

    $(document).ready(function() { 
      //TAMPIL DATA TABLE SERVER SIDE
      table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": false //Feature control DataTables' server-side processing mode.
      });

      CKEDITOR.replace('tindak_lanjut');
    });

    const add = () => {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_tambah').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Kegiatan'); // Set Title to Bootstrap modal title
      $('#type').val("add");
      CKEDITOR.instances['tindak_lanjut'].setData("");
    }

    const isEmpty = (str) => {
      return (!str || str.length === 0 );
    }

    const modalEdit = (id) => {
      save_method = 'edit';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_tambah').modal('show'); // show bootstrap modal
      $('.modal-title').text('Edit Kegiatan'); // Set Title to Bootstrap modal title
      
      let findKegiatan = dataKegiatan.find(e=>e['id_kegiatan'] == id);
      console.log(findKegiatan['tanggal_kegiatan'])
      document.getElementById("type").value = 'edit';
      document.getElementById("id_kegiatan").value = id;
      document.getElementById("id_surat_tugas").value = findKegiatan['id_surat_tugas'];
      document.getElementById("tanggal_kegiatan").value = findKegiatan['tanggal_kegiatan'];
      document.getElementById("jenis_kegiatan").value = findKegiatan['jenis_kegiatan'];
      document.getElementById("lokasi").value = findKegiatan['lokasi'];
      // document.getElementById("tindak_lanjut").value = findKegiatan['tindak_lanjut'];
      CKEDITOR.instances['tindak_lanjut'].setData(findKegiatan['tindak_lanjut']);
    }

    const modalDelete = (id) => {
      swal({
        title: "Konfirmasi Hapus Data",
        text: "Apakah anda yakin, ingin Hapus Data ini?",
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

          let url = "<?php echo site_url('transaksi/Kegiatan/delete')?>";
          
          let postData = {
            id_kegiatan:id
          }

          $.ajax({
            url : url,
            type: "POST",
            data: postData,
            dataType: "JSON",
            success: function(data)
            {
              if(data.status==true){
                $('#modal_tambah').modal('hide');
                swal('Pesan','Hapus Data Berhasil', 'success');
                setTimeout(function(){  window.location.reload(); }, 2000);
            
              }else{
                $('#modal_tambah').modal('hide');
                swal('Pesan','Hapus Data Gagal', 'error');
              }
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding / update data');
             }
          });

        } else {
          swal("Cancelled", "Batal", "error");
          return false
        }
      });
    }

    const save = () => {
      swal({
        title: "Konfirmasi Simpan/Ubah Data",
        text: "Apakah anda yakin, ingin Simpan/Ubah Data ini?",
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

          let url = ""
          if(document.getElementById("type").value == "edit"){
            url = "<?php echo site_url('transaksi/Kegiatan/update')?>";
          }else{
            url = "<?php echo site_url('transaksi/Kegiatan/save')?>";
          }

          var formData = new FormData();
          if(document.getElementById("type").value == "edit"){
            formData.append('id_kegiatan', document.getElementById("id_kegiatan").value);
          }
          formData.append('id_surat_tugas', document.getElementById("id_surat_tugas").value);
          formData.append('tanggal_kegiatan', document.getElementById("tanggal_kegiatan").value);
          formData.append('jenis_kegiatan', document.getElementById("jenis_kegiatan").value);
          formData.append('lokasi', document.getElementById("lokasi").value);
          formData.append('tindak_lanjut', CKEDITOR.instances.tindak_lanjut.getData());
          if(document.getElementById("keterangan").files[0] != undefined){
            formData.append('keterangan', document.getElementById("keterangan").files[0]); 
          }

          let errMsg = []
          if(isEmpty(document.getElementById("id_surat_tugas").value)){
            errMsg.push('Surat Tugas tidak boleh kosong \n')
          }
          
          if(isEmpty(document.getElementById("tanggal_kegiatan").value)){
            errMsg.push('Tanggal Kegiatan tidak boleh kosong \n')
          }

          if(isEmpty(document.getElementById("jenis_kegiatan").value)){
            errMsg.push('Jenis Kegiatan tidak boleh kosong \n')
          }

          if(isEmpty(document.getElementById("lokasi").value)){
            errMsg.push('Lokasi Kegiatan tidak boleh kosong \n')
          }

          if(isEmpty(CKEDITOR.instances.tindak_lanjut.getData())){
            errMsg.push('Tindak Lanjut tidak boleh kosong \n')
          }

          if(errMsg.length > 0){
            alert(errMsg);
            return true
          }

          $.ajax({
            url : url,
            type: "POST",
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function(data)
            {
              if(data.status==true){
                $('#modal_tambah').modal('hide');
                swal('Pesan','Tambah/Ubah Data Berhasil', 'success');
                setTimeout(function(){  window.location.reload(); }, 2000);
              }else{
                $('#modal_tambah').modal('hide');
                swal('Pesan',data.message, 'error');
              }
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding / update data');
             }
          });

        } else {
          swal("Cancelled", "Batal", "error");
          return false
        }
      });
    }

</script>
