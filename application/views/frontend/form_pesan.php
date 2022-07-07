<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Sikopmil / Form Pesan</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="telephone=no" name="format-detection" />
        <meta name="HandheldFriendly" content="true" />
        <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/master.css" />
        <!-- SWITCHER-->
        <link href="<?=base_url()?>assets/frontend/plugins/switcher/css/switcher.css" rel="stylesheet" id="switcher-css" />
        <link href="<?=base_url()?>assets/frontend/plugins/switcher/css/color1.css" rel="alternate stylesheet" title="color1" />
        <link href="<?=base_url()?>assets/frontend/plugins/switcher/css/color2.css" rel="alternate stylesheet" title="color2" />
        <link href="<?=base_url()?>assets/frontend/plugins/switcher/css/color3.css" rel="alternate stylesheet" title="color3" />
        <link href="<?=base_url()?>assets/frontend/plugins/switcher/css/color4.css" rel="alternate stylesheet" title="color4" />
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <!--[if lt IE 9 ]>
<script src="<?=base_url()?>assets/frontend/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script><meta content="no" http-equiv="imagetoolbar">
<![endif]-->
      <link rel="stylesheet" href="<?=base_url()?>assets/leaflet/leaflet.css">
      <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
    </head>
    <style type="text/css">
        #map { width:100%;height: 500px; }
    </style>

    <body>
        <!-- Loader-->
        <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span>
        </div>
        <!-- Loader end-->
        <!-- ==========================-->
        <!-- MOBILE MENU-->
        <!-- ==========================-->
        <div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">
            <!-- Start Switcher-->
            <div class="switcher-wrapper">
                <div class="demo_changer">
                    <div class="demo-icon text-primary"><i class="fa fa-cog fa-spin fa-2x"></i>
                    </div>
                    <div class="form_holder">
                        <div class="predefined_styles">
                            <div class="skin-theme-switcher">
                                <h4>Color</h4>
                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color1" style="background-color:#d01818"></a>
                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color2" style="background-color:#FFAC3A"></a>
                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color3" style="background-color:#28af0f"></a>
                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color4" style="background-color:#e425e9"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end switcher-->
            <header class="header header-boxed-width navbar-fixed-top header-background-white header-color-black header-topbar-dark header-logo-black header-topbarbox-1-left header-topbarbox-2-right header-navibox-1-left header-navibox-2-right header-navibox-3-right header-navibox-4-right">
                <div class="container container-boxed-width">
                    <div class="top-bar">
                        <div class="container">
                            <div class="header-topbarbox-1">
                                <ul>
                                    <li><i class="icon fa fa-clock-o"></i> Mon - Fri : 0900am to 0600pm</li>
                                    <li><i class="icon fa fa-phone"></i><a href="tel:+0427983549">+ 042 798 3549</a>
                                    </li>
                                    <li><i class="icon fa fa-envelope-o"></i><a href="mailto:support@motorland.com">support@motorland.com</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-topbarbox-2">
                                <ul class="social-links">
                                    <li><a href="/" target="_blank"><i class="social_icons fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="/" target="_blank"><i class="social_icons fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="/" target="_blank"><i class="social_icons fa fa-linkedin"></i></a>
                                    </li>
                                    <li class="li-last"><a href="/" target="_blank"><i class="social_icons fa fa-instagram"></i></a>
                                    </li>
                                    <li><a href="/" target="_blank"><i class="social_icons fa fa-youtube-play"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php include('nav.php'); ?>
                </div>
            </header>
            <!-- end .header-->
            <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
                <div class="area-bg__inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1 class="b-title-page bg-primary_a">Form Pesan</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end .b-title-page-->
            <div class="bg-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="home.html"><i class="icon fa fa-home"></i></a>
                                </li>
                                <li class="active">Form Pesan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end breadcrumb-->
            <div class="rtd typography-page">
                <div class="typography-section typography-section-border">
                    <div class="container">
                        <div class="row">


                            <div class="col-xs-6">
                                <h4 class="typography-title">Data Kendaraan</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" id="id_kendaraan" value="<?=$detail_kendaraan->id_kendaraan?>">
                                                        <input class="form-control" type="text" name="user-name" value="Nama : <?=$detail_kendaraan->judul?>" disabled />
                                                    </div>
                                                     <div class="form-group">
                                                        <input class="form-control" type="text" name="user-name" value="Nopol : <?=$detail_kendaraan->no_plat?>" disabled />
                                                    </div>
                                                     <div class="form-group">
                                                        <input class="form-control" type="text" name="user-name" value="Jenis : <?=$detail_kendaraan->nm_jenis?>" disabled />
                                                    </div>
                                                     <div class="form-group">
                                                        <input class="form-control" type="text" name="user-name" value="Merk : <?=$detail_kendaraan->nm_merk?>" disabled />
                                                    </div>
                                                     <div class="form-group">
                                                        <input class="form-control" type="text" name="user-name" value="Tipe : <?=$detail_kendaraan->nm_tipe?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <h3 class="typography-title">Data Pemesan</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="user-name" value="Nama Pemesan : <?=$this->session->userdata('username')?>" disabled />
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="no_hp" id="no_hp" placeholder="Nomor Handphone" value="" required="required"/><i class="form-control-feedback icon fa fa-phone"></i>
                                                    </div>
                                                     <div class="form-group">
                                                        <input class="form-control datepicker" type="text" id="tgl_pesan" placeholder="Tanggal Pesan" required="required" /><i class="form-control-feedback icon fa fa-calendar"></i>
                                                    </div>
                                                     <div class="form-group">
                                                        <input class="form-control datepicker" type="text" id="tgl_kembali" placeholder="Tanggal Kembali" required="required" /><i class="form-control-feedback icon fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>



                            <div class="col-xs-12">
                                <h4 class="typography-title">Data Perjalanan</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <input class="form-control" id="tujuan_perjalanan" type="text" name="tujuan_perjalanan" placeholder="Keperluan Perjalanan" required="required" />
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <div class="form-group">
                                                            <input class="form-control" id="addr" type="text" name="addr" placeholder="<?=$location['desc']?>" required="required" />
                                                        </div>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                             <button name="save" onclick="addr_search()" type="button" id="save" class="btn btn-primary btn-flat"><span class="fa fa-search"></span> Cari</button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                      <div class="form-group">
                                                        <div id="results"></div>
                                                      </div>
                                                        

                                                        <div class="row">
                                                            <div class="col-xs-4">
                                                                <div class="form-group">
                                                                    <input class="form-control" id="lon" type="text" name="lon" placeholder="Longitude" required="required" disabled/>
                                                                </div>
                                                            </div>
                                                             <div class="col-xs-4">
                                                                <div class="form-group">
                                                                    <input class="form-control" id="lat" type="text" name="lat" placeholder="Latitude" required="required" disabled/>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <div class="form-group">
                                                                    <input class="form-control" id="jarak" type="text" name="jarak" placeholder="Jarak Tempuh" required="required" disabled/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div id="map"></div>
                                                        </div>

                                                    <button class="btn btn-primary" onclick="save_pesan()">pesan</button>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('footer.php'); ?>
            <!-- .footer-->
        </div>
        <!-- end layout-theme-->


        <!-- ++++++++++++-->
        <!-- MAIN SCRIPTS-->
        <!-- ++++++++++++-->
        <script src="<?=base_url()?>assets/frontend/libs/jquery-1.12.4.min.js"></script>
        <script src="<?=base_url()?>assets/frontend/libs/jquery-migrate-1.2.1.js"></script>
        <!-- Bootstrap-->
        <script src="<?=base_url()?>assets/frontend/libs/bootstrap/bootstrap.min.js"></script>
        <!-- User customization-->
        <script src="<?=base_url()?>assets/frontend/js/custom.js"></script>
        <!-- Headers scripts-->
        <script src="<?=base_url()?>assets/frontend/plugins/headers/slidebar.js"></script>
        <script src="<?=base_url()?>assets/frontend/plugins/headers/header.js"></script>
        <!-- Color scheme-->
        <script src="<?=base_url()?>assets/frontend/plugins/switcher/js/dmss.js"></script>
        <!-- Select customization & Color scheme-->
        <script src="<?=base_url()?>assets/frontend/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
        <!-- Slider-->
        <script src="<?=base_url()?>assets/frontend/plugins/owl-carousel/owl.carousel.min.js"></script>
        <!-- Pop-up window-->
        <script src="<?=base_url()?>assets/frontend/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- Mail scripts-->
        <script src="<?=base_url()?>assets/frontend/plugins/jqBootstrapValidation.js"></script>
        <!-- <script src="<?=base_url()?>assets/frontend/plugins/contact_me.js"></script> -->
        <!-- Filter and sorting images-->
        <script src="<?=base_url()?>assets/frontend/plugins/isotope/isotope.pkgd.min.js"></script>
        <script src="<?=base_url()?>assets/frontend/plugins/isotope/imagesLoaded.js"></script>
        <!-- Progress numbers-->
        <script src="<?=base_url()?>assets/frontend/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="<?=base_url()?>assets/frontend/plugins/rendro-easy-pie-chart/waypoints.min.js"></script>
        <!-- NoUiSlider-->
        <script src="<?=base_url()?>assets/frontend/plugins/noUiSlider/nouislider.min.js"></script>
        <script src="<?=base_url()?>assets/frontend/plugins/noUiSlider/wNumb.js"></script>
        <!-- Animations-->
        <script src="<?=base_url()?>assets/frontend/plugins/scrollreveal/scrollreveal.min.js"></script>
        <!-- Datepicker-->
        <script src="<?=base_url()?>assets/frontend/plugins/datepicker/jquery.datetimepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/sweet/sweetalert.css" rel="stylesheet" type="text/css" />
    </body>

</html>

<script type="text/javascript">

// New York
/*var startlat = -6.17539420;
var startlon = 106.82718300;*/

$('input[name="no_hp"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});

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
 hitungJarak();
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
 hitungJarak();
}

function myFunction(arr)
{
 var out = "<br />";
 var i;

 if(arr.length > 0)
 {
  for(i = 0; i < arr.length; i++)
  {

   out += "<a href='#'><div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div></a>";
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

function save_new_loc()
{
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

function hitungJarak()
{
    var lon1 = "<?=$location['lon']?>";
    var lat1 = "<?=$location['lat']?>";
    var lon2 = $('#lon').val();
    var lat2 = $('#lat').val();
    //getJarak($latitude1, $longitude1, $latitude2, $longitude2, $unit)
    var url = "<?=base_url()?>transaksi/sewa/getJarak/"+lon1+'/'+lat1+'/'+lon2+'/'+lat2+'/Km';

    $.ajax({
    url : url,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        $('#jarak').val(data+' Km');
     },
     error: function (jqXHR, textStatus, errorThrown)
     {
      alert('Error adding / update data');
     }
  });
}

function save_pesan()
{

    let vals = validateForm()

    if(vals.status){

        let post_data = {
            id_kendaraan        :$('#id_kendaraan').val(),
            no_hp               :$('#no_hp').val(),
            tgl_pesan           :$('#tgl_pesan').val(),
            tgl_kembali         :$('#tgl_kembali').val(),
            tujuan_perjalanan   :$('#tujuan_perjalanan').val(),
            addr                :$('#addr').val(),
            lon                 :$('#lon').val(),
            lat                 :$('#lat').val(),
            jarak               :$('#jarak').val()
        }

        var url = "<?=base_url()?>index/savePesanan"
        $.ajax({
            url : url,
            type: "POST",
            data: {"data":post_data},
            dataType: "JSON",
            success: function(data)
            {
              swal('Pesan','Sewa Kendaran Berhasil Silahkan Tunggu Informasi Di  Riwayat Sewa', 'success');
              setTimeout(function(){  window.location.replace("<?=base_url()?>index/riwayat_sewa") }, 2000);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error adding / update data');
            }
        });

    }else{
        alert(vals.msg)
    }

    
}

function validateForm()
{   
    let ret = {
        msg:"",
        status:true
    }

    if($('#no_hp').val() == ""){
        ret.status = false;
        ret.msg += 'Nomor Handphone Tidak Boleh Kosong\n';
    } 
    if($('#tgl_pesan').val() == ""){
        ret.status = false;
        ret.msg += 'Tanggal Pesan Tidak Boleh Kosong\n';
    } 
    if($('#tgl_kembali').val() == ""){
        ret.msg += 'Tanggal Kembali Tidak Boleh Kosong\n';
        ret.status = false;
    }
    if($('#tujuan_perjalanan').val() == ""){
        ret.msg += 'Tujuan Perjalanan Tidak Boleh Kosong\n';
        ret.status = false;
    }
    if($('#addr').val() == ""){
        ret.msg += 'Lokasi Tujuan Tidak Boleh Kosong\n';
        ret.status = false;
    }


    return ret
}

</script>