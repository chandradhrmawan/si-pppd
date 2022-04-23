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
          <input type="hidden" value="" name="id_kendaraan"/> 
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-2">Jenis Kendaraan</label>
              <div class="col-md-9">
                <select name="id_jenis" id="id_jenis" class="form-control">
                  <option>----</option>
                  <?php foreach ($jenis as $value) { ?>
                    <option value="<?=$value->id_jenis?>"><?=$value->nm_jenis?></option>
                  <?php } ?> 
                </select>
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Merk Kendaraan</label>
              <div class="col-md-9">
                <select name="id_merk" id="id_merk" class="form-control">
                  <option>----</option>
                  <?php foreach ($merk as $value) { ?>
                    <option value="<?=$value->id_merk?>"><?=$value->nm_merk?></option>
                  <?php } ?> 
                </select>
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Tipe Kendaraan</label>
              <div class="col-md-9">
                <select name="id_tipe" id="id_tipe" class="form-control">
                  <option>----</option>
                  <?php foreach ($tipe as $value) { ?>
                    <option value="<?=$value->id_tipe?>"><?=$value->nm_tipe?></option>
                  <?php } ?> 
                </select>
             </div>
           </div>

            <div class="form-group">
              <label class="control-label col-md-2">No Polisi</label>
              <div class="col-md-9">
                <input name="no_plat" id="no_plat" placeholder="No Polisi" class="form-control" type="text">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">No Mesin</label>
              <div class="col-md-9">
                <input name="no_mesin" id="no_mesin" placeholder="No Mesin" class="form-control" type="text">
             </div>
           </div>

            <div class="form-group">
              <label class="control-label col-md-2">Judul</label>
              <div class="col-md-9">
                <input name="judul" id="judul" placeholder="Judul" class="form-control" type="text">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Deskripsi</label>
              <div class="col-md-9">
                <input name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control" type="text">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Model</label>
              <div class="col-md-9">
                <input name="model" id="model" placeholder="Model" class="form-control" type="text">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Transmisi</label>
              <div class="col-md-9">
                <input name="transmisi" id="transmisi" placeholder="Transmisi" class="form-control" type="text">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Tenaga</label>
              <div class="col-md-9">
                <input name="tenaga" id="tenaga" placeholder="Tenaga" class="form-control" type="text">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Daya Angkut</label>
              <div class="col-md-9">
                <input name="daya_angkut" id="daya_angkut" placeholder="Daya Angkut Penumpang" class="form-control" type="text">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Bahan Bakar</label>
              <div class="col-md-9">
                <input name="bahan_bakar" id="bahan_bakar" placeholder="Bahan Bakar" class="form-control" type="text">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Kapasitas BBM</label>
              <div class="col-md-9">
                <input name="kapasitas_bbm" id="kapasitas_bbm" placeholder="Kapasitas Bahan Bakar" class="form-control" type="text">
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Status</label>
              <div class="col-md-9">
                <select name="status" id="status" class="form-control">
                  <option value="1">Tersedia</option>
                  <option value="0">Tidak Tersedia</option>
                </select>
             </div>
           </div>


           <div class="form-group">
              <label class="control-label col-md-2">Photo</label>
              <div class="col-md-9">
                <input name="image" id="image" class="form-control" type="file">
             </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-2"></label>
             <div class="col-md-9">
              <div id="image_edit"></div>
                <img id="prev" src="#" style="width: 200px;height: 200px;" />
            </div>
          </div>

           <input name="path" id="path" type="hidden">

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
      $('#prev').hide();
      //TAMPIL DATA TABLE SERVER SIDE
      table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo base_url() ?>master/Kendaraan/list_data",
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
      $('.modal-title').text('Tambah Data Kendaraan'); // Set Title to Bootstrap modal title
      $('#type').val("add");
      $('#prev').hide();
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
        url = "<?php echo site_url('master/Kendaraan/ajax_add')?>";
        pesan = "Tambah Data";
      }
      else
      {
        url = "<?php echo site_url('master/Kendaraan/ajax_update')?>";
        pesan = "Edit Data";
      }

      // ajax adding data to database
      var form = $("#form");
      var formData = new FormData(form[0]);

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
        url : "<?php echo site_url('master/Kendaraan/ajax_get_data_by_id')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

          $('[name="id_kendaraan"]').val(data.id_kendaraan);
          $('[name="id_jenis"]').val(data.id_jenis);
          $('[name="id_merk"]').val(data.id_merk);
          $('[name="id_tipe"]').val(data.id_tipe);
          $('[name="no_plat"]').val(data.no_plat);
          $('[name="no_mesin"]').val(data.no_mesin);
          $('[name="status"]').val(data.status);
          $('[name="path"]').val(data.path);

          $('[name="judul"]').val(data.judul);
          $('[name="deskripsi"]').val(data.deskripsi);
          $('[name="model"]').val(data.model);
          $('[name="transmisi"]').val(data.transmisi);
          $('[name="tenaga"]').val(data.tenaga);

          $('[name="daya_angkut"]').val(data.daya_angkut);
          $('[name="kapasitas_bbm"]').val(data.kapasitas_bbm);
          $('[name="bahan_bakar"]').val(data.bahan_bakar);


          $("#image_edit").html('<img src="<?=base_url()?>uploads/kendaraan/'+data.path + '" style="width: 200px;height: 200px;" />');
          $("#prev").hide();
                   
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
    }

    function delete_data(id,path){

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
            url : "<?php echo site_url('master/Kendaraan/delete_via_ajax')?>",
            type: "POST",
            data:{"id":id,"path":path},
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


function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#prev').attr('src', e.target.result);
      $('#prev').show();
      $('#image_edit').hide();
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#image").change(function() {
  readURL(this);
});

</script>
