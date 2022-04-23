<div class="row">
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Data Kendaraan</h3>   
        <!-- tools box -->
        <div class="pull-right">
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-header -->
     
      <div class="box-body pad">
        <form name="form" id="form" enctype="multipart/form-data" method="post">

            <div class="form-group">
              <label>No Polisi</label>
              <input type="text" class="form-control" disabled="true" value="<?=$detail_kendaraan->no_plat?>">
            </div>

            <div class="form-group">
              <label>Nomor Mesin</label>
              <input type="text" class="form-control" disabled="true" value="<?=$detail_kendaraan->no_mesin?>">
            </div>

            <div class="form-group">
              <label>Jenis</label>
              <input type="text" class="form-control" disabled="true" value="<?=$detail_kendaraan->nm_jenis?>">
            </div>

            <div class="form-group">
              <label>Merk</label>
              <input type="text" class="form-control" disabled="true" value="<?=$detail_kendaraan->nm_merk?>">
            </div>

             <div class="form-group">
              <label>Tipe</label>
              <input type="text" class="form-control" disabled="true" value="<?=$detail_kendaraan->nm_tipe?>">
            </div>

           

        </form>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Data Pemesan</h3>   
        <!-- tools box -->
        <div class="pull-right">
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body pad">
        <form name="form" id="form" enctype="multipart/form-data" method="post">

            <div class="form-group">
              <label>Nama Pemesan</label>
              <input type="text" class="form-control" disabled="true" value="<?=$this->session->userdata('nama')?>">
            </div>

            <div class="form-group">
              <label>Waktu Pesan</label>
              <input type="text" class="form-control" disabled="true" value="<?=date('d-m-Y')?>">
            </div>

            <div class="form-group">
              <label>Tanggal Pesan</label>
              <!-- <input type="text" class="form-control"> -->
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_pesan" class="form-control pull-right datepicker" >
                </div>
            </div>


            <div class="form-group">
              <label>Tanggal Kembali</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_kembali" class="form-control pull-right datepicker" >
                </div>
            </div>

            <!--  <div class="form-group">
              <label>Tipe</label>
              <input type="text" class="form-control">
            </div> -->

           

        </form>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Form Pesan</h3>   
        <!-- tools box -->
        <div class="pull-right">
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body pad">
        <form name="form" id="form" enctype="multipart/form-data" method="post">

            <div class="form-group">
              <label>Lokasi Tujuan</label>
              <input type="text" class="form-control" id="lokasi_tujuan">
            </div>

            <div class="form-group">
              <label>Latitude</label>
              <input type="text" class="form-control" disabled="true" id="latitude">
            </div>

            <div class="form-group">
              <label>Longitude</label>
              <input type="text" class="form-control" disabled="true" id="longitude">
            </div>

            <div class="form-group">
              <label>Keperluan</label>
              <textarea class="form-control" name="keperluan" id="keperluan" cols="5" rows="5"> </textarea>
            </div>

             <div class="form-group">
              <label>Menggunakan Supir</label>
              <select class="form-control">
                <option>Ya</option>
                <option>Tidak</option>
              </select>
            </div>


            <div class="form-group">
              <button name="cancel" onclick="batal()" type="button" id="cancel" class="btn btn-warning btn-flat"><span class="fa fa-times"></span> Batal</button>
              <button name="save" onclick="simpan()" type="button" id="save" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Simpan</button>
            </div>
           

        </form>
      </div>
    </div>
  </div>

    <!-- <style type="text/css">
      #mapid { height: 500px; }
   </style>

  <div class="row">
  <div class="col-md-12">

     <div id="mapid"></div>

     <script type="text/javascript">
      var long = 113.9213257;
      var lat  = -0.789275;
      var zoom = 5;
      var mymap = L.map('mapid').setView([lat, long], zoom);
      var apikey = 'pk.eyJ1IjoiY2hhbmRyYWRhcm1hd2FuMTciLCJhIjoiY2s5OGp6MWxxMDJ6bDNtbW5ndWtpeTR1MiJ9.dOWewSSFZpkoosXlkf99Pg';
      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        maxZoom: 18,
        id: 'mapbox/light-v9',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: apikey
    }).addTo(mymap);

      //add marker
      var marker = L.marker([-6.173110,106.829361]).addTo(mymap);
      marker.bindPopup("<b>Hello world!</b><br>I am a popup.");

      mymap.on('click', function(e) {
          alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
      });

      // L.geoJson(indoData).addTo(mymap);

     </script> -->
    
    
  </div>
</div>




  <!-- /.col-->
</div>
<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.2.min.js"></script> -->

<!-- JS file -->
<script src="<?=base_url()?>assets/easy_auto/jquery.easy-autocomplete.min.js"></script>
<!-- CSS file -->
<link rel="stylesheet" href="<?=base_url()?>assets/easy_auto/easy-autocomplete.min.css">
<!-- Additional CSS Themes file - not required-->
<!-- <link rel="stylesheet" href="<?=base_url()?>assets/easy_auto/easy-autocomplete.themes.min.css"> -->

<script type="text/javascript">
$('input#lokasi_tujuan').keyup( function() {
   if( this.value.length < 1 ) return;
  
   let addr = this.value;
   let url  = "https://nominatim.openstreetmap.org/search?format=json&limit=10&q="+addr;
   //auto();
   /*$.ajax({
      url : url,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);          
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });*/


   

});

/*function auto()
{*/

  var options = {
    url: function(phrase) {
      if(phrase < 4 ) return;
      return "https://nominatim.openstreetmap.org/search?format=json&q="+phrase;
    },
    getValue: "display_name",
    list: {
       onClickEvent: function() {
       _rev()
      }
    }
  };

  $("#lokasi_tujuan").easyAutocomplete(options);


  function _rev()
  {
    let q = $('#lokasi_tujuan').val();
    let url  = "https://nominatim.openstreetmap.org/search?format=json&limit=10&q="+q;
    $.ajax({
      url : url,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        let ret = data[0];
        $('#latitude').val(ret.lat)
        $('#longitude').val(ret.lon)
        console.log(ret);          
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
    }

</script>



