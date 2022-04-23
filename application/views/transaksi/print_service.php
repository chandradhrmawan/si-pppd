<!-- <div class="pad margin no-print">
  <div class="callout callout-info" style="margin-bottom: 0!important;">
    <h4><i class="fa fa-info"></i> Note:</h4>
    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
  </div>
</div> -->

  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Sikopmil.
          <small class="pull-right">Date: <?=date('d-m-Y h:i:s')?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>Sikopmil.</strong><br>
          Jakarta, Indonesia<br>
          Tanjung Priok, 14320<br>
          Phone: (021) 123-5432<br>
          Email: sikopmil@sikopmil.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>Data Kendaraan.</strong><br>
          No Polisi : <?=$data_hdr_service->no_plat?><br>
          Nama Kendaraan : <?=$data_hdr_service->judul?><br>
          </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>No Nota #<?=date('dmyhis')?></b><br>
        <br>
        <b>Tanggal Service:</b> <?=view_date_hi($data_hdr_service->tgl_service)?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Service / Spare Part</th>
            <th>Harga(Rp)</th>
            <th>Jumlah(Qty)</th>
            <th>Sub Total</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach($data_dtl_service as $key => $value): ?>
            <tr>
              <td><?=$key+1?></td>
              <td><?=$value->nama_service?></td>
              <td>Rp.<?=number_format($value->harga,2)?></td>
              <td><?=($value->jumlah)?></td>
              <td><?=number_format($value->sub_total,2)?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <?php
          $status = "Belum Lunas";
          if($data_hdr_service->status_lunas == 1){
             $status = "Lunas";
          }elseif($data_hdr_service->status_lunas == 0){
              $status = "Belum Lunas";
          }
        ?>
        <p class="lead">Status Lunas : <b><?=$status?></b></p>
        <p>Deskripsi Service:</p>
        
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <?=$data_hdr_service->note?>
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Tanggal Service <?=view_date_hi($data_hdr_service->tgl_service)?></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Grand Total:</th>
              <td>Rp. <?=number_format($data_hdr_service->total)?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="#" onclick="print()" class="btn btn-primary btn-flat"><i class="fa fa-print"></i> Print</a>
        <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button> -->
        <button type="button" class="btn btn-danger pull-right btn-flat" style="margin-right: 5px;" onclick="kembali()">
          <i class="fa fa-times"></i> Kembali
        </button>
      </div>
    </div>
  </section>
  <!-- /.content -->
  <div class="clearfix"></div>
<!-- </div> -->
<!-- /.content-wrapper -->

<script type="text/javascript">
  const print = () => {
    window.print();
  }

  const kembali = () => {
    var url = "<?php echo site_url('transaksi/Service/index')?>"
    window.location.href = url
  }
</script>