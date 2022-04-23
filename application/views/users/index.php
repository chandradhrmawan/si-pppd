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
                  <?php foreach($view_list as $list): ?>
                    <th> <?=$list?> </th>
                  <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
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

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id_user"/> 
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-2">Nama</label>
              <div class="col-md-9">
                <input name="nama" id="nama" placeholder="Nama" class="form-control" type="text">
             </div>
           </div>

            <div class="form-group">
              <label class="control-label col-md-2">Username</label>
              <div class="col-md-9">
                <input name="username" id="username" placeholder="Username" class="form-control" type="text">
             </div>
           </div>

            <div class="form-group">
              <label class="control-label col-md-2">Password</label>
              <div class="col-md-9">
                <input name="password" id="password" class="form-control" type="password" autocomplete="on">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Konfirmasi Password</label>
              <div class="col-md-9">
                <input name="password2" id="password2" class="form-control" type="password" autocomplete="on">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Nip</label>
              <div class="col-md-9">
                <input name="nip" id="nip" placeholder="Nip" class="form-control" type="text">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Jabatan</label>
              <div class="col-md-9">
                <select name="id_jabatan" id="id_jabatan" class="form-control">
                  <option>----</option>
                  <?php foreach ($jabatan as $value) { ?>
                    <option value="<?=$value->id_jabatan?>"><?=$value->nm_jabatan?></option>
                  <?php } ?> 
                </select>
             </div>
           </div>

            <div class="form-group">
              <label class="control-label col-md-2">Status</label>
              <div class="col-md-9">
                <select name="status" id="status" class="form-control">
                  <option value="1">Aktif</option>
                  <option value="0">Non Aktif</option>
                </select>
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Role</label>
              <div class="col-md-9">
                <select name="id_role" id="id_role" class="form-control">
                  <option>----</option>
                  <?php foreach ($role as $value) { ?>
                    <option value="<?=$value->id_role?>"><?=$value->nm_role?></option>
                  <?php } ?> 
                </select>
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Alamat</label>
              <div class="col-md-9">
                <textarea name="alamat" id="alamat" class="form-control"></textarea>
             </div>
           </div>

          </div>
         </form>
       </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-flat">Kirim</button>
      </div>
    </div>
  </div>
</div>
<!--End Bootstrap modal -->



<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
    var save_method; //for save method string
    var table;

    $(document).ready(function() { 
      //TAMPIL DATA TABLE SERVER SIDE
      table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo base_url() ?>master/Users/list_data",
          "type": "POST"

        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [8], //last column
          "class":"text-center",
          "orderable": false, //set not orderable
        },

        ],
        "order": [[0, 'desc']]

      });

    });


    function add()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Data User'); // Set Title to Bootstrap modal title
      $('#type').val("add");
    }

    function reload_table()
    {
      $('#table').DataTable().ajax.reload();
    }

    function save()
    {
      
      var url;
      var pesan;
      if(save_method == 'add') 
      {
        url = "<?php echo site_url('master/Users/ajax_add')?>";
        pesan = "Tambah Data";
      }
      else
      {
        url = "<?php echo site_url('master/Users/ajax_update')?>";
        pesan = "Edit Data";
      }

       // ajax adding data to database
       $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
          if(data.status==true){
        		$('#modal_form').modal('hide');
         		swal('Pesan',pesan+' Data Berhasil', 'success');
            reload_table();
        
        	}else{
            $('#modal_form').modal('hide');
            swal('Pesan',pesan+' Data Gagal', 'error');
            reload_table();        		

        	}
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
          alert('Error adding / update data');
         }
      });
     }

     function edit_data(id)
     {
      save_method = 'update';
      $('#type').val("edit");
      $('#form')[0].reset(); 
      $('#modal_form').modal('show');
      $('.modal-title').text('Edit Data User'); 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('master/Users/ajax_get_data_by_id')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

          $('[name="id_user"]').val(data.id_user);
          $('[name="nama"]').val(data.nama);
          $('[name="username"]').val(data.username);
          $('[name="nip"]').val(data.nip);
          $('[name="id_jabatan"]').val(data.id_jabatan);
          $('[name="status"]').val(data.status);
          $('[name="id_role"]').val(data.id_role);
          $('[name="alamat"]').val(data.alamat);

          
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
    }

    function delete_data(id){

      swal({
        title: "Konfirmasi Hapus Data",
        text: "Apakah anda yakin, ingin menghapus Data ini?",
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
          $.ajax({
            url : "<?php echo site_url('master/Users/delete_via_ajax')?>",
            type: "POST",
            data:{"id":id},
            dataType: "JSON",
          success: function(data)
          {
            if(data.status==true){
              swal('Pesan', 'Data berhasil dihapus', 'success');
            }else{
              swal('Pesan', 'Data Gagal dihapus', 'error');
            }
            reload_table();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
        } else {
          swal("Cancelled", "Data Batal dihapus", "error");
          return false
        }
      });
    }
</script>
