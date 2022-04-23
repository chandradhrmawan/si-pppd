<form name="form" id="form" enctype="multipart/form-data" method="post">
<div class="row">
  <div class="col-md-12">
    <div class="box box-info" id="box-input">
      <div class="box-body pad">
            <div class="form-group">
              <label>Nama Jabatan</label>
              <input type="text" name="nm_jabatan" id="nm_jabatan" class="form-control">
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-primary btn-flat" style="margin-right: 5px;" onclick="printPrev()">
              <i class="fa fa-search"></i> Show Data</button>
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
    $('#btn-excel').hide();
    window.print();
    $('#box-input').show();
    $('#btn-print').show();
    $('#btn-excel').show();
  }

  const printPrev = () => {
    let nm_jabatan   = $('#nm_jabatan').val()

    $.ajax({
        url : "<?php echo site_url('laporan/Jabatan/listData')?>?nm_jabatan="+nm_jabatan,
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
    let nm_jabatan   = $('#nm_jabatan').val()

    let url = "<?php echo site_url('laporan/Jabatan/exportExcel/')?>?nm_jabatan="+nm_jabatan
    window.open(url,"_blank")
  }

  printPrev();
</script>



