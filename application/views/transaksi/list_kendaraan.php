<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/grid-shop.css">


<style type="text/css">
    .containerImg{
        width: 200px;
    }
</style>

<div class="row">
  <div class="col-md-12">
    <div class="box box-info">

    <div class="container">
        <h3 class="h3">List Kendaraan </h3>
        <div class="row">
            <?php foreach($list_kendaraan as $valx): 
                $img = (empty($valx->path)) ? "".base_url()."assets/img/no_img.png"
                                            : "".base_url()."uploads/kendaraan/".$valx->path;

                $status = ($valx->status == 0) ? 'Tidak Tersedia' : 'Tersedia';                          
            ?>
            <div class="col-md-3 col-sm-6 ">
                <div class="product-grid4">
                    <div class="product-image4">
                        <a href="#">
                            <img class="pic-1" src="<?=$img?>">
                            <img class="pic-2" src="<?=$img?>">
                        </a>
                        <?php //debux($valx); ?>
                        <ul class="social">
                            <li><a href="#" data-tip="Quick View" onclick="detail(<?=$valx->id_kendaraan?>)"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#"><?=$valx->nm_merk?> <?=$valx->nm_tipe?></a></h3>
                        <div class="price">
                            <?=$valx->no_plat?>
                        </div>

                        <?php if($valx->status == 0){ ?>
                            <button class="btn btn-danger btn-sm btn-flat" disabled="true"><?=$status?></button>
                        <?php }else{ ?>
                            <button class="btn btn-info btn-sm btn-flat" onclick="pesan(<?=$valx->id_kendaraan?>)"><?=$status?></button>
                        <?php } ?>

                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        </div>
    </div>
    <hr>
    </div>
   </div>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_detail" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <div class="form-body">

            <table class="table table-bordered">
                <tr>
                    <th style="width: 30%">Jenis Kendaraan</th>
                    <td><p id="nm_jenis"></p></td>
                </tr>
                <tr>
                    <th>Merk Kendaraan</th>
                    <td><p id="nm_merk"></p></td>
                </tr>
                <tr>
                    <th>Tipe Kendaraan</th>
                    <td><p id="nm_tipe"></p></td>
                </tr>
                <tr>
                    <th>No Mesin</th>
                    <td><p id="no_mesin"></p></td>
                </tr>
                <tr>
                    <th>No Plat</th>
                    <td><p id="no_plat"></p></td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><div id="image"></div></td>
                </tr>
            </table>

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

<!-- Modal Penyewaan -->
<div class="modal fade" id="modal_sewa" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <div class="form-body">

           

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
<!-- End Modal Penyewaan -->

<script type="text/javascript">
    const detail = (id_kendaraan) => {
        $('#modal_detail').modal('show');
        $('.modal-title').text('Detail Data Kendaraan'); // Set Title to Bootstrap modal title

        $.ajax({
            url : "<?php echo site_url('transaksi/Sewa/getDetailDataKendaraan')?>/"+id_kendaraan,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              $("#nm_jenis").html(data.nm_jenis);
              $("#nm_merk").html(data.nm_merk);
              $("#nm_tipe").html(data.nm_tipe);
              $("#no_mesin").html(data.no_mesin);
              $("#no_plat").html(data.no_plat);

              $("#image").html('<img src="<?=base_url()?>uploads/kendaraan/'+data.path + '" style="width: 200px;height: 200px;" />');
              $("#prev").hide();
                   
            },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });

    }

    const pesan = (id_kendaraan) => {
       url = "<?=base_url()?>transaksi/sewa/pesan/"+id_kendaraan
       window.location = url;
    }

</script>