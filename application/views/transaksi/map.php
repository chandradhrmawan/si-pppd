<style type="text/css">
#lat, #lon { text-align:right }
#map { width:100%;height: 500px; }
.address { cursor:pointer }
.address:hover { color:#AA0000;text-decoration:underline }
</style>

<div id="map"></div>

<script type="text/javascript">
	var officeIcon = L.icon({
    iconUrl: 'https://img.pngio.com/company-icons-free-download-png-and-svg-company-icon-png-200_200.png',
    iconSize:     [50, 50], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

var carIcon = L.icon({
    iconUrl: '<?=base_url()?>assets/img/carIcon.jpg',
    iconSize:     [25, 40], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});


var startlat = "<?=$location['lat']?>";
var startlon = "<?=$location['lon']?>";

var options = {
 center: [startlat, startlon],
 zoom: 12
}

var map = L.map('map', options);
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'}).addTo(map);

L.marker(
  [startlat, startlon],
  {
    title: "Office Location", 
    alt: "Office Location", 
    icon: officeIcon,
    no_plat:null,
    nama_supir:null,
    nama_kendaraan:null
  }
).addTo(map).on('click', markerOnClick).addTo(map);


var dataSupir = <?=$data_supir?>;
dataSupir = dataSupir || []

dataSupir.forEach(valx => {
  L.marker([valx.lat_kordinat, valx.lon_kordinat],
    {
      title: "Car Location", 
      alt: "Car Location",
      icon: carIcon,
      no_plat:valx.no_plat,
      nama_supir:valx.nama,
      nama_kendaraan:valx.judul
    }).addTo(map).on('click', markerOnClick).addTo(map);
})
</script>