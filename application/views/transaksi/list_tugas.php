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
                        <th>Dasar Kegiatan</th>
                        <th>Tujuan Kegiatan</th>
                        <th>Waktu Rekam</th>
                        <th>Status</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($data_tugas as $key => $value):
                    $btn_stat = '';
                    $status_sewa = '';
                    if($value->is_active == 1){
                        $status_sewa = '<span class="label label-success">Aktif</span>';
                    }else{
                        $status_sewa = '<span class="label label-danger">Non Aktif</span>';
                        $btn_stat = 'disabled';
                    } 

                ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value->nomor_surat_tugas?></td>
                        <td><?=$value->dasar_kegiatan?></td>
                        <td><?=$value->tujuan_kegiatan?></td>
                        <td><?=view_date_hi($value->waktu_rekam)?>
                        <td style="text-align:center;"><?=$status_sewa?></td>
                        <td style="text-align:center;">
                          <button class="btn btn-info btn-flat btn-sm" type="button" onclick="modalDetail(<?=$value->id_surat_tugas?>)">Detail <span class="fa fa-eye"></span></button>
                          <button class="btn btn-primary btn-flat btn-sm" type="button" onclick="modalEdit(<?=$value->id_surat_tugas?>)">Ubah <span class="fa fa-edit"></span></button>
                          <button class="btn btn-danger btn-flat btn-sm" type="button" onclick="modalDelete(<?=$value->id_surat_tugas?>)">Hapus <span class="fa fa-trash"></span></button>
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
          <div class="form-body">
            
            <div class="form-group">
              <label class="control-label col-md-2">Nomor Surat</label>
              <div class="col-md-9">
                <input name="v_nomor_surat_tugas" id="v_nomor_surat_tugas" class="form-control" type="text" disabled="true">
              </div>
            </div>
          
            <div class="form-group">
              <label class="control-label col-md-2">Dasar Kegiatan</label>
              <div class="col-md-9">
              <textarea id="v_dasar_kegiatan" name="v_dasar_kegiatan" rows="10" cols="100" disabled="true"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Tujuan Kegiata</label>
              <div class="col-md-9">
              <textarea id="v_tujuan_kegiatan" name="v_tujuan_kegiatan" rows="10" cols="100" disabled="true"></textarea>  
            </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Kepada</label>
              <div class="col-md-9">
                <div id="content-detail-anggota"></div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Status</label>
              <div class="col-md-9">
                <select class="form-control" id="v_is_active" disabled="true">
                  <option value="0">Non Aktif</option>
                  <option value="1">Aktif</option>
                </select>
              </div>
            </div>
          </div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
  </div>
</div>
<!--End Bootstrap modal detail-->

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
          <input type="hidden" value="" id="id_surat_tugas"/> 
          <input type="hidden" value="" id="type"/>
          <div class="form-body">
            
            <div class="form-group">
              <label class="control-label col-md-2">Nomor Surat</label>
              <div class="col-md-9">
                <input name="nomor_surat_tugas" id="nomor_surat_tugas" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Dasar Kegiatan</label>
              <div class="col-md-9">
                <div class="box">
                  <div class="box-body pad">
                      <textarea id="dasar_kegiatan" name="dasar_kegiatan" rows="10" cols="80"></textarea>
                    </div>
                </div>
              </div>
            </div>

            <!-- <div class="form-group">
              <label class="control-label col-md-2">Nip</label>
              <div class="col-md-9">
                <input name="nip" id="nip" class="form-control" type="text" disabled="true">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Jabatan</label>
              <div class="col-md-9">
                <input name="jabatan" id="jabatan" class="form-control" type="text" disabled="true">
              </div>
            </div> -->

            <div class="form-group">
              <label class="control-label col-md-2">Tujuan Kegiatan</label>
              <div class="col-md-9">
                <div class="box">
                  <div class="box-body pad">
                      <textarea id="tujuan_kegiatan" name="tujuan_kegiatan" rows="10" cols="80"></textarea>
                    </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Kepada</label>
              <div class="col-md-9">
                <table class="table table-striped table-bordered table-hover table-checkable order-column table-sm">
                  <thead>
                    <tr>
                        <th># <input type="checkbox" onclick="checkAll(this)"></th>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Jabatan</th>      
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data_user as $key => $value): ?>
                        <input type="hidden" name="id_user[]" id="id_user[]" value="<?=$value->id_user?>"/>
                        <tr>
                          <td style="width: 5%;"><input class="colect-check" type="checkbox" name="is_checked[]" value=""/></td>
                          <td><?=$value->nama?></td>
                          <td><?=$value->nip?></td>
                          <td><?=$value->nm_jabatan?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
              </div>
            </div>

          

            <div class="form-group">
              <label class="control-label col-md-2">Status</label>
              <div class="col-md-9">
                <select name="is_active" class="form-control" id="is_active">
                  <option value="0">Non Aktif</option>
                  <option value="1">Aktif</option>
                </select>
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

    const dataUsers = <?=$data_user_json?>;
    const dataTugas = <?=$data_tugas_json?>;

    $(document).ready(function() { 
      //TAMPIL DATA TABLE SERVER SIDE
      table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": false //Feature control DataTables' server-side processing mode.
      });
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('dasar_kegiatan');
      CKEDITOR.replace('tujuan_kegiatan');
      CKEDITOR.replace('v_tujuan_kegiatan');
      CKEDITOR.replace('v_dasar_kegiatan');
      //bootstrap WYSIHTML5 - text editor
      $(".textarea").wysihtml5();
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

    const modalDetail = (id) => {
        $('#modal_detail').modal('show');
         $('.modal-title').text('Detail Data'); // Set Title to Bootstrap modal title

        $.ajax({
          url : "<?php echo site_url('transaksi/Tugas/find')?>/" + id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {

            let tbody = ``
            data['users'].map(e => {
              tbody += `
              <tr>
                <td>${e['nama']}</td>
                <td>${e['nip']}</td>
                <td>${e['nm_jabatan']}</td>
              </tr>
              `
            })

            let fullTable = `<table class="table table-striped table-bordered table-hover table-checkable order-column table-sm">
              <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nip</th>
                    <th>Jabatan</th>      
                  </tr>
                </thead>
                <tbody>
                  ${tbody}
                </tbody>
            </table>`
            $('#content-detail-anggota').html(fullTable)

            
            CKEDITOR.instances['v_dasar_kegiatan'].setData(data.dasar_kegiatan);
            CKEDITOR.instances['v_tujuan_kegiatan'].setData(data.tujuan_kegiatan);
            $('#v_is_active').val(data.is_active)
            $('#v_nomor_surat_tugas').val(data.nomor_surat_tugas)       
          },error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
    }

    const add = () => {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      uncheckAll()
      $('#modal_tambah').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Surat Tugas'); // Set Title to Bootstrap modal title
      $('#type').val("add");
    }

    const modalEdit = (id) => {
      save_method = 'edit';
      uncheckAll()
      $('#form')[0].reset(); // reset form on modals
      $('#modal_tambah').modal('show'); // show bootstrap modal
      $('.modal-title').text('Edit Surat Tugas'); // Set Title to Bootstrap modal title
      
      let findTugas = dataTugas.find(e=>e['id_surat_tugas'] == id);
      CKEDITOR.instances['dasar_kegiatan'].setData(findTugas['dasar_kegiatan_full']);
      CKEDITOR.instances['tujuan_kegiatan'].setData(findTugas['tujuan_kegiatan_full']);

      let id_users = document.getElementsByName('id_user[]');
      let collection = document.getElementsByClassName("colect-check");
      for (let index = 0; index < id_users.length; index++) {
        let findUser = findTugas['data_users'].find(e => e['id_user'] == id_users[index].value)
        if(findUser){
          collection[index].checked = true
        }
      }
      document.getElementById("type").value = 'edit';
      document.getElementById("id_surat_tugas").value = id;
      document.getElementById("is_active").value = findTugas['is_active'];
      document.getElementById("nomor_surat_tugas").value = findTugas['nomor_surat_tugas'];
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

          let url = "<?php echo site_url('transaksi/Tugas/delete')?>";
          
          let postData = {
            id_surat_tugas:id
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

    const checkAll = (bx) => {
      let collection = document.getElementsByClassName("colect-check");
      for(var i=0; i < collection.length; i++) {
        if(collection[i].type == 'checkbox') {
          collection[i].checked = bx.checked;
        }
      }
    }

    const uncheckAll = () => {
      let collection = document.getElementsByClassName("colect-check");
      for(var i=0; i < collection.length; i++) {
        if(collection[i].type == 'checkbox') {
          collection[i].checked = false
        }
      }
    }

    const getDetailAnggota = () => {
      let e = document.getElementById("id_user");
      let selectedText = e.options[e.selectedIndex].text;
      let selectedIndex = e.options[e.selectedIndex].value;
      let findUser = dataUsers.find(e=>e['id_user'] == selectedIndex)
      document.getElementById("nip").value = findUser['nip'];
      document.getElementById("jabatan").value = findUser['nm_jabatan'];
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
            url = "<?php echo site_url('transaksi/Tugas/update')?>";
          }else{
            url = "<?php echo site_url('transaksi/Tugas/save')?>";
          }
          
          let id_users = document.getElementsByName('id_user[]');
          let is_checkeds = document.getElementsByName('is_checked[]');
          let data_cheked = []
          for (let index = 0; index < is_checkeds.length; index++) {
            if(is_checkeds[index].checked){
              data_cheked.push(id_users[index].value)
            }
          }
         
          let postData = {
            id_surat_tugas:document.getElementById("id_surat_tugas").value,
            nomor_surat_tugas:document.getElementById("nomor_surat_tugas").value,
            dasar_kegiatan:CKEDITOR.instances.dasar_kegiatan.getData(),
            id_user:JSON.stringify(data_cheked),
            tujuan_kegiatan:CKEDITOR.instances.tujuan_kegiatan.getData(),
            is_active:document.getElementById("is_active").value,
          }

          if(document.getElementById("type").value != "edit"){
            delete postData.id_surat_tugas
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
                swal('Pesan','Tambah/Ubah Data Berhasil', 'success');
                setTimeout(function(){  window.location.reload(); }, 2000);
            
              }else{
                $('#modal_tambah').modal('hide');
                swal('Pesan','Tambah/Ubah Data Gagal', 'error');
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
