<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>SIKOPMIL / List Kendaraan</title>
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
    </head>

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
                                <h1 class="b-title-page bg-primary_a">List Kendaraan</h1>
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
                                <li><a href="#"><i class="icon fa fa-home"></i></a>
                                </li>
                                <li class="active">Vehicle Inventry</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end breadcrumb-->
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-push-3">
                        <main class="l-main-content">
                            <div class="filter-goods">
                                <div class="filter-goods__info">Showing results from<strong> 1 - 10</strong> of total<strong> 35</strong>
                                </div>
                                <div class="filter-goods__select"><span class="hidden-xs">Layout</span>
                                    <!-- <select class="selectpicker" data-width="172">
                                        <option>Most Revelant</option>
                                        <option>A-Z</option>
                                        <option>Z-A</option>
                                    </select> -->
                                    <div class="btns-switch"><i class="btns-switch__item js-view-th icon fa fa-th-large active"></i><i class="btns-switch__item js-view-list active icon fa fa-th-list"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- end .filter-goods-->
                            <div class="goods-group-2 list-goods list-goods_th">
                                <?php foreach($list_kendaraan as $valx): 
                                if($valx->status == 1){
                                    $status = '<span class="text-bg bg-second">Tersedia</span>';
                                    $aju = '<a href="#" onclick="doPesan('.$valx->id_kendaraan.')"><span class="text-bg bg-second" style="padding: 8px; background-color:#00a41c;">Pilih</span></a>';
                                }else{
                                    $status = '<span class="text-bg bg-primary">Tidak Tersedia</span>';
                                    $aju = '-';
                                }
                                ?>
                                <section class="b-goods-1 b-goods-1_mod-a">
                                    <div class="row">
                                        <div class="b-goods-1__img">
                                            <a class="js-zoom-images" href="<?=base_url()?>uploads/kendaraan/<?=$valx->path?>">
                                                <img class="img-responsive" src="<?=base_url()?>uploads/kendaraan/<?=$valx->path?>" alt="foto" style="height: 200px !important;"/>
                                            </a>
                                        </div>
                                        <div class="b-goods-1__inner">
                                            <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="#"></a>
                                                <h2 class="b-goods-1__name"><a href="#" onclick="doPesan(<?=$valx->id_kendaraan?>)"><?=$valx->judul?></a></h2>
                                            </div>
                                            <div class="b-goods-1__info"><?=$valx->deskripsi?>
                                            </div>
                                            <div class="b-goods-1__section">
                                                <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-1">Highlights</h3>
                                                <div class="collapse in" id="desc-1">
                                                    <ul class="b-goods-1__desc list-unstyled">
                                                        <li class="b-goods-1__desc-item"><?=$valx->model?></li>
                                                        <li class="b-goods-1__desc-item"><?=$aju?></li>
                                                        <li class="b-goods-1__desc-item"><?=$status?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php endforeach; ?>
                                <!-- end .b-goods-1-->
                            </div>
                            <!-- end .goods-group-2-->
                            <ul class="pagination text-center">
                                <!-- <li><a href="#"><i class="icon fa fa-angle-double-left"></i></a></li> -->
                                <?php for ($i=1; $i <= $page; $i++): ?>
                                   <li style="margin: 0px !important;"><a style="margin: 0px !important;" href="#" onclick="changePage(<?=$i?>)"><?=$i?></a></li>
                                <?php endfor; ?>
                                <!-- <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li> -->
                                <!-- <li><a href="#"><i class="icon fa fa-angle-double-right"></i></a></li> -->
                            </ul>
                        </main>
                        <!-- end .l-main-content-->
                    </div>
                    <div class="col-md-3 col-md-pull-9">
                        <aside class="l-sidebar">
                            <form class="b-filter-2 bg-grey">
                                <h3 class="b-filter-2__title">Pencarian</h3>
                                <div class="b-filter-2__inner">
                                    <div class="b-filter-2__group">
                                        <div class="b-filter-2__group-title">Nama Kendaraan</div>
                                        <input class="form-control" type="text" placeholder="Masukan Nama Kendaaran..." id="keyword" />
                                    </div>
                                    <div class="b-filter-2__group">
                                        <div class="b-filter-2__group-title">Jenis</div>
                                        <select class="selectpicker" data-width="100%" id="id_jenis">
                                            <option value="">----</option>
                                            <?php foreach ($data_jenis as $key => $value): ?>
                                            <?php if($value->id_jenis == $_GET['id_jenis']): ?>
                                                <option value="<?=$value->id_jenis?>" selected><?=$value->nm_jenis?></option>
                                            <?php else: ?>
                                                <option value="<?=$value->id_jenis?>"><?=$value->nm_jenis?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="b-filter-2__group">
                                        <div class="b-filter-2__group-title">Merk</div>
                                        <select class="selectpicker" data-width="100%" id="id_merk">
                                            <option value="">----</option>
                                            <?php foreach ($data_merk as $key => $value): ?>
                                            <?php if($value->id_merk == $_GET['id_merk']): ?>
                                                <option value="<?=$value->id_merk?>" selected><?=$value->nm_merk?></option>
                                            <?php else: ?>
                                                <option value="<?=$value->id_merk?>"><?=$value->nm_merk?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="b-filter-2__group">
                                        <div class="b-filter-2__group-title">Tipe</div>
                                        <select class="selectpicker" data-width="100%" id="id_tipe">
                                            <option value="">----</option>
                                            <?php foreach ($data_tipe as $key => $value): ?>
                                            <?php if($value->id_tipe == $_GET['id_tipe']): ?>
                                                <option value="<?=$value->id_tipe?>" selected><?=$value->nm_tipe?></option>
                                            <?php else: ?>
                                                <option value="<?=$value->id_tipe?>"><?=$value->nm_tipe?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="b-filter-2__group">
                                         <button class="btn btn-default" type="button" onclick="changePage()" style="background-color: #0097c2; color: #ffffff">filter</button>
                                         <button class="btn btn-default" type="button" onclick="resetForm()" style="background-color: #d01818; color: #ffffff">reset</button>
                                    </div>
                                </div>
                            </form>
                            <!-- end .b-filter-->
                        </aside>
                        <!-- end .l-sidebar-->
                    </div>
                </div>
            </div>
            <?php include('footer.php') ?>
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
        <script src="<?=base_url()?>assets/frontend/plugins/contact_me.js"></script>
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
        <script src="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/sweet/sweetalert.css" rel="stylesheet" type="text/css" />
    </body>

</html>

<script type="text/javascript">
    const doPesan = (id_kendaraan) => {

        let id_user = "<?=$this->session->userdata('id_user')?>";

        if(id_user == ""){
            swal("Cancelled", "Silahkan Login Terlebih Dahulu", "error");
        }else{


            let validasi_pesan = doValidatePesan(id_user);
            if(validasi_pesan == 0){
                swal({
                title: "Konfirmasi",
                text: "Apakah anda yakin, ingin memesan Kendaraan ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#0097c2',
                confirmButtonText: 'Ya',
                cancelButtonText: "Tidak",
                closeOnConfirm: true,
                closeOnCancel: true
              },
              function(isConfirm){
                if (isConfirm){
                  window.location = "<?=base_url()?>index/form_pesan/"+id_kendaraan
                } else {
                  swal("Cancelled", "Kendaraan Batal dipesan", "error");
                  return false
                }
              });
            }else{
               swal("Cancelled", "Anda Sedang Melakukan Sewa Kendaraan Yang Sedang Berjalan", "error"); 
            }
        }
    }

    const changePage = (page=1) => {
        let keyword = $('#keyword').val();
        let jenis = $('#id_jenis').val();
        let merk = $('#id_merk').val();
        let tipe = $('#id_tipe').val();

        let url = `<?=base_url()?>index/list_kendaraan?page=${page}&keyword=${keyword}&id_jenis=${jenis}&id_merk=${merk}&id_tipe=${tipe}`;
        window.location.href = url
    }

    const resetForm = () => {
        let url = `<?=base_url()?>index/list_kendaraan?page=1`
        window.location.href = url
    }

    const doValidatePesan = (id_user) => {
        var url = "<?=base_url()?>index/validatePesanUser/"+id_user
        let count = 0;
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              count = data
              //setTimeout(function(){  window.location.replace("<?=base_url()?>index/riwayat_sewa") }, 2000);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error adding / update data');
            }
        });
        return count;
    }
</script>