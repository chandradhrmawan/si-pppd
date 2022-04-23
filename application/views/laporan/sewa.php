<form name="form" id="form" enctype="multipart/form-data" method="post">
<div class="row">
  <div class="col-md-12">
    <div class="box box-info" id="box-input">
      <div class="box-body pad">
            <div class="form-group">
              <label>Tanggal Awal</label>
              <input type="text" name="tgl_awal" id="tgl_awal" class="form-control datepicker">
            </div>

            <div class="form-group">
              <label>Tanggal Akhir</label>
              <input type="text" name="tgl_akhir" id="tgl_akhir" class="form-control datepicker">
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-primary btn-flat" style="margin-right: 5px;" onclick="printPrev()">
          <i class="fa fa-search"></i> Show Data
        </button>
         <button type="button" class="btn btn-success btn-flat" style="margin-right: 5px;" onclick="exportExcel()">
              <i class="fa fa-file-excel-o"></i> Export Excel</button>
            </div>
      </div>
    </div>

    <div class="box">
      <div id="table-show"></div>
    </div>
  </div>
    
  </div>


</form>
<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">

 const doPrint = () => {
    $('#box-input').hide();
    $('#btn-print').hide();
    window.print();
    $('#box-input').show();
    $('#btn-print').show();
  }

  const printPrev = () => {
    let tgl_awal   = $('#tgl_awal').val()
    let tgl_akhir  = $('#tgl_akhir').val()

    $.ajax({
        url : "<?php echo site_url('laporan/Sewa/listData')?>?tgl_awal="+tgl_awal+"&tgl_akhir="+tgl_akhir,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('#table-show').html(data)      
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get data from ajax');
        }
      });
  }

  const exportExcel = () => {
    let tgl_awal   = $('#tgl_awal').val()
    let tgl_akhir  = $('#tgl_akhir').val()

    let url = "<?php echo site_url('laporan/Sewa/exportExcel')?>?tgl_awal="+tgl_awal+"&tgl_akhir="+tgl_akhir
    window.open(url,"_blank")
  }
  printPrev()

</script>



