<!-- 





<div class="container">

<b>Coordinates</b>
<form>
<input type="text" name="lat" id="lat" size=12 value="" class="form-control">
<input type="text" name="lon" id="lon" size=12 value="" class="form-control">
</form>

<b>Address Lookup</b>
<div id="search">
<input type="text" name="addr" value="" id="addr" size="58" />
<button type="button" onclick="addr_search();">Search</button>
<div id="results"></div>
</div>

<br />

<div id="map"></div>

</div> -->


<style type="text/css">
#lat, #lon { text-align:right }
#map { width:100%;height: 500px; }
.address { cursor:pointer }
.address:hover { color:#AA0000;text-decoration:underline }
</style>

<?php //debux($location); ?>
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

            <div class="col-sm-12">
              <div class="form-group">
                <label>Lokasi Tujuan</label>
                <input type="text" class="form-control" id="addr" name="addr" placeholder="<?=$location['desc']?>">
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <button name="save" onclick="addr_search()" type="button" id="save" class="btn btn-info btn-flat"><span class="fa fa-search"></span> Cari</button>
              </div>
            </div>

             <div class="col-sm-6">
              <div class="form-group">
                <label>Latitude</label>
                <input type="text" class="form-control" id="lat" name="lat">
              </div>
            </div>

             <div class="col-sm-6">
              <div class="form-group">
                <label>Longitude</label>
                <input type="text" class="form-control" id="lon" name="lon">
              </div>
            </div>

             <div class="col-sm-12">
              <div class="form-group">
                <div id="results"></div>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                 <div id="map"></div>
              </div>
            </div>


            <div class="col-sm-12">
              <div class="form-group">
                <button name="simpan" onclick="save_new_loc()" type="button" id="simpan" class="btn btn-primary btn-flat"><span class="fa fa-save"></span> Simpan</button>
              </div>
            </div>


        </form>
      </div>
    </div>
  </div>






<script type="text/javascript">

// New York
/*var startlat = -6.17539420;
var startlon = 106.82718300;*/

var startlat = "<?=$location['lat']?>";
var startlon = "<?=$location['lon']?>";

var options = {
 center: [startlat, startlon],
 zoom: 12
}

document.getElementById('lat').value = startlat;
document.getElementById('lon').value = startlon;

var map = L.map('map', options);
var nzoom = 25;

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'}).addTo(map);

var myMarker = L.marker([startlat, startlon], {title: "Coordinates", alt: "Coordinates", draggable: true}).addTo(map).on('dragend', function() {
 var lat = myMarker.getLatLng().lat.toFixed(8);
 var lon = myMarker.getLatLng().lng.toFixed(8);
 var czoom = map.getZoom();
 if(czoom < 18) { nzoom = czoom + 2; }
 if(nzoom > 18) { nzoom = 18; }
 if(czoom != 18) { map.setView([lat,lon], nzoom); } else { map.setView([lat,lon]); }
 document.getElementById('lat').value = lat;
 document.getElementById('lon').value = lon;
 myMarker.bindPopup("Latz " + lat + "<br />Lon " + lon).openPopup();

 //confirm_addr(lat,lon)


});

/* map.on('click', function(e) {
    var myMarker = L.marker([e.latlng.lat, e.latlng.lng], {title: "Coordinates", alt: "Coordinates", draggable: true}).addTo(map)
    myMarker.bindPopup("Lat " + e.latlng.lat + "<br />Lon " + e.latlng.lng).openPopup();
});*/

function chooseAddr(lat1, lng1)
{
 myMarker.closePopup();
 map.setView([lat1, lng1],18);
 myMarker.setLatLng([lat1, lng1]);
 lat = lat1.toFixed(8);
 lon = lng1.toFixed(8);
 document.getElementById('lat').value = lat;
 document.getElementById('lon').value = lon;
 myMarker.bindPopup("Lats " + lat + "<br />Lon " + lon).openPopup();
}

function myFunction(arr)
{
 var out = "<br />";
 var i;

 if(arr.length > 0)
 {
  for(i = 0; i < arr.length; i++)
  {

   out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
  }
  document.getElementById('results').innerHTML = out;
 }
 else
 {
  document.getElementById('results').innerHTML = "Sorry, no results...";
 }

}

function addr_search()
{
 var inp = document.getElementById("addr");
 var xmlhttp = new XMLHttpRequest();
 var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
 xmlhttp.onreadystatechange = function()
 {
   if (this.readyState == 4 && this.status == 200)
   {
    var myArr = JSON.parse(this.responseText);
    myFunction(myArr);
   }
 };
 xmlhttp.open("GET", url, true);
 xmlhttp.send();
}

function confirm_addr(lat,lon)
{
  console.log(lat+''+lon);
}

function save_new_loc(){
  var lat = $('#lat').val();
  var lon = $('#lon').val();

  // ajax adding data to database
  var url = "<?=base_url()?>master/config/saveStartPoint"
   $.ajax({
    url : url,
    type: "POST",
    data: {"lat":lat,"lon":lon},
    dataType: "JSON",
    success: function(data)
    {
      if(data.status==true){
        swal('Pesan',data.pesan, 'success');    
      }else{
        $('#modal_form').modal('hide');
        swal('Pesan',data.pesan, 'error');          

      }
     },
     error: function (jqXHR, textStatus, errorThrown)
     {
      alert('Error adding / update data');
     }
  });

}

</script>