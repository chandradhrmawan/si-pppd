<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=(isset($no_plat)) ? $no_plat : ''?></h3>

              <p>No Polisi Kendaraan yang akan di supir</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-clipboard"></i>
            </div>
            <a href="<?=base_url()?>transaksi/surat_jalan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> 
      </div>
      <!-- /.row -->
</section>


<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(() => { 
});


</script>
