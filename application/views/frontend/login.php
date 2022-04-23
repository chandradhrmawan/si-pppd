<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Login</title>
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
                                <h1 class="b-title-page bg-primary_a">Login</h1>
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
                                <li class="active">Login</li>
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
                                <h4 class="typography-title">Form Login</h4>
                                <div class="row">
                                <div class="col-md-12">   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" id="id_kendaraan" value="">
                                                <input class="form-control" type="text" name="username" id="username" placeholder="Username" autocomplete="off" />
                                            </div>
                                             <div class="form-group">
                                                <input class="form-control" type="password" name="password" id="password" placeholder="Password" autocomplete="off" />
                                            </div>
                                            <button class="btn btn-primary" id="btn-login" onclick="doLogin()">Login</button>
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

    $('#username').keypress(function (e) {
     var key = e.which;
     if(key == 13)  // the enter key code
      {
        doLogin();
      }
    });

    $('#password').keypress(function (e) {
     var key = e.which;
     if(key == 13)  // the enter key code
      {
        doLogin();
      }
    });

    const doLogin = () => {
       
        var url = "<?=base_url()?>index/doLogin";
        $.ajax({
          url : url,
          type: "POST",
          data: {"username":$('#username').val(),"password":$('#password').val()},
          dataType: "JSON",
          success: function(data)
          {
            console.log(data);
            if(data.status){
              swal('Pesan',data.message, 'success');
              redirect = "<?=base_url()?>index/index";
              window.location = redirect;
            }else{  
              swal('Pesan',data.message, 'error');
            }
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
            alert('Error '+textStatus);
           }
        });

  }
</script>