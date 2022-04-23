<!-- <style type="text/css">
#lat, #lon { text-align:right }
#map { width:100%;height: 500px; }
.address { cursor:pointer }
.address:hover { color:#AA0000;text-decoration:underline }
</style> -->

<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-body pad">

      <div class="col-sm-12">
        <div class="form-group">
           <div id="container-map"></div>
        </div>
      </div>

      </div>
    </div>
  </div>


   <div class="col-md-12">
    <div class="box box-info">
      <div class="box-body pad">

   <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-checkable order-column table-sm" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Plat</th>
                        <th>Nama Supir</th>
                        <th>Nama Kendaraan</th>
                        <th>Id Sewa</th>
                        <th>Status Perjalanan</th>
                        <th>Lat Kordinat</th>
                        <th>Lon Kordinat</th>
                        <th>Last Update</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($list_data_supir as $key => $value): ?>
                 <tr>
                    <td><?=$key+1?></td>
                    <td><?=$value->no_plat?></td>
                    <td><?=$value->nama?></td>
                    <td><?=$value->judul?></td>
                    <td><?=$value->id_sewa?></td>
                    <td><?=$value->status_perjalanan?></td>
                    <td><?=$value->lat_kordinat?></td>
                    <td><?=$value->lon_kordinat?></td>
                    <td><?=$value->last_update?></td>
                 </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

      </div>
    </div>
  </div>

    
    
</div>

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
          <input type="hidden" value="" name="id_role"/> 
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-2">No Plat</label>
              <div class="col-md-9">
                <input name="no_plat" id="no_plat" class="form-control" type="text" disabled></textarea>
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Nama Kendaraan</label>
              <div class="col-md-9">
                <input name="nama_kendaraan" id="nama_kendaraan" class="form-control" type="text" disabled></textarea>
             </div>
           </div>

           <div class="form-group">
              <label class="control-label col-md-2">Nama Supir</label>
              <div class="col-md-9">
                <input name="nama_supir" id="nama_supir" class="form-control" type="text" disabled></textarea>
             </div>
           </div>

            <div class="form-group">
              <label class="control-label col-md-2">Lokasi</label>
              <div class="col-md-9">
                <textarea name="lokasi" id="lokasi" class="form-control" cols="5" rows=5 disabled></textarea>
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
<!--End Bootstrap modal -->




<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">

const markerOnClick = (e) =>{
  $('#form')[0].reset(); // reset form on modals
  $('#modal_form').modal('show'); // show bootstrap modal
  $('.modal-title').text('Detail Data Perjalanan'); // Set Title to Bootstrap modal title
  // console.log(e.target.options)
  $.ajax({
    url: 'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat='+ e.latlng.lat +'&lon='+e.latlng.lng,
    method: 'GET',
    success: function(response) {
      let full = (response.display_name+"\n"+response.address.state_district);
      $('#lokasi').val(full);

      $('#nama_kendaraan').val(e.target.options.nama_kendaraan);
      $('#no_plat').val(e.target.options.no_plat);
      $('#nama_supir').val(e.target.options.nama_supir);
    },
    error: function (jqXHR, textStatus, errorThrown){
      alert('Error adding / update data');
    }
  });
}


const loadMap = () => {
   $.ajax({
    url: '<?=base_url()?>transaksi/Monitoring/loadMap',
    method: 'GET',
    success: function(response) {
      $('#container-map').html(response);
    },
    error: function (jqXHR, textStatus, errorThrown){
      alert('Error adding / update data');
    }
  });
}

loadMap();
setInterval(()=>{ 
 loadMap();
}, 50000);



</script>