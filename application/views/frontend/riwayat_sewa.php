<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Riwayat Pinjam</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="telephone=no" name="format-detection" />
        <meta name="HandheldFriendly" content="true" />
        <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/master.css" />
        <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
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
                                <h1 class="b-title-page bg-primary_a">Riwayat Pinjam</h1>
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
                                <li class="active">Riwayat Pinjam</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end breadcrumb-->
            <div class="rtd typography-page">
                <div class="typography-section typography-section-border">
                    <div class="container" style="width: 95% !important;">
                        <div class="row">
                            <div class="table-responsive">
                             <div class="table-container">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Polisi</th>
                                            <th>Nama Kendaraan</th>
                                            <th>Nama Pemohon</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Lokasi Tujuan</th>
                                            <th>Keperluan Perjalanan</th>
                                            <th>Nama Pengemudi</th>
                                            <th>Jarak Perjalanan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $status_sewa = ""; 
                                        foreach ($list_data as $key => $value):
                                        if($value->status_sewa == 1){
                                            $status_sewa = '<div class="alert alert-1"><i class="icon icon_question_alt2"></i>Menunggu Persetujuan Atasan</div>';
                                        }if($value->status_sewa == 11){
                                            $status_sewa = '<div class="alert alert-1"><i class="icon icon_question_alt2"></i>Menunggu Persetujuan Admin</div>';
                                        }elseif($value->status_sewa == 2){
                                            $status_sewa = '<div class="alert alert-success"><i class="icon icon_check_alt2"></i>Sudah Di Setujui Admin</div>';
                                        }elseif($value->status_sewa == 3){
                                            $status_sewa = '<div class="alert alert-2"><i class="icon icon_lifesaver"></i>Sedang Dalam Proses Peminjaman</div>';
                                        }elseif($value->status_sewa == 4){
                                            $status_sewa = '<div class="alert alert-info"><i class="icon icon_lightbulb_alt"></i>Peminjaman Selesai</div>';
                                        }elseif($value->status_sewa == 5){
                                            $status_sewa = '<div class="alert alert-warning"><i class="icon icon_error-circle_alt"></i>Permohonan Di Tolak</div>';
                                        }elseif($value->status_sewa == 6){
                                          $status_sewa = '<div class="alert alert-warning"><i class="icon icon_error-circle_alt"></i>Permohonan Di Batalkan</div>';
                                        } 

                                    ?>
                                        <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$value->no_plat?></td>
                                            <td><?=$value->judul?></td>
                                            <td><?=$value->nama?></td>
                                            <td><?=view_date_hi($value->tgl_sewa)?></td>
                                            <td><?=view_date_hi($value->tgl_pinjam)?></td>
                                            <td><?=view_date_hi($value->tgl_kembali)?></td>
                                            <td><?=$value->lokasi_tujuan?></td>
                                            <td><?=$value->tujuan_perjalanan?></td>
                                            <td><?=$value->nama_supir?></td>
                                            <td><?=$value->jarak?></td>
                                            <td><?=$status_sewa?></td>
                                            <td>
                                              <button class="btn btn-primary" type="button" onclick="modalDetail(<?=$value->id_sewa?>)" style="margin-bottom: 15px;">Detail <span class="fa fa-eye"></span></button>

                                            <?php if($value->status_sewa == 1): ?>
                                              <button class="btn btn-default" type="button" onclick="modalBatal(<?=$value->id_sewa?>)" style="margin-bottom: 15px;">Batal <span class="fa fa-times"></span></button>
                                            <?php endif; ?>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
            <?php include('footer.php'); ?>
            <!-- .footer-->
        </div>
        <!-- end layout-theme-->


        <!-- Large modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

        <!-- Bootstrap modal -->
        <div class="modal fade" id="modal_detail" role="dialog">
          <div class="modal-dialog modal-lg">
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
                      <label class="control-label col-md-2">Nama Kendaraan</label>
                      <div class="col-md-9">
                        <input name="judul" id="judul" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Deskripsi</label>
                      <div class="col-md-9">
                        <input name="deskripsi" id="deskripsi" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                    <div class="form-group">
                      <label class="control-label col-md-2">Lokasi Tujuan</label>
                      <div class="col-md-9">
                        <input name="lokasi_tujuan" id="lokasi_tujuan" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Jarak</label>
                      <div class="col-md-9">
                        <input name="jarak" id="jarak" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Tujuan Perjalanan</label>
                      <div class="col-md-9">
                        <input name="tujuan_perjalanan" id="tujuan_perjalanan" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                    <div class="form-group">
                      <label class="control-label col-md-2">Tgl Sewa</label>
                      <div class="col-md-9">
                        <input name="tgl_sewa" id="tgl_sewa" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Tgl Pinjam</label>
                      <div class="col-md-9">
                        <input name="tgl_pinjam" id="tgl_pinjam" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                   <div class="form-group">
                      <label class="control-label col-md-2">Tgl Kembali</label>
                      <div class="col-md-9">
                        <input name="tgl_kembali" id="tgl_kembali" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                    <div class="form-group">
                      <label class="control-label col-md-2">Keterangan</label>
                      <div class="col-md-9">
                        <input name="keterangan" id="keterangan" class="form-control" type="text" disabled="true">
                     </div>
                   </div>

                  </div>
                 </form>
               </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="tutupModal()" data-dismiss="modal">Tutup</button>
                <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-flat">Kirim</button> -->
              </div>
            </div>
          </div>
        </div>
        <!--End Bootstrap modal -->

        <!-- Bootstrap modal Batal -->
        <div class="modal fade" id="modal_batal" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
              </div>
              <div class="modal-body form">
                <form action="#" id="form_batal" class="form-horizontal">
                  <input type="hidden" value="" name="id_sewa" id="id_sewa" /> 
                  <div class="form-body">

                    <div class="form-group">
                      <label class="control-label col-md-2">Alasan Batal</label>
                      <div class="col-md-9">
                        <textarea name="keterangan_batal" id="keterangan_batal" class="form-control" type="text" cols="5" rows="5"></textarea>
                     </div>
                   </div>

                  </div>
                 </form>
               </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSave" onclick="saveBatal()" class="btn btn-primary btn-flat">Kirim</button>
              </div>
            </div>
          </div>
        </div>
        <!--End Bootstrap modal Batal -->


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
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        
    </body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });

    const modalDetail = (id_sewa) => {
        $('#modal_detail').modal('show');

        updateStatusRead(id_sewa)
        $.ajax({
        url : "<?php echo site_url('index/getDetailSewaByIdSewa')?>/" + id_sewa,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('#judul').val(data.judul)
            $('#deskripsi').val(data.deskripsi)
            $('#lokasi_tujuan').val(data.lokasi_tujuan)
            $('#tujuan_perjalanan').val(data.tujuan_perjalanan)
            $('#jarak').val(data.jarak)
            $('#tgl_sewa').val(data.tgl_sewa)
            $('#tgl_pinjam').val(data.tgl_pinjam)
            $('#tgl_kembali').val(data.tgl_kembali)
            $('#keterangan').val(data.keterangan)

                   
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
    }

    const updateStatusRead = (id_sewa) => {
      $.ajax({
        url : "<?php echo site_url('index/updateIsRead')?>/" + id_sewa,
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
        });
    }

    const modalBatal = (id_sewa) => {
       $('#modal_batal').modal('show');
       $('#id_sewa').val(id_sewa);
    }

    const tutupModal = () => {
      window.location.reload();
    }

    const saveBatal = () => {
      let id_sewa    = $('#id_sewa').val()
      let keterangan = $('#keterangan_batal').val()

      let postData = {
        id_sewa    : id_sewa,
        keterangan : keterangan
      }

      $.ajax({
        url : "<?php echo site_url('index/cancelBooking')?>",
        type: "POST",
        data:postData,
        dataType: "JSON",
        success: function(data)
        { 
           swal("Pesan", "Sukses Membatalkan Booking", "success");  
           setTimeout(function(){  window.location.reload() }, 2000);      
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get data from ajax');
        }
      });

    }


</script>