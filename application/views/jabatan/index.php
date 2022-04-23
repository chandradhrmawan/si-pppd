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
          <input type="hidden" value="" name="id_jabatan"/> 
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-2">Nama Jabatan</label>
              <div class="col-md-9">
                <input name="nm_jabatan" id="nm_jabatan" placeholder="Nama Jabatan" class="form-control" type="text">
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
          "url": "<?php echo base_url() ?>master/Jabatan/list_data",
          "type": "POST"

        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [2], //last column
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
        url = "<?php echo site_url('master/Jabatan/ajax_add')?>";
        pesan = "Tambah Data";
      }
      else
      {
        url = "<?php echo site_url('master/Jabatan/ajax_update')?>";
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
        url : "<?php echo site_url('master/Jabatan/ajax_get_data_by_id')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

          $('[name="id_jabatan"]').val(data.id_jabatan);
          $('[name="nm_jabatan"]').val(data.nm_jabatan);
                   
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
            url : "<?php echo site_url('master/Jabatan/delete_via_ajax')?>",
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
